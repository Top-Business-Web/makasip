<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use App\Models\DailyPoints;
use App\Traits\GeneralTrait;
use App\Traits\PhotoTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\MakePointsMoney;

class AuthController extends Controller
{
    use GeneralTrait,PhotoTrait;
    public function __construct()
    {
        $this->middleware('auth:user-api')->only('myprofile','makePointsMoney');
    }

    public function login(request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ]);

        if ($validator->fails())
            return $this->returnError($validator->getMessageBag(), 400);
        $token = auth()->guard('user-api')->attempt($request->only(['email','password']));

        if($token){
            $data = User::where('id',Auth::guard('user-api')->id())->first();
            if ($data->is_download === "0") {
                $data->is_download = "1";
                $data->balance += 50;
//                $data->save();

                Notification::create([
                    'user_id' => $data->id,
                    'message' => 'نقاطك',
                    'body' => ' تم اضافة 50 من النقاط الي حسابك عن طريق تحميل التطبيق',
                    'type' => 'user',
                ]);
            }
            $lastLoginDate = Carbon::parse($data->last_login_date);
            if (Carbon::today()->diffInDays($lastLoginDate) == 1) {
                $loginDays = $data->login_days;
                $today = Carbon::now();
                if ($lastLoginDate->diffInDays($today) == 1) {
                    switch ($loginDays) {
                        case 1:
                            $points = 20;
                            break;
                        case 2:
                            $points = 30;
                            break;
                        case 3:
                            $points = 40;
                            break;
                        default:
                            $points = 50;
                            break;
                    }
                    $loginDays++;
                } else {
                    $points = 50;
                    $loginDays = 1;
                }
                $data->login_days = $loginDays;
                $data->last_login_date = $today;
                $data->balance += $points;
                DailyPoints::Create([
                    'user_id' => $token->id,
                    'points' => $points,
                    'date' => $data->last_login_date
                ]);

            } else {
                $data->login_days = 1;
                $data->save();
            }
            $data['country_data'] = $data->country_data;
            $data['token'] = $token;
            return $this->returnData('data', $data,'تم تسجيل الدخول بنجاح');
        }

        return $this->returnError('تحقق من بيانات الدخول',405);

    }

    public function register(request $request)
    {
        $validator = Validator::make($request->all(), [
            'image'       => 'nullable|image',
            'user_name'   => 'required|max:255',
            'email'       => 'required|email',
            'phone'       => 'required',
            'country'     => 'required',
            'password'    => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);

        if ($validator->fails())
            return $this->returnError($validator->getMessageBag(), 400);

        $check = User::where('email',$request->email)->first();

        if($check)
            return $this->returnError('هذا الايميل تم استخدامه من قبل', 401);

        $data = $request->except('password_confirmation');
        $data['password'] = Hash::make($request->password);
        $data['balance'] = 100;
        if($request->has('image') && $request->image != null)
            $data['image'] = $this->saveImage($request->image,'assets/uploads/users');

        if (isset($data['referral_code'])) {
            $referral_user = User::where('referral_code', $data['referral_code'])->first();
            if ($referral_user) {
                $referral_user->balance += 50;
                $referral_user->save();
            }
        }
        $data['referral_code'] = uniqid();

        $user = User::create($data);
        $user = User::find($user->id);
        $user->country_data = $user->country_data;

        $user['token'] = auth()->guard('user-api')->attempt(request(['email', 'password']));
        return $this->returnData('data',$user,'تم اضافة مستخدم جديد');
    }

    public function logout(request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails())
            return $this->returnError($validator->getMessageBag(), 400);

        Auth::logout();
        return $this->returnSuccessMessage('تم تسجيل الخروج بنجاح');
    }

    public function updateProfile(request $request)
    {
        $validator = Validator::make($request->all(), [
            'image'       => 'nullable|image',
            'user_id'     => 'required|exists:users,id',
            'user_name'   => 'nullable|max:255',
            'phone'   => 'nullable|max:255',
            'country'   => 'nullable|max:255',
            'email'       => 'nullable|unique:users,email,'.$request->user_id.",id",
            'password'    => 'nullable|min:6|confirmed',
            'password_confirmation' => 'nullable|min:6'
        ]);

        if ($validator->fails())
            return $this->returnError($validator->getMessageBag(), 400);

        $check = User::where([['email',$request->email],['id','!=',$request->user_id]])->first();

//        if($check)
//            return $this->returnError('هذا الايميل تم استخدامه من قبل', 401);

        $data = $request->except('password_confirmation','user_id');

        if($request->has('password') && $request->password != null)
            $data['password'] = Hash::make($request->password);
        else
            unset($data['password']);

        if($request->has('image') && $request->image != null)
            $data['image'] = $this->saveImage($request->image,'assets/uploads/users');
        else
            unset($data['image']);


        $user = User::find($request->user_id);
        $user->update($data);

        $user->country_data = $user->country_data;
        $user->token = request()->bearerToken();
        return $this->returnData('data',$user,'تم تعديل المستخدم بنجاح');
    }

    public function deleteMyAccount(request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails())
            return $this->returnError($validator->getMessageBag(), 400);

        User::find($request->user_id)->delete();

        return $this->returnSuccessMessage('تم حذف حسابك بنجاح :(');

    }


    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function myprofile()
    {
        try {
            $data = auth()->user();
//            dd($data->country_data);
            $data->country_data = $data->country_data;
            $data->token = request()->bearerToken();
            return $this->returnData('data',$data,'تم إيجاد البيانات بنجاح');
        }catch (\Exception $exception){
            return $this->returnError($exception->getMessage(), 401);
        }

    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function makePointsMoney(Request $request){
        $user= auth()->user();

        Mail::to(env('MAIL_USERNAME'))->send(new MakePointsMoney($user));
        toastSuccess('تم ارسال طليك للمسئول بنجاح وسيتم التحويل في اقرب وقت');
        return $this->returnData('data',null,'تم ارسال طليك للمسئول بنجاح وسيتم التحويل في اقرب وقت');
    }
}

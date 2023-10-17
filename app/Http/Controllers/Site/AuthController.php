<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Mail\AdmainMail;
use App\Mail\resetPassword;
use App\Models\Notification;
use App\Models\User;
use App\Models\DailyPoints;
use App\Models\Country;
use App\Traits\PhotoTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\MakePointsMoney;

class AuthController extends Controller
{
    use PhotoTrait;

    public function register($referral_code = null)
    {
        if (Auth::guard('user')->check()) {
            return redirect('homepage');
        } else {
            $data['countries'] = Country::orderBy(App::getLocale() . '_name', 'ASC')->get();
            return view('site.Auth.register', ['referral_code' => $referral_code], $data);
        }
    }

    public function UserRegistration(request $request)
    {
        $request->validate([
            'user_name' => 'required|max:255',
            'phone' => 'required|max:255|unique:users,phone',
            'country' => 'required|max:255',
            'email' => 'required|max:255|email|unique:users,email',
            'password' => 'required|confirmed|max:255|min:6',
            'password_confirmation' => 'required',
        ], [
            'user_name.required' => 'Please Enter Your User Name',
            'email.required' => 'Please Enter Your Email',
            'phone.required' => 'Please Enter Your Phone',
            'email.unique' => 'This Email is Used Before',
            'phone.unique' => 'This Phone is Used Before',
            'password.required' => 'Please Enter A Password',
            'password.confirmed' => 'Password Confirmation Should Be Same As Password',
        ]);
        $data = $request->only('user_name', 'email', 'password', 'phone', 'country', 'referral_code');

        $data['password'] = Hash::make($request->password);
        $data['balance'] = 100;
        $data['last_login_date'] = $request->created_at;
        // Check if a referral code was passed and add points to the referring user
        if (isset($data['referral_code'])) {
            $referral_user = User::where('referral_code', $data['referral_code'])->first();
            if ($referral_user) {
                $referral_user->balance += 50;
                $referral_user->save();
            }

            Notification::create([
                'user_id' => $referral_user->id,
                'message' => 'نقاطك',
                'body' => ' تم اضافة 50 من النقاط الي حسابك عن طريق الاحالة',
                'type' => 'user',
            ]);
        }
        $data['referral_code'] = uniqid();
        $user = User::create($data);

        if ($user) {
            Notification::create([
                'user_id' => $user->id,
                'message' => 'نقاطك',
                'body' => 'مرحبا بك مكافأة تسجيل حساب ' . '' . $user->balance . ' ' . 'نقطة, بسبب تسجيل دخول اول مرة',
                'type' => 'user',
            ]);
            Auth::guard('user')->login($user);
            toastSuccess('مرحبا بك يا ' . $request->user_name);
            toastSuccess('مرحبا بك مكافأة تسجيل حساب ' . '' . $user->balance . ' ' . 'نقطة');
            return redirect('homepage');
        } else {
            toastError('هناك خطأ ما ...');
            return view('site.Auth.register');
        }
    }

    public function logout()
    {
        Auth::guard('user')->logout();
        toastr()->info('تم تسجيل الخروج');
        return redirect()->route('/');
    }

    public function login()
    {
        if (Auth::guard('user')->check()) {
            return redirect('homepage');
        }
        return redirect('/');
    }

    public function postLogin(Request $request, $referral_code = null)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email' => 'يرجى إدخال البريد الإلكتروني',
            'password' => 'يرجى إدخال كلمة المرور',
        ]);

        $status = $request->has('rememberMe') ? 'true' : 'false';

        if (Auth::guard('user')->attempt($request->only('email', 'password'), $status)) {
            $user = Auth::guard('user')->user();
            $lastLoginDate = Carbon::parse($user->last_login_date);

            if (Carbon::today()->diffInDays($lastLoginDate) >= 1) {
                $loginDays = $user->login_days;
                $today = Carbon::now()->format('Y-m-d');

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

                    // Create a notification based on the points earned
                    if ($points == 20) {
                        Notification::create([
                            'user_id' => $user->id,
                            'message' => 'نقاطك',
                            'body' => 'تم إضافة ' . $points . ' من النقاط إلى حسابك بسبب تسجيل دخول متزامن لليوم الثاني',
                            'type' => 'user',
                        ]);
                    } elseif ($points == 30) {
                        Notification::create([
                            'user_id' => $user->id,
                            'message' => 'نقاطك',
                            'body' => 'تم إضافة ' . $points . ' من النقاط إلى حسابك بسبب تسجيل دخول 3 متزامن',
                            'type' => 'user',
                        ]);
                    } elseif ($points == 40) {
                        Notification::create([
                            'user_id' => $user->id,
                            'message' => 'نقاطك',
                            'body' => 'تم إضافة ' . $points . ' من النقاط إلى حسابك بسبب تسجيل دخول 3 متزامن',
                            'type' => 'user',
                        ]);
                    } elseif ($points == 50) {
                        Notification::create([
                            'user_id' => $user->id,
                            'message' => 'نقاطك',
                            'body' => 'تم إضافة ' . $points . ' من النقاط إلى حسابك بسبب تسجيل دخول 3 متزامن',
                            'type' => 'user',
                        ]);
                    }
                } else {
                    $points = 20;
                    $loginDays = 1;
                }

                $user->login_days = $loginDays;
                $user->last_login_date = $today;
                $user->balance += $points;

                // Create a record for daily points
                DailyPoints::create([
                    'user_id' => $user->id,
                    'points' => $points,
                    'date' => $user->last_login_date
                ]);

                toastSuccess('مرحبا بعودتك مكافأة اليوم' . ' ' . $user->login_days, $points . ' ' . 'نقطة');
            } else {
                $user->login_days = 1;
            }

            if ($user->referral_code == null) {
                $user->referral_code = uniqid();
            }

            $user->save();
            toastSuccess('مرحبا بعودتك');
            return redirect(route('homepage'));
        }

        toastError('بيانات دخول غير صحيحة');
        return back();
    }


    public function profile()
    {
        $data['countries'] = Country::orderBy(App::getLocale() . '_name', 'ASC')->get();
        $data['referral_code'] = auth()->user()->referral_code;

        return view('site.profile', $data);
    }

    public function editProfile(Request $request)
    {
        $user = auth()->user();
        if ($request->submit == "submit") {
            $validator = \Validator::make(
                $request->all(),
                [
                    'email' => 'required|unique:users,email,' . $user->id,
                    'user_name' => 'required|string|min:3|max:100',
                    'image' => 'nullable|mimes:jpeg,jpg,png,gif',
                    'phone' => 'required|max:255|unique:users,phone,' . $user->id,
                    'country' => 'required|max:255',

                ]
            );
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $inputs = [];
            $inputs['email'] = $request->email;
            $inputs['user_name'] = $request->user_name;
            $inputs['phone'] = $request->phone;
            $inputs['country'] = $request->country;

            if ($request->has('image')) {
                if (file_exists($user->image)) {
                    unlink($user->image);
                }
                $inputs['image'] = $this->saveImage($request->image, 'assets/uploads/users');
            }

            $user->update($inputs);
            toastSuccess('تم تعديل حسابك بنجاح');
            return redirect()->route('profile');
        }

        Mail::to(env('MAIL_USERNAME'))->send(new MakePointsMoney($user));
        toastSuccess('تم ارسال طليك للمسئول بنجاح وسيتم التحويل في اقرب وقت');
        return redirect()->route('profile');
    }

    public function editPassword(Request $request)
    {
        $data = $request->validate([
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'

        ], [
            'password.required' => 'يرجي ادخال كلمة المرور',
            'password_confirmation.required' => 'يرجي تاكيد كلمة المرور',
            'password.confirmed' => 'يرجي ادخال كلمة المرور',
            'password.min' => 'الحد الادني لكلمة الحروف ستة احرف',
            'password_confirmation.min' => 'الحد الادني لكلمة الحروف ستة احرف',


        ]);


        $user = auth()->user();
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json(['status' => true]);
    }


    public function deleteMyProfile()
    {
        $user = auth()->user();
        $user->delete();
        return redirect()->route('/');
    }

    public function forgetPassword()
    {
        return view('site.Auth.forget-password');
    }

    public function resetPassword(Request $request)
    {

        $user = User::where('email', $request->email)->first();
        if ($user == null) {
            return response()->json(['status' => false]);
        }


        $details = ['id' => $user->id, 'name' => $user->user_name, 'email' => $user->email];
        Mail::to($user->email)->send(new resetPassword($details));


        return response()->json(['status' => true]);
    }

    public function editPasswordFromMail(Request $request, $id)
    {

        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();


        Auth::guard('user')->login($user);
        toastSuccess('مرحبا بك يا ' . $user->user_name);

        return redirect()->route('homepage');
    }
}

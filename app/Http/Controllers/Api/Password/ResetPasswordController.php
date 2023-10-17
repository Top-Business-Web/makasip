<?php

namespace App\Http\Controllers\Api\Password;

use App\Http\Controllers\Controller;
use App\Models\ResetCodePassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Traits\GeneralTrait;

class ResetPasswordController extends Controller
{
    use GeneralTrait;
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'code' => 'required|string|exists:reset_code_passwords',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if($validator->fails()) {
            return $this->returnError($validator->errors(), 422);
        }

        // find the code
        $passwordReset = ResetCodePassword::firstWhere('code', $request->code);

        // check if it does not expired: the time is one hour
        if ($passwordReset->created_at->addHour() < now()) {
            $passwordReset->delete();
            return $this->returnError(['msg' => trans('passwords.code_is_expire')], 422);
        }

        // find user's email
        $user = User::firstWhere('email', $passwordReset->email);

        // update user password
        $data['password'] = Hash::make($request->password);
        $user->update($data);

        // delete current code
        $passwordReset->delete();

        return response(['msg' =>'password has been successfully reset','status'=>200], 200);
    }
}

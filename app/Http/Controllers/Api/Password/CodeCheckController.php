<?php

namespace App\Http\Controllers\Api\Password;

use App\Http\Controllers\Controller;
use App\Models\ResetCodePassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\GeneralTrait;

class CodeCheckController extends Controller
{
    use GeneralTrait;
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'code' => 'required|string|exists:reset_code_passwords',
        ]);
        if($validator->fails()) {
            return $this->returnError($validator->errors(), 422);
        }

        // find the code
        $passwordReset = ResetCodePassword::firstWhere('code', $request->code);

        // check if it does not expired: the time is one hour
        if ($passwordReset->created_at > now()->addHour()) {
            $passwordReset->delete();
            return $this->returnError( ['msg' => trans('passwords.code_is_expire')], 422);
        }

        return response([
            'verify_code' => $passwordReset->code
            ,'status'=>200,
            'msg' => trans('passwords.code_is_valid')
        ], 200);
    }
}

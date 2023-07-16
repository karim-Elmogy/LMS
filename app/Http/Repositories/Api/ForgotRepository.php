<?php

namespace App\Http\Repositories\Api;

use App\Http\Interfaces\Api\ForgotInterfaces;
use App\Http\Traits\ApiResponseTrait;


use App\Models\User;
use App\Notifications\ResetPasswordNotification;
use Ichtrojan\Otp\Otp;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class ForgotRepository implements ForgotInterfaces
{
    use ApiResponseTrait;

    private $otp;


    public function __construct()
    {
        $this->otp=new Otp;
    }

    public function forgot($request)
    {


        try {

        $validation=Validator::make($request->all(),[
            'email'=>['required', 'string', 'email','exists:users'],
        ]);

        if($validation->fails())
        {
            return $this->apiResponse(400,'validation error',$validation->errors());
        }

        $input=$request->only('email');
        $user=User::where('email',$input)->first();

        $user->notify(new ResetPasswordNotification());


        return $this->apiResponse(200,"Please check your email");




        }catch (\exception $e)
        {
//            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
            return $this->apiResponse(400,'error');
        }
    }



    public function reset($request)
    {
        try {


        $validation=Validator::make($request->all(),[
            'email'=>['required', 'string', 'email','exists:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'otp'=>['required', 'max:6']
        ]);



        if($validation->fails())
        {
            return $this->apiResponse(400,'validation error',$validation->errors());
        }


        $user=User::where('email',$request->email)->first();

        $user->update(['password'=>Hash::make($request->password)]);

        $user->tokens()->delete();

        return $this->apiResponse(200,"Password has been successfully changed");

        }catch (\exception $e)
        {
            return $this->apiResponse(400,'error');
        }
    }
}

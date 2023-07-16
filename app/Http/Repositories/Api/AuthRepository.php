<?php

namespace App\Http\Repositories\Api;

use App\Http\Interfaces\Api\AuthInterfaces;
use App\Http\Traits\ApiResponseTrait;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthRepository implements AuthInterfaces
{
    use ApiResponseTrait;

    public function login($request)
    {
        try {

        Auth::shouldUse('api');

        $validation=Validator::make($request->all(),[
            'email'=>['required', 'string', 'email'],
            'password'=> ['required','min:8']
        ]);

        if($validation->fails())
        {
            return $this->apiResponse(400,'validation error',$validation->errors());
        }


        $userData = $request->only('email','password');

        if($token=Auth::attempt($userData))
        {
            return $this->respondWithToken($token);
        }

        return $this->apiResponse(400,'email or password does not match');

        }catch (\exception $e)
        {
            return $this->apiResponse(400,'error');
        }
    }

    public function register($request)
    {
        try {

        $validation=Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if($validation->fails())
        {
            return $this->apiResponse(400,'validation error',$validation->errors());
        }

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        return $this->login($request);

        }catch (\exception $e)
        {
            return $this->apiResponse(400,'error');
        }


//        return $this->apiResponse(200,'Account Was Created');
    }



    public function logout($request)
    {
        try {

            $token=$request->header('auth-token');
            if ($token)
            {
                JWTAuth::setToken($token)->invalidate();
                return $this->apiResponse(200,'User Successfully Logged Out',null,null);

            }

        }catch (\exception $e)
        {
            return $this->apiResponse(400,'some thing went wrong');
        }
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $socialUser = Socialite::driver('google')->stateless()->user();
            $user = User::where('google_id', $socialUser->id)->first();
            if ($user) {
                Auth::login($user);
                return $this->apiResponse(200,'user is login');
            } else {
                $createUser = User::create([
                    'name' => $socialUser->name,
                    'email' => $socialUser->email,
                    'google_id' => $socialUser->id,
                    'password' => encrypt('1234Password5678')
                ]);

                Auth::login($createUser);
                return $this->apiResponse(200,'Account Was Created');
            }
        }catch (\exception $e)
        {
            return $this->apiResponse(400,'some thing went wrong');
        }
    }

    protected function respondWithToken($token)
    {
        $array = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];

        return $this->apiResponse(200,'login',null,$array);
    }


}

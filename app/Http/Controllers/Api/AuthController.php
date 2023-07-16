<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Api\AuthInterfaces;
use App\Http\Traits\ApiResponseTrait;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public $authInterfaces;

    public function __construct(AuthInterfaces $authInterfaces)
    {
        $this->authInterfaces=$authInterfaces;
    }

    public function register(Request $request)
    {
        return $this->authInterfaces->register($request);
    }

    public function login(Request $request)
    {
        return $this->authInterfaces->login($request);
    }

    public function logout(Request $request)
    {
        return $this->authInterfaces->logout($request);
    }

    public function redirectToProvider()
    {
        return $this->authInterfaces->redirectToProvider();
    }

    public function handleProviderCallback()
    {
        return $this->authInterfaces->handleProviderCallback();
    }






}

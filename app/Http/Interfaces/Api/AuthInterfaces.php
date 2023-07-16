<?php

namespace App\Http\Interfaces\Api;

interface AuthInterfaces
{
    public function login($request);

    public function register($request);


    public function handleProviderCallback();
    public function redirectToProvider();


    public function logout($request);
}

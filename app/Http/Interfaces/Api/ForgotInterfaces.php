<?php

namespace App\Http\Interfaces\Api;

interface ForgotInterfaces
{
    public function forgot($request);
    public function reset($request);

}

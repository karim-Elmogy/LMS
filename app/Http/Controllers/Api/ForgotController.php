<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Api\ForgotInterfaces;
use Illuminate\Http\Request;


class ForgotController extends Controller
{

    public $forgotpassword;
    public function __construct(ForgotInterfaces $forgotInterfaces)
    {
        $this->forgotpassword = $forgotInterfaces;
    }

    public function forgot(Request $request)
    {
        return $this->forgotpassword->forgot($request);
    }

    public function reset(Request $request)
    {
        return $this->forgotpassword->reset($request);
    }

}

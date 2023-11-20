<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
      $pageConfigs = ['myLayout' => 'blank'];
      return view('auth.login',['pageConfigs' => $pageConfigs]);
    }
}

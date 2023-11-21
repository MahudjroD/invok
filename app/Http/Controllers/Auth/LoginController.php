<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

  public function getForm()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('auth.login', ['pageConfigs' => $pageConfigs]);
  }

  public function postForm(LoginRequest $request)
  {
    $credentials = $request->validated();
    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      return redirect()->intended(route('home'));
    }
    return to_route('auth.register')->withErrors([
      'email' => "Email invalide"
    ])->onlyInput('email');
  }
}

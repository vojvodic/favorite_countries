<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Show view for login
     */
    public function getLogin(){
        return view('auth.login');
    }

    /**
     * Handle request to authenticate user
     */
    public function postLogin(Request $request){
      $request->validate([
        'username'  => 'required',
        'password'  => 'required'
      ]);

      if (\Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
        // The user has been authenticated
        return redirect()->route('back.countries.index');
      }

      return redirect()->route('auth.get_login')->withInput()->with('alert_error',__('auth.failed'));
    }
}

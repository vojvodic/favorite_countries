<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    /**
     * Logout authenticated user and redirect him to login page
     */
    public function logout(){
      \Auth::logout();
      return redirect()->route('auth.get_login');
    }
}

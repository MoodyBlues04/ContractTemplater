<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'home']);
        $this->middleware('auth')->only(['logout', 'home']);
        $this->middleware('verified')->only('home');
    }

    public function registerPage(): View
    {
        return view('auth.register');
    }
}

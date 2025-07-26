<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Login method
     */
    public function login()
    {
        return view('client.pages.login');
    }

    /**
     * Signup method
     */
    public function signup()
    {
        return view('client.pages.signup');
    }
}

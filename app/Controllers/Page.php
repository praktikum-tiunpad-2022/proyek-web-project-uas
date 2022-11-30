<?php 

namespace App\Controllers;

class Page extends BaseController
{
    public function login()
    {
        return view('page/login');
    }
    public function logout()
    {
        return view('page/logout');
    }
    public function register()
    {
        return view('page/register');
    }
    public function profile()
    {
        return view('page/profile');
    }
    public function password()
    {
        return view('page/password');
    }
    public function dashboard()
    {
        return view('page/dashboard');
    }
}

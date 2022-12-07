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
    public function password()
    {
        return view('page/password');
    }
    public function dashboard()
    {
        return view('page/dashboard');
    }
    public function streaming()
    {
        return view('page/streaming');
    }
    public function add()
    {
        return view('page/add');
    }
    public function edit()
    {
        return view('page/edit');
    }
    public function delete()
    {
        return view('page/delete');
    }
}
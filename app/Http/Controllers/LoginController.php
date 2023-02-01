<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function page_login()
    {
        $page_title = 'FSDSD';
        $page_description = 'FFFF';
        $action = __FUNCTION__;
        return view('login.login', compact('page_title', 'page_description', 'action'));
    }

}
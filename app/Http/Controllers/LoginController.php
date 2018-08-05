<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

 	//assume this method is loginform
    public function index()
    {
        return view('login.formlogin');

    }


public function authenticate(Request $request)
    {
    	// echo "XXX";
    	//กรองค่า email, password
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            // Get the currently authenticated user...
            //$user = Auth::user();
            return redirect('admin/users');
        } else {
            return redirect('login')
                        ->with('error', 'Invalid User Or Password.');
        }
    }

public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

}
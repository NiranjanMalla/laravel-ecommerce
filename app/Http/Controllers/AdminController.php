<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function login(){
        // echo Hash::make('123456');
        // exit();
            // ***the above code is to generate encryped password for admin
        return view('admin.login');
    }

    public function makeLogin(Request $request){
        $data = array(
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'admin'
        );

        if(Auth::attempt($data)){
            return redirect()->route('admin.dashboard');
        }else{
            return back()->withErrors(['message'=>'Invalied email or password']);
        }
    }

    public function dashboard(){
        return view('admin.dashboard');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Mail\WelcomeMail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function login(){
        if(session()->has("username")){
            return redirect("/dashboard");
        }
        return view("hospital.login");
    }
    
    public function logout(){
        session()->forget("username");
        return redirect("/login");
    }

    public function loginCheck(LoginRequest $request)
    {
        $request->session()->put("username",$request->username);
        $request->session()->put("emailadd",$request->email);
        $mail =[
            'title' => "Welcome",
            'content' => "Welcome From Sakura Hospital",
            'from'    => "From Nandar"
        ];
        Mail::to($request->email)->send(new WelcomeMail($mail));
        return redirect("/dashboard");
    }

    public function language($code){
        session()->put("locale",$code);
        return back();
    }
}

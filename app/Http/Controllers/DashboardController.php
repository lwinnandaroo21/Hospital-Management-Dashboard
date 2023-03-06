<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        if(!session()->has("username")){
            return redirect("/login");
        }
        //get all data from room table
        $rooms = DB::table('rooms')->limit(4)->get();
        // return view("hospital.dashboard",["rooms"=>$rooms]);

        $drugs = DB::table('drugs')->limit(4)->get();
        

        $mails = DB::table('mails')->limit(4)->get();
        $apps = DB::table('appointments')->limit(4)->get();
        return view("hospital.dashboard",["rooms"=>$rooms,"drugs"=>$drugs,"mails"=>$mails,"apps"=>$apps]);
    }
    
public function localedashboard($code){
    session()->put("locale",$code);
    return back();
}

}

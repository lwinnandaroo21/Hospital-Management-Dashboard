<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all data from room table
        $allApps =DB::table('appointments')->get();
        return view("hospital.appAll",["allApps"=>$allApps]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("hospital.appAdd");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('appointments')
            ->insert([
                'doctor_name' => $request -> name,
                'room_no' => $request -> room,
                'date' => $request -> date,
                'time' => $request -> time
            ]);
            return redirect("/dashboard");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apps = DB::table('appointments')->find($id);
        return view("hospital.appEdit",["apps"=>$apps]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('appointments')
        ->where('id',$id)
            ->update([
                'doctor_name' => $request -> name,
                'room_no' => $request -> room,
                'date' => $request -> date,
                'time' => $request -> time
            ]);
            return redirect("/dashboard");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('appointments')->where('id',$id)->delete();
        return redirect('/dashboard');
    }
}

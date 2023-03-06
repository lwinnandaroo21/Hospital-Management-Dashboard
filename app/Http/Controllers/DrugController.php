<?php

namespace App\Http\Controllers;

use App\Mail\drugAddMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all data from drug table
        $allDrugs= DB::table('drugs')->get();
        return view("hospital.Drugall",["allDrugs"=>$allDrugs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("hospital.drugAdd");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('drugs')
            ->insert([
                'name'=>$request->name,
                'gram'=>$request->gram,
                'quantity'=>$request->quantity,
                'price'=>$request->price
            ]);

            //mail send
            $emailadd = session('emailadd');
            
            $mail =[
                'title'   => "Welcome",
                'content' => "You added new drug",
                'from'    => "From Nandar" 
            ];
            Mail::to($emailadd)->send(new drugAddMail($mail));
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
        //get data from drug table
        $drugs = DB::table('drugs')->find($id);
        return view("hospital.drugEdit",["drugs"=>$drugs]);
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
        DB::table('drugs')
        ->where('id',$id)
        ->update([
            'name'=>$request->name,
            'gram'=>$request->gram,
            'quantity'=>$request->quantity,
            'price'=>$request->price
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
        DB::table('drugs')->where('id',$id)->delete();
        return redirect('/dashboard');
    }
}

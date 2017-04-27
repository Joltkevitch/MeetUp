<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\User;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newUser= request()->all();
        $name= request()->get("Fname");
        $Lname= request()->get("Lname");
        $title= request()->get("Tit");
        $location= request()->get("location");
        $email= request()->get("email");
        $pass= request()->get("pass");
        $this->validate(request(),[
             "Fname" =>['required','min:3','max:20'],
            "Lname" =>['required','min:3','max:20'],
            "Tit"=>['required','min:3','max:20'],
            "location" =>'',
            "email" => ['max:45','email','unique:users'],
            "pass" => ['required','min:8','max:20'],
        ]);
       //User::create($newUser);
         $data[]=[
            "USER_ID"=>NULL,
            "FIRST_NAME" =>$name,
            "LAST_NAME" =>$Lname,
            "TITLE"=>$title,
            "LOCATION_ID" =>$location,
            "EMAIL" => $email,
            "PASSWORD" => $pass,
            "IS_ACTIVE"=>1
         ];
         
         DB::table('users')->insert($data);// IT WORKS DAMN IT
        /*dd($newUser);*/ // with this you'll be able to watch the data sent through POST method
         
     /*   User::create([
            "USER_ID"=>NULL,
            "FIRST_NAME" =>$name,
            "LAST_NAME" =>$Lname,
            "LOCATION_ID" =>$location,
            "EMAIL" => $email,
            "PASSWORD" => $pass,
            "IS_ACTIVE"=>1,
            "TITLE"=>$title
        ]);*/
        
        return view("Meetings/NewUser");
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

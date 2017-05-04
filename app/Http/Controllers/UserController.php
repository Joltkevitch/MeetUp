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
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
       // $newUser= request()->all();
       //
        $name= request()->get("Fname");
        $Lname= request()->get("Lname");
        $title= request()->get("Tit");
        $location= request()->get("location");
        $email= request()->get("email");
        $pass= request()->get("pass");
        
        //Validaciones, reglas que se deben cumplir para insertar el usuario
        $this->validate(request(),[
             "Fname" =>['required','min:3','max:20'],
            "Lname" =>['required','min:3','max:20'],
            "Tit"=>['required','min:3','max:20'],
            "location" =>'',
            "email" => ['max:45','email','unique:users'],//Email debe ser unico en la tabla USERS
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
            "PASSWORD" => \Hash::make($pass),//encriptamos el password
            "IS_ACTIVE"=>1
         ];
         
         DB::table('users')->insert($data);// Insercion en la base de datos 
         
        /*dd($newUser);*/ // with this you'll be able to watch the data sent through POST method

        return view("Meetings/NewUser");
    }
    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }
    
    public function destroy($id)
    {
        //
    }
}

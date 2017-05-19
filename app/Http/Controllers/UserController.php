<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\User;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profileShow()
    {
       if(Auth::check()){
           
           $userDate=DB::table("users")
                   ->join("locations","users.LOCATION_ID","like","locations.LOCATION_CODE")
                   ->select("locations.LOCATION_NAME","users.FIRST_NAME","users.LAST_NAME","users.TITLE","users.EMAIL")
                   ->where("users.USER_ID","=",Auth::user()->USER_ID)
                   ->first();
           
           return view("Meetings/Profile")->with("data",$userDate);
       }
       else{
           return redirect()->route('Login');
       }
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
       // $newUser= request()->all();
       //Similar a $variable= $_POST["nombreInput"]
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

    
    public function update(Request $request)
    {
           $this->validate(request(),[
            "location" =>[''],
            "first" =>['min:3','max:20'],
            "last" =>['min:3','max:20'],
            "tit"=>['min:3','max:20'],
            "email" => ['email','unique:users'],//Email debe ser unico en la tabla USERS
        ]);  
           $id =request()->get("id");
           if( request()->get("first") != null || request()->get("first") != ""){
               DB::table("users")
                       ->where("USER_ID", "like", $id)
                       ->update(["FIRST_NAME"=> request()->get("first")]);
           }
           if( request()->get("last") != null || request()->get("last") != ""){
               DB::table("users")
                       ->where("USER_ID", "like",$id)
                       ->update(["LAST_NAME"=> request()->get("last")]);
           }
           if( request()->get("tit") != null || request()->get("tit") != ""){
               DB::table("users")
                       ->where("USER_ID", "like",$id)
                       ->update(["TITLE"=> request()->get("tit")]);
           }
           if( request()->get("email") != null || request()->get("email") != ""){
               DB::table("users")
                       ->where("USER_ID", "like",1)
                       ->update(["EMAIL"=> request()->get("email")]);
           }
           if( request()->get("location") != null || request()->get("location") != ""){
               DB::table("users")
                       ->where("USER_ID", "like",1)
                       ->update(["LOCATION_ID"=> request()->get("location")]);
           }
            return redirect()->action('UserController@profileShow');
    }
    
    public function destroy($id)
    {
        //
    }
}

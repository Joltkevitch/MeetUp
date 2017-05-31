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
                   ->join("roles","users.ROLE_CODE","like","roles.ROLE_ID")
                   ->select("locations.LOCATION_NAME","users.FIRST_NAME","users.LAST_NAME","users.TITLE","users.EMAIL","ROLE_CODE","roles.ROLE_NAME")
                   ->where("users.USER_ID","=",Auth::user()->USER_ID)
                   ->first();
           
           return view("Meetings/Profile")->with("data",$userDate);
       }
       else{
           return redirect()->route('Login');
       }
    }
    
    public function showRegisForm(){
        if(Auth::check() && Auth::user()->ROLE_CODE == 1){
            
            return view("Meetings/Register");
            
        }
        else{
            return redirect()->route('Login');
        }
        
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
            "ROLE_CODE" => 2,
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
    
    public function showUsers()
    {
        if(Auth::check() && Auth::user()->ROLE_CODE == 1){
            
            $users=DB::table("users")->
                join("locations","LOCATION_CODE","like","users.LOCATION_ID")->
                join("roles","ROLE_ID","like","users.ROLE_CODE")-> select("users.FIRST_NAME","users.LAST_NAME","users.TITLE","locations.LOCATION_NAME","users.EMAIL","users.IS_ACTIVE","roles.ROLE_NAME","roles.ROLE_ID","USER_ID")
                ->orderBy("users.FIRST_NAME")->Paginate(8);
            
            return view("Meetings/Admin")->with("users",$users);
        }
        else{
           return redirect()->route('Login'); 
        }
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
                       ->where("USER_ID", "like",$id)
                       ->update(["EMAIL"=> request()->get("email")]);
           }
           if( request()->get("location") != null || request()->get("location") != ""){
               DB::table("users")
                       ->where("USER_ID", "like",$id)
                       ->update(["LOCATION_ID"=> request()->get("location")]);
           } 
            if( request()->get("role") != Auth::user()->ROLE_CODE && request()->get("role") != null || request()->get("role")){
               DB::table("users")
                       ->where("USER_ID", "like",$id)
                       ->update(["ROLE_CODE"=> request()->get("role")]);
           }
            return redirect()->action('UserController@profileShow');
    }
    
    public function adminControl(Request $request)
    {
        $disabled=request()->get("dis");
        $enable=request()->get("en");
        $roleChange=request()->get("change");
        
        if($disabled != null || $disabled != ""){
            DB::table("users")->
                where("USER_ID","=",$disabled)->
                update(["IS_ACTIVE" => 0]);
        }
        
        if($enable != null || $enable != ""){
            DB::table("users")->
                where("USER_ID","=",$enable)->
                update(["IS_ACTIVE" => 1]);
        }
        
        if($roleChange != null || $roleChange != ""){
            $UserRole=DB::table("users")->select("ROLE_CODE")->where("USER_ID","LIKE",$roleChange)->first();
            
            if($UserRole->ROLE_CODE == 1){ $role= 2;}
            else{$role=1;}
            
            DB::table("users")->
                where("USER_ID","=",$roleChange)->
                update(["ROLE_CODE" => $role]);
        }
        
         return redirect()->action('UserController@showUsers');
        }
}

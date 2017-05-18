<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LogController extends Controller
{
    //metodo para mostrar el formulario de logueado
    public function showLog(){
        
        //Si el usuario ya esta logueado lo redirigimos a la pagina principal 
     if(Auth::check()===true){    
         //Select de las reuniones que se celebran en la fecha/dia actual
         $today_date=date("Y/m/d");
         
          $todays=DB::table("meetings")
                   ->join("users","USER_CODE","like","users.USER_ID")
                   ->join("locations","meetings.LOCATION_ID","like","locations.LOCATION_CODE")
                   ->join("rooms","ROOM_CODE","like","rooms.ROOM_ID")
                   ->select("rooms.NAME",DB::raw("TIME_FORMAT(meetings.TIME_FROM,'%H:%i') as TIME_FROM, TIME_FORMAT(meetings.TIME_TO,'%H:%i') as TIME_TO"),"users.LAST_NAME","users.FIRST_NAME","locations.LOCATION_NAME","USERS_ATT","NOTES")->
                    whereDate("meetings.MEETING_DATE","=",$today_date)->get();
          
          $yours=DB::table("meetings")
                   ->join("users","USER_CODE","like","users.USER_ID")
                   ->join("locations","meetings.LOCATION_ID","like","locations.LOCATION_CODE")
                   ->join("rooms","ROOM_CODE","like","rooms.ROOM_ID")
                   ->select("meetings.MEETING_NUMBER","rooms.NAME",DB::raw("TIME_FORMAT(meetings.TIME_FROM,'%H:%i') as TIME_FROM, TIME_FORMAT(meetings.TIME_TO,'%H:%i') as TIME_TO"),"users.LAST_NAME","users.FIRST_NAME","locations.LOCATION_NAME","USERS_ATT","NOTES","MEETING_DATE")->
                    where("meetings.USER_CODE","like",Auth::user()->USER_ID)->
                    whereDate("meetings.MEETING_DATE",">=",$today_date)->get();
          
          $past=DB::table("meetings")
                   ->join("users","USER_CODE","like","users.USER_ID")
                   ->join("locations","meetings.LOCATION_ID","like","locations.LOCATION_CODE")
                   ->join("rooms","ROOM_CODE","like","rooms.ROOM_ID")
                   ->select("rooms.NAME",DB::raw("TIME_FORMAT(meetings.TIME_FROM,'%H:%i') as TIME_FROM, TIME_FORMAT(meetings.TIME_TO,'%H:%i') as TIME_TO"),"users.LAST_NAME","users.FIRST_NAME","locations.LOCATION_NAME","USERS_ATT","NOTES","MEETING_DATE")->
                    whereDate("meetings.MEETING_DATE","<",$today_date)->get();
     
          return view("Meetings/AfterLog")->with("Meetings",$todays)->with("pasts",$past)->with("yours",$yours);
     
     }
    else{//Si no lo redirigimos a la parte de logueado
    return view("Meetings/RegisLog");
    }
        
    }

    //Autentificar usuario de la base de datos 
    public function login(LoginRequest $request)
    {
        if(!empty($request["remember"])){
        $remember=true;
        }  
        else{
        $remember=false;
        }
        $this->validate($request,[
            'EMAIL' => 'required|email', 'PASSWORD' => 'required'  //Validaciones, reglas 
        ]);
        
       $email= $request["EMAIL"];//Email dado
       $pass=($request["PASSWORD"]);// Password dado
       
       $user=User::where('EMAIL','like',$email)->where('IS_ACTIVE','=','1')->first();// Query para buscar en la base de datos 
       if($user){
           $DBpass=$user->PASSWORD;// Seleccionamos el password de la base de datos, que estara encriptado por motivos de seguridad
           
         if(\Hash::check($pass,$DBpass )){//Comprobar Passwords
             
         Auth::login($user,$remember);// Logear al usuario introducido
         
         $Info= Auth::user();
       return redirect()->action('LogController@showLog')->with("info",$Info);//Siguiente pagina, le pasamos la informacion del usuario logueado
        }
       }
        Session::flash("message-error","the e-mail introduced or the password is not correct. Try again.");
        return Redirect::to("/");
    }
    
    //Metodo para desloguear a un usuario
    public function logOut(){
        Auth::logout();
        Session::flush();
       return Redirect::to('/');// Redirigimos a el formulario una vez deslogueado el usuario
    }
}

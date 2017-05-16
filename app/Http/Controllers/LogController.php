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

class LogController extends Controller
{
    //metodo para mostrar el formulario de logueado
    public function showLog(){
        
        //Si el usuario ya esta logueado lo redirigimos a la pagina principal 
     if(Auth::check()===true){
     return view("Meetings/AfterLog");}
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
        return View("Meetings/AfterLog")->with("info",$Info);//Siguiente pagina, le pasamos la informacion del usuario logueado
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

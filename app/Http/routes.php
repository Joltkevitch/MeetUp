<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use \Illuminate\Support\Facades\Auth;
//Ruta para ver formulario de log In
Route::get('/',[
    'uses' => 'LogController@showLog',
    'as' => 'Login'
] );

//Ruta para ver vista indicando que el usuario ha sido creado correctamente 
Route::post("congrats","UserController@store");

/*Route::get("Welcome", function (){
    return view("Meetings/AfterLog");
});*/

//Ruta que se usa para autentificar al usuario
Route::post("Welcome","LogController@logIn")->after("auth");// Luego de autentificar

Route::get("Welcome",function(){
    if(Auth::check()===true){
    return redirect()->action('LogController@showLog');
    }
    else{
    return View("Meetings/RegisLog");
    }
})->after("auth");// Luego de autentificar

//Ruta para volver al formulario e log in, cuando se desloguea un usuario
Route::get('Logout',"LogController@logOut");

//Ruta en la que solo puede entrar un usuario administrador para ver un listado de usuarios
Route::get('Admin','UserController@showUsers');

//Ruta para escojer una habitacion
Route::get("Rooms",[
    'middelware'=> 'auth',//middelware es una clase ya implementada en laravle para una autentificacion basica de usuarios
    'uses' => "RoomController@showRooms"]);

//Continuacion de la reserva de una habitacion
Route::post("When",[
    'middelware' => 'auth',
    'uses' => 'RoomController@reserveRoom'
]);

//Guardamos en la base de datos la nueva reunion introducida
Route::post("Done",[
    'middelware' => 'auth',
    'uses' => 'MeetingsController@store'
]);

//Nos lleva a la vista que nos permite ver las reuniones pasadas 
Route::get("PastMeetings",[
    'middelware'=> 'auth',//middelware es una clase ya implementada en laravle para una autentificacion basica de usuarios
    'uses' => "MeetingsController@showPastMeetings"]);

//Nos lleva a la vista que nos permite ver las reuniones canceladas 
Route::get("CancelMeetings",[
    'middelware'=> 'auth',//middelware es una clase ya implementada en laravle para una autentificacion basica de usuarios
    'uses' => "CancellationsController@showCancelMeetings"]);

//Perfil de usuario loggeado
Route::get("Profile","UserController@profileShow");

//Actualizar datos o editar datos de usuario loggeado
Route::post("profile","UserController@update");

Route::post("Home","CancellationsController@create");

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

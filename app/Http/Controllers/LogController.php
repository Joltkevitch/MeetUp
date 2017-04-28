<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class LogController extends Controller
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
    public function store(LoginRequest $request)
    {
       /* $usersExists=User::where('EMAIL','=',$request["Email-Login"],"AND",'PASSWORD','=',$request["Pass-Login"])->get();
        //$pass=User::where('PASSWORD','=',$request["Pass-Login"])->get();
        
        print_r("<pre>");
        print_r($usersExists);
        print_r("</pre>");
        die("oops");        
        
      /*  $user2=User::get("EMAIL");
        dd($users);
        
        if($usersExists){
            
        } else {
            
        }*/
        if(Auth::attempt(["email"=> $request["Email-Login"], "password" => $request["Pass-Login"]])){
       /* if($users==true && $pass==true){  */
             print_r("<pre>");
        print_r("AUTH FUNCTION");
        print_r("</pre>");
        die("oops");        
       
        return Redirect::to('Welcome');
        }
        die("SOMETHING");
        Session::flash("message-error","the e-mail introduced or the password is not correct. Try again.");
        return Redirect::to("/");
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

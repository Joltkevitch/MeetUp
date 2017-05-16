<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MeetingsController extends Controller
{

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
    
      $UserId=$request->get("USER");
      $LocationId=$request->get("F_LOCATION");
      $room=$request->get("F_ROOM");
      $date=$request->get("F_DATE");
      $from=$request->get("StartsAt");
      $to=$request->get("EndsAt");
      $invited=$request->get("Attending");
      $Notes=$request->get("Notes");
      
       $yesterday=date("F j, Y", time() - 60 * 60 * 24);
       
       $this->validate(request(),[
           "USER"=> ["required"],
           "F_LOCATION"=>["required"],
           "F_ROOM" => ["required"],
           "F_DATE" => ["required","date","date_format:Y-m-d","after:yesterday"],
           "StartsAt" => ["required"],
           "EndsAt" => ["required"],
           "Attending"=> ["required"],
           "Notes"=>["required","max:255"]
                  ]);
       $users[]=[""];
       foreach($invited as $user){
           array_push($users,$user);
       }
       $value=implode(",",$invited);
       $data[]=[
           "MEETING_NUMBER" => NULL,
           "USER_CODE" => $UserId,
           "LOCATION_ID" => $LocationId,
           "ROOM_CODE" => $room,
           "MEETING_DATE" => $date,
           "TIME_FROM" => $from.":00",
           "TIME_TO" => $to.":00",
           "USERS_ATT"  => $value,
           "NOTES" => $Notes
       ];
       
       
       DB::table("meetings")->insert($data);
       
       return View("Meetings/Reserved")->with("from",$from)->with("to",$to)->with("date",$date);
       
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

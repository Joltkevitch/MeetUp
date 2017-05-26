<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MeetingsController extends Controller
{

    public function showPastMeetings(){
        
         $today_date=date("Y/m/d");//Fecha de hoy
        
          if(Auth::check()===true){    
              
         $pasts=DB::table("meetings")
                   ->join("users","USER_CODE","like","users.USER_ID")
                   ->join("locations","meetings.LOCATION_ID","like","locations.LOCATION_CODE")
                   ->join("rooms","ROOM_CODE","like","rooms.ROOM_ID")
                   ->select("rooms.NAME",DB::raw("TIME_FORMAT(meetings.TIME_FROM,'%H:%i') as TIME_FROM, TIME_FORMAT(meetings.TIME_TO,'%H:%i') as TIME_TO"),"users.LAST_NAME","users.FIRST_NAME","locations.LOCATION_NAME","USERS_ATT","NOTES","MEETING_DATE")->
                    whereDate("meetings.MEETING_DATE","<",$today_date)->orderBy("MEETING_DATE","DESC")->simplePaginate(5);
        
          return view("Meetings/PastMeetings")->with("pasts",$pasts);
          }
            else{//Si no lo redirigimos a la parte de logueado
    return view("Meetings/RegisLog");
            }
    }
    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
    
    //Datos dek formulario completo
      $UserId=$request->get("USER");
      $LocationId=$request->get("F_LOCATION");
      $room=$request->get("F_ROOM");
      $date=$request->get("F_DATE");
      $from=$request->get("StartsAt");
      $to=$request->get("EndsAt");
      $invited=$request->get("Attending");
      $Notes=$request->get("Notes");
      
       $yesterday=date("F j, Y", time() - 60 * 60 * 24);//Fecha de ayer
       
        //Validacion
       $this->validate(request(),[
           "USER"=> ["required"],
           "F_LOCATION"=>["required"],
           "F_ROOM" => ["required"],
           "F_DATE" => ["required","date","date_format:Y-m-d","after:yesterday"],
           "StartsAt" => ["required"],
           "EndsAt" => ["required"],
           "Attending"=> ["required"],
           "Notes"=>["max:255"]
                  ]);
        
        //Insertamos los usuarios en la base de datos como un arrray sepadarados por comas 
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
       
       //Insertamos en la tabla "meetings"
       DB::table("meetings")->insert($data);
       
       return View("Meetings/Reserved")->with("from",$from)->with("to",$to)->with("date",$date);
       
    }

    public function showYourMeetings()
        
    {
        // Selecionamos todas las reuniones que el usuario logueado posea
        $yourMeetings=DB::table("meetings")
                   ->join("users","USER_CODE","like","users.USER_ID")
                   ->join("locations","meetings.LOCATION_ID","like","locations.LOCATION_CODE")
                   ->join("rooms","ROOM_CODE","like","rooms.ROOM_ID")
                   ->select("rooms.NAME",DB::raw("TIME_FORMAT(meetings.TIME_FROM,'%H:%i') as TIME_FROM, TIME_FORMAT(meetings.TIME_TO,'%H:%i') as TIME_TO"),"users.LAST_NAME","users.FIRST_NAME","locations.LOCATION_NAME","USERS_ATT","NOTES")->
                    where("meetings.","=",$today_date)->get();
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

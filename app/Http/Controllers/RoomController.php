<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Room;

class RoomController extends Controller
{
   public function showRooms(){
        $rooms=DB::table("rooms")
                ->where("ROOMS.LOCATION_ID","=",Auth::user()->LOCATION_ID)->get(); // selecionamos todas las habitaciones dentro de la localidad del usuario logueado
               // ->join("LOCATIONS","LOCATION_ID","=","LOCATIONS.LOCATION_CODE")->get();
        
        $Loc=DB::table("Locations")->where("LOCATION_CODE","like",Auth::user()->LOCATION_ID)->pluck("LOCATION_NAME");//seleccionamos la localidad dl usuario logueado
       return view("Meetings/Rooms")->with("Location",$Loc)->with("rooms",$rooms);
   }

   public function reserveRoom(Request $request){
       
     $yesterday=date("F j, Y", time() - 60 * 60 * 24);
       $this->validate(request(),[
            "WishDate" => ["required","date","date_format:Y-m-d","after:yesterday"],
            "room" => ["required"]
       ]);
       $date=$request->get('WishDate');//fecha escogida por el usuario
       $room=$request->get('room');//habitacion escogida por el usuario
       
       $meets=DB::table("meetings")
               ->select(DB::raw("TIME_FORMAT(TIME_FROM,'%H:%i') as TIME_FROM, TIME_FORMAT(TIME_TO,'%H:%i') as TIME_TO"))
               ->where("ROOM_CODE","=",$room)
               ->where("MEETING_DATE","like",$date)->get();
       
         /* $meets=DB::select(DB::raw("SELECT MEETING_DATE ,TIME_FORMAT('TIME_FROM','%H:%i'),TIME_FORMAT(TIME_TO,'%H:%i') FROM MEETINGS WHERE ROOM_CODE = :room AND MEETING_DATE like :date"),
                       array('room'=>$room,
                           'date'=>$date
                       ));*/
       
      return view("Meetings/Time&End")->with("date",$date)->with("room",$room)->with("meetings",$meets);
   }
}

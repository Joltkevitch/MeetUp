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
       $today=date("Y/m/d");
       
       $rName=DB::table("ROOMS")
               ->join("LOCATIONS","LOCATION_ID","like","LOCATIONS.LOCATION_CODE")
               ->select("ROOM_ID","NAME","LOCATIONS.LOCATION_NAME","LOCATIONS.LOCATION_CODE")
               ->where("ROOM_ID","like",$room)->get();
       
       
       $user=DB::table("users")->select("USER_ID","FIRST_NAME","LAST_NAME")->get();
       
       $meets=DB::table("meetings")
               ->join("ROOMS","ROOM_CODE","like","ROOMS.ROOM_ID")
               ->select("ROOMS.NAME",DB::raw("TIME_FORMAT(MEETINGS.TIME_FROM,'%H:%i') as TIME_FROM, TIME_FORMAT(MEETINGS.TIME_TO,'%H:%i') as TIME_TO"))
               ->where("ROOM_CODE","=",$room)
               ->where("MEETING_DATE","like",$date)->get();
       
      return view("Meetings/Time&End")->with("date",$date)->with("room",$room)->with("meetings",$meets)->with("roomName",$rName)->with("users",$user);
   }
}

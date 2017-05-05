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
                ->where("ROOMS.LOCATION_ID","=",Auth::user()->LOCATION_ID)->get();
               // ->join("LOCATIONS","LOCATION_ID","=","LOCATIONS.LOCATION_CODE")->get();
        
        $Loc=DB::table("Locations")->where("LOCATION_CODE","like",Auth::user()->LOCATION_ID)->pluck("LOCATION_NAME");
       return view("Meetings/Rooms")->with("Location",$Loc)->with("rooms",$rooms);
   }

}

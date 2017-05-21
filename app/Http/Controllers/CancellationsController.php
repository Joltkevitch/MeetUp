<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CancellationsController extends Controller
{
public function index(Request $requiest){
    $Mnumber=$requiest->get("CancelData");
    $notes=$requiest->get("notes");
    $this->validate(request(),[
        "notes" => ["max:50"]
    ]);
    DB::table("meetings")->where("MEETING_NUMBER","like",$Mnumber)->delete();
    $data=[
        "CANCEL_ID" => NULL,
        "LOCATION_ID" => Auth::user()->LOCATION_ID,
        "USER_CODE" => Auth::user()->USER_ID,
        "CANCEL_DATE" => date("Y/m/d"),
        "NOTES" => $notes
    ];
    DB::table("cantellations")->insert($data);
    return view("Meetings/AfterLog");

}
}
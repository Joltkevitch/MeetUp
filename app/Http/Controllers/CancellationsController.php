<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class CancellationsController extends Controller
{
    
public function create(Request $requiest){
    
    $Mnumber=$requiest->get("CancelData");//Meeting_ID or Meeting_Number
    $notes=$requiest->get("notes");// Notas que el usuario quiera agragar al porque cancelar la reunion
    
    //Validaciones
    $this->validate(request(),[
        "notes" => ["max:50"]
    ]);
    
    //Borramos la reunion seleccionada 
    DB::table("meetings")->where("MEETING_NUMBER","like",$Mnumber)->delete();
    
    
    $data=[
        "CANCEL_ID" => NULL,
        "LOCATION_ID" => Auth::user()->LOCATION_ID,
        "USER_CODE" => Auth::user()->USER_ID,
        "CANCEL_DATE" => date("Y/m/d"),
        "NOTES" => $notes
    ];
    
    //Insertamos en la tabla "cancellations" 
    DB::table("cantellations")->insert($data);
    
    //Volvemos a home
    return redirect()->action('LogController@showLog');

}

public function showCancelMeetings(){
    
    $today_date=date("Y/m/d");//Fecha de hoy
    
          if(Auth::check()===true){    
              
         $cancels=DB::table("cantellations")                  
            ->join("users","USER_CODE","like","users.USER_ID")
            ->join("locations","cantellations.LOCATION_ID","like","locations.LOCATION_CODE")
            ->select("users.LAST_NAME","users.FIRST_NAME","locations.LOCATION_NAME","NOTES","CANCEL_DATE")->
           orderBy("CANCEL_DATE","DESC")->simplePaginate(8);
        
          return View("Meetings/Cancellations")->with("cancels",$cancels);
    
}
    else{//Si no lo redirigimos a la parte de logueado
    return view("Meetings/RegisLog");
        }
    }
}
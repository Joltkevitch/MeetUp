<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    //Especificamos la tabla a la que referenciarse en la base de datos 
    protected $table="meetings";
    //Indicamos cual es la clave primaria, que por defecto Laravel considera que solo seria "id[AUTO_INCREMENT]"
    protected $primaryKey="MEETING_NUMBER";
    
    protected $fillable=["MEETING_NUMBER","USER_CODE","LOCATION_ID","ROOM_CODE","MEETING_DATE","TIME_FROM","TIME_TO","USERS_ATT","NOTES"];
    
     public $timestamps = false;
}

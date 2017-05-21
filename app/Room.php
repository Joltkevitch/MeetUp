<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //Especificamos la tabla a la que referenciarse en la base de datos 
    protected $table="rooms";
    //Indicamos cual es la clave primaria, que por defecto Laravel considera que solo seria "id[AUTO_INCREMENT]"
    protected $primaryKey="ROOM_ID";
    
    protected $fillable=[""];
    
     public $timestamps = false;

}

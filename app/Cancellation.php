<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cancellation extends Model
{
    protected $table="cancellations";
    
    protected $primaryKey="CANCEL_ID";
    
    protected $filable=['CANCEL_ID','LOCATION_ID','USER_CODE','CANCEL_DATE','NOTES'];
    
    public $timestamps = false;
}

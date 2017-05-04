<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

//Modelo con el que se manejan los datos de la tabla USERS
class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

   //INDICAMOS LA TABLA 
    protected $table = 'users';

    protected $primaryKey="USER_ID";//Declaramos la clave primaria 
    
    //Datos que pueden ser rellenados desde un formario
    protected $fillable = ['FIRST_NAME','LAST_NAME','TITLE','LOCATION_ID', 'EMAIL', 'PASSWORD','IS_ACTIVE'];
   
    public $timestamps = false;//indicamos que no tenemos campos create_at y update_at

   //Campos portegidos
    protected $hidden = ['password', 'remember_token'];
   

}

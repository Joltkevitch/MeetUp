<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Lang;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
     public function postReset()
  {
    $credentials = Input::only(
      'email', 'password', 'password_confirmation', 'token'
    );

    $response = Password::reset($credentials, function($user, $password)
    {
      $user->password = \Hash::make($password);

      $user->save();
    });
         return Redirect::to('Welcome');
    switch ($response)
    {
      case Password::INVALID_PASSWORD:
      case Password::INVALID_TOKEN:
      case Password::INVALID_USER:
        return Redirect::back()->with('error', Lang::get($response));

    //  case Password::PASSWORD_RESET:
        
    }
  }
}

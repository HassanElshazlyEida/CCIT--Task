<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;

use Illuminate\Http\Request;
use App\Traits\ApiLoginMethods;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;


class LoginAPIMethodsController extends Controller
{
    use ApiLoginMethods;

    public function ApiRedirect($method){
        // If you want to check that method exist
        // $this->check_methods($method);
        return Socialite::driver($method)->redirect();
    }
    public function ApiCallback($method){

        $user= Socialite::driver($method)->stateless()->user();

        $this->login($user);

        return redirect()->route('home');
    }
}

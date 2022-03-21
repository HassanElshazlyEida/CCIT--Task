<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Auth\AuthenticationException;

trait ApiLoginMethods {


    protected function check_methods(string $method): bool {
        return Config::get(`services.$method`) ? true:false;
    }

    protected function login($user):bool{

        $login_user= User::firstOrCreate([
            'email'=> $user->email ?? null,
        ],[
            'name'=> $user->name,
            'password'=> Hash::make(Str::random(24))
        ]);
        try {
            Auth::login($login_user,true);
        }catch(AuthenticationException $e){
            return false;
        }
        return false;
    }
    public function flash(): void {
        Session::flash('error', "An Error Occur");
    }
}


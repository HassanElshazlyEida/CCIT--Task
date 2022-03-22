<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index');
    }
    public function payment_plan(StoreUserRequest $request){

        // Create new session for process 2
        session()->put('process_1',$request->all());

        $plans=User::$payment_plan;
        return view('auth.payment',['plans'=>$plans]);
    }
}

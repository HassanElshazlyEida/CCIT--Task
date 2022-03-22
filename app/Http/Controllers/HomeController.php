<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Create cache db query
        $users= Cache::remember('users',60*60,function(){
            return User::whereRoleIs('customer')->count();
        });
        $admins= Cache::remember('admins',60*60,function(){
            return User::whereRoleIs('administrator')->count();
        });
        $plans=User::$payment_plan;
        return view('dashboard',['customers'=>$users,'admins'=>$admins]);
    }
}

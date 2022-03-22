<?php

namespace App\Http\Controllers\Transactions;

use App\Models\Plan;
use App\Rules\PaymentPlan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{

    public function payment_plan(Request $request){

        $plans=Plan::all();
        return view('auth.payment',['plans'=>$plans]);
    }
    public function pay(Request $request){

        $plan=json_decode($request->payment_plan);

        $pay=$request->user()->newSubscription($plan->name,25869)
        ->returnTo(route('profile.edit'))
        ->create();

        return  view('auth.payment',['plans'=>[],'payLink'=>$pay]);

    }
}




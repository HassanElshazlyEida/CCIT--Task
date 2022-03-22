<?php

namespace App\Services;

use App\Models\Plan;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;

class CreateUpdateUser extends Controller implements ProfileUser {

  /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit_user(User $user,$route)
    {
        return view('profile.edit',['plans'=>Plan::all()->pluck('name'),'user'=>$user,'route'=>$route]);
    }


    public function update_user(User $user,$request)
    {
        if ($user->id == 1) {
            return back()->withErrors( __('You are not allowed to change data for a default user.'));
        }

        $user->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

}

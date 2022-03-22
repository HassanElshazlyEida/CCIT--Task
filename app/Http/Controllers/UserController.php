<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\CreateUpdateUser;
use App\DataTables\CustomerDatatable;
use App\Http\Requests\ProfileRequest;


class UserController extends CreateUpdateUser
{
    public function edit(User $user)
    {
        return $this->edit_user($user,route('user.update',['user'=>$user->id]));
    }
       /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(User $user,ProfileRequest $request)
    {
        return $this->update_user($user,$request);
    }
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(CustomerDatatable $customer)
    {
        return  $customer->render("users.index");
    }

    public function destroy(User $user){
        $user->forceDelete();
        return redirect()->back()->withStatus(__('Profile successfully destroyed.'));
    }
    public function Status(Request $request){
        $user = User::withTrashed()->find((int)$request->id);
        if($user){
            if($user->activate){
                $user->delete();
            }else {
                $user->restore();
            }
        }

        return response()->json([
            'status' => true
        ]);
    }



}

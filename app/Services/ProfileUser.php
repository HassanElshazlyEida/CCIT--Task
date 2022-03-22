<?php

namespace App\Services;

use App\Models\User;
use App\Http\Requests\ProfileRequest;

interface ProfileUser {

    public function edit_user(User $user,$route);

    public function update_user(User $user, $request);

}

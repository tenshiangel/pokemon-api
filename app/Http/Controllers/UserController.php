<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function all() {
        $users = User::all();
        return UserResource::collection($users);
    }

    public function update(UserRequest $request) {

    }
}

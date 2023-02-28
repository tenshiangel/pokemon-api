<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPasswordChangeRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function all() {
        $users = User::all();
        return UserResource::collection($users);
    }

    public function current() {
        $user = User::find(Auth::user()->id);
        return new UserResource($user);
    }

    public function update(UserRequest $request) {
        $user = User::find(Auth::user()->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->birthdate = $request->birthdate;
        $user->email = $request->email;
        $user->save();

        return new UserResource($user);
    }

    public function changePassword(UserPasswordChangeRequest $request) {
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->noContent();
    }
}

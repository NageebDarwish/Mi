<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use HttpResponses;



    public function Login(LoginRequest $request)
    {

        $request->validated($request->all());

        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->error('', 'Credentials not matches', 401);
        };

        $user = User::where('email', $request->email)->first();

        return $this->succes([
            'user' => $user,
            'token' => $user->createToken('Api Of ' . $user->name)->plainTextToken,
        ]);
    }
    public function Logout()
    {
        Auth::user()->currentAccessToken()->delete();
        return $this->succes([
            'message' => 'You Have Been Succesfully Logged Out'
        ]);
    }

    public function editUser(StoreUserRequest $request)
    {
        $request->validated($request->all());
        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
    }

    public function getUser()
    {
        $user = Auth::user();
        return $user;
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteRequest;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Http\Requests\ApiRegisterRequest;
use App\Http\Requests\ApiLoginRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class ApiUserController extends Controller
{
    public function register(ApiRegisterRequest $request){
        $user = new User;
        $organization = new Organization();
        $organization->fill($request->all());
        $organization->numberOfRelics = 0;
        $organization->save();
//        $user->userName = $request->userName;
        $user->organizationID = DB::table('organizations')->where('organizationName', $request->organizationName)->value('id');
        $user->admin = false;
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json($request->all());
    }
    public function login(ApiLoginRequest $request){
        if(Auth::attempt([
            'userName' => $request->userName,
            'password' => $request->password
        ])){
            $user = User::where('userName', '=',$request->userName)->first();
            $user->token = $user->createToken('App')->accessToken;
            return response()->json($user);
        }
        return response()->json(['userName'=>'Sai ten truy cap hoac mat khau'], 401);
    }
    public function userDelete($id){
        $user = User::find($id);
        $organization = Organization::find($user->organizationID);
        $organization->delete();
        $user->delete();
        return response()->json('deleted');
    }
    public function allUser(){
        $user = User::all();
        return response()->json($user);
    }
    public function userInfo(Request $request){
        return response()->json($request->user('api'));
    }
}

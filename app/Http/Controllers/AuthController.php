<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function index(){
        return view('login');
    }
    public function loginAPI(LoginRequest $request){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user=auth()->user();
            if($user->role->role_name=='guest'){
                Auth::logout();
                return response()->json(['error'=>'Unauthorised'], 401);
            }
            else{
                $tokenResult=$user->createToken('API Token');
                $token=$tokenResult->token;
                $token->save();

                return response()->json([
                    'access_token' =>'Bearer '.$tokenResult->accessToken,
                    'expires_at'=>Carbon::parse(
                        $tokenResult->token->expires_at
                    )->toDateTimeString()
                ],200);
            }
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
    public function login(LoginRequest $request){

        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user=Auth::user();
            if($user->role->role_name=='guest'){
                Auth::logout();
                abort(401);
            }
            return redirect('/webcompiler');
        }
        return back()->withErrors('Invalid username or password')->withInput();
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;

use Illuminate\Support\Facades\Auth;
class GithubController extends Controller
{


    public function getInfos()
    {
         $user = Socialite::driver('github')->user();
         $token = $user->token;
         $me = Socialite::driver('github')->userFromToken($token);
         $email = User::where('email', $me->getEmail())->get()->toarray();
        if (empty($email)) {
            $user = new User;
            $user->nickname = $me->getNickname();
            $user->name = $me->getName();
            $user->email = $me->getEmail();
            $user->password = null;
            $user->save();
            Auth::login($user, true);
            return view("home");

        }else {
            $id = User::where('email', $me->getEmail())->get()->toarray();
            Auth::loginUsingId($id[0]["id"]);
            return view("home");


        }

    }
}

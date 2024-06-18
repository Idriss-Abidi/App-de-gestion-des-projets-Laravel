<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function show(){
        return view('newlogin');
    }
    public function login(REQUEST $request){
        $email=$request->email;
        $pwd=$request->pwd;

        $result = Utilisateur::select('*')
        ->where('mdp', '=', $pwd)
        ->where('email', '=', $email)
        ->get();
        if (count($result) == 1) {
        $user = $result[0];
        session(['authenticated' => true]);
        session(['username' => ($user->nom." ".$user->prenom)]);
        session(['email' => $user->email]);
        session(['user_id' => $user->id]);
        return redirect()->route('Accueil');
        } else {
        return back();
        }
    }
    public function logout(Request $request){
        $request->session()->flush();
        // redirect the user to the login page
        return to_route('LoginForm');
    }
    public function signup(Request $request){
        $email=$request->email;
        $existingEmail = Utilisateur::where('email', $email)->first();
        if ($existingEmail) {
            return back();
        }
        if ($request->nom === null || $request->prenom === null || $request->email === null || $request->mdp === null) {
            return back();
        }
        $Utilisateur=new Utilisateur;
        $Utilisateur->nom=$request->nom;
        $Utilisateur->prenom=$request->prenom;
        $Utilisateur->email=$request->email;
        $Utilisateur->mdp=$request->mdp;
        $Utilisateur->connexion=now();
        $Utilisateur->save();
        return to_route("LoginForm");
    }
}

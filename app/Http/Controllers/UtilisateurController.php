<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function index(){
        $id=session("user_id");
        $user=Utilisateur::where('id',$id)->first();
        return view("Profile",['user'=>$user]);
    }
    public function edit(REQUEST $request){
        $id=session("user_id");
        $nom=$request->nom;
        $prenom=$request->prenom;
        $email=$request->email;
        $mdp=$request->mdp;
        Utilisateur::where('id', $id)->update([
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'mdp' => $mdp,
      ]);

        //
        return back();

    }
    public function delete(request $request){
        $id=session("user_id");
        $user = Utilisateur::find($id);
        $user->delete();
        return to_route("Acceuil");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Action;
use Illuminate\Http\Request;

class OpenAIController extends Controller
{
    public function AddActions(REQUEST $request){
        $actions = $request->action;
        $user=session('user_id');
        $projet=session('projet');
        // Insertion d'un nouveau projet pour un utilisateur donné
        foreach($actions as $act){
        $Action = new Action;
        $Action->titre = substr($act,3);
        $Action->description = null;
        $Action->date_debut  = null;
        $Action->date_fin  = null;
        $Action->statut = 1;
        $Action->utilisateur = $user;
        $Action->eval = 0;
        $Action->projet = $projet;
        $Action->save();
        }
        return back();
    }
}

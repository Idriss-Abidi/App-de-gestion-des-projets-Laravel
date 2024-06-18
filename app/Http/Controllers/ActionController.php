<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

use App\Models\Action;
use App\Models\Commentaire;
use App\Models\Equipe;
use App\Models\Projet;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use  Illuminate\Http\RedirectResponse;

class ActionController extends Controller
{
    public function index($Cryptprojet){
        // if(session("authenticated")==null) return to_route('LoginForm');
        $projet=decrypt($Cryptprojet);
        session(['projet' => $projet]);
        $user=session("user_id");
        $list = Action::where('utilisateur', $user)->where('projet', $projet)->get();
        $commentaires = Commentaire::where('projet', $projet)->orderBy('created_at', 'desc')->get();
        $list2 = Projet::where('id', $projet)->get();
        $ListeAutre=Action::where('actions.projet', $projet)
        // ->join('equipes',  'equipes.membre', '=', 'actions.utilisateur')
        ->where('actions.utilisateur', '<>', $user)
        ->distinct()
        ->get();

        $membres = Equipe::where('projet', $projet)
        ->join('utilisateurs' , 'equipes.membre', '=', 'utilisateurs.id')
        ->select('utilisateurs.id as user_id', 'utilisateurs.nom as nom', 'Equipes.role as role', 'utilisateurs.prenom as prenom', 'utilisateurs.email as email')
        ->get();

        $data=Action::select('statut',  DB::raw('count(id) as count'))
        ->Where('utilisateur', $user)
        ->Where('projet', $projet)
        ->groupBy('statut')
        ->pluck('count','statut')
        ->toArray();
        $stats = [];
        foreach($data as $key => $value) {
            if($key == 1)
            $stats['en attente'] = $value;
            else if($key == 2)
            $stats['en cours'] = $value;
            else if($key == 3)
            $stats['Terminé'] = $value;
            else if($key == 4)
            $stats['Annulé'] = $value;
            else
            $stats['En retard'] = $value;
        }
        return view('Action',['list'=>$list, 'membres'=>$membres, 'list2'=>$list2[0], 'commentaires'=>$commentaires,'ListeAutre'=>$ListeAutre, 'stats'=>$stats]);
    }

    public function add(REQUEST $request){
        $titre=$request->titre;
        $description=$request->description;
        //date
        $dateDebut=$request->date_debut;
        $dateFin=$request->date_fin;
       //time
        $timeDebut=$request->time_debut;
        $timeFin=$request->time_fin;
       //statut
        $statut=$request->statut;
        $user=session('user_id');
        $projet=session('projet');
        // Insertion d'une nouvelle action pour un projet donné
        $Action = new Action;
        $Action->titre = $titre;
        $Action->description = $description;
        $Action->date_debut  = $dateDebut.' '.$timeDebut;
        $Action->date_fin  = $dateFin.' '.$timeFin;
        $Action->statut = $statut;
        $Action->utilisateur = $user;
        $Action->eval = 0;
        $Action->projet = $projet;
        $Action->save();
        return back();
    }

    public function edit(REQUEST $request){
        $projet=session('projet');
        $titre=$request->titre;
        $action=$request->action;
        $Oldaction = Action::find($action);
        $description=$request->description;
       //date
        $dateDebut=$request->date_debut;
        if($dateDebut===null) $dateDebut=$Oldaction->date_debut;
        $dateFin=$request->date_fin;
        if($dateFin===null) $dateFin=$Oldaction->date_fin;
       //time
        $timeDebut=$request->time_debut;
        if($dateDebut===null) $dateDebut=$Oldaction->date_debut;
        $timeFin=$request->time_fin;
        if($timeFin===null) $timeFin=$Oldaction->date_fin;
       //statut
        $statut=$request->statut;
        $eval=$request->avancement;
        Action::where('id', $action)
        ->update([
        'titre' => $titre,
        'description' => $description,
        'date_debut'=>$dateDebut.' '.$timeDebut,
        'date_fin'=>$dateFin.' '.$timeFin,
        'statut' => $statut,
        'eval' =>$eval
        ]);
        return back();
    }
    public function delete(REQUEST $request){
        $actionId=$request->action;
        $action = Action::find($actionId); // assuming $actionId is the id of the action you want to delete
        $action->delete();
        return back();
        // return "ok";
    }
    public function addMembre(REQUEST $request){
        $login=$request->login;
        // $membre=session('user_id');
        $projet=session('projet');
        $role=$request->role;
        $admin=0;
        if(Utilisateur::where('email',$login)->exists()){
        $user=Utilisateur::where('email',$login)->first();
        $membre=$user->id;
        $username=$user->prenom." ".$user->nom;
        // Insertion d'un nouveau projet pour un utilisateur donné
        if (!Equipe::where('membre', $membre)->where('projet', $projet)->exists()) {
        $Equipe = new Equipe;
        $Equipe->projet = $projet;
        $Equipe->membre = $membre;
        $Equipe->admin  = $admin;
        $Equipe->role  = $role;
        $Equipe->username  = $username;
        $Equipe->save();
        }}
        return back();
    }
    public function deleteMembre(Request $request)
{
    $membre_id = $request->memebre_id;
    $projet_id = session('projet');
    $membre = Equipe::where('membre', $membre_id)
                    ->where('projet', $projet_id)
                    ->first();

    if ($membre) {
        Equipe::where('membre', $membre_id)->where('projet', $projet_id)->delete();
    }
    return back();
}
    public function addComment(REQUEST $request){
        $membre_id=session('user_id');
        $projet=session('projet');
        $membre=session("username");
        $content=$request->comment;
        $titre=$request->titre;
        $Commentaire = new Commentaire;
        $Commentaire->projet = $projet;
        $Commentaire->membre = $membre;
        $Commentaire->membre_id = $membre_id;
        $Commentaire->titre  = $titre;
        $Commentaire->content  = $content;
        $Commentaire->save();
        $commentaires = Commentaire::where('projet', $projet)->orderBy('created_at', 'desc')->get();
        // return back();
        $data = [
        'commentaires' => $commentaires,
        ];
        return response()->json($data);
    }
}

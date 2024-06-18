<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Commentaire;
use App\Models\Equipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Projet;

class ProjetController extends Controller
{
    public function index() {
        // if(session("authenticated")==null) return to_route('LoginForm');
        $id=session("user_id");
        $list = Equipe::select('projets.id as id', 'projets.titre as titre', 'projets.description as description')
        ->join('Projets', 'projets.id', '=', 'Equipes.projet')
        ->Where('Equipes.membre', $id)
        ->distinct()
        ->get();
        $statuts=Action::select('statut',  DB::raw('count(id) as count'))
        ->Where('utilisateur', $id)
        ->groupBy('statut')
        ->pluck('count','statut')
        ->toArray();
        $data = [];
    foreach($statuts as $key => $value) {
    if($key == 1)
        $data['en attente'] = $value;
    else if($key == 2)
        $data['en cours'] = $value;
    else if($key == 3)
        $data['Terminé'] = $value;
    else if($key == 4)
        $data['Annulé'] = $value;
    else
        $data['En retard'] = $value;
    }

        // $list=Equipe::select('projets.*', 'equipes.*')
        // ->leftJoin('equipes', 'projets.id', '=', 'equipes.projet')
        // ->where(function($query) use ($id) {
        //     $query->where('projets.utilisateur', $id)
        //         ->whereNull('equipes.membre');
        // })
        // ->orWhere(function($query) use ($id) {
        //     $query->where('equipes.membre', $id)
        //         ->where('projets.utilisateur', $id);
        // })
        // ->distinct()
        // ->get();


        return view('Projet',['list'=>$list, 'data'=>$data]);
    }
    public function add(REQUEST $request){
        $titre=$request->titre;
        $description=$request->description;
        $dateDebut=$request->date_debut;
        $timeDebut=$request->time_debut;
        $dateFin=$request->date_fin;
        $timeFin=$request->time_fin;
        $statut=$request->statut;
        $user=session('user_id');
         // Insertion d'un nouveau projet pour un utilisateur donné
        $projet = new Projet;
        $projet->titre = $titre;
        $projet->description = $description;
        $projet->date_debut  = $dateDebut.' '.$timeDebut;
        $projet->date_fin  = $dateFin.' '.$timeFin;
        $projet->statut = $statut;
        $projet->utilisateur = $user;
        $projet->eval = 0;
        $projet->save();
        $projet=$projet->id;
        $Equipe=new Equipe;
        $Equipe->projet=$projet;
        $Equipe->membre=$user;
        $Equipe->username=session('username');
        $Equipe->admin=1;
        $Equipe->role='Admin';
        $Equipe->save();
        return to_route('SectionA');
    }
    public function edit(REQUEST $request){
        $projet=session('projet');
        $Oldprojet = Projet::find($projet);
        // $id=session("projet");
        $titre=$request->titre;
        $description=$request->description;
        //date
        $dateDebut=$request->date_debut;
        if($dateDebut===null) $dateDebut=$Oldprojet->date_debut;
        $dateFin=$request->date_fin;
        if($dateFin===null) $dateFin=$Oldprojet->date_fin;
        //time
        $timeDebut=$request->time_debut;
        if($dateDebut===null) $dateDebut=$Oldprojet->date_debut;
        $timeFin=$request->time_fin;
        if($timeFin===null) $timeFin=$Oldprojet->date_fin;
        //statut
        $statut=$request->statut;
        Projet::where('id', $projet)
        ->update([
        'titre' => $titre,
        'description' => $description,
        'date_debut'=>$dateDebut.' '.$timeDebut,
        'date_fin'=>$dateFin.' '.$timeFin,
        'statut' => $statut,
        ]);
        return back();
    }
    public function getActions(){
        session_start();
        $_SESSION["projet"]=$_POST["projet"];
    }
    public function delete(Request $request){
        $projetid=session("projet");
        $projet = Projet::find($projetid);
        $projet->delete();
        Action::where('projet', $projetid)->delete();
        Equipe::where('projet', $projetid)->delete();
        Commentaire::where('projet', $projetid)->delete();
        return to_route("SectionA");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    public function index(){
        // if(session("authenticated")==null) return to_route('LoginForm');
        $user=session('user_id');
        $taches=Tache::where('utilisateur', $user)->get();
        $startDate = now()->toDateString();
        $endDate = now()->addDays(7)->toDateString();

        $notifications = Tache::where('statut', '<>', 3)
        ->where('utilisateur', $user)
        ->whereBetween('date_fin', [$startDate, $endDate])
        ->get();

        $cld=Tache::select('id', 'date_fin')
        ->where('utilisateur', $user)
        ->pluck('date_fin','id')
        ->toArray();
        // $cld=json_encode($cld);

        $cld2 = Tache::where('utilisateur', $user)
        ->get()
        ->toArray();

        $show = array();
        foreach ($cld2 as $tache) {
        $show[$tache['id']] = array(
        'id' => $tache['id'],
        'date_fin' => $tache['date_fin'],
        'date_debut' => $tache['date_debut'],
        'titre' => $tache['titre'],
        'statut' => $tache['statut'],
        'description' => $tache['description']
        );}
        return view('Tache',['taches'=>$taches,'notifications'=>$notifications,'cld'=>$cld, 'show'=>$show]);
    }
    public function add(REQUEST $request){
        $titre=$request->titre;
        $description=$request->description;
        $dateDebut=$request->date_debut;
        $dateFin=$request->date_fin;
        $timeDebut=$request->time_debut;
        $timeFin=$request->time_fin;
        $statut=$request->statut;
        $user=session('user_id');
        if($titre === null) {return back();}
        $tache = new Tache;
        $tache->titre = $titre;
        $tache->description = $description;
        $tache->date_debut  = $dateDebut.' '.$timeDebut;
        $tache->date_fin  = $dateFin.' '.$timeFin;
        $tache->statut = $statut;
        $tache->utilisateur = $user;
        $tache->eval = 0; //par defaut
        $tache->save();
        return back();
    }
    public function edit(REQUEST $request){ //modify
        $tache=$request->tache;
        $Oldtache = Tache::find($tache);
        $titre=$request->titre;
        $description=$request->description;
        //date
        $dateDebut=$request->date_debut;
        if($dateDebut===null) $dateDebut=$Oldtache->date_debut;
        $dateFin=$request->date_fin;
        if($dateFin===null) $dateFin=$Oldtache->date_fin;
        //time
        $timeDebut=$request->time_debut;
        if($dateDebut===null) $dateDebut=$Oldtache->date_debut;
        $timeFin=$request->time_fin;
        if($timeFin===null) $timeFin=$Oldtache->date_fin;
        //statut
        $statut=$request->statut;
        // $tache=$request->tache;
        $eval=$request->avancement;
        $user=session('user_id');
        // modify
        Tache::where('id', $tache)
        ->update([
        'titre' => $titre,
        'description' => $description,
        'date_debut'=>$dateDebut.' '.$timeDebut,
        'date_fin'=>$dateFin.' '.$timeFin,
        'statut' => $statut,
        'eval' => $eval,
        ]);
        //
        return back();

    }
    public function delete(request $request){
        $tache=$request->tache;
        $action = Tache::find($tache); 
        $action->delete();
        return back();
    }
}

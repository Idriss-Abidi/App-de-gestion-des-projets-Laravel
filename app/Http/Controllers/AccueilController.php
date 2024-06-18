<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Equipe;
use App\Models\Projet;
use App\Models\Tache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccueilController extends Controller
{
    public function index(){
        $id=session("user_id");
        // if(session("authenticated")==null) return to_route('LoginForm');
        $statuts=Equipe::select('Projets.statut as statut',  DB::raw('count(Equipes.projet) as count'))
        ->join('Projets', 'projets.id', '=', 'Equipes.projet')
        ->Where('Equipes.membre', $id)
        ->groupBy('statut')
        ->pluck('count','statut')
        ->toArray();
        $data1 = [];
        foreach($statuts as $key => $value) {
        if($key == 1)
        $data1['en attente'] = $value;
        else if($key == 2)
        $data1['en cours'] = $value;
        else if($key == 3)
        $data1['Terminé'] = $value;
        else if($key == 4)
        $data1['Annulé'] = $value;
        else
        $data1['En retard'] = $value;
        }
        $taches=Tache::select('statut',  DB::raw('count(id) as count'))
        ->Where('utilisateur', $id)
        ->groupBy('statut')
        ->pluck('count','statut')
        ->toArray();
        $data3 = [];
        foreach($taches as $key => $value) {
        if($key == 1)
        $data3['en attente'] = $value;
        else if($key == 2)
        $data3['en cours'] = $value;
        else if($key == 3)
        $data3['Terminé'] = $value;
        else if($key == 4)
        $data3['Annulé'] = $value;
        else
        $data3['En retard'] = $value;
        }
        $data2=[];
        $data2['Taches'] = Tache::where('utilisateur',$id)->count();
        $data2['Projets'] = Equipe::where('membre',$id)->count();
        $data2['Actions'] = Action::where('utilisateur',$id)->count();
        // $data2['Taches'] = Tache::where('utilisateur',$id)->count();
        return view('Accueil',['data1'=>$data1, 'data2'=>$data2, 'data3'=>$data3]);
    }
    // public function Equipe(){
    //     $user=session("user_id");
    //     $list = Projet::where('utilisateur', $user)->get();
    //     // echo $user; dd($list);
    //     // echo "ok";
    //     return to_route('SectionA');
    // }
    public function tache(){
        return view('perso');
    }

}

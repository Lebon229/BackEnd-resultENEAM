<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclamation;

class ReclamationController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth:api');
    }

    public function index()
    {
        $reclamations = Reclamation::all();
        return response()->json([
            'status' => 'success',
            'reclamations' => $reclamations,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'matricule_etud' => 'required|string|max:255',
            //'nomEtud' => 'required|string|max:255',
            //'preEtud' => 'required|string|max:255',
            'annee' => 'required|string|max:255',
            'filliere' => 'required|string|max:255',
            'ue' => 'required|string|max:255',
            'fiche' => 'required|string|max:255',
            'quittance' => 'required|string|max:255',
            'carte' => 'required|string|max:255',
            'email' => 'required|string|max:255',

        ]);

        $reclamation = Reclamation::create([
            'type' => $request->type,
            'matricule_etud' => $request->matricule_etud,
            //'nomEtud' => $request->nomEtud,
            'email' => $request->email,
            'annee' => $request->annee,
            'filliere' => $request->filliere,
            'ue' => $request->ue,
            'fiche' => $request->fiche,
            'quittance' => $request->quittance,
            'carte' => $request->carte,

        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Vous avez bien creer une reclamation',
            'reclamation' => $reclamation,
        ]);
    }

    public function show($id)
    {
        $reclamation = Reclamation::find($id);
        return response()->json([
            'status' => 'success',
            'reclamation' => $reclamation,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'matricule_etud' => 'required|string|max:255',
           // 'nomEtud' => 'required|string|max:255',
           'email' => 'required|string|max:255',
            'annee' => 'required|string|max:255',
            'filliere' => 'required|string|max:255',
            'ue' => 'required|string|max:255',
            'fiche' => 'required|string|max:255',
            'quittance' => 'required|string|max:255',
            'carte' => 'required|string|max:255',

        ]);

        $reclamation = Reclamation::find($id);
        $reclamation->type = $request->type;
        $reclamation->matricule_etud = $request->matricule_etud;
        //$reclamation->nomEtud = $request->nomEtud;
        $reclamation->email = $request->email;
        $reclamation->annee = $request->anpreEtudnee;
        $reclamation->filliere = $request->filliere;
        $reclamation->ue = $request->ue;
        $reclamation->fiche = $request->fiche;
        $reclamation->quittance = $request->quittance;
        $reclamation->carte = $request->carte;
        $reclamation->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Reclamation bien modifie',
            'reclamation' => $reclamation,
        ]);
    }

    public function destroy($id)
    {
        $reclamation = Reclamation::find($id);
        $reclamation->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Reclamation bien supprimer',
            'reclamation' => $reclamation,
        ]);
    }
    public function reclamAttente($id)
    {
        $reclamation = DB::table('reclamations')->where('valider',null)->join("etudiants","etudiants.matricule","reclamations.matricule_etud")->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Reclamations en attente',
            'reclamation' => $reclamation,
        ]);
    }
}

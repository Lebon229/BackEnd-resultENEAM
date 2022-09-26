<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use Illuminate\Support\Facades\DB;

class EtudiantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $etudiants = Etudiant::all();
        return response()->json([
            'status' => 'success',
            'etudiants' => $etudiants,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'matricule' => 'required|string|max:255',
            'id' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'prenoms' => 'required|string|max:255',
            'sexe' => 'required|string|max:255',
        ]);

        $etudiant = Etudiant::create([
            'matricule' => $request->matricule,
            'id' => $request->id,
            'nom' => $request->nom,
            'prenoms' => $request->prenoms,
            'sexe' => $request->sexe,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Vous avez bien creer un etudiant',
            'etudiant' => $etudiant,
        ]);
    }

    public function show($id)
    {
        $etudiant = Etudiant::find($id);
        return response()->json([
            'status' => 'success',
            'etudiant' => $etudiant,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'matricule' => 'required|string|max:255',
            'id' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'prenoms' => 'required|string|max:255',
            'sexe' => 'required|string|max:255',
        ]);

        $etudiant = Etudiant::find($id);
        $etudiant->matricule = $request->matricule;
        $etudiant->nom = $request->nom;
        $etudiant->id = $request->id;
        $etudiant->prenoms = $request->prenoms;
        $etudiant->sexe = $request->sexe;
        $etudiant->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Etudiant bien modifie',
            'etudiant' => $etudiant,
        ]);
    }

    public function destroy($id)
    {
        $etudiant = Etudiant::find($id);
        $etudiant->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Etudiant bien supprimer',
            'etudiant' => $etudiant,
        ]);
    }
    public function display($id)
    {
        $etudiant = DB::table('notes')->where('matricule_etud',$id)->join("etudiants","etudiants.matricule","notes.matricule_etud")->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Resultat afficher',
            'etudiant' => $etudiant,
        ]);
    }
}
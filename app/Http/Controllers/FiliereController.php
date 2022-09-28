<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filiere;

class FiliereController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $filieres = Filiere::all();
        return response()->json([
            'status' => 'success',
            'filieres' => $filieres,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomFiliere' => 'required|string|max:255',
            'matricule_etud' => 'required|string|max:5',       

        ]);

        $filiere = Filiere::create([
            'nomFiliere' => $request->nomFiliere,
            'matricule_etud' => $request->input('matricule_etud'),

        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Vous avez bien entrer une filiere',
            'filiere' => $filiere,
        ]);
    }

    public function show($id)
    {
        $filiere = Filiere::find($id);
        return response()->json([
            'status' => 'success',
            'filiere' => $filiere,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomFiliere' => 'required|string|max:255',
            'matricule_etud' => 'required|string|max:5',       

        ]);

        $filiere = Filiere::find($id);
        $filiere->nomFiliere = $request->nomFiliere;
        $note->matricule_etud = $request->matricule_etud;
        $filiere->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Filiere bien modifie',
            'filiere' => $filiere,
        ]);
    }

    public function destroy($id)
    {
        $filiere = Filiere::find($id);
        $filiere->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Note bien supprimer',
            'filiere' => $filiere,
        ]);
    }
}

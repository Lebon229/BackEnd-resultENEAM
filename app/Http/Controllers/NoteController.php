<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:api');
    }

    public function index()
    {
        $notes = Note::all();
        return response()->json([
            'status' => 'success',
            'notes' => $notes,
        ]);
    }

    public function store(Request $request)
    {
        

        $note = Note::create([
            'note' => $request->input("note"),
            'code_ue' => $request->input('code_ue'),
            'matricule_etud' => $request->input('matricule_etud'),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Vous avez bien entrer une note',
            'note' => $note,
        ]);
    }

    public function show($id)
    {
        $note = Note::find($id);
        return response()->json([
            'status' => 'success',
            'note' => $note,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'note' => 'required|string|max:5',
            'code_ue' => 'required|string|max:5',
            'matricule_etud' => 'required|string|max:255',       
        ]);

        $note = Note::find($id);
        $note->note = $request->note;
        $note->code_ue = $request->code_ue;
        $note->matricule_etud = $request->matricule_etud;
        $note->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Note bien modifie',
            'note' => $note,
        ]);
    }

    public function destroy($id)
    {
        $note = Note::find($id);
        $note->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Note bien supprimer',
            'note' => $note,
        ]);
    }
}

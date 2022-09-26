<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UE;

class UEController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $ues = UE::all();
        return response()->json([
            'status' => 'success',
            'ues' => $ues,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomUe' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'id' => 'required|string|max:255',
        ]);

        $ue = UE::create([
            'nomUe' => $request->nomUe,
            'code' => $request->code,
            'id' => $request->id,

        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Vous avez bien creer votre ue',
            'ue' => $ue,
        ]);
    }

    public function show($id)
    {
        $ue = UE::find($id);
        return response()->json([
            'status' => 'success',
            'ue' => $ue,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomUe' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'id' => 'required|string|max:255',

        ]);

        $ue = UE::find($id);
        $ue->nomUe = $request->nomUe;
        $ue->id = $request->id;
        $ue->code = $request->code;
        $ue->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Ue bien modifie',
            'ue' => $ue,
        ]);
    }

    public function destroy($id)
    {
        $ue = UE::find($id);
        $ue->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Ue bien supprimer',
            'ue' => $ue,
        ]);
    }
}

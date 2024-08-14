<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:100',
            'season' => 'required|string|max:50',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $competition = Competition::create($request->all());

        return response()->json($competition, 201);
    }

    public function index()
    {
        $competitions = Competition::all();
        return response()->json($competitions);
    }

    public function show($id)
    {
        // Encontre a competição pelo ID
        $competition = Competition::find($id);

        // Verifique se a competição foi encontrada
        if (!$competition) {
            return response()->json(['message' => 'Competition not found'], 404);
        }

        // Retorne a competição com detalhes
        return response()->json($competition);
    }
}
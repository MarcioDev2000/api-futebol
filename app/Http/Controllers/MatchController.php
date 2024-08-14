<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\matches;

class MatchController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'home_team_id' => 'required|exists:teams,id',
            'away_team_id' => 'required|exists:teams,id',
            'date' => 'required|date_format:Y-m-d H:i:s',
            'home_team_score' => 'nullable|integer',
            'away_team_score' => 'nullable|integer',
            'stadium' => 'required|string|max:255',
            'league_id' => 'required|exists:leagues,id',
        ]);

        $match = matches::create($request->all());

        return response()->json($match, 201);
    }

    public function index()
    {
        $matches = matches::with(['homeTeam', 'awayTeam', 'league'])->get();
        return response()->json($matches);
    }

    public function show($id)
    {
        // Encontre a partida pelo ID
        $match = matches::with(['homeTeam', 'awayTeam', 'league'])->find($id);

        // Verifique se a partida foi encontrada
        if (!$match) {
            return response()->json(['message' => 'Match not found'], 404);
        }

        // Retorne a partida com detalhes relacionados
        return response()->json($match);
    }

}
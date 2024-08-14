<?php

namespace App\Http\Controllers;

use App\Models\PlayerStatistic;
use Illuminate\Http\Request;

class PlayerStatisticController extends Controller
{
    // Cria uma nova estatística de jogador
    public function store(Request $request)
    {
        $validated = $request->validate([
            'player_id' => 'required|exists:players,id',
            'match_id' => 'required|exists:matches,id',
            'goals' => 'nullable|integer',
            'assists' => 'nullable|integer',
            'minutes_played' => 'nullable|integer',
            'yellow_cards' => 'nullable|integer',
            'red_cards' => 'nullable|integer',
        ]);

        $playerStatistic = PlayerStatistic::create($validated);

        return response()->json($playerStatistic, 201);
    }

    // Obtém detalhes de uma estatística de jogador específica
    public function show($id)
    {
        $playerStatistic = PlayerStatistic::with('player', 'match')->find($id);

        if (!$playerStatistic) {
            return response()->json(['message' => 'Player Statistic not found'], 404);
        }

        return response()->json($playerStatistic);
    }

    // Atualiza uma estatística de jogador existente
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'goals' => 'nullable|integer',
            'assists' => 'nullable|integer',
            'minutes_played' => 'nullable|integer',
            'yellow_cards' => 'nullable|integer',
            'red_cards' => 'nullable|integer',
        ]);

        $playerStatistic = PlayerStatistic::find($id);

        if (!$playerStatistic) {
            return response()->json(['message' => 'Player Statistic not found'], 404);
        }

        $playerStatistic->update($validated);

        return response()->json($playerStatistic);
    }

    // Obtém uma lista de todas as estatísticas de jogador
    public function index()
    {
        $playerStatistics = PlayerStatistic::with('player', 'match')->get();

        return response()->json($playerStatistics);
    }
}
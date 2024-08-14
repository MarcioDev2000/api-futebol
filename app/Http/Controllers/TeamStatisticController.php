<?php

namespace App\Http\Controllers;

use App\Models\TeamStatistic;
use Illuminate\Http\Request;

class TeamStatisticController extends Controller
{
    // Cria uma nova estatística de equipe
    public function store(Request $request)
    {
        $validated = $request->validate([
            'team_id' => 'required|exists:teams,id',
            'match_id' => 'required|exists:matches,id',
            'goals_scored' => 'nullable|integer',
            'goals_conceded' => 'nullable|integer',
            'possession' => 'nullable|numeric',
            'shots' => 'nullable|integer',
            'shots_on_target' => 'nullable|integer',
        ]);

        $teamStatistic = TeamStatistic::create($validated);

        return response()->json($teamStatistic, 201);
    }

    // Obtém detalhes de uma estatística de equipe específica
    public function show($id)
    {
        $teamStatistic = TeamStatistic::with('team', 'match')->find($id);

        if (!$teamStatistic) {
            return response()->json(['message' => 'Team Statistic not found'], 404);
        }

        return response()->json($teamStatistic);
    }

    // Atualiza uma estatística de equipe existente
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'goals_scored' => 'nullable|integer',
            'goals_conceded' => 'nullable|integer',
            'possession' => 'nullable|numeric',
            'shots' => 'nullable|integer',
            'shots_on_target' => 'nullable|integer',
        ]);

        $teamStatistic = TeamStatistic::find($id);

        if (!$teamStatistic) {
            return response()->json(['message' => 'Team Statistic not found'], 404);
        }

        $teamStatistic->update($validated);

        return response()->json($teamStatistic);
    }

    // Obtém uma lista de todas as estatísticas de equipe
    public function index()
    {
        $teamStatistics = TeamStatistic::with('team', 'match')->get();

        return response()->json($teamStatistics);
    }
}
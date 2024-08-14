<?php

namespace App\Http\Controllers;

use App\Models\League;
use Illuminate\Http\Request;

class LeagueController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:100',
            'logo_url' => 'nullable|string|max:255',
            'season' => 'required|string|max:50',
        ]);

        $league = League::create($request->all());

        return response()->json($league, 201);
    }

    public function index()
    {
        $leagues = League::all();
        return response()->json($leagues);
    }

    public function show($id)
    {
        // Encontre a liga pelo ID
        $league = League::find($id);

        // Verifique se a liga foi encontrada
        if (!$league) {
            return response()->json(['message' => 'League not found'], 404);
        }

        // Retorne a liga com detalhes
        return response()->json($league);
    }
}
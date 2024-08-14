<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'date_of_birth' => 'required|date',
            'position' => 'required|string|max:50',
            'nationality' => 'required|string|max:100',
            'team_id' => 'required|exists:teams,id',
        ]);

        $player = Player::create($request->all());

        return response()->json($player, 201);
    }

    public function index()
    {
        $players = Player::all();
        return response()->json($players);
    }

    public function show($id)
    {

       // Encontre o jogador pelo ID
        $player = Player::with('team')->find($id);

        // Verifique se o jogador foi encontrado
        if (!$player) {
            return response()->json(['message' => 'Player not found'], 404);
        }

        // Retorne o jogador com detalhes relacionados
        return response()->json($player);
    }

}
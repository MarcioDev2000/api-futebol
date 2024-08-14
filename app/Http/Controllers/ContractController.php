<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    // Cria uma nova proposta de contrato
    public function store(Request $request)
    {
        $validated = $request->validate([
            'player_id' => 'required|exists:players,id',
            'team_id' => 'required|exists:teams,id',
            'salary' => 'required|numeric',
            'duration' => 'required|integer',
            'status' => 'nullable|string|max:50',
            'signed_date' => 'nullable|date',
        ]);

        $contract = Contract::create($validated);

        return response()->json($contract, 201);
    }

    // Obtém detalhes de uma proposta de contrato específica
    public function show($id)
    {
        $contract = Contract::with('player', 'team')->find($id);

        if (!$contract) {
            return response()->json(['message' => 'Contract not found'], 404);
        }

        return response()->json($contract);
    }

    // Atualiza o status de uma proposta de contrato
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|string|max:50',
        ]);

        $contract = Contract::find($id);

        if (!$contract) {
            return response()->json(['message' => 'Contract not found'], 404);
        }

        $contract->update($validated);

        return response()->json($contract);
    }

    // Obtém uma lista de todas as propostas de contrato
    public function index()
    {
        $contracts = Contract::with('player', 'team')->get();

        return response()->json($contracts);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Validation\ValidationException;

class TeamController extends Controller
{
    public function index()
    {
        return response()->json(Team::all());
    }

    public function show($id)
    {
        // Encontre a equipe pelo ID
        $team = Team::find($id);

        // Verifique se a equipe foi encontrada
        if (!$team) {
            return response()->json(['message' => 'Team not found'], 404);
        }

        // Retorne a equipe com detalhes relacionados, se houver
        return response()->json($team);
    }

    public function store(Request $request)
    {
        try {
            // Validação dos dados de entrada
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'short_name' => 'required|string|max:50',
                'logo_url' => 'required|string|max:255',
                'founded_year' => 'required|integer|digits:4',
                'stadium' => 'required|string|max:255',
                'country' => 'required|string|max:100',
            ]);

            // Criação do novo time com os dados validados
            $team = Team::create($validatedData);

            // Resposta de sucesso
            return response()->json([
                'status' => 'success',
                'message' => 'Team created successfully.',
                'data' => $team
            ], 201);

        } catch (ValidationException $e) {
            // Resposta em caso de falha na validação
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            // Resposta em caso de erro geral
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

}
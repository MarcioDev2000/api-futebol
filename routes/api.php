<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\PlayerStatisticController;
use App\Http\Controllers\TeamStatisticController;

Route::get('/users', function (Request $request) {
    return response()->json([
        'status' => true,
        'message' => "Listar Usuarios"
    ], 200);
});
Route::post('/teams', [TeamController::class, 'store']);
Route::get('/teams/{id}', [TeamController::class, 'show']);
Route::get('/teams', [TeamController::class, 'index']);

Route::post('/competitions', [CompetitionController::class, 'store']);
Route::get('/competitions', [CompetitionController::class, 'index']);
Route::get('/competitions/{id}', [CompetitionController::class, 'show']);


Route::post('/players', [PlayerController::class, 'store']);
Route::get('/players', [PlayerController::class, 'index']);
Route::get('/players/{id}', [PlayerController::class, 'show']);

Route::post('/leagues', [LeagueController::class, 'store']);
Route::get('/leagues', [LeagueController::class, 'index']);
Route::get('/leagues/{id}', [LeagueController::class, 'show']);

Route::post('/matches', [MatchController::class, 'store']);
Route::get('/matches', [MatchController::class, 'index']);
Route::get('/matches/{id}', [MatchController::class, 'show']);

Route::post('/contracts', [ContractController::class, 'store']);
Route::get('/contracts/{id}', [ContractController::class, 'show']);
Route::put('/contracts/{id}', [ContractController::class, 'update']);
Route::get('/contracts', [ContractController::class, 'index']);

// Rotas para estatísticas de jogadores
Route::post('/player-statistics', [PlayerStatisticController::class, 'store']);
Route::get('/player-statistics/{id}', [PlayerStatisticController::class, 'show']);
Route::put('/player-statistics/{id}', [PlayerStatisticController::class, 'update']);
Route::get('/player-statistics', [PlayerStatisticController::class, 'index']);

// Rotas para estatísticas de equipes
Route::post('/team-statistics', [TeamStatisticController::class, 'store']);
Route::get('/team-statistics/{id}', [TeamStatisticController::class, 'show']);
Route::put('/team-statistics/{id}', [TeamStatisticController::class, 'update']);
Route::get('/team-statistics', [TeamStatisticController::class, 'index']);
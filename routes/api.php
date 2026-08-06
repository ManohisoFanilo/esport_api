<?php

use App\Models\Profile;
use App\Models\Registration;
use App\Models\Team;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/health', function () {
    return response()->json(['status' => 'ok']);
});

Route::get('/teams', function () {
    return Team::query()->with('members')->orderByDesc('ranking')->get();
});

Route::get('/teams/{team}', function (Team $team) {
    return $team->load('members');
});

Route::post('/teams', function (Request $request) {
    $team = Team::create($request->only([
        'name',
        'logo_url',
        'game',
        'country',
        'city',
        'description',
        'players_count',
        'ranking',
        'banner_url',
        'is_active',
        'owner_id',
    ]));

    return response()->json($team, 201);
});

Route::get('/tournaments', function () {
    return Tournament::query()->orderBy('start_date')->get();
});

Route::get('/tournaments/{tournament}', function (Tournament $tournament) {
    return $tournament;
});

Route::post('/tournaments', function (Request $request) {
    $tournament = Tournament::create($request->only([
        'name',
        'game',
        'start_date',
        'end_date',
        'status',
        'description',
        'prize_pool',
        'participants_count',
        'max_participants',
    ]));

    return response()->json($tournament, 201);
});

Route::get('/registrations', function () {
    return Registration::query()->with(['tournament', 'team', 'user'])->get();
});

Route::post('/registrations', function (Request $request) {
    $registration = Registration::create($request->only([
        'tournament_id',
        'team_id',
        'user_id',
        'status',
        'details',
    ]));

    return response()->json($registration, 201);
});

Route::get('/profiles', function () {
    return Profile::query()->with('user')->get();
});

Route::get('/profiles/{profile}', function (Profile $profile) {
    return $profile->load('user');
});

Route::post('/profiles', function (Request $request) {
    $profile = Profile::create($request->only([
        'user_id',
        'nickname',
        'bio',
        'avatar_url',
        'main_game',
        'tournaments_played',
        'wins',
        'losses',
    ]));

    return response()->json($profile, 201);
});

<?php

namespace App\Controllers;

use App\Models\ClubModel;
use App\Models\MatchModel;

class Standings extends BaseController
{
    public function index()
    {
        $clubModel = new ClubModel();
        $matchModel = new MatchModel();

        $clubs = $clubModel->getAllClubs();
        $standings = [];

        foreach ($clubs as $club) {
            $matchesPlayed = $matchModel->countMatchesPlayed($club['id']);
            $wins = $matchModel->countWins($club['id']);
            $draws = $matchModel->countDraws($club['id']);
            $losses = $matchesPlayed - $wins - $draws;
            $goalsFor = $matchModel->sumGoalsFor($club['id']);
            $goalsAgainst = $matchModel->sumGoalsAgainst($club['id']);
            $goalDifference = $goalsFor - $goalsAgainst;

            $standings[] = [
                'club' => $club['name'],
                'matches_played' => $matchesPlayed,
                'wins' => $wins,
                'draws' => $draws,
                'losses' => $losses,
                'goals_for' => $goalsFor,
                'goals_against' => $goalsAgainst,
                'goal_difference' => $goalDifference
            ];
        }

        return view('standings', ['standings' => $standings]);
    }
}
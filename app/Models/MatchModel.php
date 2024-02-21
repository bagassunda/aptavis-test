<?php

namespace App\Models;

use CodeIgniter\Model;

class MatchModel extends Model
{

    protected $table = 'matches';
    protected $primaryKey = 'id';
    protected $allowedFields = ['home_team_id', 'away_team_id', 'home_team_score', 'away_team_score'];

    public function add_match($homeTeamId, $awayTeamId, $homeTeamScore, $awayTeamScore)
    {
        return $this->insert([
            'home_team_id' => $homeTeamId,
            'away_team_id' => $awayTeamId,
            'home_team_score' => $homeTeamScore,
            'away_team_score' => $awayTeamScore
        ]);
    }

    public function getAllMatches()
    {
        return $this->findAll();
    }

    public function countMatchesPlayed($clubId)
    {
        return $this->where('home_team_id', $clubId)
            ->orWhere('away_team_id', $clubId)
            ->countAllResults();
    }

    public function countWins($clubId)
    {
        return $this->where('home_team_id', $clubId)
            ->where('home_team_score > away_team_score')
            ->orWhere('away_team_id', $clubId)
            ->where('away_team_score > home_team_score')
            ->countAllResults();
    }


    public function countDraws($clubId)
    {
        return $this->where('home_team_id', $clubId)
            ->where('home_team_score', 'away_team_score')
            ->orWhere('away_team_id', $clubId)
            ->where('away_team_score', 'home_team_score')
            ->countAllResults();
    }

    public function sumGoalsFor($clubId)
    {
        $homeGoals = $this->selectSum('home_team_score')
            ->where('home_team_id', $clubId)
            ->get()
            ->getRowArray()['home_team_score'];

        $awayGoals = $this->selectSum('away_team_score')
            ->where('away_team_id', $clubId)
            ->get()
            ->getRowArray()['away_team_score'];

        return $homeGoals + $awayGoals;
    }

    public function sumGoalsAgainst($clubId)
    {
        $homeGoals = $this->selectSum('home_team_score')
            ->where('away_team_id', $clubId)
            ->get()
            ->getRowArray()['home_team_score'];

        $awayGoals = $this->selectSum('away_team_score')
            ->where('home_team_id', $clubId)
            ->get()
            ->getRowArray()['away_team_score'];

        return $homeGoals + $awayGoals;
    }

}
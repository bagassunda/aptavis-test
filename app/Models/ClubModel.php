<?php

namespace App\Models;

use CodeIgniter\Model;

class ClubModel extends Model
{
    protected $table = 'clubs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'points'];

    protected $validationRules = [
        'name' => 'required|is_unique[clubs.name]'
    ];
    public function getAllClubs()
    {
        return $this->findAll();
    }

    public function getClubById($id)
    {
        return $this->find($id);
    }

    public function updateStats($data)
    {
        // untuk tim tuan rumah
        $homeTeam = $this->find($data[0]['id']);
        $pointsHome['points'] = $homeTeam['points'] + $this->calculatePoints($data[0]['score'], $data[1]['score']);
        $pointsHome['matches_played'] = $homeTeam['matches_played'] + 1;
        if ($data[0]['score'] > $data[1]['score']) {
            $pointsHome['wins'] = $homeTeam['wins'] + 1;
            $pointsHome['losses'] = $homeTeam['losses'];
            $pointsHome['draws'] = $homeTeam['draws'];
        } elseif ($data[0]['score'] < $data[1]['score']) {
            $pointsHome['losses'] = $homeTeam['losses'] + 1;
            $pointsHome['wins'] = $homeTeam['wins'];
            $pointsHome['draws'] = $homeTeam['draws'];
        } else {
            $pointsHome['draws'] = $homeTeam['draws'] + 1;
            $pointsHome['wins'] = $homeTeam['wins'];
            $pointsHome['losses'] = $homeTeam['losses'];
        }
        $pointsHome['goals_for'] = $homeTeam['goals_for'] + $data[0]['score'];
        $pointsHome['goals_against'] = $homeTeam['goals_against'] + $data[1]['score'];

        // untuk tim tamu
        $awayTeam = $this->find($data[1]['id']);
        $pointsAway['points'] = $awayTeam['points'] + $this->calculatePoints($data[1]['score'], $data[0]['score']);
        $pointsAway['matches_played'] = $awayTeam['matches_played'] + 1;
        if ($data[1]['score'] > $data[0]['score']) {
            $pointsAway['wins'] = $awayTeam['wins'] + 1;
            $pointsAway['losses'] = $awayTeam['losses'];
            $pointsAway['draws'] = $awayTeam['draws'];
        } elseif ($data[1]['score'] < $data[0]['score']) {
            $pointsAway['losses'] = $awayTeam['losses'] + 1;
            $pointsAway['wins'] = $awayTeam['wins'];
            $pointsAway['draws'] = $awayTeam['draws'];
        } else {
            $pointsAway['draws'] = $awayTeam['draws'] + 1;
            $pointsAway['wins'] = $awayTeam['wins'];
            $pointsAway['losses'] = $awayTeam['losses'];
        }
        $pointsAway['goals_for'] = $awayTeam['goals_for'] + $data[1]['score'];
        $pointsAway['goals_against'] = $awayTeam['goals_against'] + $data[0]['score'];

        return $this->update($homeTeam['id'], $pointsHome) &&
            $this->update($awayTeam['id'], $pointsAway);

    }

    protected function calculatePoints($scoreTeam, $scoreAgainst)
    {
        if ($scoreTeam > $scoreAgainst) {
            return 3;
        } elseif ($scoreTeam == $scoreAgainst) {
            return 1;
        } else {
            return 0;
        }
    }

}

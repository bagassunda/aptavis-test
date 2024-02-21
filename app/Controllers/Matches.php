<?php
namespace App\Controllers;

use App\Models\ClubModel;
use App\Models\MatchModel;


class Matches extends BaseController
{
    public function index()
    {
        $clubModel = new ClubModel();
        $data['clubs'] = $clubModel->getAllClubs();
        return view('input_score_form', $data);
    }

    public function add()
    {
        $validationRules = [
            'home_team_id' => 'required',
            'away_team_id' => 'required[home_team_id]',
            'home_team_score' => 'required|numeric',
            'away_team_score' => 'required|numeric',
        ];
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $matchModel = new MatchModel();
        $homeTeamId = $this->request->getPost('home_team_id');
        $awayTeamId = $this->request->getPost('away_team_id');
        $homeTeamScore = $this->request->getPost('home_team_score');
        $awayTeamScore = $this->request->getPost('away_team_score');

        if (
            $this->updateClubStats($homeTeamId, $awayTeamId, $homeTeamScore, $awayTeamScore) &&
            $matchModel->add_match($homeTeamId, $awayTeamId, $homeTeamScore, $awayTeamScore)
        ) {
            return redirect()->to('matches')->with('success', 'Data pertandingan berhasil disimpan.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data pertandingan.');
        }
    }

    protected function updateClubStats($homeTeamId, $awayTeamId, $homeTeamScore, $awayTeamScore)
    {
        $clubModel = new ClubModel();
        $data = array();
        $home = array(
            'id' => $homeTeamId,
            'score' => $homeTeamScore,
            'opponent_score' => $awayTeamScore
        );
        $away = array(
            'id' => $awayTeamId,
            'score' => $awayTeamScore,
            'opponent_score' => $homeTeamScore
        );
        array_push($data, $home);
        array_push($data, $away);

        return $clubModel->updateStats($data);
    }

}
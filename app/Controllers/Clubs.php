<?php

namespace App\Controllers;
use \App\Models\ClubModel;


class Clubs extends BaseController
{
    public function index() {
        return view('input_club_form');
    }

    public function add() {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|is_unique[clubs.name]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // return view('input_club_form', ['validation' => $validation]); 
            return redirect()->back()->withInput()->with('error', 'Nama Club Sudah Terdaftar.');
        } else {
            $clubModel = new ClubModel();
            $clubModel->save([
                'name' => $this->request->getPost('name')
            ]);

            return redirect()->to('clubs')->with('success', 'Club berhasil ditambahkan.');
        }
    }
}

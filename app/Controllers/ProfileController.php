<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class ProfileController extends CI_Controller {

    public function profile() {
        $data['name'] = "Raditya Aji Sasmoyo";
        $data['npm'] = "2010631170111";
        $data['class'] = "Framework Pemograman Web";
        $data['phone'] = "+62 812-9026-4815";

        $this->load->view('profile', $data);
    }
}
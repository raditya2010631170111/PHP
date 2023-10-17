<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProfileController extends BaseController {

    public function profile() {
        $data['name'] = "Raditya Aji Sasmoyo";
        $data['nickname'] = "Radit";
        $data['npm'] = "2010631170111";
        $data['class'] = "Framework Pemograman Web";
        $data['phone'] = "+62 812-9026-4815";
        $data['email'] = "2010631170111@student.unsika.ac.id";
        $data['username'] = "raditya2010631170111";

        return view('profile', $data);
		
		// Using var_dump for debugging
		var_dump($data);

		$this->load->view('profile', $data);
	}
}

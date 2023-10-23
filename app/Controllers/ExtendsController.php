<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ExtendsController extends BaseController {
	
	public function index() {
        $data['nickname'] = "Radit";
        return view('home', $data);
    }
	
	// public function profile() { 
    public function profile(): string {
        $data['name'] = "Raditya Aji Sasmoyo";
        $data['nickname'] = "Radit";
        $data['npm'] = "2010631170111";
        $data['class'] = "Framework Pemograman Web";
        $data['phone'] = "+62 812-9026-4815";
        $data['email'] = "2010631170111@student.unsika.ac.id";
        $data['username'] = "raditya2010631170111";
		
		$mahasiswa = $this->mahasiswaModel->getAllMahasiswa();
		// $data = [ //overwritting
		$data = array_merge($data, [
			"title" => "Home",
			"mahasiswa" => $mahasiswa,
		]);

        return view('about_us', $data);
		
		// Using var_dump for debugging
		var_dump($data);

		$this->load->view('about_us', $data);
	}
}

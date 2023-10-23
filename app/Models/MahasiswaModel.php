<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model {
	protected $table = 'mahasiswa';
	protected $primaryKey = 'id';
	protected $useTimestamps = true; //Dates
	public function getAllMahasiswa(){
		return $this->findAll();
	}
}
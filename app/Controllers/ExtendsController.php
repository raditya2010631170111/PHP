<?php

namespace App\Controllers;

use App\Models\ProductsModel;
use App\Controllers\BaseController;

class ExtendsController extends BaseController // Make sure to extend BaseController
{
	public function products_create() {
		return view('admin.utama');
	}

    public function products_edit1(){
        $data = [
            'name' => 'Indo Mie',
            'stock' => 100,
            'brand' => 'Indofood',
            'buy_price' => 1000,
            'sale_price' => 1500,
            'comment' => 'barang pertama kali'
        ];
        $proses = $this->ProductsModel->insert($data); // Assuming you have a model named ProductsModel
        return redirect()->to('/');
    }

    public function products_delete($id){
        $proses = $this->ProductsModel->delete($id); // Assuming you have a model named ProductsModel
        if($proses){
            echo 'data berhasil dihapus';
        }
    }

    public function products_update1($id){
        $data = [
            'name' => 'Indo Mie',
            'stock' => 1000,
            'brand' => 'Indofood',
            'buy_price' => 2000,
            'sale_price' => 2500,
            'comment' => 'barang pertama kali'
        ];
        $proses = $this->ProductsModel->update($id, $data); // Assuming you have a model named ProductsModel
        return redirect()->to('/');
    }

    public function products_view(){
        $data = $this->ProductsModel->findAll(); // Assuming you have a model named ProductsModel
        print_r($data); // Use print_r instead of dd() in CodeIgniter
    }

    public function products_create() //create resource
    {
        return view('admin.products');
    }

    public function products_store()
    {
        $data = [
            'name' => $this->request->getVar('product_name'),
            'stock' => $this->request->getVar('stock'),
            'brand' => $this->request->getVar('brand'),
            'buy_price' => $this->request->getVar('buy_price'),
            'sale_price' => $this->request->getVar('sale_price'),
            'comment' => $this->request->getVar('comment'),
        ];
        $proses = $this->ProductsModel->insert($data); // Assuming you have a model named ProductsModel
        if($proses){
            echo "<script>alert('data berhasil disimpan');</script>";
        } else {
            echo "<script>alert('data gagal disimpan');</script>";
        }
        return redirect()->to('/');
    }

    // The rest of your methods can be converted similarlypublic function products_recyclebin(){
    $data = $this->ProductsModel->findAll(); // Assuming you have a model named ProductsModel
    return view('admin.products_list', ['data' => $data]);

	public function products_recycle($id){
		$proses = $this->ProductsModel->delete($id); // Assuming you have a model named ProductsModel
		if($proses) {
			$this->session->setFlashdata('success', 'Data Berhasil Hapus');
		} else {
			$this->session->setFlashdata('error', 'Data Gagal Hapus');
		}
		return redirect()->to('products/recyclebin');
	}

	public function products_edit($id){
		$data = $this->ProductsModel->find($id); // Assuming you have a model named ProductsModel
		return view('admin.products_edit', ['data' => $data]);
	}

	public function products_update2($id){
		$data = [
			'name' => $this->request->getVar('products_name'),
			'stock' => $this->request->getVar('stock'),
			'brand' => $this->request->getVar('brand'),
			'buy_price' => $this->request->getVar('buy_price'),
			'sale_price' => $this->request->getVar('sale_price'),
			'comment' => $this->request->getVar('comment'),
		];
		$proses = $this->ProductsModel->update($id, $data); // Assuming you have a model named ProductsModel
		if($proses){
			echo "<script>alert('data berhasil diupdate');</script>";
		} else {
			echo "<script>alert('data gagal diupdate');</script>";
		}
	}
}

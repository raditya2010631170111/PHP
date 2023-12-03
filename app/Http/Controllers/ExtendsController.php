<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\Console\RetryCommand;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Transactions;
use App\Models\Users;
use App\Models\Products;
use App\Models\Feedback;
use Laracasts\Flash\Flash;
use App\Exports\PlaystationsExport;
use App\Imports\PlaystationsImport;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class ExtendsController extends Controller
{
	public function index_beranda(){
        return view('/');
    }

    public function halamanadmin(){
        return view('dashboard');
    }
    public function halamancustomer(){
        return view('/');
    }
    public function index_dashboard(){
        $playstations = DB::table('playstations')->get()->count();
        $users = DB::table('users')->get()->count();
        $transactions = DB::table('transactions')->get()->count();
        $datausers = Users::all();
        $datatrans = Transaction::all();
        // dd($users);
        return view('dashboard', compact('playstations', 'users', 'transactions', 'datausers', 'datatrans'), [
            "title" => "Dashboard"
        ]);
    }
	
	public function index_users(){
        $data = Users::all();
        // dd($data);
        return view('admin.index_users', compact('data'), [
            "title" => "Users"
        ]);
    }
    public function postLogin(Request $request){
        // dd($request->all());
        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::users()->level == 'Admin') {
                return redirect('dashboard');
            } elseif (Auth::users()->level == 'Customer') {
                return redirect('/');
            }
        }
        return redirect('/login');
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }

    public function regis(){
        return view('admin.signup', [
            "title" => "Signup"
        ]);
    }

    public function postRegis(Request $request){
        // dd($request->all());
        $validateddata = $request->validate([
            'title' => 'required|max:255',
            'userstitle' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'level' => 'nullable|default'
        ]);
        $validateddata['password'] = bcrypt($validateddata['password']);
        Users::create($validateddata);
        return redirect('/login')->with('success', 'Data Berhasil Ditambahkan');
    }
    public function create_users(){
        return view('admin.create_users', [
            "title" => "Create"
        ]);
    }
    public function store_users(Request $request){
        // dd($request->all());
        $validateddata = $request->validate([
            'title' => 'required|max:255',
            'userstitle' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'level' => 'required|max:255'
        ]);
        $validateddata['password'] = bcrypt($validateddata['password']);
        Users::create($validateddata);
        return redirect('/users')->with('success', 'Data Berhasil Ditambahkan');
    }
    public function edit_users($id){
        $data = Users::find($id);
        // dd($data);
        return view('admin.edit_users', compact('data'), [
            "title" => "Edit"
        ]);
    }
    public function update_users(Request $request, $id){
        $data = Users::find($id);
        $data->update($request->all());

        return redirect('/users')->with('success', 'Data Berhasil Di Update');
    }
    public function destroy_users($id){
        $data = Users::find($id);
        $data->delete();
        return redirect('/users')->with('success', 'Data Berhasil Di Hapus');
    }
	
	public function index_playstations(){
        $data = Playstations::all();
        // dd($data);
        return view('admin.index_playstations', compact('data'), [
            "title" => "Playstations"
        ]);
    }
    public function create_playstations(){
        return view('admin.create_playstations', [
            "title" => "Create"
        ]);
    }
    public function store_playstations(Request $request){
        $data = Playstations::create($request->all());
        if ($request->hasFile('poster')) {
            $request->file('poster')->move('posterfilm/', $request->file('poster')->getClientOriginalName());
            $data->poster = $request->file('poster')->getClientOriginalName();
            $data->save();
        }
        return redirect('/playstations')->with('success', 'Task Created Successfully!');
    }
    public function show_playstations(){
        $data = Playstations::all();
        // dump($data);
        return view('admin.index_game', compact('data'), [
            'title' => "Movie",
        ]);
    }
    public function edit_playstations(Request $request, $id){
        $data = Playstations::find($id);
        if ($request->hasFile('poster')) {
            $request->file('poster')->move('posterfilm/', $request->file('poster')->getClientOriginalName());
            $data->poster = $request->file('poster')->getClientOriginalName();
            $data->save();
        }
        return view('admin.edit_playstations', compact('data'), [
            "title" => "Edit"
        ]);
    }
    public function update_playstations(Request $request, $id){
        $data = Playstations::find($id);
        if ($request->hasFile('poster')) {
            $request->file('poster')->move('posterfilm/', $request->file('poster')->getClientOriginalName());
            $data->poster = $request->file('poster')->getClientOriginalName();
            $data->save();
        }
        $data->update($request->all());

        return redirect('/playstations')->with('success', 'Data Berhasil Di Update');
    }
    public function destroy_playstations($id){
        $data = Playstations::find($id);
        $data->delete();
        return redirect('/playstations')->with('success', 'Data Berhasil Di Hapus');
    }
	public function playstations(){
		$playstations = Playstations::all();
		return view('admin.playstations_export',['playstations'=>$playstations]);
	}
	public function export_excel(){
		return Excel::download(new PlaystationsExport, 'playstations.xlsx');
	}
	public function import_excel(Request $request) {
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
		$file = $request->file('file'); // menangkap file excel
		$nama_file = rand().$file->getClientOriginalName(); // membuat nama file unik
		$file->move('file_playstations',$nama_file); // upload ke folder file_playstations di dalam folder public
		Excel::import(new PlaystationsImport, public_path('/file_playstations/'.$nama_file)); // import data
		Session::flash('sukses','Data Playstations Berhasil Diimport!'); // notifikasi dengan session
		return redirect('/playstations/playstations');
	}
	
	public function index_game(){
        $data = Playstations::all();
        return  view('admin.index_game', compact('data'), [
            'populers' => $data = Playstations::where('status', 'Now Playing')->get(),
            'nows' => $data = Playstations::where('status', 'Now Playing')->get(),
            'comings' => $data = Playstations::where('status', 'Coming Soon')->get(),
            'title' => "Game",
        ]);
    }
    public function show(Playstations $game){
        return view('admin.show', [
            'game' => $game,
            'title' => "Game",
        ]);
    }
	
	public function index_transactions() {
        $data = Transaction::all();
        // dd($data);
        return view('admin.index_transactions', compact('data'), [

            "title" => "Transaction"
        ]);
    }
    public function create_transactions(){
        return view('admin.show', [
            "title" => "Create"
        ]);
    }
    public function store_transactions(Request $request){
        // dd($request->all());
        $transactions = new Transaction;
        $transactions->users_id = Auth::users()->id;
        $transactions->rental_date = $request->rental_date;
        $transactions->return_date = $request->return_date;
        $transactions->actual_return_date = $request->actual_return_date;
        $transactions->total2 = $request->total2;
        $transactions->save();

        // Transaction::create($validateddata);
        return redirect('/users/myticket');
    }
	
	

    public function myticket(){
        $data = Transaction::all();
        return  view('admin.myticket', compact('data'), [
            'myticket' => $data = Transaction::where('users_id', Auth::users()->id)->get(),
            'title' => "My Ticket",
        ]);
    }
    public function edit_transactions(Request $request, $id){
        $data = Playstations::find($id);
        return view('admin.edit_transactions', compact('data'), [
            "title" => "Edit"
        ]);
    }
    public function destroy_transactions($id){
        $data = Transaction::find($id);
        $data->delete();
        return redirect('/transactions')->with('success', 'Data Berhasil Di Hapus');
    }
	public function index_feedback(){
        $data = Feedback::all();
        // dd($data);
        return view('admin.index_feedback', compact('data'), [
            "title" => "Feedback"
        ]);
    }
    public function create_feedback(){
        return view('admin.contactus', [
            "title" => "Feedback"
        ]);
    }
    public function store_feedback(Request $request){
        $feedback = new Feedback;
        $feedback->users_id = Auth::users()->id;
        $feedback->reason = $request->reason;
        $feedback->message = $request->message;
        $feedback->ftitle = $request->ftitle;
        $feedback->ltitle = $request->ltitle;
        $feedback->email = $request->email;
        $feedback->phonenum = $request->phonenum;
        $feedback->rate = $request->rate;
        $feedback->save();
        return redirect('/');
    }
	
	
	
	public function onetooneUsers(){
    	$users = Users::all();
    	return view('done.onetoone', ['users' => $users]);
    }
	public function onetomanyUsers(){
		$users = Users::all();
		return view('done.onetomany',['users' => $users]);
	   }
	public function manytomanyUsers(){
		$users = Users::get();
		return view('done.manytomany',['users' => $users]);
	}
	public function barang($id){
        return view('done.barang',['html_nya' => $id]);
		//return view('barang',['isi_data' => $id]);
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
		$proses = Products::create($data);
        return redirect('/');
	}
	public function products_delete($id){
		$proses = Products::where('products_id',$id)->delete();
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
		$proses = Products::find($id)->update($data);
        return redirect('/');
  	}
  	public function products_view(){
		$data = Products::all();
		dd($data);
		//echo $data[0]->name; //akses sub
	 }
    public function products_create() { //create resource
        return view('admin.products');
    }
    public function products_store(Request $request){
		$data = [
			'name' => $request->product_name,
			'stock' => $request->stock,
			'brand' => $request->brand,
			'buy_price' => $request->buy_price,
			'sale_price' => $request->sale_price,
			'comment' => $request->comment,
		];
		$proses = Products::create($data);
		if($proses){
			echo "<script>alert('data berhasil disimpan');</script>";
		}else echo "<script>alert('data gagal disimpan');</script>";
        return redirect('/');
    }
	public function products_recyclebin(){
		$data = Products::all();
		return view('admin.products_list',compact('data'));
	}
	public function products_recycle($id){
		$proses = Products::where('products_id', $id)->delete();
		if($proses) flash('Data Berhasil Hapus')->success();
		if(!$proses) flash('Data Gagal Hapus')->error();
		return redirect('products/recyclebin');
	}
	public function products_edit($id){
		$data= Products::where('products_id',$id)->get();
		return view('admin.products_edit',compact('data'));
	}
	public function products_update2(Request $request, $id){
		$data = Products::find($id);

		$data->name = $request->products_name;
		$data->stock = $request->stock;
		$data->brand = $request->brand;
		$data->buy_price = $request->buy_price;
		$data->sale_price = $request->sale_price;
		$data->comment = $request->comment;

		$proses = $data->save();
	}
	public function products_array(){
		$data_products = array();
		//foreeach (Products::all() as $key) {
		//	$data_products[$key->products_id] = $key->name;
		//}
	}
	
	
	
	public function employee_view($id) {
		return view('done.uts',['employee' => $id]);
	}
	public function employee_edit($id) {
		return view('done.uts',['employee' => $id]);
	}
	public function employee_delete($id)
	{
		return redirect('/employee/view_employee');
    	return view('done.uts',['employee' => $id]); 
	}



    public function suppliers_edit1(){
		$data = [
			'name' => 'Nanda Sukarno',
			'name_company' => 'Indofood',
			'kota' => 'Jakarta',
			'telp' => 02,
			'contact' => 02,
			'information' => 'perusahaan terbesar'
		];
		$proses = Suppliers::create($data);
        return redirect('/');
	}
	public function suppliers_delete($id){
		$proses = Suppliers::where('suppliers_id',$id)->delete();
		if($proses){
			echo 'data berhasil dihapus';
		}
	}
	public function suppliers_update($id){
		$data = [
			'name' => 'Raden Rishwan',
			'name_company' => 'Orang Tua',
			'kota' => 'Bandung',
			'telp' => 03,
			'contact' => 03,
			'information' => 'perusahaan terbesar kedua'
		];
		$proses = Suppliers::find($id)->update($data);
        return redirect('/');
  	}
  	public function suppliers_view(){
		$data = Suppliers::all();
		dd($data);
		//echo $data[0]->name; //akses sub
	}
    public function suppliers_create(){
        return view('admin.suppliers');
    }
    public function suppliers_store(Request $request)
    {
		$data = [
			'name' => $request->suppliers_name,
			'name_company' => $request->name_company,
			'kota' => $request->kota,
			'telp' => $request->telp,
			'contact' => $request->contact,
			'information' => $request->information
		];
		$proses = Suppliers::create($data);
		if($proses){
				echo "<script>alert('data berhasil disimpan');</script>";
		}else echo "<script>alert('data gagal disimpan');</script>";
        return redirect('/');
    }
	public function suppliers_recyclebin(){
		$data = Suppliers::all();
		return view('admin.suppliers_list',compact('data'));
	}
	public function suppliers_recycle($id){
		$proses = Suppliers::where('suppliers_id', $id)->delete();
		if($proses) flash('Data Berhasil Hapus')->success();
		if(!$proses) flash('Data Gagal Hapus')->error();
		return redirect('suppliers/recyclebin');
	}
	public function suppliers_edit($id){
		$data= Suppliers::where('suppliers_id',$id)->get();
		return view('admin.suppliers_edit',compact('data'));
	}
	public function suppliers_update2(Request $request, $id){
		$data = Suppliers::find($id);

		$data->name = $request->suppliers_name;
		$data->name_company = $request->name_company;
		$data->kota = $request->kota;
		$data->telp = $request->telp;
		$data->contact = $request->contact;
		$data->information = $request->information;

		$proses = $data->save();
	}
	public function onetooneSuppliers(){
    	$suppliers = Suppliers::all();
    	return view('done.onetoone', ['suppliers' => $suppliers]);
    }
	public function onetomanySuppliers(){
		$suppliers = Suppliers::all();
		return view('done.onetomany',['suppliers' => $suppliers]);
	   }
	public function manytomanySuppliers(){
		$suppliers = Suppliers::get();
		return view('done.manytomany',['suppliers' => $suppliers]);
	}
	
	public function purchase_edit1(){
		$data = [
			'products_id' => 01,
			'suppliers_id' => 01,
			'stock' => 100,
			'comment' => 'barang pertama kali'
		];
		$proses = Purchase::create($data);
        return redirect('/');
	}
	public function purchase_delete($id){
		$proses = Purchase::where('purchase_id',$id)->delete();
		if($proses){
			echo 'data berhasil dihapus';
		}
	}
	public function purchase_update1($id){
		$data = [
			'products_id' => 01,
			'suppliers_id' => 01,
			'stock' => 1000,
			'comment' => 'barang pertama kali'
		];
		$proses = Purchase::find($id)->update($data);
        return redirect('/');
  	}
  	public function purchase_view(){
		$data = Purchase::all();
		dd($data);
		//echo $data[0]->name; //akses sub
	 }
    public function purchase_create() { //create resource
        return view('admin.purchase');
    }
    public function purchase_store(Request $request)
    {
		$data = [
			'products_id' => $request->products_id,
			'suppliers_id' => $request->suppliers_id,
			'stock' => $request->stock,
			'comment' => $request->comment,
		];
		$proses = Purchase::create($data);
		if($proses){
			echo "<script>alert('data berhasil disimpan');</script>";
		}else echo "<script>alert('data gagal disimpan');</script>";
        return redirect('/');
    }
	public function purchase_recyclebin(){
		$data = Purchase::all();
		return view('admin.purchase_list',compact('data'));
	}
	public function purchase_recycle($id){
		$proses = Purchase::where('purchase_id', $id)->delete();
		if($proses) flash('Data Berhasil Hapus')->success();
		if(!$proses) flash('Data Gagal Hapus')->error();
		return redirect('/zpurchase/recyclebin');
	}
	public function purchase_edit($id){
		$data= Purchase::where('purchase_id',$id)->get();
		return view('admin.purchase_edit',compact('data'));
	}
	public function purchase_update2(Request $request, $id){
		$data = Purchase::find($id);

		$data->products_id = $request->products_id;
		$data->suppliers_id = $request->suppliers_id;
		$data->stock = $request->stock;
		$data->comment = $request->comment;

		$proses = $data->save();
	}
}
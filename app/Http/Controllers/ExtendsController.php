<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\Console\RetryCommand;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Transactions;
use App\Models\User;
use App\Models\Products;
use App\Models\Feedback;
use Laracasts\Flash\Flash;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class ExtendsController extends Controller{
	public function index_beranda(){return view('/');}
    public function halamanadmin(){return view('dashboard');}
    public function halamancustomer(){return view('/');}
    public function index_dashboard(){
        $products = DB::table('products')->get()->count();
        $users = DB::table('users')->get()->count();
        $transactions = DB::table('transactions')->get()->count();
        $datausers = User::all();
        $datatrans = Transactions::all();
        return view('dashboard', compact('products', 'users', 'transactions', 'datausers', 'datatrans'), ["title" => "Dashboard"]);
    }
	
	
	
	public function usersIndex(){
        $data = User::all();
        return view('admin.usersIndex', compact('data'), ["title" => "Users"]);
    }
    public function postLogin(Request $request){
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
        return view('admin.signup', ["title" => "Signup"]);
    }
    public function postRegis(Request $request){
        $validateddata = $request->validate([
            'title' => 'required|max:255',
            'userstitle' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'level' => 'nullable|default'
        ]);
        $validateddata['password'] = bcrypt($validateddata['password']);
        User::create($validateddata);
        return redirect('/login')->with('success', 'Data Berhasil Ditambahkan');
    }
    public function usersCreate(){
        return view('admin.usersCreate', ["title" => "Create"]);
    }
    public function usersStore(Request $request){
        $validateddata = $request->validate([
            'title' => 'required|max:255',
            'userstitle' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'level' => 'required|max:255'
        ]);
        $validateddata['password'] = bcrypt($validateddata['password']);
        User::create($validateddata);
        return redirect('/users')->with('success', 'Data Berhasil Ditambahkan');
    }
    public function usersEdit($id){
        $data = User::find($id);
        return view('admin.usersEdit', compact('data'), ["title" => "Edit"]);
    }
    public function usersUpdate(Request $request, $id){
        $data = User::find($id);
        $data->update($request->all());
        return redirect('/users')->with('success', 'Data Berhasil Di Update');
    }
    public function usersDestroy($id){
        $data = User::find($id);
        $data->delete();
        return redirect('/users')->with('success', 'Data Berhasil Di Hapus');
    }
	public function onetooneUsers(){
    	$users = User::all();
    	return view('done.onetoone', ['users' => $users]);
    }
	public function onetomanyUsers(){
		$users = User::all();
		return view('done.onetomany',['users' => $users]);
	   }
	public function manytomanyUsers(){
		$users = User::get();
		return view('done.manytomany',['users' => $users]);
	}
	
	
	public function myticket(){
        $data = Transactions::all();
        return  view('admin.myticket', compact('data'), [
            'myticket' => $data = Transactions::where('users_id', Auth::users()->id)->get(),'title' => "My Ticket",
        ]);
    }
	
	public function productsIndex(){
        $data = Products::all();
        return view('admin.productsIndex', compact('data'), ["title" => "Products"]);
    }
    public function productsCreate(){
        return view('admin.productsCreate', ["title" => "Create"]);
    }
    public function productsStore(Request $request){
        $data = Products::create($request->all());
        if ($request->hasFile('poster')) {
            $request->file('poster')->move('posterfilm/', $request->file('poster')->getClientOriginalName());
            $data->poster = $request->file('poster')->getClientOriginalName();
            $data->save();
        }
        return redirect('/products')->with('success', 'Task Created Successfully!');
    }
    public function productsShow(){
        $data = Products::all();
        return view('admin.ordersIndex', compact('data'), ['title' => "Movie",]);
    }
    public function productsEdit(Request $request, $id){
        $data = Products::find($id);
        if ($request->hasFile('poster')) {
            $request->file('poster')->move('posterfilm/', $request->file('poster')->getClientOriginalName());
            $data->poster = $request->file('poster')->getClientOriginalName();
            $data->save();
        }
        return view('admin.productsEdit', compact('data'), [
            "title" => "Edit"
        ]);
    }
    public function productsUpdate(Request $request, $id){
        $data = Products::find($id);
        if ($request->hasFile('poster')) {
            $request->file('poster')->move('posterfilm/', $request->file('poster')->getClientOriginalName());
            $data->poster = $request->file('poster')->getClientOriginalName();
            $data->save();
        }
        $data->update($request->all());
        return redirect('/products')->with('success', 'Data Berhasil Di Update');
    }
    public function productsDestroy($id){
        $data = Products::find($id);
        $data->delete();
        return redirect('/products')->with('success', 'Data Berhasil Di Hapus');
    }
	public function productsPrint(){
		$products = Products::all();
		return view('admin.productsPrint',['products'=>$products]);
	}
	public function productsExportXls(){
		return Excel::download(new ProductsExport, 'products.xlsx');
	}
	public function productsImportXls(Request $request) {
		$this->validate($request, ['file' => 'required|mimes:csv,xls,xlsx']);
		$file = $request->file('file'); // menangkap file excel
		$nama_file = rand().$file->getClientOriginalName(); // membuat nama file unik
		$file->move('file_products',$nama_file); // upload ke folder file_products di dalam folder public
		Excel::import(new ProductsImport, public_path('/file_products/'.$nama_file)); // import data
		Session::flash('sukses','Data {roducts Berhasil Diimport!'); // notifikasi dengan session
		return redirect('/products/products');
	}
	
	
	
	public function ordersIndex(){
        $data = Orders::all();
        return  view('admin.ordersIndex', compact('data'), [
            'ordered' => $data = Products::where('category', 'Dipesan')->get(),
            'sent' => $data = Products::where('category', 'Dikirim')->get(),
            'accepted' => $data = Products::where('category', 'Diterima')->get(),
            'title' => "Orders",
        ]);
    }
	
	
	
    public function show(Products $orders){
        return view('admin.transactionsCreate', ['orders' => $orders,'title' => "Orders",]);
    }
	public function productsDummyEdit(){$data = ['name' => 'Indo Mie','stock' => 100,'brand' => 'Indofood','buy_price' => 1000,'sale_price' => 1500,'comment' => 'barang pertama kali'];
		$proses = Products::create($data);
        return redirect('/');
	}
	public function productsDummyUpdate($id){$data = ['name' => 'Indo Mie','stock' => 1000,'brand' => 'Indofood','buy_price' => 2000,'sale_price' => 2500,'comment' => 'barang pertama kali'];
		$proses = Products::find($id)->update($data);
        return redirect('/');
  	}
	
	
	
	public function transactionsIndex() {
        $data = Transactions::all();
		dd($data);
        return view('admin.transactionsIndex', compact('data'), ["title" => "Transactions"]);
    }
    public function transactionsCreate(){
        return view('admin.transactionsCreate', ["title" => "Create"]);
    }
    public function transactionsStore(Request $request){
        $transactions = new Transactions;
        $transactions->users_id = Auth::users()->id;
        // $transactions->rental_date = $request->rental_date;
        $transactions->stock = $request->stock;
        $transactions->comment = $request->comment;
        $transactions->total2 = $request->total2;
        $transactions->save();
        return redirect('/users/myticket');
    }
    // public function transactionsEdit(Request $request, $id){$data = Products::find($id);
        // return view('admin.transactionsEdit', compact('data'), ["title" => "Edit"]);}
    public function transactionsDestroy($id){
        $data = Transactions::find($id);
        $data->delete();
        return redirect('/transactions')->with('success', 'Data Berhasil Di Hapus');
    }
	public function purchaseDummyEdit(){$data = ['products_id' => 01,'suppliers_id' => 01,'stock' => 100,'comment' => 'barang pertama kali'];
		$proses = Transactions::create($data);
        return redirect('/');
	}
	public function purchaseDummyUpdate($id){
		$data = ['products_id' => 01,'suppliers_id' => 01,'stock' => 1000,'comment' => 'barang pertama kali'];
		$proses = Transactions::find($id)->update($data);
        return redirect('/');
  	}
	
	
	
	public function feedbackIndex(){
        $data = Feedback::all();
        return view('admin.feedbackIndex', compact('data'), ["title" => "Feedback"]);
    }
    public function create_feedback(){
        return view('admin.feedbackContactus', ["title" => "Feedback"]);
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
	

	public function barang($id){
        return view('done.barang',['html_nya' => $id]);
		//return view('barang',['isi_data' => $id]);
    }
	
	
	
	public function employee_view($id) {return view('done.uts',['employee' => $id]);}
	public function employee_edit($id) {return view('done.uts',['employee' => $id]);}
	public function employee_delete($id){return redirect('/employee/view_employee');
    	return view('done.uts',['employee' => $id]); 
	}



    public function suppliers_dummyEdit(){$data = ['name' => 'Nanda Sukarno','name_company' => 'Indofood','kota' => 'Jakarta','telp' => 02,'contact' => 02,'information' => 'perusahaan terbesar'];
		$proses = Suppliers::create($data);
        return redirect('/');
	}
	public function suppliers_dummyUpdate($id){$data = ['name' => 'Raden Rishwan','name_company' => 'Orang Tua','kota' => 'Bandung','telp' => 03,'contact' => 03,'information' => 'perusahaan terbesar kedua'];
		$proses = Suppliers::find($id)->update($data);
        return redirect('/');
  	}
	public function suppliers_delete($id){
		$proses = Suppliers::where('suppliers_id',$id)->delete();
		if($proses){
			echo 'data berhasil dihapus';
		}
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
	public function suppliers_update(Request $request, $id){
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
}
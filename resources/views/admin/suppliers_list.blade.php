@extends('admin.utama')

@section('content')
<div class="col-lg-15 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Basic Table</h4>
      <p class="card-description">
        Add class <code>.table</code>
      </p>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>ID SUPPLIERS</th>
              <th>NAME SUPPLIERS</th>
              <th>NAME COMPANY</th>
              <th>KOTA</th>
              <th>TELEPON</th>
              <th>CONTACT</th>
              <th>INFORMATION</th>
              <th>ACTION</th>
            </tr>
          </thead>
          <tbody>
          @foreach($data as $key)
            <tr>
              <td>{{ $key->suppliers_id }}</td>
              <td>{{ $key->name }}</td>
              <td>{{ $key->name_company }}</td>
              <td>{{ $key->kota }}</td>
              <td>{{ $key->telp }}</td>
              <td>{{ $key->contact }}</td>
              <td>{{ $key->information }}</td>
              <td><button type="buttton" onclick="window.location.href='{{url('suppliers/delete/'.$key->suppliers_id)}}';" class="btn btn-danger">Hapus</button><br> 
              <button type="button" onclick="window.location.href='{{url('suppliers/edit/'.$key->suppliers_id)}}';" class="btn btn-warning">Edit</button></td> 
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
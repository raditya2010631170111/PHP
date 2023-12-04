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
              <th>ID PRODUCTS</th>
              <th>NAME PRODUCTS</th>
              <th>STOCK</th>
              <th>BRAND</th>
              <th>BUY PRICE</th>
              <th>SALE PRICE</th>
              <th>COMMENT</th>
              <th>ACTION</th>
            </tr>
          </thead>
          <tbody>
          @foreach($data as $key)
            <tr>
              <td>{{ $key->produts_id }}</td>
              <td>{{ $key->name }}</td>
              <td>{{ $key->stock }}</td>
              <td>{{ $key->brand }}</td>
              <td>{{ $key->buy_price }}</td>
              <td>{{ $key->sale_price }}</td>
              <td>{{ $key->comment }}</td>
              <td><button type="buttton" onclick="window.location.href='{{url('products/delete/'.$key->products_id)}}';" class="btn btn-danger">Hapus</button><br> 
              <button type="button" onclick="window.location.href='{{url('products/edit/'.$key->products_id)}}';" class="btn btn-warning">Edit</button></td> 
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
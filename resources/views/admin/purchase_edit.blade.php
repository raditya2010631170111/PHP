@extends('admin.utama')

@section('content')
<div class="col-12 grid-margin">
    <div class="card">
		<div class="card-body">
			<h4 class="card-title">Edit Purchase</h4>
			{!! Form::open(array('url' => url(''), 'method' => 'get', 'class' => 'form-horizontal')) !!}
				<p class="card-description">Input data</p>
				<div class="row">
					<div class="col-md-6">
					<div class="form-group row">
					  {!! Form::label('products_id','Products ID',array('class' => 'col-sm-3 control-label')) !!}
						<div class="col-sm-9">
						<input type="text" value="{{$data [0]->products_id}}" name="product_name" class="form-control" />
						</div>
					</div>
					</div>
					<div class="col-md-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Stock</label>
						<div class="col-sm-9">
						<input type="text" value="{{$data [0]->stock}}" name="stock" class="form-control" />
						</div>
					</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Suppliers ID</label>
						<div class="col-sm-9">
						<input type="text" value="{{$data [0]->suppliers_id}}" class="form-control" name="suppliers_id"/>
						</div>
					</div>
					</div>
					<div class="col-md-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Comment</label>
						<div class="col-sm-9">
						<input type="text" value="{{$data [0]->comment}}" class="form-control" name="comment"/>	
						</div>
					</div>
					</div>
				</div>
				<button type="submit" class="btn btn-primary me-2">Submit</button>
				<button class="btn btn-light">Cancel</button>
			{!! Form::close() !!}
		</div>
    </div>
</div>
@endsection
@extends('admin.utama')

@section('content')
<div class="col-12 grid-margin">
    <div class="card">
		<div class="card-body">
			<h4 class="card-title">Edit Suppliers</h4>
			{!! Form::open(array('url' => url(''), 'method' => 'get', 'class' => 'form-horizontal')) !!}
				<p class="card-description">Input data</p>
				<div class="row">
					<div class="col-md-6">
					<div class="form-group row">
					{!! Form::label('suppliers_name','Suppliers Name',array('class' => 'col-sm-3 control-label')) !!}
						<div class="col-sm-9">
						<input type="text" value="{{$data [0]->name}}" name="suppliers_name" class="form-control" />
						</div>
					</div>
					</div>
					<div class="col-md-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Name Company</label>
						<div class="col-sm-9">
						<input type="text" value="{{$data [0]->name_company}}" name="name_company" class="form-control" />
						</div>
					</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Kota</label>
						<div class="col-sm-9">
						<input type="text" value="{{$data [0]->kota}}" name="kota" class="form-control" />
						</div>
					</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Available Status</label>
							<div class="col-sm-4">
							<div class="form-check">
								<label class="form-check-label">
								<input type="radio" class="form-check-input" name="discount-stat" id="discount_statYes" value="" checked>
								Available
								</label>
							</div>
							</div>
							<div class="col-sm-5">
							<div class="form-check">
								<label class="form-check-label">
								<input type="radio" class="form-check-input" name="discount-stat" id="discount_statNo" value="option2">
								Sold out
								</label>
							</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Telepon</label>
						<div class="col-sm-9">
						<input type="text" value="{{$data [0]->telp}}" class="form-control" name="telp"/>
						</div>
					</div>
					</div>
					<div class="col-md-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Contact</label>
						<div class="col-sm-9">
						<input type="text" value="{{$data [0]->contact}}" class="form-control" name="contact"/>
						</div>
					</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Information</label>
						<div class="col-sm-9">
						<input type="text" value="{{$data [0]->information}}" class="form-control" name="information"/>	
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
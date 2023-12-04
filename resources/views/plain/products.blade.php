@extends('admin.utama')

@section('content')
<div class="col-12 grid-margin">
    <div class="card">
		<div class="card-body">
			<h4 class="card-title">Add Products</h4>
			{!! Form::open(array('url' => url('products/store'), 'method' => 'post', 'class' => 'form-horizontal')) !!}
				<p class="card-description">
					Input data
				</p>
				<div class="row">
					<div class="col-md-6">
					  <div class="form-group row">
					  {!! Form::label('product_name','Product Name',array('class' => 'col-sm-3 control-label')) !!}
						  <div class="col-sm-9">
						  <input type="text" name="product_name" class="form-control" />
						  </div>
					  </div>
					</div>
					<div class="col-md-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Stock</label>
						<div class="col-sm-9">
						<input type="text" name="stock" class="form-control" />
						</div>
					</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Brand</label>
						<div class="col-sm-9">
						<select class="form-control" name="brand">
							<option>Indofood</option>
							<option>Wings</option>
							<option>Orang Tua</option>
							<option>Other</option>
						</select>
						</div>
					</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Discount Status</label>
							<div class="col-sm-4">
							<div class="form-check">
								<label class="form-check-label">
								<input type="radio" class="form-check-input" name="discount-stat" id="discount_statYes" value="" checked>
								Yes
								</label>
							</div>
							</div>
							<div class="col-sm-5">
							<div class="form-check">
								<label class="form-check-label">
								<input type="radio" class="form-check-input" name="discount-stat" id="discount_statNo" value="option2">
								No
								</label>
							</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Buy Price</label>
						<div class="col-sm-9">
						<input type="text" class="form-control" name="buy_price"/>
						</div>
					</div>
					</div>
					<div class="col-md-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Sale Price</label>
						<div class="col-sm-9">
						<input type="text" class="form-control" name="sale_price"/>
						</div>
					</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Comment</label>
						<div class="col-sm-9">
						<input type="text" class="form-control" name="comment"/>	
						</div>
					</div>
					</div>
				</div>
				<button type="submit" class="btn btn-primary me-2">Submit</button>
				<button class="btn btn-light">Cancel</button>
				<div><a href="/products/dummyEdit" class="btn btn-sm btn-primary">Edit</a></div>
				<div><a href="/products/dummyUpdate/2" class="btn btn-sm btn-primary">Update</a></div>
			{!! Form::close() !!}
		</div>
    </div>
</div>
@endsection
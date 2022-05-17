@extends('layout.conquer2')
@section('content')
	<h3 class="page-title">
		ADD SUPPLIER
	</h3>
	<div class="page-bar">
	  <ul class="page-breadcrumb">
		 <li>
			<i class="fa fa-home"></i>
			<a href="#">Dashboard</a>
			<i class="fa fa-angle-right"></i>
		 </li>
		 <li>
			<a href="#">Supplier</a>
			<i class="fa fa-angle-right"></i>
		 </li>
		 <li>
			<a href="#">Tambah Data Supplier</a>
			<i class="fa fa-angle-right"></i>
		 </li>
	  </ul>
	</div>
	<div class="portlet col-md-8">
		<div class="portlet-title">
			<div class="caption">
			   <b>TAMBAH DATA SUPPLIER</b>
			</div>
		</div>
		<div class="portlet-body form">
			<form role="form" method="POST" action="{{ route('suppliers.store') }}" class="form-horizontal">
			   @csrf
				<div class="form-body">
					<div class="form-group">
						<label class="control-label col-md-3">Nama</label>
						<div class="col-md-8">
						   <input type="text" name="name" data-required="1" class="form-control">
						   <span class="help-block">Isikan nama supplier</span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Alamat</label>
						<div class="col-md-8">
						   <textarea name="address" class="form-control" rows="3" required></textarea>
						   <span class="help-block">Isikan alamat supplier</span>
						</div>
					</div>
					<div class="form-actions fluid">
						<div class="col-md-offset-3 col-md-9">
						   <button type="submit" class="btn btn-info p-3">Submit</button>
						   <button type="button" class="btn btn-default">Cancel</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
		<div class="modal-dialog">
		  <div class="modal-content" >

			<form role="form" method="POST" action="{{ url('suppliers') }}" class="form-horizontal">
				@csrf
				<div class="modal-header">
					<button type="button" class="close"
					  data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Add New Supplier</h4>
				 </div>
				<div class="modal-body">
					 <div class="form-body">
						 <div class="form-group">
							 <label class="control-label col-md-3">Nama</label>
							 <div class="col-md-8">
								<input type="text" name="name" data-required="1" class="form-control">
							 </div>
						 </div>
						 <div class="form-group">
							 <label class="control-label col-md-3">Alamat</label>
							 <div class="col-md-8">
								<textarea name="address" class="form-control" rows="3" required></textarea>
							 </div>
						 </div>
						 <div class="modal-footer">
							<button type="submit" class="btn btn-info p-3">Submit</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					 </div>
				</div>
			</form>
		  </div>
		</div>
	 </div>
@endsection

@extends('layout.conquer2')
@section('content')
    <h3 class="page-title">
        DAFTAR KATEGORI
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
        </ul>
    </div>
    <div class="col-md-13">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>
    <div class="portlet">
        <div class="portlet-title">
            <div class="caption"><b>DAFTAR SUPPLIER</b></div>
        </div>
        <div class="portlet-body">
            <a class='btn btn-info' href="{{ route('suppliers.create') }}">Tambah Supplier</a>
            <a class='btn btn-info' href="#modalCreate" data-toggle="modal">Tambah Supplier (Modal)</a>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($result as $d)
                            <tr id='tr_{{ $d->id }}'>
                                <td id="td_name_{{ $d->id }}">{{ $d->name }}</td>
                                <td id="td_address_{{ $d->id }}">{{ $d->address }}</td>
                                <th>
                                    <a class="btn btn-warning btn-xs"
                                        href="{{ url('suppliers/' . $d->id . '/edit') }}">Edit</a>
                                    <a class="btn btn-warning btn-xs" href="#modalEdit" data-toggle="modal"
                                        onclick="getEditForm({{ $d->id }})">
                                        Edit A
                                    </a>
                                    <a class="btn btn-warning btn-xs" href="#modalEdit" data-toggle="modal"
                                        onclick="getEditForm2({{ $d->id }})">
                                        Edit B
                                    </a>
                                    <a class="btn btn-danger btn-xs" href="#modalEdit" data-toggle="modal"
                                        onclick="if(confirm('apakah anda yakin menghapus data {{ $d->name }}')) deleteDataRemoveTR({{ $d->id }})">
                                        Delete 2
                                    </a>


                                    <form method="POST" action="{{ url('suppliers/' . $d->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type='submit' value='Hapus' class='btn btn-danger btn-xs'
                                            onclick="if(!confirm('apakah anda yakin menghapus data {{ $d->name }}')) return false;" />
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
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
@section('javascript')
    <script>
        function getEditForm(id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('supplier.getEditForm') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id
                },
                success: function(data) {
                    $("#modalContent").html(data.msg)
                }
            });
        }

        function getEditForm2(id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('supplier.getEditForm2') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id
                },
                success: function(data) {
                    $("#modalContent").html(data.msg)
                }
            });
        }

        function saveDataUpdateID(id) {
            var eName = $("#eName").val();
            var eAddress = $("#eAddress").val();
            $.ajax({
                type: 'POST',
                url: '{{ route('supplier.saveData') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id,
                    'name': eName,
                    'address': eAddress
                },
                success: function(data) {
                    if (data.status == 'ok') {
                        alert(data.msg)
                        $('#td_name_' + id).html(eName);
                        $('#td_address_' + id).html(eAddress);
                    }
                }
            });
        }

        function deleteDataRemoveTR(id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('supplier.deleteData') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id,
                },
                success: function(data) {
                    if (data.status == 'ok') {
                        alert(data.msg)
                        $('#td_' + id).remove();
                    } else {
                        alert(data.msg)
                    }
                }
            });
        }
    </script>
@endsection

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
      <div class="page-toolbar">
         <!-- tempat action button -->
      </div>
   </div>
   <div class="col-md-12">
      @if(session('status'))
         <div class="alert alert-success">
            {{ session('status') }}
         </div>
      @endif
   </div>
   <div class="portlet">
      <div class="portlet-title">
         <div class="caption"><b>DAFTAR SUPPLIER</b></div>
      </div>
      <div class="portlet-body">
         <a class='btn btn-info' href="{{ route('suppliers.create') }}">Tambah Supplier</a>
          <div class="table-responsive">
            <table class="table table-striped table-responsive">
               <thead>
                  <tr>
                     <th>Nama</th>
                     <th>Alamat</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($result as $d)
                  <tr>
                     <td>{{ $d->name }}</td>
                     <td>{{ $d->address }}</td>
                     <td>
                        <a class='btn btn-warning' href="#">Ubah</a>
                        <a class='btn btn-danger' href="#">Hapus</a>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
@endsection
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
      @if(session('status'))
         <div class="alert alert-success">
            {{ session('status') }}
         </div>
      @endif

      @if(session('error'))
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
                  <tr>
                     <td>{{ $d->name }}</td>
                     <td>{{ $d->address }}</td>
                     <th>
                        <a class="btn btn-warning btn-xs" href="{{ url('suppliers/'.$d->id.'/edit') }}">Ubah</a>
                        <form method="POST" action="{{ url('suppliers/'.$d->id) }}" >
                           @csrf
                           @method('DELETE')
                           <input type='submit' value='Hapus'class='btn btn-danger btn-xs'
                           onclick="if(!confirm('apakah anda yakin menghapus data {{ $d->name }}')) return false;" 
                           />
                        </form>
                     </th>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
@endsection
@extends('layout.conquer2')
@section('content')
   <div class="portlet">
      <div class="portlet-title">
         <div class="caption">
				<b>DAFTAR OBAT</b>
			</div>
      </div>
      <div class="portlet-body">
         <div class="table-responsive">
            <table class="table table-striped table-responsive">
               <thead>
                  <tr>
                  <th>Nama</th>
                  <th>Form</th>
                  <th>Formula</th>
                  <th>Category Name</th>
                  <th>Foto</th>
                  <th>Price</th>
                  </tr>
               </thead>
               <tbody>
               @foreach ($data as $d)
               <tr>
                  <td>{{ $d->generic_name }}</td>
                  <td>{{ $d->form }}</td>
                  <td>{{ $d->restriction_formula }}</td>
                  <td>{{ $d->category->name }}</td>
                  <td><img src="{{ asset('assets/images/'.$d->image ) }}" height="150px"/></td>
                  <td>{{ $d->price }}</td>
               </tr>
               @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
   
@endsection

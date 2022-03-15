@extends('layout.conquer2')
@section('content')
   <div class="container-fluid">
      <h2>DATA OBAT</h2>
      <div class="table-responsive">
         <table class="table table-striped table-hover">
            <thead>
               <tr>
                  <th>Data</th>
                  <th>Hasil</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td>Generic Name</td>
                  <td>{{ $data->generic_name }}</td>
               </tr>
               <tr>
                  <td>Form</td>
                  <td>{{ $data->form }}</td>
               </tr>
               <tr>
                  <td>Formula</td>
                  <td>{{ $data->restriction_formula }}</td>
               </tr>
               <tr>
                  <td>Nama Kategori</td>
                  <td>{{ $data->category->name }}</td>
               </tr>
               <tr>
                  <td>Price</td>
                  <td>{{ $data->price }}</td>
               </tr>
               <tr>
                  <td>Gambar</td>
                  <td><img src="{{ asset('assets/images/'.$data->image ) }}" /></td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
@endsection

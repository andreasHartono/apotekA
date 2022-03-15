@extends('layout.conquer2')
@section('content')
   <h2>DAFTAR OBAT</h2>
   <div class="table-responsive">
      <table class="table table-striped table-hover">
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
   <div class="container">
      <h2>DAFTAR OBAT</h2>
      <div class="row">
         @foreach ($data as $d)
         <div class="col-md-3"
            style="text-align:center;border:1px solid #999;margin:2px;padding:5px;border-radius:10px">
            <img src="{{ asset('assets/images/'.$d->image ) }}" height="150px"/><br>
            <a href="/medicines/{{ $d->id }}"><b>{{ $d->generic_name }}</b><br>{{ $d->form }}<br></a>
         </div>
         @endforeach
      </div>
   </div>
@endsection

@extends('layouts.conquer2')
@section('content')
   <div class="portlet">
      <div class="portlet-title">
         <div class="caption">
            <b>Report Daftar Obat Harga Tertinggi</b><hr>
            <p>Nama Obat : {{ $result[0]->generic_name }}</p><hr>
            <p>Harga Tertinggi : Rp.{{$result[0]->tertinggi}},00</p><hr>
            <p>Detil Obat</p><hr>
         </div>
      </div>
      <div class="portlet-body">
         <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-responsive">
               <thead>
                  <tr>
                    <th>Data</th>
                    <th>Hasil</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                    <td>Generic Name</td>
                    <td>{{ $result[0]->generic_name }}</td>
                  </tr>
                  <tr>
                    <td>Bentuk</td>
                    <td>{{ $result[0]->form }}</td>
                  </tr>
                  <tr>
                    <td>Formula</td>
                    <td>{{ $result[0]->restriction_formula }}</td>
                  </tr>
                  <tr>
                    <td>Nama Kategori</td>
                    <td>{{ $result[0]->name }}</td>
                  </tr>
                  <tr>
                    <td>Harga</td>
                    <td>{{ $result[0]->price }}</td>
                  </tr>
                  <tr>
                    <td>Gambar</td>
                    <td>
                    <img src="{{asset('assets/images/'.$result[0]->image) }}"
                    height="100px" />
                    </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>
@endsection

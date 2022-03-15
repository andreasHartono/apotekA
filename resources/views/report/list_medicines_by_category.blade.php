@extends('layout.conquer2')
@section('content')
   <div class="portlet">
      <div class="portlet-title">
         <div class="caption">
            <b>List Medicines by Category</b><hr>
            <p>ID Category : {{$id_category}} with name : {{$namecategory}}</p><hr>
            <p>Total Rows : {{$getTotalData}}</p>
         </div>
      </div>
      <div class="portlet-body">
         <div class="table-responsive">
            <table class="table table-striped table-responsive">
               <thead>
                  <tr>
                  <th>Nama</th>
                  <th>Bentuk</th>
                  <th>Formula</th>
                  <th>Foto</th>
                  <th>Harga</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($result as $d)
                  <tr>
                  <td>{{$d->generic_name}}</td>
                  <td>{{$d->form}}</td>
                  <td>{{$d->restriction_formula}}</td>
                  <td>
                     <img src="{{asset('assets/images/'.$d->image) }}"
                     height="100px" />
                  </td>
                  <td>{{$d->price}}</td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
@endsection

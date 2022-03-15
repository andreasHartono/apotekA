@extends('layout.conquer2')
@section('content')
   <div class="portlet">
     <div class="portlet-title">
        <b>DAFTAR OBAT DENGAN GRID</b>
     </div>
     <div class="portlet-body">
        <div class="container-fluid">
            <div class="row">
               @foreach ($result as $d)
               <div class="col-md-3"
                  style="text-align:center;border:1px solid #999;margin:2px;padding:5px;border-radius:10px">
                  <img src="{{ asset('assets/images/'.$d->image ) }}" height="150px"/><br>
                  <a href="/medicines/{{ $d->id }}" class="btn btn-light"><b>{{ $d->generic_name }}</b><br>{{ $d->form }}<br></a>
               </div>
               @endforeach
            </div>
        </div>
     </div>
  </div>
@endsection
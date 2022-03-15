@extends('layout.conquer2')
@section('content')
   <div class="portlet">
      <div class="portlet-title">
         <b>DAFTAR KATEGORI</b>
      </div>
      <div class="portlet-body">
          <div class="table-responsive">
            <table class="table table-striped table-responsive">
               <thead>
                  <tr>
                     <th>Nama</th>
                     <th>Description</th>
                     <th>Obat - obat</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($hasil as $d)
                  <tr>
                     <td>{{ $d->name }}</td>
                     <td>{{ $d->description }}</td>
                     <td>
                        @foreach ($d->medicines as $m)
                           {{ $m->generic_name }} ({{ $m->form }})<br>
                        @endforeach
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
@endsection

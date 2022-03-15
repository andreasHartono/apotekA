@extends('layout.conquer2')
@section('content')
   <h2>DAFTAR KATEGORI</h2>
    <div class="table-responsive">
      <table class="table table-striped table-hover">
         <thead>
            <tr>
               <th>Nama</th>
               <th>Description</th>
               <th>Obat-obat</th>
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
@endsection

@extends('layout.conquer2')
@section('content')
   <h3 class="page-title">
		DAFTAR OBAT
	</h3>
   <div class="page-bar">
      <ul class="page-breadcrumb">
         <li>
            <i class="fa fa-home"></i>
            <a href="#">Dashboard</a>
            <i class="fa fa-angle-right"></i>
         </li>
         <li>
            <a href="#">Medicine</a>
            <i class="fa fa-angle-right"></i>
         </li>
      </ul>
      <div class="page-toolbar">
         <!-- tempat action button -->
      </div>
   </div>
   <div class="portlet">
      <div class="portlet-title">
         <div class="caption"><b>Daftar semua obat</b></div>
      </div>
      <div class="portlet-body">
         <a class='btn btn-info' href="{{ route('medicines.create') }}">Tambah Medicine</a>
         <div class="table-responsive">
            <table class="table table-striped table-responsive">
               <thead>
                  <tr>
                     <th>Nama</th>
                     <th>Form</th>
                     <th>Formula</th>
                     <th>Nama Kategori</th>
                     <th>Foto</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($data as $d)
                  <tr>
                     <td>{{ $d->generic_name }}</td>
                     <td>{{ $d->form }}</td>
                     <td>{{ $d->restriction_formula }}</td>
                     <td>{{ $d->category->name }}</td>
                     <td>
                        <a href="#detail_{{$d->id}}" data-toggle="modal">
                        <img src="{{asset('assets/images/'.$d->image) }}"
                        height="100px" /></a>

                        <div class="modal fade" id="detail_{{$d->id}}" tabindex="-1" role="basic" aria-hidden="true">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h4 class="modal-title">{{$d->generic_name}} {{$d->form}}</h4>
                                 </div>
                                 <div class="modal-body">
                                    <img src="{{asset('assets/images/'.$d->image) }}" height='400px' /><hr>
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </td>
                     <td>
                        <a class="btn btn-info" data-toggle="modal" href="{{ url('medicines/'.$d->id) }}" 
                           data-target="#show{{$d->id}}">
                           Detail
                        </a>
                        <div class="modal fade" id="show{{$d->id}}" tabindex="-1" role="basic" aria-hidden="true">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-title"><h3>&nbsp;&nbsp;&nbsp;DATA DETAIL OBAT {{ $d->generic_name }}</h3></div>
                                 <!-- put animated gif here -->
                                 {{-- <img src="{{ asset('assets/img/Spinning cheeseburger.gif') }}" alt="" class="loading" /> --}}
                                 <div class="modal-body">
                                    <div class="portlet">
                                       <div class="portlet-title">
                                          <div class="caption">
                                             <b>DATA OBAT</b>
                                          </div>
                                       </div>
                                       <div class="portlet-body">
                                          <div class="table-responsive">
                                             <table class="table table-striped table-responsive">
                                                <thead>
                                                   <tr>
                                                      <th>Data</th>
                                                      <th>Hasil</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                   <tr>
                                                      <td>Generic Name</td>
                                                      <td>{{ $d->generic_name }}</td>
                                                   </tr>
                                                   <tr>
                                                      <td>Form</td>
                                                      <td>{{ $d->form }}</td>
                                                   </tr>
                                                   <tr>
                                                      <td>Formula</td>
                                                      <td>{{ $d->restriction_formula }}</td>
                                                   </tr>
                                                   <tr>
                                                      <td>Nama Kategori</td>
                                                      <td>{{ $d->category->name }}</td>
                                                   </tr>
                                                   <tr>
                                                      <td>Harga</td>
                                                      <td>{{ $d->price }}</td>
                                                   </tr>
                                                    <tr>
                                                      <td>Deskripsi</td>
                                                      <td>{{ $d->description }}</td>
                                                   </tr>
                                                   <tr>
                                                      <td>Gambar</td>
                                                      <td><img src="{{ asset('assets/images/'.$d->image ) }}" /></td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </div>
                                          <div class="modal-footer">
                                             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
@endsection

@extends('layouts.conquer2')
@section('content')
    <h3 class="page-title">
        DAFTAR OBAT DENGAN MODEL GRID
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="#">Dashboard</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Obat Dalam Grid</a>
                <i class="fa fa-angle-right"></i>
            </li>
        </ul>
        <div class="page-toolbar">
            <!-- tempat action button -->
        </div>
    </div>
    <div class="portlet">
        <div class="portlet-title">
            <b>DAFTAR OBAT DALAM BENTUK GRID</b>
        </div>
        <div class="portlet-body">
            <div class="container-fluid">
                <div class="row">
                    @foreach ($result as $d)
                        <div class="col-md-3"
                            style="text-align:center;border:1px solid #999;margin:2px;padding:5px;border-radius:10px">
                            <img src="{{ asset('assets/images/' . $d->image) }}" height="150px" /><br>
                            <a href="/medicines/{{ $d->id }}" class="btn btn-primary" data-toggle="modal"
                                data-target="#show{{ $d->id }}"><b>{{ $d->generic_name }}</b><br>{{ $d->form }}<br></a>

                            <div class="modal fade" id="show{{ $d->id }}" tabindex="-1" role="basic"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-title">
                                            <h3>&nbsp;&nbsp;&nbsp;DATA DETAIL OBAT {{ $d->generic_name }}</h3>
                                        </div>
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
                                                                    <td><img
                                                                            src="{{ asset('assets/images/' . $d->image) }}" />
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

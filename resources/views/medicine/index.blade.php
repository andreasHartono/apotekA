@extends('layouts.conquer2')
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
            <a class='btn btn-success btn-sm' href="{{ route('medicines.create') }}">Tambah Medicine</a>
            <a class='btn btn-success btn-sm' href="#modalCreate" data-toggle="modal">Tambah Medicine (Modal)</a>
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
                                    <a href="#detail_{{ $d->id }}" data-toggle="modal">
                                        <img src="{{ asset('assets/images/' . $d->image) }}" height="100px" /></a>

                                    <div class="modal fade" id="detail_{{ $d->id }}" tabindex="-1" role="basic"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">{{ $d->generic_name }} {{ $d->form }}
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="{{ asset('assets/images/' . $d->image) }}"
                                                        height='400px' />
                                                    <hr>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-info btn-xs" data-toggle="modal"
                                        href="{{ url('medicines/' . $d->id) }}" data-target="#show{{ $d->id }}">
                                        Detail
                                    </a>
                                    @can('delete-permission')
                                        <a class="btn btn-warning btn-xs"
                                            href="{{ url('medicines/' . $d->id . '/edit') }}">Ubah</a>
                                        <a class="btn btn-warning btn-xs" href="#modalEdit" data-toggle="modal"
                                            onclick="getEditForm({{ $d->id }})">
                                            Ubah A
                                        </a>
                                        <form method="POST" action="{{ url('medicines/' . $d->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <input type='submit' value='Hapus' class='btn btn-danger btn-xs'
                                                onclick="if(!confirm('apakah anda yakin menghapus data {{ $d->generic_name }}')) return false;" />
                                        </form>
                                    @endcan
                                    <div class="modal fade" id="show{{ $d->id }}" tabindex="-1" role="basic"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-title">
                                                    <h3>&nbsp;&nbsp;&nbsp;DATA DETAIL OBAT {{ $d->generic_name }}</h3>
                                                </div>
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
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- tempat Modal --}}
    <div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form role="form" method="POST" id="form_sample_3" novalidate="novalidate"
                    action="{{ url('medicines') }}" class="form-horizontal">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Add New Medicines</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">Nama</label>
                                <div class="col-md-8">
                                    <input type="text" name="name" class="form-control" placeholder="asam blabla"
                                        required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Form</label>
                                <div class="col-md-8">
                                    <input type="text" name="form" class="form-control" placeholder="kaps 10 mg" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Formula</label>
                                <div class="col-md-8">
                                    <input type="text" name="restriction_formula" class="form-control"
                                        placeholder="10kaps/minggu" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Price</label>
                                <div class="col-md-8">
                                    <input type="number" name="price" class="form-control" placeholder="10000.00"
                                        required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Description</label>
                                <div class="col-md-8">
                                    <textarea name="description" class="form-control" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Kategori</label>
                                <div class="col-md-8">
                                    <select name="category" class="form-control">
                                        @foreach ($categories as $c)
                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Faskes</label>
                                <div class="col-md-4">
                                    <div class="checkbox-list">
                                        <div class="form-check">
                                            <input type="checkbox" name="faskes" id="faskes1" value="fakses1">
                                            <label for="faskes1">Faskes 1</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" name="faskes" id="faskes2" value="fakses2">
                                            <label for="faskes2">Faskes 2</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" name="faskes" id="faskes2" value="fakses2">
                                            <label for="faskes3">Faskes 3</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info p-3">Submit</button>
                            <button type="button" class="btn btn-default">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modalContent">
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        function getEditForm(id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('medicines.getEditForm') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id
                },
                success: function(data) {
                    //alert("test");
                    console.log('berhasil');
                    $("#modalContent").html(data.msg);
                },
                error: function(data) {
                    console.log('error');
                    alert(data);
                }
            });
        }
    </script>
@endsection

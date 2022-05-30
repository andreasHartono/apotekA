@extends('layouts.conquer2')
@section('content')
    <h3 class="page-title">
        ADD Medicine
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
            <li>
                <a href="#">Form Ubah Medicine</a>
                <i class="fa fa-angle-right"></i>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <b>UBAH DATA MEDICINE</b>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form role="form" method="POST" id="form_sample_3" novalidate="novalidate"
                        action="{{ url('medicines/'.$data->id) }}" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">Nama</label>
                                <div class="col-md-8">
                                    <input type="text" name="name" class="form-control" placeholder="asam blabla"
                                       value="{{ $data->generic_name }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Form</label>
                                <div class="col-md-8">
                                    <input type="text" name="form" class="form-control" placeholder="kaps 10 mg" 
                                    value="{{ $data->form }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Formula</label>
                                <div class="col-md-8">
                                    <input type="text" name="restriction_formula" class="form-control"
                                        placeholder="10kaps/minggu" value="{{ $data->restriction_formula }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Price</label>
                                <div class="col-md-8">
                                    <input type="number" name="price" class="form-control" placeholder="10000.00"
                                       value="{{ $data->price }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Description</label>
                                <div class="col-md-8">
                                    <textarea name="description" class="form-control" rows="2">{{ $data->description }}</textarea>
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
                                        <label>
                                            <div class="checker">
                                                <span>
                                                    <input type="checkbox" name="faskes1" value="{{ $data->faskes1 }}" />
                                                </span>
                                            </div>
                                             Faskes 1
                                        </label>
                                        <label>
                                            <div class="checker">
                                                <span>
                                                    <input type="checkbox" name="faskes2" value="{{ $data->faskes2 }}" />
                                                </span>
                                            </div>
                                            Faskes 2
                                        </label>
                                        <label>
                                            <div class="checker">
                                                <span>
                                                    <input type="checkbox" name="faskes3" value="{{ $data->faskes3 }}" />
                                                </span>
                                            </div>
                                            Faskes 3
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn btn-info p-3">Submit</button>
                                    <button type="button" class="btn btn-default">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

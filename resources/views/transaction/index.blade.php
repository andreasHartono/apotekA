@extends('layouts.conquer2')
@section('content')
    <h3 class="page-title">
        DAFTAR TRANSAKSI
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="#">Dashboard</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Transaksi</a>
                <i class="fa fa-angle-right"></i>
            </li>
        </ul>
        <div class="page-toolbar">
            <!-- tempat action button -->
        </div>
    </div>
    <div class="portlet">
        <div class="portlet-title">
            <div class="caption"><b>Daftar Transaksi</b></div>
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pembeli</th>
                            <th>Kasir</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $d->id }}</td>
                                <td>{{ $d->buyer->name }}</td>
                                <td>{{ $d->user->name }}</td>
                                <td>{{ $d->transaction_date }}</td>
                                <td>
                                    <a class="btn btn-info" data-toggle='modal' href="#basic"
                                        onclick="getDetailData({{ $d->id }});">Detail</a>

                                    <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content" id="showproducts">
                                                <!--loading animated gif can put here-->
                                                <div class="modal-header">
                                                    <h3 class="modal-title">Detail Transaksi</h3>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true"></button>
                                                    </button>
                                                </div>
                                                <div class="modal-body" id='msg'>
                                                    coba
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Close</button>
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
@section('javascript')
    <script>
        function getDetailData(id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('transaction.showAjax') }}',
                data: '_token= <?php echo csrf_token(); ?> &id=' + id,
                success: function(data) {
                    $("#msg").html(data.msg);
                }
            })
        }
    </script>
@endsection

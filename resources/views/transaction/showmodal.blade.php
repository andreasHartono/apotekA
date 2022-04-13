<div class="portlet">
    <section class="portlet-title">
        <b>Tampilan Transaksi dari: {{ $data->id }} - {{ $data->transaction_date }}</b>
    </section>

    <main class="portlet-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
                <tr>

                  @foreach ($medicine as $d)
                  <tr>
                     <td>{{ $d->generic_name }} </td>
                     <td>{{ $d->price }} </td>
                     <td>{{ $d->pivot->quantity }} </td>
                     <td>{{ $d->pivot->quantity * $d->pivot->price }} </td>
                  </tr>
                  @endforeach
                </tr>
            </table>
        </div>
    </main>
</div>


<div class="portlet">
    <section class="portlet-title">
        <b>Tampilan Transaksi dari: {{ $data->id }} - {{ $data->transaction_date }}</b>
    </section>

    <main class="portlet-body">
        <div class="row">
           <div class="col-lg-12">
               <table class="table table-striped table-responsive">
                  <thead>
                     <tr>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                     </tr>
                  </thead>
                  <tbody>
                        @foreach ($medicine as $d)
                        <tr>
                           <td>{{ $d->generic_name }} </td>
                           <td>{{ $d->price }} </td>
                           <td>{{ $d->pivot->quantity }} </td>
                           <td>{{ $d->pivot->quantity * $d->pivot->price }} </td>
                        </tr>
                        @endforeach
                  </tbody>
               </table>
           </div>
        </div>
    </main>
</div>


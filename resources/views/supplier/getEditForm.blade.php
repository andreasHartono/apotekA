<form role="form" method="POST" action="{{ url('suppliers/'.$data->id) }}" class="form-horizontal">
    @csrf
    @method('PUT')
    <div class="modal-header">
        <button type="button" class="close"
          data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Add New Supplier</h4>
     </div>
    <div class="modal-body">
      <div class="form-body">
         <div class="form-group">
            <label class="control-label col-md-3">Nama</label>
            <div class="col-md-8">
               <input type="text" name="name" data-required="1" class="form-control" value="{{ $data->name }}">
            </div>
         </div>
         <div class="form-group">
            <label class="control-label col-md-3">Alamat</label>
            <div class="col-md-8">
               <textarea name="address" class="form-control" rows="3" required>{{ $data->address }}</textarea>
            </div>
         </div>
         <div class="modal-footer">
            <button type="submit" class="btn btn-info p-3">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
    </div>
</form>

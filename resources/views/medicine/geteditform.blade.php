<form role="form" method="POST" action="{{ url('medicines/' . $data->id) }}" class="form-horizontal">
    @csrf
    @method('PUT')
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Edit Medicine (Modal)</h4>
    </div>
    <div class="modal-body">
        <div class="form-body">
            <div class="form-group">
                <label class="control-label col-md-3">Nama</label>
                <div class="col-md-8">
                    <input type="text" name="name" class="form-control" value="{{ $data->generic_name }}"required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Form</label>
                <div class="col-md-8">
                    <input type="text" name="form" class="form-control" value="{{ $data->form }}" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Formula</label>
                <div class="col-md-8">
                    <input type="text" name="restriction_formula" class="form-control" value="{{ $data->restriction_formula }}"
                        required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Price</label>
                <div class="col-md-8">
                    <input type="number" name="price" class="form-control"value="{{ $data->price }}" required>
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
                        <div class="form-check">
                            <input type="checkbox" name="faskes" id="faskes1" value="{{ $data->faskes1 }}">
                            <label for="faskes1">Faskes 1</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="faskes" id="faskes2" value="{{ $data->faskes2 }}">
                            <label for="faskes2">Faskes 2</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="faskes" id="faskes3" value="{{ $data->faskes3 }}">
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

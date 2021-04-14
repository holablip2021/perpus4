@include(Session::get('main'))
<hr class="featurette-divider border-0 bg-white">
<section id="aboutme">
    {{ Session::get('status') }}
<div class="col-12 col-md-7 order-md-2">
            <form action={{ url('/penyesuaian/baru') }} method="post" >
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="field_judul">Nama / Judul Produk</label>
                    <input type="text" name="field_judul" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="field_pengarang">Pengarang</label>
                    <input type="text" name="field_pengarang" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="field_kategori">Kategori</label>
                    <input type="text" name="field_kategori" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="field_rak">Rak</label>
        						<select id="field_rak" name="field_rak" class="form-control" aria-label="multiple select example" required>
                    @foreach ($resultsRak as $rows)
                      <option value="{{$rows->id}}">{{$rows->deskripsi}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="field_date">Tanggal</label>
                    <input type="date" name="field_date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="field_qty">Qty</label>
                    <input type="number" name="field_qty" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="field_deskripsi">Deskripsi Produk</label>
                    <input type="text" name="field_deskripsi" class="form-control" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="field_submit" class="form-control btn-primary" value="Submit">Simpan</button>
                </div>
            </form>
  
</div>        
</section>
</body>
</html>

<div class="modal" tabindex="-1" id="form_ask">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Data</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        <div id="delete_id"></div>
        <form action="{{ url('/hapus/' ) }}" method = "post">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="hidden" id="field_id" name="field_id" class="form-control" required>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Hapus</button>
      </div>
    </div>
  </div>
</div>



    <script type="text/javascript">
        function form_ask(id) {
            $('#delete_id').html("<p>Apakah Id nomor "+ id + " akan dihapus ?</p>")
            $('#field_id').val(id)
            $("#form_ask").modal()
        }
    </script>

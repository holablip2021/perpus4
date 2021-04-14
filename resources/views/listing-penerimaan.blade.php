@include(Session::get('main'))
<hr class="featurette-divider border-0 bg-white">
<section id="aboutme">
   {{ Session::get('status') }}
<div class="col-12 col-md-7 order-md-2">
    <table class="table table-bordered">
    <thead>
    <tr>
    <th>No.</th>
    <th>Tanggal Pesan</th>
    <th>User Id</th>
    <th>Buku Id</th>
    <th>Qty</th>
    <th>Tgl. Pinjam</th>
    <th>Tgl. Kembali</th>
    <th>Catatan</th>
    <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    @foreach($results as $rows)
  <form action={{ url('/penerimaan/proses/' . $rows->id ) }} method="post" >
  {{ csrf_field() }}
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $rows->created_at }}</td>
        <td>{{ $rows->user_id }}</td>
        <td>{{ $rows->buku_id }}</td>
        <td>{{ $rows->qty }}</td>
        <td>{{ $rows->tgl_pinjam }}</td>
        <td><input type="date" name="tgl_kembali"></td>
        <td>{{ $rows->deskripsi }}</td>
        <td><button type="submit" class="btn btn-primary" >Proses Administrasi</button></td>
  </form>
    </tr>    
    @endforeach
    </tbody>
    </table>
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

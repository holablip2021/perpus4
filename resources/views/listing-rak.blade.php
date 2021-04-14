@include(Session::get('main'))

<hr class="featurette-divider border-0 bg-white">
<section id="aboutme">
    {{ Session::get('status') }}
<div class="col-12 col-md-7 order-md-2">
  <button type="button" onclick= "form_ask()" class="btn btn-primary">Tambah Data</button>
    <table class="table table-bordered">
    <thead>
    <tr>
    <th>Id</th>
    <th>Deskripsi</th>
    <th>Aksi</th>    
    </tr>
    </thead>
    <tbody>
    @foreach($results as $rows)
    <tr>
        <td>{{ $rows->id }}</td>
        <td>{{ $rows->deskripsi }}</td>
        <td><a href="{{ url('/rak/list/'.$rows->id ) }}" class="btn btn-primary" >Rubah</a></td>
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
        <h5 class="modal-title">Tambah Data</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        <div id="delete_id"></div>
        <form action="{{ url('/rak/add' ) }}" method = "post">
            {{ csrf_field() }}
            <div class="mb-3">
              <label for="reg_nama" class="form-label">Nama Rak</label>
              <input type="text" class="form-control" id="field_deskripsi_rak" name="field_deskripsi_rak" required>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>


    <script type="text/javascript">
        function form_ask() {
            $("#form_ask").modal()
        }

    </script>

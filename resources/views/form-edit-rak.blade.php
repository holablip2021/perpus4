@include(Session::get('main'))

<hr class="featurette-divider border-0 bg-white">
<section id="aboutme">
    {{ Session::get('status') }}
<div class="col-12 col-md-7 order-md-2">
        <form action="{{ url('/rak/update/'.$results->id ) }}" method = "get">
            {{ csrf_field() }}
            <div class="mb-3">
              <label for="reg_nama" class="form-label">Nama Rak</label>
              <input type="text" class="form-control" id="field_deskripsi_rak" name="field_deskripsi_rak" value = "{{ $results->deskripsi }}" required>
            </div>
            <div class="mb-3">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>

</div>        
</section>
</body>
</html>


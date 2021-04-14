<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<hr class="featurette-divider border-0 bg-white">
<section id="aboutme">
    <?php echo e(Session::get('status')); ?>

<div class="col-12 col-md-7 order-md-2">
            <form action=<?php echo e(url('pengguna/validasi')); ?> method="post" >
            <?php echo e(csrf_field()); ?>

  <div class="mb-3">
    <label for="Email" class="form-label">Email Anda</label>
    <input type="email" class="form-control" id="Email" name="Email" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="Password" class="form-label">Sandi Anda</label>
    <input type="password" class="form-control" id="Password" name="Password">
  </div>
  <div class="mb-3">
    <label for="role" class="form-label">Masuk Sebagai</label>
    <select class="form-control" name = "role" id = "role" aria-label="Default select example">
      <option value="1">ADMIN</option>
      <option value="2">MEMBER</option>
    </select>
  </div>
  <div id="register-link" class="text-right">
      <button type = "button" onclick="form_ask();" class="btn btn-success">Registrasi disini</button>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  
</div>        
</section>
</body>
</html>

<div class="modal" tabindex="-1" id="form_ask">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Registrasi Baru</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        <div id="delete_id"></div>
        <form action="<?php echo e(url('/pengguna/registrasi' )); ?>" method = "post">
            <?php echo e(csrf_field()); ?>

            <div class="mb-3">
              <label for="reg_nama" class="form-label">Nama Anda</label>
              <input type="text" class="form-control" id="reg_nama" name="reg_nama" required>
            </div>
            <div class="mb-3">
              <label for="reg_alamat" class="form-label">Alamat Anda</label>
              <input type="text" class="form-control" id="reg_alamat" name="reg_alamat" required>
            </div>
            <div class="mb-3">
              <label for="reg_telp" class="form-label">Nomor Telepon Anda</label>
              <input type="text" class="form-control" id="reg_telp" name="reg_telp" required>
            </div>
            <div class="mb-3">
              <label for="reg_role" class="form-label">Sebagai</label>
              <select class="form-control" name = "reg_role" id = "reg_role" aria-label="Default select example" required>
                <option value="1">ADMIN</option>
                <option value="2">MEMBER</option>
              </select>
            </div>            
            <div class="mb-3">
              <label for="reg_email" class="form-label">Email Anda</label>
              <input type="email" class="form-control" id="reg_email" name="reg_email" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
              <label for="reg_password" class="form-label">Sandi Anda</label>
              <input type="password" class="form-control" id="reg_password" name="reg_password" required>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Registrasi</button>
      </div>
    </div>
  </div>
</div>



    <script type="text/javascript">
        function form_ask() {
            $("#form_ask").modal()
        }
    </script>

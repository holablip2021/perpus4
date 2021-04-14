<?php echo $__env->make(Session::get('main'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<hr class="featurette-divider border-0 bg-white">
<section id="aboutme">
    <?php echo e(Session::get('status')); ?>

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
    <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($rows->id); ?></td>
        <td><?php echo e($rows->deskripsi); ?></td>
        <td><a href="<?php echo e(url('/rak/list/'.$rows->id )); ?>" class="btn btn-primary" >Rubah</a></td>
    </tr>    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        <form action="<?php echo e(url('/rak/add' )); ?>" method = "post">
            <?php echo e(csrf_field()); ?>

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

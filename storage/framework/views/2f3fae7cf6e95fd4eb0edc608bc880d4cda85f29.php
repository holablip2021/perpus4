<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<hr class="featurette-divider border-0 bg-white">
<section id="aboutme">
  <?php echo e(Session::get('status')); ?>

<div class="col-12 col-md-7 order-md-2">
    <table class="table table-bordered">
    <thead>
    <tr>
    <th>No.</th>
    <th>Tanggal Pesan</th>
    <th>User Id</th>
    <th>Buku Id</th>
    <th>Qty</th>
    <th>Tanggal Peminjaman</th>
    <th>Catatan</th>
    <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <form action=<?php echo e(url('/order/proses/' . $rows->id )); ?> method="post" >
  <?php echo e(csrf_field()); ?>

    <tr>
        <td><?php echo e($loop->iteration); ?></td>
        <td><?php echo e($rows->created_at); ?></td>
        <td><?php echo e($rows->user_id); ?></td>
        <td><?php echo e($rows->buku_id); ?></td>
        <td><?php echo e($rows->qty); ?></td>
        <td><input type="date" name="tgl_pinjam"></td>
        <td><input type="text" name="catatan"></td>
        <td><button type="submit" class="btn btn-primary" >Proses Administrasi</button></td>
    </tr>    
  </form>
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
        <h5 class="modal-title">Hapus Data</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        <div id="delete_id"></div>
        <form action="<?php echo e(url('/hapus/' )); ?>" method = "post">
            <?php echo e(csrf_field()); ?>

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

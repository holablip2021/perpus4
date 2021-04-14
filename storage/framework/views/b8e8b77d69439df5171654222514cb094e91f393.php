<?php echo $__env->make(Session::get('main'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<hr class="featurette-divider border-0 bg-white">
<section id="aboutme">
    <?php echo e(Session::get('status')); ?>  
<div class="col-12 col-md-7 order-md-2">
        <form action="<?php echo e(url('order/'. $results['buku_id'] )); ?>" method = "post">
            <?php echo e(csrf_field()); ?>


    <table class="table table-bordered">
    <thead>
    <tr>
    <th>Id</th>
    <th>Stok Tersedia</th>
    <th>Qty Pinjam</th>
    <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?php echo e($results['buku_id']); ?></td>
        <td><?php echo e($results['stok']); ?></td>
        <td>
        <select class="form-control" id="field_qty" name="field_qty" aria-label="Default select example" required>
        <?php for($i=1;$i<=$results['stok'];$i++): ?>
        <option value=<?php echo e($i); ?>><?php echo e($i); ?></option>
        <?php endfor; ?>
        </select>
        </td>
        <td><button type="submit" class="btn btn-primary" >Proses Pinjam</button></td>
    </tr>    
    </tbody>
    </table>
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
        <form action="<?php echo e(url('/hapus/' )); ?>" method = "post">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
                <input type="hidden" id="field_id" name="field_id" class="form-control" required>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Hapus</button>
      </div>
    </div>
  </div>
</div>



    <script type="text/javascript">
var nilai=null;

function tes(){
  temp = calc()
$('#field_qty').val(temp)  
}

function calc(){
  if(nilai >1){nilai = 0}
  nilai++
  return nilai
}


        function form_ask(id) {
            $('#delete_id').html("<p>Apakah Id nomor "+ id + " akan dihapus ?</p>")
            $('#field_id').val(id)
            $("#form_ask").modal()
        }
    </script>

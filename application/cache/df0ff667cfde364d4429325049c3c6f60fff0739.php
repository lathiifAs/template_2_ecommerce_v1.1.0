<?php if(!empty($tipe)): ?>
    <?php if($tipe == 'Sukses'): ?>
    <div class="alert alert-success" style="margin-top: 20px">
        <label ><strong><?php echo e($tipe); ?>,</strong> <?php echo e($pesan); ?></label>
    </div>
    <?php else: ?>
    <div class="alert alert-danger" style="margin-top: 20px">
        <label ><strong><?php echo e($tipe); ?>,</strong> <?php echo e($pesan); ?></label>
    </div>
    <?php endif; ?>
<?php endif; ?>
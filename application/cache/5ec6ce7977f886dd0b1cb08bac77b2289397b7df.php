<?php if(!empty($content)): ?>
    <?php echo $__env->make($content, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>
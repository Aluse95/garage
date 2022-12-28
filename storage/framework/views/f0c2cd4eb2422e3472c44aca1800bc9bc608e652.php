<?php if($paginator->hasPages()): ?>
  <ul class="pagination pagination-rounded pagination-lg">
    
    <?php if($paginator->onFirstPage()): ?>
      <li class="page-item disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">
        <a class="page-link">
          <span aria-hidden="true">«</span>
        </a>
      </li>
    <?php else: ?>
      <li class="page-item ">
        <a class="page-link" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev"
          aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">
          <span aria-hidden="true">«</span>
        </a>
      </li>
    <?php endif; ?>

    
    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      
      <?php if(is_string($element)): ?>
        <li class="page-item "><a class="page-link"><?php echo e($element); ?></a></li>
      <?php endif; ?>

      
      <?php if(is_array($element)): ?>
        <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($page == $paginator->currentPage()): ?>
            <li class="page-item active"><a class="page-link"><?php echo e($page); ?></a>
            </li>
          <?php else: ?>
            <li class="page-item "><a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
            </li>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
    <?php if($paginator->hasMorePages()): ?>
      <li class="page-item ">
        <a class="page-link" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next"
          aria-label="<?php echo app('translator')->get('pagination.next'); ?>">
          <span aria-hidden="true">»</span>
        </a>
      </li>
    <?php else: ?>
      <li class="page-item disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">
        <a class="page-link">
          <span aria-hidden="true">»</span>
        </a>
      </li>
    <?php endif; ?>
  </ul>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\garage\resources\views/frontend/pagination/default.blade.php ENDPATH**/ ?>
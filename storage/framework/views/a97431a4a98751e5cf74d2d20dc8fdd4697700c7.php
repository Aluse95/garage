<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : '';
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
    $delay = $delay2 = 0;
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
    $row = floor(count($block_childs)/2);
    $arr = $block_childs->chunk($row);
  ?>

  <!-- START WHY CHOOSE -->
  <div class="section bg-transparent my-0">
    <div class="container clearfix">
      <div class="heading-block center">
        <h2><?php echo e($title); ?></h2>
        <span class="mx-auto"><?php echo e($brief); ?></span>
      </div>

      <div class="row col-mb-50 mb-4">
        <div class="col-lg-4 col-md-6">
          <?php if($arr): ?>
          <?php $__currentLoopData = $arr[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title_child = $item->json_params->title->{$locale} ?? $item->title;
              $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
              $content_child = $item->json_params->content->{$locale} ?? $item->content;
              $image_child = $item->image != '' ? $item->image : null;
              $url_link = $item->url_link != '' ? $item->url_link : 'javascript:void(0)';
              $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
              $icon = $item->icon != '' ? $item->icon : '';
              $style = $item->json_params->style ?? '';
            ?>
 
            <div class="feature-box flex-md-row-reverse text-md-end <?php echo e($delay ? 'mt-5' : ''); ?>" data-animate="fadeIn" data-delay="<?php echo e($delay); ?>">
              <div class="fbox-icon">
                <a href="#"><i class="<?php echo e($icon); ?>"></i></a>
              </div>
              <div class="fbox-content">
                <h3><?php echo e($title_child); ?></h3>
                <p><?php echo e($content_child); ?></p>
              </div>
            </div>
            <div class="d-none"><?php echo e($delay += 200); ?></div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </div>
        <div class="col-lg-4 d-md-none d-lg-block text-center">
          <img src="<?php echo e($image); ?>" alt="car tire" style="max-width: 80%"/>
        </div>
        <div class="col-lg-4 col-md-6">
          <?php if($arr): ?>
          <?php $__currentLoopData = $arr[1]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title_child = $item->json_params->title->{$locale} ?? $item->title;
              $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
              $content_child = $item->json_params->content->{$locale} ?? $item->content;
              $image_child = $item->image != '' ? $item->image : null;
              $url_link = $item->url_link != '' ? $item->url_link : 'javascript:void(0)';
              $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
              $icon = $item->icon != '' ? $item->icon : '';
              $style = $item->json_params->style ?? '';
            ?>

            <div class="feature-box <?php echo e($delay2 ? 'mt-5' : ''); ?>" data-animate="fadeIn" data-delay="<?php echo e($delay2); ?>">
              <div class="fbox-icon">
                <a href="#"><i class="<?php echo e($icon); ?>"></i></a>
              </div>
              <div class="fbox-content">
                <h3><?php echo e($title_child); ?></h3>
                <p><?php echo e($content_child); ?></p>
              </div>
            </div>
            <div class="d-none"><?php echo e($delay2 += 200); ?></div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <!-- END WHY CHOOSE -->

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\garage\resources\views/frontend/blocks/custom/styles/core_value.blade.php ENDPATH**/ ?>
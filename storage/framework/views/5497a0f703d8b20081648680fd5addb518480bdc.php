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
    
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  ?>

  <!-- START TESTIMONIALS -->
  <div id="garage-testimonial" class="section dark my-0">
    <div class="container">
      <div class="heading-block center">
        <h3><?php echo e($title); ?></h3>
      </div>
      <div
        id="oc-testi"
        class="owl-carousel testimonials-carousel carousel-widget"
        data-margin="20"
        data-items-sm="1"
        data-items-md="2"
        data-items-xl="3"
      >
      <?php if($block_childs): ?>
      <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

        <div class="oc-item">
            <div class="testimonial">
              <div class="testi-image">
                <a href="#"
                  ><img
                    src="<?php echo e($image_child); ?>"
                    alt="Customer Testimonails"
                /></a>
              </div>
              <div class="testi-content">
                <p><?php echo e($content_child); ?></p>
                <div class="testi-meta">
                    <?php echo e($title_child); ?>

                  <span><?php echo e($brief_child); ?></span>
                </div>
              </div>
            </div>
          </div>
        
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
        
      </div>
    </div>
  </div>
  <!-- END TESTIMONIALS -->

<?php endif; ?>


<?php /**PATH C:\xampp\htdocs\garage\resources\views/frontend/blocks/banner/styles/slide.blade.php ENDPATH**/ ?>
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
  <!-- START BLOGS -->
  <div class="section mt-0 border-top-0 mb-0">
    <div class="container">
      <div class="heading-block center">
        <h3><?php echo e($title); ?></h3>
      </div>
      <div
        id="posts"
        class="post-grid row grid-container gutter-40 clearfix"
        data-layout="fitRows"
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
        <div class="entry col-md-4 col-sm-6 col-12">
          <div class="grid-inner">
            <div class="entry-image">
              <a href="#" data-lightbox="image">
                <img src="<?php echo e($image_child); ?>" alt="Standard Post with Image"/>
              </a>
            </div>
            <div class="entry-title">
              <h2>
                <a href="blog-single.html"><?php echo e($title_child); ?></a>
              </h2>
            </div>
            <div class="entry-meta">
              <ul>
                <li><i class="icon-calendar3"></i><?php echo e($content_child); ?></li>
                <li>
                  <a href="blog-single.html#comments"><i class="icon-comments"></i> 13</a>
                </li>
                <li>
                  <a href="#"><i class="<?php echo e($icon); ?>"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
        
      </div>
    </div>
  </div>
  <!-- END BLOGS -->
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\garage\resources\views/frontend/blocks/custom/styles/about_development.blade.php ENDPATH**/ ?>
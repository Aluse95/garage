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

  <!-- START CLIENTS -->

  <div class="section my-0">
    <div class="container clearfix">
      <div class="heading-block">
        <h3><?php echo e($title); ?></h3>
      </div>
      <div
        id="oc-clients"
        class="owl-carousel image-carousel carousel-widget"
        data-margin="60"
        data-loop="true"
        data-nav="false"
        data-autoplay="5000"
        data-pagi="false"
        data-items-xs="2"
        data-items-sm="3"
        data-items-md="4"
        data-items-lg="5"
        data-items-xl="6"
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
          <a href="#"
            ><img src="<?php echo e($image_child); ?>" alt="Clients"
          /></a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
      </div>
    </div>
  </div>
  <!-- END CLIENTS -->
<?php endif; ?>
<?php /**PATH /home/fhmagency/domains/fhmagency.vn/public_html/garage/resources/views/frontend/blocks/custom/styles/about_client.blade.php ENDPATH**/ ?>
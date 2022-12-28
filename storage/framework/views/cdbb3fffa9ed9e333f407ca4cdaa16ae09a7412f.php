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
    $items = [];
    $i = 0;
    foreach ($block_childs as $item) {
        $items[$i] = $item;
        $i++;
    }
  ?>

  <!-- START ABOUT US -->

  <div class="section bg-transparent">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-7 align-self-end">
          <div class="overflow-hidden">
            <img src="<?php echo e($image); ?>" data-animate="fadeInUp" data-delay="100" alt="Chrome"/>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="heading-block">
            <h1><?php echo $brief; ?></h1>
          </div>
          <p class="lead"><?php echo $content; ?></p>
        </div>
      </div>
    </div>
  </div>

  <!-- END ABOUT US -->
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\garage\resources\views/frontend/blocks/custom/styles/intro.blade.php ENDPATH**/ ?>
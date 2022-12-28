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

  <!-- START CONTACT -->
  <div id="garage-contact" class="section my-0">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-12 dark">
          <h4 class="display-4 fw-bold mb-0">
            <?php echo e($brief); ?>

          </h4>
        </div>
        <div class="col-lg-4 col-sm-12">
            <a href="<?php echo e($url_link); ?>" class="button button-border button-light button-large mt-3">
                <?php echo e($title); ?>

            </a>
        </div>
      </div>
    </div>
  </div>
  <!-- END CONTACT -->

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\garage\resources\views/frontend/blocks/custom/styles/contact.blade.php ENDPATH**/ ?>
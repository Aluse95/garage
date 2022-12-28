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
  <!-- START SERVICE -->
  <div id="garage-service" class="section mb-0">
    <div class="container">
      <div class="dark mb-5">
        <h1 class="mb-0"><?php echo $title; ?></h1>
        <p class="lead">
          <?php echo $content; ?>

        </p>
      </div>

      <!-- Portfolio Items
      ============================================= -->
      <div id="portfolio" class="portfolio row grid-container gutter-30"data-layout="fitRows">
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
            
            <article class="portfolio-item col-md-4 col-sm-6 col-12 pf-media pf-icons">
              <div class="grid-inner">
                <div class="portfolio-image">
                  <a href="portfolio-single.html">
                    <img
                      src="<?php echo e($image_child); ?>"
                      alt="Open Imagination"
                    />
                  </a>
                  <div class="bg-overlay">
                    <div
                      class="bg-overlay-content dark"
                      data-hover-animate="fadeIn"
                    >
                      <a
                        href="portfolio-single.html"
                        class="overlay-trigger-icon bg-light text-dark"
                        data-hover-animate="fadeInDownSmall"
                        data-hover-animate-out="fadeOutUpSmall"
                        data-hover-speed="350"
                        ><i class="icon-line-ellipsis"></i
                      ></a>
                    </div>
                    <div
                      class="bg-overlay-bg dark"
                      data-hover-animate="fadeIn"
                    ></div>
                  </div>
                </div>
                <div class="portfolio-desc">
                  <h3>
                    <a href="portfolio-single.html"><?php echo $title_child; ?></a>
                  </h3>
                  <span><?php echo $brief_child; ?></span>
                </div>
              </div>
            </article>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>
      
      
      <!-- #portfolio end -->
    </div>
  </div>
  <!-- END SERVICE -->
<?php endif; ?>
<?php /**PATH /home/fhmagency/domains/fhmagency.vn/public_html/garage/resources/views/frontend/blocks/custom/styles/about_vision.blade.php ENDPATH**/ ?>
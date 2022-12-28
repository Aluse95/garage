<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $background = $block->image_background != '' ? $block->image_background : url('assets/img/banner.jpg');
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
    
    $params['status'] = App\Consts::POST_STATUS['active'];
    $params['is_featured'] = true;
    $params['is_type'] = App\Consts::POST_TYPE['service'];
    
    $rows = App\Http\Services\ContentService::getCmsPost($params)->take(3)->get();
    
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
        <?php if($rows): ?>
          <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title = $item->json_params->title->{$locale} ?? $item->title;
              $brief = $item->json_params->brief->{$locale} ?? $item->brief;
              $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
              $date = date('H:i d/m/Y', strtotime($item->created_at));
              // Viet ham xu ly lay slug
              $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['service'], $item->taxonomy_title, $item->taxonomy_id);
              $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['service'], $title, $item->id, 'detail', $item->taxonomy_title);
            ?>
            
            <article class="portfolio-item col-md-4 col-sm-6 col-12 pf-media pf-icons">
              <div class="grid-inner">
                <div class="portfolio-image">
                  <a href="<?php echo e($alias); ?>">
                    <img style="height: 300px"
                      src="<?php echo e($image); ?>"
                      alt="Open Imagination"
                    />
                  </a>
                  <div class="bg-overlay">
                    <div
                      class="bg-overlay-content dark"
                      data-hover-animate="fadeIn"
                    >
                      <a
                        href="<?php echo e($alias); ?>"
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
                    <a href="<?php echo e($alias); ?>"><?php echo $title; ?></a>
                  </h3>
                  <span><?php echo $brief; ?></span>
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
<?php /**PATH C:\xampp\htdocs\garage\resources\views/frontend/blocks/cms_service/styles/default.blade.php ENDPATH**/ ?>
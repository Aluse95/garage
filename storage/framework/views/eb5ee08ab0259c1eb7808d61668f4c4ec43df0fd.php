

<?php
  $title = $detail->json_params->title->{$locale} ?? $detail->title;
  $brief = $detail->json_params->brief->{$locale} ?? null;
  $content = $detail->json_params->content->{$locale} ?? null;
  $image = $detail->image != '' ? $detail->image : null;
  $image_thumb = $detail->image_thumb != '' ? $detail->image_thumb : null;
  $date = date('H:i d/m/Y', strtotime($detail->created_at));
  
  // For taxonomy
  $taxonomy_json_params = json_decode($detail->taxonomy_json_params);
  $taxonomy_title = $taxonomy_json_params->title->{$locale} ?? $detail->taxonomy_title;
  $image_background = $taxonomy_json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? null);
  $taxonomy_alias = Str::slug($taxonomy_title);
  $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['service'], $taxonomy_alias, $detail->taxonomy_id);
  
  $seo_title = $detail->json_params->seo_title ?? $title;
  $seo_keyword = $detail->json_params->seo_keyword ?? null;
  $seo_description = $detail->json_params->seo_description ?? $brief;
  $seo_image = $image ?? ($image_thumb ?? null);
  
  // schema information
  $datePublished = date('Y-m-d', strtotime($detail->created_at));
  $dateModified = date('Y-m-d', strtotime($detail->updated_at));
?>

<?php $__env->startPush('style'); ?>
  <style>
    #content-detail {
      text-align: justify;
    }

    #content-detail h2 {
      font-size: 30px;
    }

    #content-detail h3 {
      font-size: 24px;
    }

    #content-detail h4 {
      font-size: 18px;
    }

    #content-detail h5,
    #content-detail h6 {
      font-size: 16px;
    }

    #content-detail p {
      margin-top: 0;
      margin-bottom: 0;
    }

    #content-detail h1,
    #content-detail h2,
    #content-detail h3,
    #content-detail h4,
    #content-detail h5,
    #content-detail h6 {
      margin-top: 0;
      margin-bottom: .5rem;
    }

    #content-detail p+h2,
    #content-detail p+.h2 {
      margin-top: 1rem;
    }

    #content-detail h2+p,
    #content-detail .h2+p {
      margin-top: 1rem;
    }

    #content-detail p+h3,
    #content-detail p+.h3 {
      margin-top: 0.5rem;
    }

    #content-detail h3+p,
    #content-detail .h3+p {
      margin-top: 0.5rem;
    }

    #content-detail ul,
    #content-detail ol {
      list-style: inherit;
      padding: 0 0 0 50px;

    }

    #content-detail ul li {
      display: list-item;
      list-style: initial;
    }

    #content-detail ol li {
      display: list-item;
      list-style: decimal;
    }

    .posts-sm .entry-image {
      width: 75px;
    }

    #content-detail img {
      max-width: 100%;
      width: auto !important;
    }

    body.light #content-detail p {
      color: #000 !important;
      font-weight: 400 !important;
    }
  </style>
  <style>
    .page-title-area {
      background-image: url('<?php echo e($image_background); ?>');
      background-position: center center;
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('schema'); ?>
  <script type="application/ld+json">
  {
      "@context": "https://schema.org/",
      "@type": "BlogPosting",
      "@id": "<?php echo e(Request::fullUrl()); ?>",
      "mainEntityOfPage": "<?php echo e(Request::fullUrl()); ?>",
      "headline": "<?php echo e($seo_title); ?>",
      "name": "<?php echo e($seo_title); ?>",
      "description": "<?php echo e($seo_description); ?>",
      "datePublished": "<?php echo e($datePublished); ?>",
      "dateModified": "<?php echo e($dateModified); ?>",
      "author": {
          "@type": "Person",
          "name": "<?php echo e($web_information->information->site_name ?? ''); ?>",
          "url": "<?php echo e(Request::root()); ?>",
          "image": {
              "@type": "ImageObject",
              "@id": "<?php echo e($web_information->image->logo_header ?? ''); ?>",
              "url": "<?php echo e($web_information->image->logo_header ?? ''); ?>",
              "height": "125",
              "width": "125"
          }
      },
      "publisher": {
          "@type": "Organization",
          "@id": "<?php echo e(Request::root()); ?>",
          "name": "<?php echo e($web_information->information->site_name ?? ''); ?>",
          "logo": {
              "@type": "ImageObject",
              "@id": "<?php echo e($web_information->image->logo_header ?? ''); ?>",
              "url": "<?php echo e($web_information->image->logo_header ?? ''); ?>",
              "width": "125",
              "height": "125"
          }
      },
      "image": {
          "@type": "ImageObject",
          "@id": "<?php echo e($seo_image); ?>",
          "url": "<?php echo e($seo_image); ?>",
          "height": "362",
          "width": "388"
      },
      "url": "<?php echo e(Request::fullUrl()); ?>",
      "isPartOf": {
          "@type" : "Blog",
           "@id": "<?php echo e($alias_category); ?>",
           "name": "<?php echo e($taxonomy_title ?? ''); ?>",
           "publisher": {
               "@type": "Organization",
               "@id": "<?php echo e(Request::root()); ?>",
               "name": "<?php echo e($web_information->information->site_name ?? ''); ?>"
           }
       }
  }
  </script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  
  
  <section id="page-title" class="page-title-parallax page-title-center page-title"
    style="background-image: url('<?php echo e($image_background); ?>'); background-size: cover;"
    data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px;">
    <div id="particles-line"></div>

    <div class="container clearfix mt-4">
      
      <ol class="breadcrumb d-none">
        <li class="breadcrumb-item"><a href="<?php echo e(route('frontend.home')); ?>"><?php echo app('translator')->get('Home'); ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo e($page->name ?? ''); ?></li>
      </ol>
      <h1 class=""><?php echo e($title); ?></h1>
    </div>
  </section>

  <section id="content">

    <div class="content-wrap">
      <div class="container mb-3">

        <div class="row">
          <div class="col-md-6">
            <div style="overflow: hidden">
              <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" class="mb-5 img-main" />
            </div>
          </div>
          <div class="col-md-6">
            <div id="content-detail" class="pb-3 mb-3">
              <h2 class="text-uppercase"><?php echo e($title); ?></h2>
              <div class="clear line my-2"></div>
              <?php echo $content; ?>

            </div>
            <?php if(isset($detail->json_params->catalog)): ?>
              <a href="<?php echo e($detail->json_params->catalog); ?>" target="_blank"
                class="button button-border button-rounded button-fill button-green button-large ls0 mt-0 mb-3 mx-0">
                <span>CATALOG FILE <i class="icon-files"></i></span>
              </a>
            <?php endif; ?>
            <?php if(isset($detail->json_params->shop_online)): ?>
              <a href="<?php echo e($detail->json_params->shop_online); ?>" target="_blank"
                class="button button-border button-rounded button-fill button-green button-large ls0 mt-0 mb-3 mx-0">
                <span>SHOP ONLINE <i class="icon-line-shopping-cart"></i></span>
              </a>
            <?php endif; ?>

            <div class="si-share border-0 d-flex align-items-center">
              Chia sẻ:
              <div>
                <a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo e(Request::fullUrl()); ?>"
                  class="social-icon si-borderless si-facebook">
                  <i class="icon-facebook"></i>
                  <i class="icon-facebook"></i>
                </a>
                <a href="https://twitter.com/intent/tweet?url=<?php echo e(Request::fullUrl()); ?>"
                  class="social-icon si-borderless si-twitter">
                  <i class="icon-twitter"></i>
                  <i class="icon-twitter"></i>
                </a>
                <a href="https://www.instagram.com/cws/share?url=<?php echo e(Request::fullUrl()); ?>"
                  class="social-icon si-borderless si-instagram">
                  <i class="icon-instagram"></i>
                  <i class="icon-instagram"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <?php if(isset($detail->json_params->gallery_image)): ?>
              <h3 class="title-widget text-uppercase mt-4"><?php echo app('translator')->get('Gallery Image'); ?></h3>
              <div class="masonry-thumbs grid-container grid-3" data-lightbox="gallery">
                <?php $__currentLoopData = $detail->json_params->gallery_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <a class="grid-item img-hover" href="<?php echo e($value); ?>" data-lightbox="gallery-item">
                    <img src="<?php echo e($value); ?>" alt="<?php echo e($key); ?>">
                  </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            <?php endif; ?>

            <?php if(isset($relatedPosts) && count($relatedPosts) > 0): ?>
              <h3 class="title-widget text-uppercase mt-4"><?php echo app('translator')->get('Related Products'); ?></h3>
              <div class="related-posts row posts-md col-mb-30">
                <?php $__currentLoopData = $relatedPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    $title_item = $item->json_params->title->{$locale} ?? $item->title;
                    $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                    $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                    $date = date('d/m/Y', strtotime($item->created_at));
                    // Viet ham xu ly lay slug
                    $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $title_item, $item->id, 'detail', $item->taxonomy_title);
                  ?>
                  <div class="col-md-6 col-lg-4 product">
                    <article class="entry">
                      <div class="entry-image mb-3">
                        <a href="<?php echo e($alias); ?>" class="img-link"><img src="<?php echo e($image); ?>"
                            alt="<?php echo e($title_item); ?>"></a>

                        <div class="bg-overlay">
                          <div class="bg-overlay-content dark flex-column" data-hover-animate="fadeIn">
                            <div class="d-flex mb-3" style="width:75%">
                              <a href="<?php echo e($alias); ?>" data-hover-animate="fadeInDownSmall"
                                data-hover-animate-out="fadeOutDownSmall" data-hover-speed="1000"
                                style="border: 1px solid #FFFFFF;width:100%; text-align:center;"
                                class="bg-transparent text-light animated py-2 px-5 fadeOutDownSmall link-hover">
                                XEM CHI TIẾT
                                <i class="icon-line-arrow-right"></i>
                              </a>
                            </div>
                            <?php if(isset($item->json_params->shop_online)): ?>
                              <div class="d-flex" style="width:75%">
                                <a href="<?php echo e($item->json_params->shop_online ?? ''); ?>" data-hover-animate="fadeInUpSmall"
                                  data-hover-animate-out="fadeOutDownSmall" data-hover-speed="1000"
                                  style="border: 1px solid #FFFFFF; width:100%; text-align:center;"
                                  class="bg-transparent text-light animated py-2 px-5 fadeOutDownSmall link-hover">
                                  SHOP ONLINE
                                  <i class="icon-line-shopping-cart"></i>
                                </a>
                              </div>
                            <?php endif; ?>

                          </div>
                          <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                        </div>
                      </div>
                      <div class="entry-title text-center">
                        <h3><a href="<?php echo e($alias); ?>"><?php echo e($title_item); ?></a></h3>
                      </div>
                    </article>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </div>
  </section>
  

  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fhmagency/domains/fhmagency.vn/public_html/garage/resources/views/frontend/pages/service/detail.blade.php ENDPATH**/ ?>
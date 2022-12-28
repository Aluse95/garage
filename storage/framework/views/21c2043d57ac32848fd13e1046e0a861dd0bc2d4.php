<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/garage/css/bootstrap.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/garage/style.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/garage/css/swiper.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/garage/css/dark.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/garage/css/font-icons.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/garage/css/animate.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/garage/css/magnific-popup.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/garage/css/custom.css')); ?>" type="text/css" />

<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/garage/fhm_garage.css')); ?>" />

<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&amp;display=swap" rel="stylesheet" type="text/css"/>
<!-- Real Estate Demo Specific Stylesheet -->


<style>
  html {
    scroll-behavior: smooth;
  }

  :root {
    scroll-behavior: smooth;
  }

  :target:before {
    content: "";
    display: block;
    margin: 25px 0 0;
  }

  .breadcrumb-item+.breadcrumb-item::before {
    float: left;
    padding-right: 0.5rem;
    color: #6c757d;
    content: var(--bs-breadcrumb-divider, "/");
  }
</style>

<?php if(isset($web_information->source_code->header)): ?>
  <?php echo $web_information->source_code->header; ?>

<?php endif; ?>
<?php /**PATH /home/fhmagency/domains/fhmagency.vn/public_html/garage/resources/views/frontend/panels/styles.blade.php ENDPATH**/ ?>
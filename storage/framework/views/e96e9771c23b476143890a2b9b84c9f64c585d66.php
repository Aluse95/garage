<footer id="footer" class="dark">
  <div class="container">
    <!-- Footer Widgets
    ============================================= -->
    <div class="footer-widgets-wrap">
      <div class="row col-mb-50">
        <div class="col-lg-8">
          <div class="row col-mb-50">
            <div class="col-md-4">
              <div class="widget clearfix">
                <img src="<?php echo e($web_information->image->logo_footer ?? ''); ?>" alt="Logo footer" class="footer-logo" />
                <div style="background: url('<?php echo e(asset('themes/frontend/garage/images/world-map.png')); ?>') no-repeat center center; background-size: 100%;">
                  <abbr title="Phone Number"><strong>Hotline:</strong></abbr>
                  <?php echo e($web_information->information->phone ?? ''); ?><br />
                  <abbr title="Email Address"><strong>Email:</strong></abbr>
                  <?php echo e($web_information->information->email ?? ''); ?>

                </div>
              </div>
            </div>

            <?php if(isset($menu)): ?>
              <?php
                $footer_menu = $menu->filter(function ($item, $key) {
                    return $item->menu_type == 'footer' && ($item->parent_id == null || $item->parent_id == 0);
                });
                
                $content = '';
                foreach ($footer_menu as $main_menu) {
                    $url = $title = '';
                    $title = isset($main_menu->json_params->title->{$locale}) && $main_menu->json_params->title->{$locale} != '' ? $main_menu->json_params->title->{$locale} : $main_menu->name;
                    $content .= '<div class="col-md-4 d-flex flex-column align-items-center"><div class="widget widget_links clearfix">';
                    $content .= '<h4>' . $title . '</h4>';
                    $content .= '<ul>';
                    foreach ($menu as $item) {
                        if ($item->parent_id == $main_menu->id) {
                            $title = isset($item->json_params->title->{$locale}) && $item->json_params->title->{$locale} != '' ? $item->json_params->title->{$locale} : $item->name;
                            $url = $item->url_link;
                
                            $active = $url == url()->current() ? 'active' : '';
                
                            $content .= '<li><a href="' . $url . '">' . $title . '</a>';
                            $content .= '</li>';
                        }
                    }
                    $content .= '</ul>';
                    $content .= '</div></div>';
                }
                echo $content;
              ?>
            <?php endif; ?>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="row col-mb-50">
            <div class="col-md-5 col-lg-12">
              <div class="widget subscribe-widget clearfix">
                <h5>Li??n h??? v???i ch??ng t??i ngay h??m nay!</h5>
                <form id="widget-subscribe-form" action="<?php echo e(route('frontend.contact.store')); ?>" method="post" class="mb-0">
                  <?php echo csrf_field(); ?>
                  <div class="input-group mx-auto">
                    <input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email"
                      class="form-control bg-light required email" placeholder="Email c???a b???n.." style="border-radius: 0px"
                    />
                    <button class="button button-large mx-0 my-0" type="submit"><i class="icon-email2"></i></button>
                  </div>
                </form>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>
    <!-- .footer-widgets-wrap end -->
  </div>
  <!-- Copyrights
	============================================= -->
  <div id="copyrights">
    <div class="container">
      <div class="row col-mb-30">
        <div class="col-md-6 text-center text-md-start">
          Copyrights &copy; 2020 B???n quy???n thu???c v??? FHM Agency<br />
        </div>
        <div class="col-md-6 text-center text-md-end">
          <div class="d-flex justify-content-center justify-content-md-end">
            <div class="copyright-links">
              <a href="#">??i???u kho???n d???ch v???</a> /
              <a href="#"> Ch??nh s??ch b???o m???t</a>
            </div>
          </div>
          <div class="clear"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- #copyrights end -->

</footer>
<?php /**PATH /home/fhmagency/domains/fhmagency.vn/public_html/garage/resources/views/frontend/blocks/footer/styles/default.blade.php ENDPATH**/ ?>
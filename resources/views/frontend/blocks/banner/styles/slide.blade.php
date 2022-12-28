@if ($block)
  @php
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
  @endphp

  <!-- START TESTIMONIALS -->
  <div id="garage-testimonial" class="section dark my-0">
    <div class="container">
      <div class="heading-block center">
        <h3>{{ $title }}</h3>
      </div>
      <div
        id="oc-testi"
        class="owl-carousel testimonials-carousel carousel-widget"
        data-margin="20"
        data-items-sm="1"
        data-items-md="2"
        data-items-xl="3"
      >
      @if ($block_childs)
      @foreach ($block_childs as $item)
        @php
          $title_child = $item->json_params->title->{$locale} ?? $item->title;
          $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
          $content_child = $item->json_params->content->{$locale} ?? $item->content;
          $image_child = $item->image != '' ? $item->image : null;
          $url_link = $item->url_link != '' ? $item->url_link : 'javascript:void(0)';
          $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
          $icon = $item->icon != '' ? $item->icon : '';
          $style = $item->json_params->style ?? '';
        @endphp

        <div class="oc-item">
            <div class="testimonial">
              <div class="testi-image">
                <a href="#"
                  ><img
                    src="{{ $image_child }}"
                    alt="Customer Testimonails"
                /></a>
              </div>
              <div class="testi-content">
                <p>{{ $content_child }}</p>
                <div class="testi-meta">
                    {{ $title_child }}
                  <span>{{ $brief_child }}</span>
                </div>
              </div>
            </div>
          </div>
        
      @endforeach
    @endif
        
      </div>
    </div>
  </div>
  <!-- END TESTIMONIALS -->

@endif

{{-- @if ($block)
  @php
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  @endphp

  <section id="slider" class="slider-element slider-parallax swiper_wrapper min-vh-75 min-vh-md-100"
    data-loop="true">
    <div class="slider-inner">
      <div class="swiper-container swiper-parent">
        <div class="swiper-wrapper">

          @if ($block_childs)
            @foreach ($block_childs as $item)
              @php
                $title = $item->json_params->title->{$locale} ?? $item->title;
                $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                $content = $item->json_params->content->{$locale} ?? $item->content;
                $image = $item->image != '' ? $item->image : null;
                $image_background = $item->image_background != '' ? $item->image_background : null;
                $video = $item->json_params->video ?? null;
                $video_background = $item->json_params->video_background ?? null;
                $url_link = $item->url_link != '' ? $item->url_link : '';
                $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                $icon = $item->icon != '' ? $item->icon : '';
                $style = isset($item->json_params->style) && $item->json_params->style == 'slider-caption-right' ? 'd-none' : '';
                
                $image_for_screen = null;
                if ($agent->isDesktop() && $image_background != null) {
                    $image_for_screen = $image_background;
                } else {
                    $image_for_screen = $image;
                }
                
              @endphp
              <div class="swiper-slide dark">
                <div class="swiper-slide-bg" style="background-image: url('{{ $image }}');"></div>
              </div>
            @endforeach
          @endif

        </div>
        <div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
        <div class="slider-arrow-right">
          <i class="icon-angle-right"></i>
        </div>
      </div>
    </div>
  </section>
@endif --}}

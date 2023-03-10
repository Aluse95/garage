@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $background = $block->image_background != '' ? $block->image_background : url('demos/seo/images/sections/5.jpg');
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    $params['status'] = App\Consts::TAXONOMY_STATUS['active'];
    $params['taxonomy'] = App\Consts::TAXONOMY['product'];
    
    $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params)->get();
    
    $params['status'] = App\Consts::POST_STATUS['active'];
    $params['is_featured'] = true;
    $params['is_type'] = App\Consts::POST_TYPE['product'];
    $rows = App\Http\Services\ContentService::getCmsPost($params)->get();
    
  @endphp
  <div class="section bg-transparent">
    <div class="container clearfix">
      <div class="grid-filter-wrap flex-row-reverse align-items-center mb-5">
        <!-- Portfolio Filter
            ============================================= -->
        <ul class="grid-filter mb-0" data-container="#portfolio">
          <li class="activeFilter">
            <a href="#" data-filter="*">Show All</a>
          </li>
          @isset($taxonomys)
            @foreach ($taxonomys as $item_taxonomy)
              @php
                $title_taxonomy = $item_taxonomy->json_params->title->{$locale} ?? $item_taxonomy->title;
                $brief_taxonomy = $item_taxonomy->json_params->brief->{$locale} ?? null;
                $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title_taxonomy, $item_taxonomy->id);
              @endphp
              <li><a href="#" data-filter=".{{ Str::slug($item_taxonomy->title) }}">{{ $title_taxonomy }}</a></li>
            @endforeach
          @endisset

        </ul>
        <!-- .grid-filter end -->

        <div class="wrapper">
          <div class="badge badge-default text-md-start">{{ $title }}</div>
          <h2 class="display-5 fw-bold">{{ $brief }}</h2>
        </div>
      </div>

      <!-- Portfolio Items
      ============================================= -->
      <div id="portfolio" class="portfolio row grid-container gutter-30" style="z-index: 9">
        @foreach ($rows as $item)
          @php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            // Viet ham xu ly lay slug
            $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->taxonomy_title, $item->taxonomy_id);
            $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item->id, 'detail', $item->taxonomy_title);
          @endphp
          <article class="portfolio-item col-md-4 col-sm-6 col-12 {{ Str::slug($item->taxonomy_title) }}">
            <!-- Grid Inner: Start -->
            <div class="grid-inner">
              <!-- Image: Start -->
              <div class="portfolio-image">
                <a href="{{ $alias }}">
                  <img src="{{ $image }}" alt="{{ $title }}" />
                </a>
                <!-- Overlay: Start -->
                <div class="bg-overlay">
                  <div class="bg-overlay-content dark flex-column" data-hover-animate="fadeIn">
                    <!-- Decription: Start -->
                    <div class="portfolio-desc pt-0 center" data-hover-animate="fadeInDownSmall"
                      data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350">
                      <h3>
                        <a href="{{ $alias }}">{{ $title }}</a>
                      </h3>
                      <span><a href="{{ $alias_category }}">{{ $item->taxonomy_title }}</a></span>
                    </div>
                    <!-- Description: End -->
                    <div class="d-flex">
                      <a href="{{ $image }}" class="overlay-trigger-icon bg-light text-dark"
                        data-hover-animate="fadeInUpSmall" data-hover-animate-out="fadeOutDownSmall"
                        data-hover-speed="350" data-lightbox="image" title="Image"><i class="icon-line-plus"></i></a>
                      <a href="{{ $alias }}" class="overlay-trigger-icon bg-light text-dark"
                        data-hover-animate="fadeInUpSmall" data-hover-animate-out="fadeOutDownSmall"
                        data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                    </div>
                  </div>
                  <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                </div>
                <!-- Overlay: End -->
              </div>
              <!-- Image: End -->
            </div>
            <!-- Grid Inner: End -->
          </article>
        @endforeach

      </div>
      <!-- #portfolio end -->
      <div class="d-flex justify-content-center mt-5 d-none">
        <a href="#" class="button button-large text-center button-custom"
          style=" width: fit-content; background-color: #fff; color: #000; border-color: #f1f1f1; z-index:99; ">
          MORE WORKS +
        </a>
      </div>
    </div>
  </div>
@endif

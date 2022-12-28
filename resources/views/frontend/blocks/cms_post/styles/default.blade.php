@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $background = $block->image_background != '' ? $block->image_background : url('assets/img/banner.jpg');
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    $params['status'] = App\Consts::POST_STATUS['active'];
    $params['is_featured'] = true;
    $params['is_type'] = App\Consts::POST_TYPE['post'];
    
    $rows = App\Http\Services\ContentService::getCmsPost($params)
        ->limit(3)
        ->get();
  @endphp
  <!-- START BLOGS -->
  <div class="section mt-0 border-top-0 mb-0">
    <div class="container">
      <div class="heading-block center">
        <h3>{{ $title }}</h3>
      </div>
      <div
        id="posts"
        class="post-grid row grid-container gutter-40 clearfix"
        data-layout="fitRows"
      >
      @if ($rows)
      @foreach ($rows as $item)
        @php
          $title = $item->json_params->title->{$locale} ?? $item->title;
          $brief = $item->json_params->brief->{$locale} ?? $item->brief;
          $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
          // $date = date('H:i d/m/Y', strtotime($item->created_at));
          $date = date('d', strtotime($item->created_at));
          $month = date('M', strtotime($item->created_at));
          $year = date('Y', strtotime($item->created_at));
          // Viet ham xu ly lay slug
          $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
          $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
        @endphp
        <div class="entry col-md-4 col-sm-6 col-12">
          <div class="grid-inner">
            <div class="entry-image">
              <a href="{{ $alias }}" data-lightbox="image">
                <img style="height: 250px" src="{{ $image }}" alt="Standard Post with Image"/>
              </a>
            </div>
            <div class="entry-title">
              <h2>
                <a href="{{ $alias }}">{{ $title }}</a>
              </h2>
            </div>
            <div class="entry-meta">
              <ul>
                <li><i class="icon-calendar3"></i>{{ $year.' '.$month.' '.$date}}</li>
                <li>
                  <a href="blog-single.html#comments"><i class="icon-comments"></i>{{ rand(10,20) }}</a>
                </li>
                {{-- <li>
                  <a href="#"><i class="{{ $icon }}"></i></a>
                </li> --}}
              </ul>
            </div>
          </div>
        </div>
      @endforeach
    @endif
        
      </div>
    </div>
  </div>
  <!-- END BLOGS -->
  <!-- START CLIENTS -->

  {{-- <div class="section my-0">
    <div class="container clearfix">
      <div class="heading-block">
        <h3>{{ $title }}</h3>
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
      @if ($rows)
        @foreach ($rows as $item)
        @php
          $title = $item->json_params->title->{$locale} ?? $item->title;
          $brief = $item->json_params->brief->{$locale} ?? $item->brief;
          $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
          // $date = date('H:i d/m/Y', strtotime($item->created_at));
          $date = date('d', strtotime($item->created_at));
          $month = date('M', strtotime($item->created_at));
          $year = date('Y', strtotime($item->created_at));
          // Viet ham xu ly lay slug
          $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
          $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
        @endphp
        <div class="oc-item">
          <a href="{{ $alias }}"
            ><img src="{{ $image }}" alt="Clients"
          /></a>
        </div>
        @endforeach
      @endif
      </div>
    </div>
  </div> --}}
  <!-- END CLIENTS -->
  {{-- <div class="section mb-0 bg-dark">
    <div class="container clearfix">
      <!-- Posts
        ============================================= -->
      <div id="posts" class="post-grid row grid-container gutter-40 clearfix" data-layout="fitRows">
        <div class="col-lg-12 d-flex justify-content-start align-items-start flex-column">
          <div class="badge badge-default">{!! $title !!}</div>
          <h2 class="fw-bold ls0 mb-3 text-light display-4">
            {!! $brief !!}
          </h2>
        </div>
        @foreach ($rows as $item)
          @php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            // $date = date('H:i d/m/Y', strtotime($item->created_at));
            $date = date('d', strtotime($item->created_at));
            $month = date('M', strtotime($item->created_at));
            $year = date('Y', strtotime($item->created_at));
            // Viet ham xu ly lay slug
            $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
            $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
          @endphp
          <div class="entry col-md-4 col-sm-6 col-12">
            <div class="grid-inner">
              <div class="entry-image">
                <a href="{{ $alias }}">
                  <img src="{{ $image }}" alt="{{ $title }}" />
                </a>
              </div>
              <div class="entry-title">
                <h2>
                  <a class="text-light" href="{{ $alias }}">{{ $title }}</a>
                </h2>
              </div>
              <div class="entry-meta"></div>
              <div class="entry-content">
                <p class="text-light">
                  {{ Str::limit($brief, 100) }}
                </p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div> --}}

@endif

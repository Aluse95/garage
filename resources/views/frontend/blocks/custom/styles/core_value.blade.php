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
    $delay = $delay2 = 0;
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
    $row = floor(count($block_childs)/2);
    $arr = $block_childs->chunk($row);
  @endphp

  <!-- START WHY CHOOSE -->
  <div class="section bg-transparent my-0">
    <div class="container clearfix">
      <div class="heading-block center">
        <h2>{{ $title }}</h2>
        <span class="mx-auto">{{ $brief }}</span>
      </div>

      <div class="row col-mb-50 mb-4">
        <div class="col-lg-4 col-md-6">
          @if ($arr)
          @foreach ($arr[0] as $item)
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
 
            <div class="feature-box flex-md-row-reverse text-md-end {{ $delay ? 'mt-5' : '' }}" data-animate="fadeIn" data-delay="{{ $delay }}">
              <div class="fbox-icon">
                <a href="#"><i class="{{ $icon }}"></i></a>
              </div>
              <div class="fbox-content">
                <h3>{{ $title_child }}</h3>
                <p>{{ $content_child }}</p>
              </div>
            </div>
            <div class="d-none">{{ $delay += 200 }}</div>
          @endforeach
          @endif
        </div>
        <div class="col-lg-4 d-md-none d-lg-block text-center">
          <img src="{{ $image }}" alt="car tire" style="max-width: 80%"/>
        </div>
        <div class="col-lg-4 col-md-6">
          @if ($arr)
          @foreach ($arr[1] as $item)
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

            <div class="feature-box {{ $delay2 ? 'mt-5' : '' }}" data-animate="fadeIn" data-delay="{{ $delay2 }}">
              <div class="fbox-icon">
                <a href="#"><i class="{{ $icon }}"></i></a>
              </div>
              <div class="fbox-content">
                <h3>{{ $title_child }}</h3>
                <p>{{ $content_child }}</p>
              </div>
            </div>
            <div class="d-none">{{ $delay2 += 200 }}</div>
          @endforeach
          @endif
        </div>
      </div>
    </div>
  </div>
  <!-- END WHY CHOOSE -->

@endif

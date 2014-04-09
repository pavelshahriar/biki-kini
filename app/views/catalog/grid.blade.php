<ul class="catalog_list">

    <? $i = 0;?>
    @foreach($data['ads'] as $ad)
    <? $i++;?>


    <li @if($i%3 == 0) class="last" @endif>
        <a href="{{{ Config::get('view.site_url')}}}/item/{{{ $ad['id'] }}}">
            @if(!empty($ad['photos']))
            <img src="<?=Config::get('view.site_url');?>/assets/ads/{{{ $ad['id'] }}}/{{{ $ad['photos']['featured'] }}}" alt="">
            @else
            <img src="<?=Config::get('view.site_url');?>/assets/img/noimage-small.jpg" alt="">
            @endif

            <div class="description">
                {{{ $ad['compiled_location'] }}}<br>
                @if($ad['is_new']) New @else Used @endif<br>
                @if($ad['price_negotiable']) Price Negotiable @else Fixed Price @endif<br>
            </div>
            <div class="title">{{{ $ad['title'] }}}<br/>
                <span class="price">৳ {{{ number_format($ad['price']) }}}</span>
            </div>
        </a>
    </li>

    @endforeach
</ul>
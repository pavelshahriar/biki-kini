<ul class="catalog_table">

    @foreach($data['ads'] as $ad)

    <li class="">
        <a href="{{{ Config::get('view.site_url')}}}/item/{{{ $ad['id'] }}}" class="thumb">
            @if(!empty($ad['photos']))
            <img src="<?=Config::get('view.site_url');?>/assets/ads/{{{ $ad['id'] }}}/{{{ $ad['photos']['featured'] }}}" alt="">
            @else
            <img src="<?=Config::get('view.site_url');?>/assets/img/noimage-small.jpg" alt="">
            @endif
        </a>
        <div class="catalog_desc">
            <div class="location">{{{ date('M j, Y', strtotime($ad['created_at'])) }}}</div>
            <div class="title_box">
                <h4><a href="{{{ Config::get('view.site_url')}}}/item/{{{ $ad['id'] }}}">{{{ $ad['title'] }}}</a></h4>
                <div class="price">৳ {{{ number_format($ad['price']) }}}</div>
            </div>
            <div class="clear"></div>
            <div class="grey_area">
                <span>Location: <strong>{{{ $ad['compiled_location'] }}}</strong></span><br/>
                <span>Condition : <strong>@if($ad['is_new']) New @else Used @endif</strong></span><br/>
                <span><strong>@if($ad['price_negotiable']) Price Negotiable @else Fixed Price @endif </strong></span>
            </div>
            <div style="float:right">
                <a href="{{{ Config::get('view.site_url')}}}/item/{{{ $ad['id'] }}}" class="more markered">View details</a>
            </div>
            Posted By : {{{ $ad['poster_id']['name'] }}}
        </div>
    </li>
    @endforeach
</ul>
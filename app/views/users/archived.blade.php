<div class="profile_content">
    <h1 class="no_border"><strong>My</strong> posts</h1>
    <!--div class="notice">Public ads on the site</div-->
    <div class="search_cars">
        <a href="{{{ Config::get('view.site_url') }}}/ad/new" class="btn2" style="float:right;">Add Post</a>
        <div class="found_count">
            <span>Found:</span> {{{ count($data['user_ads']) }}} posts
        </div>
    </div>
    <div class="cars_list">

        @foreach($data['user_ads'] as $ad)

        <div class="car" id="car-322">
            <div class="img">
                @if(!empty($ad['photos']['featured']))
                <img src="{{{ Config::get('view.site_url') }}}/assets/ads/{{{ $ad['id'] }}}/{{{ $ad['photos']['featured'] }}}" alt="" width="128px" height="98px">
                @else
                <img src="{{{ Config::get('view.site_url') }}}/assets/img/noimage-small.jpg" alt="">
                @endif
            </div>
            <div class="general_info">
                <h2>{{{ $ad['title'] }}}</h2>
                <div class="date">{{{ date('M j, Y', strtotime($ad['created_at'])) }}}</div>
                <div class="price"><span>৳</span> {{{ number_format($ad['price']) }}}</div>
            </div>
            <div class="location">
                {{{ Config::get('app.default_sub_category')[$ad['sub_category']] }}}
                <br>
                <strong>{{{ $ad['compiled_location'] }}}</strong>
            </div>
            <div class="statistics_info">
                <div class="item-views">
                    <i class="icon-article"></i>{{{ $ad['manufacturer_id'] }}}
                </div>
                <div class="item-id">
                    <i class="icon-star"></i>@if($ad['is_new']) New @else Used @endif
                </div>
                <div class="item-info">
                    <i class="icon-move"></i>@if($ad['price_negotiable']) Price Negotiable @else Fixed Price @endif
                </div>
            </div>
            <div class="count_photo"><i class="icon-instagram"></i>{{{ $ad['photos']['total_photos'] }}} photo</div>
            <div class="actions">
                <a href="{{{ Config::get('view.site_url') }}}/item/archive/{{{ $ad['id'] }}}/1" class="markered">Republish</a>
            </div>
        </div>

        @endforeach

    </div>
</div>
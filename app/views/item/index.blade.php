@extends('layouts.main')


@section('top_menu')
@foreach (Config::get('view.top_menu_items') as $tmi)
<li @if ($tmi == $data['active_menu']) class="menu-item current-menu-item" @else class="menu-item" @endif>
<a href="{{{ Config::get('view.site_url') }}}/{{{ $tmi }}}">{{{ ucfirst($tmi) }}}</a>
</li>
@endforeach
@stop

@section('content')

<div class="main_wrapper">
    <div class="main_wrapper ">
        <div class="cars_id">
            <div class="id"> Posting date : <span>{{{ date('M j, Y', strtotime($data['ad_info']['created_at'])) }}}</span></div>
            <div class="views"><i class="icon-marker"></i>{{{ $data['ad_info']['compiled_location'] }}}</div>
        </div>
        <h1>
            <strong>{{{ $data['ad_info']['title'] }}}</strong>
        </h1>
        <div class="car_image_wrapper">
            <div class="big_image">
                <a href="{{{ Config::get('view.site_url') }}}/assets/ads/{{{ $data['ad_info']['id'] }}}/{{{ $data['ad_info']['photos']['featured'] }}}" rel="car_group">
                    <img src="{{{ Config::get('view.site_url') }}}/assets/img/zoom.png" alt="" class="zoom">
                    <img src="{{{ Config::get('view.site_url') }}}/assets/ads/{{{ $data['ad_info']['id'] }}}/{{{ $data['ad_info']['photos']['featured'] }}}" alt="">
                </a>
            </div>
            <div class="small_img">
                @foreach($data['ad_info']['photos']['gallery'] as $photo)
                <a href="{{{ Config::get('view.site_url') }}}/assets/ads/{{{ $data['ad_info']['id'] }}}/{{{ $photo }}}" rel="car_group">
                    <img src="{{{ Config::get('view.site_url') }}}/assets/ads/{{{ $data['ad_info']['id'] }}}/{{{ $photo }}}" alt="">
                </a>
                @endforeach
            </div>
        </div>

        @include('item.info')


        <div class="clear"></div>
        <div class="info_box">
            <div class="car_info">
                <div class="info_left">
                    <h2><strong>Ad</strong> Details</h2>
                    <p>{{{ $data['ad_info']['description'] }}}</p>
                </div>
                <div class="info_right">
                    <div class="car_contacts">
                        <h2><strong>Contact</strong> Seller</h2>
                        <p></p>
                        <div class="left">
                            <div class="user-detail">
                                <i class="icon-user"></i>
                                {{{ $data['ad_info']['poster_id']['name'] }}}
                                <div class="details mail-link">
                                    <i class="icon-phone"></i> : <strong>{{{ $data['ad_info']['poster_id']['mobile'] }}}</strong>
                                </div>
                                <div class="details mail-link">
                                    <i class="icon-mail"></i> : <a href="mailto:{{{ $data['ad_info']['poster_id']['email'] }}}" rel="moc/xednay//ralgalaysos" class="email_link_noreplace markered"><strong>{{{ $data['ad_info']['poster_id']['email'] }}}</strong></a>
                                </div>

                            </div>
                        </div>
                        <div class="right">
                        </div>
                        <div class="clear"></div>
                        <div class="clear"></div>
                    </div>                </div>
                <div class="clear"></div>
            </div>

        </div>
        	<div class="clear"></div>
</div>



@stop

<!DOCTYPE html>
<!--[if !IE]><!-->
<html lang="en-US">
<!--<![endif]-->
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{ Config::get('view.site_title') }}</title>

    {{ HTML::style('assets/css/jquery.css') }}
    {{ HTML::style('assets/css/fonts.css') }}
    {{ HTML::style('assets/css/icons.css') }}
    {{ HTML::style('assets/css/icon-transport.css') }}
    {{ HTML::style('assets/css/style.css') }}
    {{ HTML::style('assets/css/css.css') }}
    {{ HTML::style('assets/css/vc-responsive.css') }}

    {{ HTML::script('assets/js/jquery_005.js'); }}
    {{ HTML::script('assets/js/jquery-migrate.js'); }}
    {{ HTML::script('assets/js/layerslider_002.js'); }}
    {{ HTML::script('assets/js/jquery-easing-1.js'); }}
    {{ HTML::script('assets/js/jquerytransit.js'); }}
    {{ HTML::script('assets/js/layerslider.js'); }}

</head>

<body class="car page mode_board wpb-js-composer js-comp-ver-3.7.3 vc_responsive">

<!--BEGIN HEADER-->
@include('layouts.header')
<!--EOF HEADER-->

<!--BEGIN CONTENT-->
<div id="content">
    <div class="content">
        <!-- <div class="main_wrapper"> -->
        @yield('content')
        <!-- </div> -->
    </div>
</div>
<!--EOF CONTENT-->

<!--BEGIN FOOTER-->
@include('layouts.footer')
<!--EOF FOOTER-->

{{ HTML::script('assets/js/jquery_004.js'); }}
{{ HTML::script('assets/js/catalog.js'); }}
{{ HTML::script('assets/js/jquery_002.js'); }}
{{ HTML::script('assets/js/jquery.js'); }}
{{ HTML::script('assets/js/jquery_010.js'); }}
{{ HTML::script('assets/js/jquery_006.js'); }}
{{ HTML::script('assets/js/jquery_008.js'); }}
{{ HTML::script('assets/js/jquery_007.js'); }}
{{ HTML::script('assets/js/jquery_009.js'); }}
{{ HTML::script('assets/js/jquery_011.js'); }}
{{ HTML::script('assets/js/jquery_003.js'); }}
{{ HTML::script('assets/js/transition.js'); }}
{{ HTML::script('assets/js/vc_carousel.js'); }}
{{ HTML::script('assets/js/common.js'); }}
{{ HTML::script('assets/js/js.js'); }}
{{ HTML::script('assets/js/login.js'); }}

<div id="fancybox-tmp"></div>
<div id="fancybox-loading"><div></div></div>
<div id="fancybox-overlay"></div>
<div id="fancybox-wrap">
    <div id="fancybox-outer">
        <div class="fancybox-bg" id="fancybox-bg-n"></div>
        <div class="fancybox-bg" id="fancybox-bg-ne"></div>
        <div class="fancybox-bg" id="fancybox-bg-e"></div>
        <div class="fancybox-bg" id="fancybox-bg-se"></div>
        <div class="fancybox-bg" id="fancybox-bg-s"></div>
        <div class="fancybox-bg" id="fancybox-bg-sw"></div>
        <div class="fancybox-bg" id="fancybox-bg-w"></div>
        <div class="fancybox-bg" id="fancybox-bg-nw"></div>
        <div id="fancybox-content"></div>
        <a id="fancybox-close"></a>
        <div id="fancybox-title"></div>
        <a href="javascript:;" id="fancybox-left">
            <span class="fancy-ico" id="fancybox-left-ico"></span>
        </a>
        <a href="javascript:;" id="fancybox-right">
            <span class="fancy-ico" id="fancybox-right-ico"></span>
        </a>
    </div>
</div>

</body>
</html>
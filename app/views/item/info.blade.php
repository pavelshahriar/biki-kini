<div class="car_characteristics">
    <div class="price">
        ৳ {{{ number_format($data['ad_info']['price']) }}}
    </div>
    <div style="float: right; display: inline-block; margin-top: -55px">
        <div style="float: left; width: 110px">
            <i class="icon-star-circled"></i>Condition: @if($data['ad_info']['is_new']) New @else Used @endif
        </div>
        <div>
            <i class="icon-menu"></i>Price: @if($data['ad_info']['price_negotiable']) Negotiable @else Fixed @endif
        </div>
    </div>
    <div class="clear"></div>


    <div class="features_table">
        <div class="line">
            <div class="left">Manufacturer:</div>
            <div class="right">{{{ $data['ad_info']['manufacturer_id'] }}}</div>
        </div>

        @foreach($data['ad_ext_info'] as $key => $val)
        <div class="line">
            <div class="left">{{{ ucfirst(str_replace("_", " ", $key)) }}}:</div>
            <div class="right">{{{ $val }}}</div>
        </div>
        @endforeach
    </div>
</div>
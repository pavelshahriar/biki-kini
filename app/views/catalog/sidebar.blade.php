<div class="catalog_sidebar">
    <div class="search_auto">
        <h3><strong>Search</strong> vehicles</h3>


        {{ Form::open(array('url'=>'catalog/search')) }}

        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>

        <label><strong>Category:</strong></label>
        <div class="select_box_1">
            {{ Form::select('category', $data['search_panel_data']['category'], 0 , array('class' => 'custom-select select_3')) }}
        </div>
        <div class="clear"></div>

        <label><strong>Location:</strong></label>
        <div class="select_box_1">
            {{ Form::select('location', $data['search_panel_data']['location'], 0 , array('class' => 'custom-select select_3')) }}
        </div>
        <div class="clear"></div>

        <label><strong>Manufacturer:</strong></label>
        <div class="select_box_1">
            {{ Form::select('manufacturer', $data['search_panel_data']['manufacturer'], 0 , array('class' => 'custom-select select_3')) }}
        </div>
        <div class="clear"></div>

        <label><strong>Condition:</strong></label>
        <div class="select_box_1">
            {{ Form::select('condition', $data['search_panel_data']['condition'], 0 , array('class' => 'custom-select select_3')) }}
        </div>
        <div class="clear"></div>

        <label><strong>Price:</strong></label>
        {{ Form::text('price_from', null, array('class'=>'txb', 'placeholder'=>'From')) }}
        {{ Form::text('price_to', null, array('class'=>'txb', 'placeholder'=>'To')) }}
        <div class="clear"></div>

        {{ Form::submit('Search', array('class'=>'btn_search btn5'))}}
        <div class="clear"></div>

        {{ Form::close() }}






    </div>
</div>
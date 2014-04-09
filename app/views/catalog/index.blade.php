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
    <div class="layout_left_content">

        @if(!$data['search_result'])
        <div class="sub_categories">
            @foreach($data['sub_category_array'] as $key => $val)
            <a href="{{{ Config::get('view.site_url') }}}/{{{ $data['active_menu'] }}}/{{{ $key }}}/{{{ $data['view_type'] }}}" alt="" @if($key == $data['sub_category']) class="active" @endif>
                <span>{{{ $val }}}</span>
            </a>
            @endforeach
        </div>
        @endif

        @if($data['search_result'])
        <h1><strong>Search Result </strong>({{{$data['total_items']}}} Items)</h1>
        @else
        <h1><strong>{{{ $data['current_category_name'] }}} </strong>({{{$data['total_items']}}} Items)</h1>
        @endif

        @include('catalog.sidebar')

        <div class="main_catalog">

            @if(!$data['search_result'])
            <div class="top_catalog_box">
                <div class="switch button-group ">
                    <a href="{{{ Config::get('view.site_url') }}}/{{{ $data['active_menu'] }}}/{{{ $data['sub_category'] }}}/grid/{{{ $data['sort_by'] }}}/{{{ $data['per_page'] }}}/{{{ $data['page_no'] }}}" @if($data['view_type'] == 'grid') class="table_view active start-btn" @else class="table_view start-btn" @endif ><i class="icon-grid"></i></a>
                    <a href="{{{ Config::get('view.site_url') }}}/{{{ $data['active_menu'] }}}/{{{ $data['sub_category'] }}}/list/{{{ $data['sort_by'] }}}/{{{ $data['per_page'] }}}/{{{ $data['page_no'] }}}" @if($data['view_type'] == 'list') class="list_view active end-btn" @else class="list_view  end-btn" @endif class=""><i class="icon-list"></i></a>
                </div>
                <div class="drop_list">
                    <strong>Sort by: </strong>
                    <div class="selected">
                        <span><a href="#">{{{ Config::get('view.catalog_sort_titles')[$data['sort_by']] }}}</a></span>
                        <ul>
                            @foreach(Config::get('view.catalog_sort_titles') as $key => $val)
                            <li><a href="{{{ Config::get('view.site_url') }}}/{{{ $data['active_menu'] }}}/{{{ $data['sub_category'] }}}/{{{ $data['view_type'] }}}/{{{ $key }}}/{{{ $data['per_page'] }}}/{{{ $data['page_no'] }}}">{{{ $val }}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="drop_list">
                    <strong>View on page:</strong>
                    <div class="selected">
                        <span><a href="#">{{{ $data['per_page'] }}}</a></span>
                        <ul>
                            @foreach(Config::get('view.catalog_items_per_page_array') as $i)
                            <li><a href="{{{ Config::get('view.site_url') }}}/{{{ $data['active_menu'] }}}/{{{ $data['sub_category'] }}}/{{{ $data['view_type'] }}}/{{{ $data['sort_by'] }}}/{{{ $i }}}" >{{{ $i }}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="pagination">
                    <ul>
                        @for($i = 1; $i <= $data['total_pages']; $i++)
                        <li @if($i == $data['page_no']) class="active" @endif>
                        <a href="{{{ Config::get('view.site_url') }}}/{{{ $data['active_menu'] }}}/{{{ $data['sub_category'] }}}/{{{ $data['view_type'] }}}/{{{ $data['sort_by'] }}}/{{{ $data['per_page'] }}}/{{{ $i }}}" >{{{ $i }}}</a>
                        </li>
                        @endfor
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
            @endif

            @include('catalog.' . $data['view_type'])

            @if(!$data['search_result'])
            <div class="bottom_catalog_box">
                <div class="pagination">
                    <ul>
                        @for($i = 1; $i <= $data['total_pages']; $i++)
                        <li @if($i == $data['page_no']) class="active" @endif>
                            <a href="{{{ Config::get('view.site_url') }}}/{{{ $data['active_menu'] }}}/{{{ $data['sub_category'] }}}/{{{ $data['view_type'] }}}/{{{ $data['sort_by'] }}}/{{{ $data['per_page'] }}}/{{{ $i }}}" >{{{ $i }}}</a>
                        </li>
                        @endfor
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
            @endif

        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>

@stop

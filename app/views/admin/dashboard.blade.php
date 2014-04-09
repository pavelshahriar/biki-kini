@extends('layouts.main')

@section('top_menu')
@foreach (Config::get('view.top_menu_items') as $tmi)
<li @if ($tmi == $data['active_menu']) class="menu-item current-menu-item" @else class="menu-item" @endif>
<a href="{{{ Config::get('view.site_url') }}}/{{{ $tmi }}}">{{{ ucfirst($tmi) }}}</a>
</li>
@endforeach
@stop


@section('content')

<div class="container">
    @if(Session::has('message'))
    <p class="alert">{{ Session::get('message') }}</p>
    @endif
</div>

<div class="main_wrapper profile_layout">
    <div class="sidebar"><div class="widget widget-nav-profile">
            <h2><strong>Admin</strong> panel</h2>
            <ul>
                <li class="@if($data['tag'] == 'active') active @endif settings"><a href="{{{ Config::get('view.site_url') }}}/admin/dashboard/active">Active Users</a></li>
                <li class="@if($data['tag'] == 'banned') active @endif settings" style="opacity: 0.6"><a href="{{{ Config::get('view.site_url') }}}/admin/dashboard/banned">Banned Users</a></li>

            </ul>
        </div>
    </div>

    @include('admin.'.$data['tag'])

    <div class="clear mb1"></div>
</div>

@stop
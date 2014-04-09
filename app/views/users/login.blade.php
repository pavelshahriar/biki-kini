@extends('layouts.main')

@section('top_menu')
@foreach (Config::get('view.top_menu_items') as $tmi)
<li @if ($tmi == $data['active_menu']) class="menu-item current-menu-item" @else class="menu-item" @endif>
<a href="{{{ Config::get('view.site_url') }}}/{{{ $tmi }}}">{{{ ucfirst($tmi) }}}</a>
</li>
@endforeach
@stop

@section('content')

<div class="wrapper_login_page">
    <div class="background">
        <img src="{{{ Config::get('view.site_url') }}}/assets/img/big_bg.jpg">
        <div id="login-page" class="popup">
            <div class="popup_title">Login</div>
            <div style="color: darkred; background-color: lightyellow; text-align: center">
                @if(Session::has('message'))
                <p class="alert">{{ Session::get('message') }}</p>
                @endif
            </div>
            <div class="popup_content">
                {{ Form::open(array('url'=>'users/signin' )) }}
                {{ Form::text('username', null, array('class'=>'text', 'placeholder'=>'Username')) }}
                {{ Form::password('password', array('class'=>'text', 'placeholder'=>'Password', 'id' => 'password')) }}
                <div class="col1">
                    {{ Form::submit('LOGIN', array('class'=>'btn1 login'))}}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@stop
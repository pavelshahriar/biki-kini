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
        <div id="registration-page" class="popup">
            <div class="popup_title">Registration</div>
            <div style="color: darkred; background-color: lightyellow; text-align: center">
                @if(Session::has('message'))
                <p class="alert">{{ Session::get('message') }}</p>
                @endif
            </div>
            <div class="popup_content">
                {{ Form::open(array('url'=>'users/create')) }}

                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>

                {{ Form::text('username', null, array('class'=>'text', 'placeholder'=>'Username')) }}
                {{ Form::text('email', null, array('class'=>'text', 'placeholder'=>'Email')) }}
                {{ Form::password('password', array('class'=>'text', 'placeholder'=>'Password', 'id' => 'pass')) }}
                {{ Form::password('password_confirmation', array('class'=>'text', 'placeholder'=>'Confirm Password', 'id' => 'pass_again')) }}

                {{ Form::submit('Register', array('class'=>'btn1 registration'))}}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@stop


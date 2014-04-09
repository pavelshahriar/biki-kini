<div id="header">

    <div class="top_info">

        <div class="logo">
            <a href="#"><img src="{{{ Config::get('view.site_url') }}}/assets/img/logo_vehicle_mart.png" style="max-width:250px;"></a>
        </div>

        <div class="header_contacts">
            <div class="phone">Test Project For WideSpace</div>
            <div>Developed by, Pavel Shahriar</div>
        </div>

        <div class="signin">
            <div class="nav">

                @if(!Auth::check())
                <a href="{{{Config::get('view.site_url')}}}/users/register/" class="user-register">
                    <i class="icon-list"></i><span>Register</span>
                </a>
                <a href="{{{Config::get('view.site_url')}}}/users/login/" class="user-icon">
                    <i class="icon-user"></i><span>Login</span>
                </a>
                @else
                <div class="nav">
                    @if(Auth::user()->role == Config::get('app.user_roles')['user'])
                    <a href="{{{Config::get('view.site_url')}}}/users/dashboard/" class="user-icon profile">
                        <i class="icon-user"></i><strong> {{{ Auth::user()->username }}}</strong>
                    </a>
                    @else
                    <a href="{{{Config::get('view.site_url')}}}/admin/dashboard/" class="user-icon profile">
                        <i class="icon-award"></i><strong> {{{ Auth::user()->username }}}</strong>
                    </a>
                    @endif

                    |
                    <a href="{{{Config::get('view.site_url')}}}/item/new/" class="user-icon">
                        Logout</span>
                    </a>
                </div>
                @endif

            </div>
        </div>

        @if(Auth::check())
        <div class="add_car">
            <a href="{{{ Config::get('view.site_url') }}}/ad/new/" class="btn2" style="float:right;">Add Post</a>
        </div>
        @endif


        <div class="socials">
            <a href="http://facebook.com/pavelshahriar" target="_blank">
                <i class="icon-facebook"></i>
            </a>
            <a href="http://twitter.com/itzpavz" target="_blank">
                <i class="icon-twitter"></i>
            </a>
            <a href="http://bd.linkedin.com/in/shahriartanvir" target="_blank">
                <i class="icon-linkedin"></i>
            </a>
        </div>

    </div>

    <div class="bg_navigation">
        <div class="navigation_wrapper">
            <div id="navigation">
                <span>Navigation</span>
                <div class="menu-header-menu-container">
                    <ul id="menu-header-menu" class="">
                        @yield('top_menu')
                    </ul>
                </div>
            </div>
            <div id="search_form">
                <form role="search" method="get" id="searchform" action="<?=Config::get('view.site_url');?>/">
                    <input class="txb_search" name="s" id="s" placeholder="Search on site" type="text">
                    <input class="btn4 btn_search" id="searchsubmit" value="Search" type="submit">
                </form>
            </div>
            <div class="clear"></div>
        </div>
    </div>

</div>
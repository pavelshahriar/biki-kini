<div class="profile_content">
    <h1 class="no_border"><strong>Banned</strong> users</h1>
    <!--div class="notice">Public ads on the site</div-->
    <div class="search_cars" style="margin-bottom: 0px !important;">
        <div class="found_count">
            <span>Found:</span> {{{ count($data['users']) }}} banned users
        </div>
    </div>
    <div class="cars_list">

        @foreach($data['users'] as $user)
        <div class="car" style="height: 50px !important">
            <div class="general_info">
                <h2>{{{ $user['username'] }}}</h2>
                <div class="price"><span>Email:</span> {{{ $user['email'] }}}</div>
                <div class="date"><span>Registered On:</span> {{{ date('M j, Y', strtotime($user['created_at'])) }}}</div>

            </div>
            <div class="actions" style="padding-top: 30px !important">
                <div class="checkbox" style="height: 10px !important">Uid : {{{ $user['id'] }}}</div> |
                <a href="{{{ Config::get('view.site_url') }}}/admin/dashboard/ban/{{{ $user['id'] }}}/1" class="markered">Un-ban User</a>
            </div>
        </div>

        @endforeach

    </div>
</div>
<aside id="sidebar" class="sidebar c-overflow">
    <div class="profile-menu">
        <a href="">
            <div class="profile-pic">
                <img src="/images/my.jpeg">
            </div>
            <div class="profile-info">
                {{ Auth::user()->display_name }}
                <i class="zmdi zmdi-caret-down"></i>
            </div>
        </a>
        <ul class="main-menu">
            <li @if (Request::is('admin/profile')) class="active" @endif><a href="{{url('admin/profile')}}"><i class="zmdi zmdi-account"></i> Profile</a></li>
            <li @if (Request::is('admin/profile/*')) class="active" @endif><a href="{{route('admin.profile.edit', Auth::id())}}"><i class="zmdi zmdi-settings"></i> Settings</a></li>
            <li><a href="{{url('auth/logout')}}" name="logout"><i class="zmdi zmdi-power"></i> Sign out</a></li>
        </ul>
    </div>
    <ul class="main-menu">
        <li @if (Request::is('admin/post*')) class="active" @endif><a href="{{url('admin/post')}}"><i class="zmdi zmdi-view-compact"></i> Posts <span class="label label-default label-totals">{{ App\Models\Post::count() }}</span></a></li>
        <li @if (Request::is('admin/tag*')) class="active" @endif><a href="{{url('admin/tag')}}"><i class="zmdi zmdi-tag"></i> Tags <span class="label label-default label-totals">{{ App\Models\Tag::count() }}</span></a></li>
        <li @if (Request::is('admin/upload*')) class="active" @endif><a href="{{url('admin/upload')}}"><i class="zmdi zmdi-cloud-upload"></i> Uploads</a></li>
    </ul>
</aside>

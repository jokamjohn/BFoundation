<aside id="sidebar" class="sidebar c-overflow">
    <div class="profile-menu">
        <a href="">
            <div class="profile-pic">
                <img src="//www.gravatar.com/avatar/{{ md5(Auth::user()->email) }}?d=identicon">
            </div>
            <div class="profile-info">
                John Kagga
                {{--{{ Auth::user()->display_name }}--}}
                <i class="zmdi zmdi-caret-down"></i>
            </div>
        </a>
        <ul class="main-menu profile-ul">
            <li @if (Request::is('#')) class="active" @endif><a href="#"><i class="zmdi zmdi-account"></i> Profile</a></li>
            <li @if (Request::is('#')) class="active" @endif><a href="#"><i class="zmdi zmdi-settings"></i> Settings</a></li>
            <li><a href="{{ url('/logout') }}" name="logout"><i class="zmdi zmdi-power"></i> Sign out</a></li>
        </ul>
    </div>
    <ul class="main-menu main-ul">
        <li @if (Request::is('employer/dashboard')) class="active" @endif><a href="{{ route('employer.dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
        <li @if (Request::is('employer/job/*')) class="active" @endif><a href="{{ route('job.index') }}"><i class="zmdi zmdi-collection-bookmark"></i> Jobs <span class="label label-default label-totals">1</span></a></li>
        <li @if (Request::is('#')) class="active" @endif><a href="#"><i class="zmdi zmdi-labels"></i> Tags <span class="label label-default label-totals">2</span></a></li>
        <li @if (Request::is('#')) class="active" @endif><a href="#"><i class="zmdi zmdi-cloud-upload"></i> Uploads</a></li>
        <li @if (Request::is('#')) class="active" @endif><a href="#"><i class="zmdi zmdi-wrench"></i> Tools</a></li>
    </ul>
</aside>

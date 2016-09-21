<nav class="navbar navbar-default navbar-custom">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand brand-font" href="{{ url('/') }}">Blue Collar <span
                        class="label label-primary">Beta</span> </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right" style="">
                <li><a data-toggle="modal" href="{{ route('youth.jobs.index') }}">Jobs</a></li>
                <li><a data-toggle="modal" href="{{ route('youth.trainings.index') }}">Trainings</a></li>

            @if (Auth::guest())
                    <button type="button" class="btn btn-default navbar-btn"
                            style="border: 0; background-color: #FFFFFF"><a
                                href="{{ route('employer.dashboard') }}">EMPLOYERS</a></button>

                    <li><a data-toggle="modal" href="{{ url('/login') }}">Login</a></li>
                    <li><a data-toggle="modal" href="{{ url('/register') }}">Sign Up</a></li>
                @else
                    @if(seeker(Auth::user()))
                        <li><a data-toggle="modal" href="{{ route('profile.show', userId()) }}">Profile</a></li>
                    @endif


                    <li>
                        <a href="{{ url('/logout') }}">
                            <i class="fa fa-btn fa-sign-out"></i>
                            Log out
                        </a>
                    </li>
                @endif
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
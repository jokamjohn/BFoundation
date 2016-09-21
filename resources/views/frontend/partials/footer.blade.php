<footer id="footer">



    <div class="footer-left">

        <p class="footer-links">
            <a href="{{ url('/') }}">Home</a>
            ·
            <a href="{{ url('/login') }}">Sign In</a>
            ·
            <a href="{{ url('/register') }}">Register</a>
            ·
            <a href="{{ route('youth.jobs.index') }}">Jobs</a>
            .
            <a href="#">Trainings</a>
            ·
            <a href="{{ route('auth.employer.login') }}">Partners</a>
        </p>

        <p>{{ config('app.name') }} &copy; 2016</p>
    </div>

</footer>
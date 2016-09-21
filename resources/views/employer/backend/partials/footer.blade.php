<footer id="footer">
    &copy; {{ \Carbon\Carbon::today()->format('Y') }} {{ config('app.name') }}.

    <ul class="f-menu">
        <li><a href="#">Profile</a></li>
        <li><a href="{{ route('youth.jobs.index') }}">Jobs</a></li>
        <li><a href="{{ route('youth.trainings.index') }}">Trainings</a></li>
        <li><a href="#">Uploads</a></li>
        <li><a href="#">Tools</a></li>
        <li><a href="#">Help</a></li>
    </ul>
</footer>

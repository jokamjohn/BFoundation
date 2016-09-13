<footer id="footer">
    &copy; {{ \Carbon\Carbon::today()->format('Y') }} {{ config('app.name') }}.

    <ul class="f-menu">
        <li><a href="#">Profile</a></li>
        <li><a href="#">Posts</a></li>
        <li><a href="#">Tags</a></li>
        <li><a href="#">Uploads</a></li>
        <li><a href="#">Tools</a></li>
        <li><a href="#">Help</a></li>
    </ul>
</footer>

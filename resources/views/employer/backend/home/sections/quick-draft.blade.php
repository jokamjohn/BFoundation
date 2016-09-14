<div class="card">
    <div class="card-header">
        <h2>Quick Draft
            <small>Save a quick draft post:</small>
        </h2>

        <br>

        @include('shared.errors')

        @include('shared.success')

        <form class="keyboard-save" role="form" method="POST" id="postCreate" action="#">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            @include('employer.backend.home.partials.form')

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-icon-text"><i class="zmdi zmdi-floppy"></i> Save</button>
            </div>
        </form>
    </div>
</div>
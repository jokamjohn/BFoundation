@extends('employer.backend.layout')

@section('title')
    <title>{{ config('app.name') }} | New Job</title>
@stop

@section('content')
    <section id="main">

        @include('employer.backend.partials.sidebar-navigation')

        <section id="content">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <ol class="breadcrumb">
                            <li><a href="{{ url('/employer/dashboard') }}">Home</a></li>
                            <li><a href="#">Jobs</a></li>
                            <li class="active">New Job</li>
                        </ol>

                        @include('shared.errors')

                        @include('shared.success')

                        <h2>Create a New Job
                            <br>
                            <small>Set a page image to feature at the top of your blog post by specifying the image path relative to the uploads directory.</small>
                        </h2>
                    </div>
                    <div class="card-body card-padding">
                        <form class="keyboard-save" role="form" method="POST" id="jobCreate" action="{{ route('job.store') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            @include('employer.backend.job.partials.form')

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-icon-text"><i class="zmdi zmdi-floppy"></i> Save</button>
                                &nbsp;
                                <a href="{{ route('job.index') }}"><button type="button" class="btn btn-link">Cancel</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>


@stop

@section('unique-js')


    @include('employer.backend.shared.notifications.protip')
    @include('employer.backend.shared.components.datetime-picker')

    @include('employer.backend.shared.components.slugify')

    {!! JsValidator::formRequest('App\Http\Requests\JobCreateRequest', '#jobCreate') !!}
@stop

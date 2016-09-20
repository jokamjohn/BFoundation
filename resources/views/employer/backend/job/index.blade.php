@extends('employer.backend.layout')

@section('title')
    <title>{{ config('app.name') }} | Jobs</title>
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
                            <li class="active">Jobs</li>
                        </ol>
                        <ul class="actions">
                            <li class="dropdown">
                                <a href="" data-toggle="dropdown">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="">Refresh Jobs</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        @include('shared.errors')
                        @include('shared.success')

                        <h2>Jobs&nbsp;
                            <a href="{{ route('job.create') }}"><i class="zmdi zmdi-plus-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Create a new job"></i></a>

                            <small>This page provides a comprehensive overview of all jobs you have posted. Click the <span class="zmdi zmdi-edit text-primary"></span> icon next to each post to update its contents or the <span class="zmdi zmdi-search text-primary"></span> icon to see what it looks like to your readers.</small>
                        </h2>
                    </div>

                    <div class="table-responsive">
                        <table id="jobs" class="table table-condensed table-vmiddle">
                            <thead>
                            <tr>
                                <th data-column-id="title">Title</th>
                                <th data-column-id="subtitle">Positions</th>
                                <th data-column-id="slug">Location</th>
                                <th data-column-id="published" data-type="date">Phone Number</th>
                                <th data-column-id="contactName" data-type="date">Contact Name</th>
                                <th data-column-id="created" data-type="date" data-order="desc">Created</th>
                                <th data-column-id="updated" data-type="date">Deadline</th>
                                <th data-column-id="commands" data-formatter="commands" data-sortable="false">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($jobs as $job)
                                <tr>
                                    <td>{{ $job->title }}</td>
                                    <td>{{ $job->positions }}</td>
                                    <td>{{ $job->location }}</td>
                                    <td>{{ $job->phoneNumber }}</td>
                                    <td>{{ $job->contactName }}</td>
                                    <td>{{ $job->created_at->format('M d, Y') }}</td>
                                    <td>{{ $job->deadline->format('M d, Y') }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </section>
@stop

@section('unique-js')
    @if(Session::get('_login'))
        @include('employer.backend.partials.notify', ['section' => '_login'])
        {{ \Session::forget('_login') }}
    @endif

    @if(Session::get('_new-post'))
        @include('employer.backend.partials.notify', ['section' => '_new-post'])
        {{ \Session::forget('_new-post') }}
    @endif

    @if(Session::get('_delete-post'))
        @include('employer.backend.partials.notify', ['section' => '_delete-post'])
        {{ \Session::forget('_delete-post') }}
    @endif

    @include('employer.backend.job.partials.datatable')
@stop

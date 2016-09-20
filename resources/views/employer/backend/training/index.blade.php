@extends('employer.backend.layout')

@section('title')
    <title>{{ config('app.name') }} | Trainings</title>
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
                            <li class="active">Trainings</li>
                        </ol>
                        <ul class="actions">
                            <li class="dropdown">
                                <a href="" data-toggle="dropdown">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="">Refresh trainings</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        @include('shared.errors')
                        @include('shared.success')

                        <h2>Trainings&nbsp;
                            <a href="{{ route('training.create') }}"><i class="zmdi zmdi-plus-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add a training"></i></a>

                            <small>This page provides a comprehensive overview of all jobs you have posted. Click the <span class="zmdi zmdi-edit text-primary"></span> icon next to each post to update its contents or the <span class="zmdi zmdi-search text-primary"></span> icon to see what it looks like to your readers.</small>
                        </h2>
                    </div>

                    <div class="table-responsive">
                        <table id="jobs" class="table table-condensed table-vmiddle">
                            <thead>
                            <tr>
                                <th data-column-id="title">Title</th>
                                <th data-column-id="subtitle">Venue</th>
                                <th data-column-id="slug">Location</th>
                                <th data-column-id="published" data-type="date">Phone Number</th>
                                <th data-column-id="contactName" data-type="date">Contact Name</th>
                                <th data-column-id="created" data-type="date" data-order="desc">Created</th>
                                <th data-column-id="updated" data-type="date">Date</th>
                                <th data-column-id="commands" data-formatter="commands" data-sortable="false">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($trainings as $training)
                                <tr>
                                    <td>{{ $training->title }}</td>
                                    <td>{{ $training->venue }}</td>
                                    <td>{{ $training->location }}</td>
                                    <td>{{ $training->phoneNumber }}</td>
                                    <td>{{ $training->contactName }}</td>
                                    <td>{{ $training->created_at->format('M d, Y') }}</td>
                                    <td>{{ $training->date->format('M d, Y') }}</td>
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

    @include('employer.backend.training.partials.datatable')
@stop

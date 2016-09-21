@extends('frontend.layout')

@foreach($jobs as $job)

@section('title', ucfirst($job->title) . " - Job Entry" )

@section('content')

    <div class="container-fluid body-shade">
        <div class="container body-shade">

            <br><br>

            <div class="row">
                <div class="col-md-2"></div>

                <div class="col-md-8">
                    <div class="my-inner">
                        <div class="row make-card job-card">
                            <h3 style="text-align: center; font-family: 'Roboto Medium',sans-serif">{{ ucfirst($job->title) }}</h3>
                            <hr>

                            <p class="job_fields"><strong>Description: </strong>
                                {{ ucfirst($job->description) }}
                            </p>

                            <p class="job_fields"><strong>Location: </strong>
                                {{ ucfirst($job->location) }}
                            </p>

                            <p class="job_fields"><strong>Category: </strong>
                                {{ ucfirst($job->category->name) }}
                            </p>

                            @if(count($job->employer) >0)
                                @foreach($job->employer as $employer)
                                    <p class="job_fields">
                                        <strong>Employer: </strong>
                                        {{ ucfirst($employer->firstName) ." ". ucfirst($employer->lastName) }}
                                    </p>
                                @endforeach
                            @else
                                <p class="job_fields">
                                    <strong>Employer: </strong>
                                    Administrator
                                </p>
                            @endif

                            <p class="job_fields"><strong>Positions: </strong>
                                {{ $job->positions }}
                            </p>

                            <hr>


                            <p class="job_fields"><strong>Contact: </strong>
                                {{ ucfirst($job->contactName) }} <span> on {{ $job->contactPhoneNumber }}</span>
                            </p>

                            <p class="job_fields"><strong>Application Procedures: </strong>Contact
                                {{ ucfirst($job->contactName) }} <span> on {{ $job->contactPhoneNumber }}</span>
                                and make further inquiries
                            </p>

                            <p class="job_fields"><strong>Deadline: </strong>
                                {{ $job->deadline->toDateTimeString() }}
                            </p>

                        </div>
                    </div>
                </div>

                <div class="col-md-2"></div>
            </div>
            <br><br><br>
        </div>
    </div>

@endforeach

    @include('frontend.partials.footer')
@endsection
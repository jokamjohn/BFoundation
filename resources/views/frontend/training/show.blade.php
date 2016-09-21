@extends('frontend.layout')

@foreach($trainings as $training)
@section('title', ucfirst($training->title) . " - Training Opportunity" )

@section('content')

    <div class="container-fluid body-shade">
        <div class="container body-shade">

            <br><br>

            <div class="row">
                <div class="col-md-2"></div>

                <div class="col-md-8">
                    <div class="my-inner">
                        <div class="row make-card job-card">
                            <h3 style="text-align: center; font-family: 'Roboto Medium',sans-serif">{{ ucfirst($training->title) }}</h3>
                            <hr>



                            <p class="job_fields"><strong>Description: </strong>
                                {{ ucfirst($training->description) }}
                            </p>

                            <p class="job_fields"><strong>Organisation: </strong>
                                {{ $training->organisation }}
                            </p>

                            <p class="job_fields"><strong>Location: </strong>
                                {{ ucfirst($training->location) }}
                            </p>

                            <p class="job_fields"><strong>Category: </strong>
                                {{ ucfirst($training->category->name) }}
                            </p>


                            <p class="job_fields"><strong>Contact: </strong>
                                {{ ucfirst($training->contactName) }}
                                <span> on {{ $training->contactPhoneNumber }}</span>
                            </p>

                            <p class="job_fields"><strong>Attendance Procedures: </strong>Contact
                                {{ ucfirst($training->contactName) }} <span> on {{ $training->phoneNumber }}</span>
                                and make further inquiries
                            </p>

                            <p class="job_fields"><strong>Date: </strong>
                                {{ $training->date->toDateTimeString() }}
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
@extends('frontend.layout')

@section('title', 'Trainings Available')

@section('content')

    @if(count($trainings) > 0)
        <div class="container-fluid body-shade">
            <div class="container body-shade">

                <h1 style="text-align: center">Available Trainings</h1>
                <hr>
                <br>

                @foreach(array_chunk($trainings->getCollection()->all(), 3) as $row)
                    <div class="row">
                        @foreach($row as $training)
                            <div class="col-md-4 col-sm-6">
                                <div class="my-inner">
                                    <div class="row make-card">

                                        @include('frontend.training.card')

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>

    @else

        @include('shared.empty', [ 'title' => 'Trainings', 'message' => 'No Trainings At the moment'])

    @endif

    @include('frontend.partials.footer')
@endsection

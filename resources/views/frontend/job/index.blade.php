@extends('frontend.layout')

@section('title', 'Jobs Available')

@section('content')

    @if(count($jobs) > 0)
        <div class="container-fluid body-shade">
            <div class="container body-shade">

                <h1 style="text-align: center">Jobs Posted</h1>
                <hr>
                <br>

                @foreach(array_chunk($jobs->getCollection()->all(), 3) as $row)
                    <div class="row">
                        @foreach($row as $job)
                            <div class="col-md-4 col-sm-6">
                                <div class="my-inner">
                                    <div class="row make-card">

                                        @include('frontend.job.card')

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>

    @else

        @include('shared.empty', [ 'title' => 'Jobs', 'message' => 'No Jobs At the moment'])

    @endif

    @include('frontend.partials.footer')
@endsection

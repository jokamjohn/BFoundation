@extends('employer.backend.layout')

@section('title')
    <title>{{ config('app.name') }} | Sign Up</title>
@stop

@section('login')
    <section id="main">
        <section id="content">
            <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12">
                <div class="card">
                    <br>
                    <div class="card-header" style="text-align: center">
                        {{--<img src="{{ asset('images/favicon.png') }}" style="width: 85px">--}}
                    </div>

                    <div class="card-body card-padding" id="login-ch">
                        <p class="f-20 f-300 text-center">Welcome</p>
                        <p class="text-muted text-center">Please fill the form to sign up</p>

                        @include('shared.errors')

                        @include('employer.auth.partials.register')

                        <br>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection

@section('unique-js')
    {!! JsValidator::formRequest('App\Http\Requests\EmployerRegisterRequest', '#register'); !!}
    @include('employer.backend.shared.components.show-password', ['inputs' => 'input[name="password"]'])
@stop

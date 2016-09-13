<form role="form" id="register" method="POST" action="{{ route('auth.employer.post.register') }}">
    {!! csrf_field() !!}


    <div class="form-group fg-line">
        <input type="text" name="firstName" value="{{ old('firstName') }}"
               class="form-control form-style" id="firstName"
               placeholder="First Name">
    </div>

    <div class="form-group fg-line">
        <input type="text" name="lastName" value="{{ old('lastName') }}"
               class="form-control form-style" id="lastName"
               placeholder="Last Name">
    </div>

    <div class="form-group fg-line">
        <input type="email" class="form-control"
               name="email" value="{{ old('email') }}" placeholder="Email">
    </div>

    <div class="form-group fg-line">
        <input type="password" name="password" class="form-control"
               placeholder="Password">
    </div>

    <div class="form-group fg-line">
        <input type="password" name="password_confirmation" class="form-control form-style"
               id="passwordReInput" placeholder="Confirm Password">
    </div>

    <button type="submit" name="submit" class="btn btn-primary btn-block m-t-10">create</button>

</form>

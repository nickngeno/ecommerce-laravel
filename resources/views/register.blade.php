@extends('master')
@section("content")

<div class="container content">
    <div class="row login-wrapper">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="col-md-5 shadow-lg p-5 mb-5 rounded">
            <form action="/register" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="fname" class="col-sm-4 col-form-label">First Name:</label>
                    <div class="col-sm-8">
                        <input type="text" name="fname" class="form-control" id="fname" placeholder="Firstname">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="lname" class="col-sm-4 col-form-label">Last Name:</label>
                    <div class="col-sm-8">
                        <input type="text" name="lname" class="form-control" id="lname" placeholder="Lastname">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-4 col-form-label">Email:</label>
                    <div class="col-sm-8">
                        <input type="email" name="email" class="form-control" id="email" placeholder="email">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-sm-4 col-form-label">Password:</label>
                    <div class="col-sm-8">
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                </div>
                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-4 pt-0">Gender:</legend>
                    <div class="col-sm-8">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                            <label class="form-check-label" for="male">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                            <label class="form-check-label" for="female">
                                Female
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                            <label class="form-check-label" for="other">
                                Other
                            </label>
                        </div>
                    </div>
                </fieldset>
                <div class="row">
                    <button type="submit" class="btn btn-primary mb-3">Sign Up</button>
                    <a class="btn btn-secondary" href="/login">Login</a>
                </div>
            </form>
        </div>

    </div>

</div>
@endsection
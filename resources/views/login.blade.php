@extends('master')
@section("content")

<div class="container content">
    @if(Session::has('success'))
    <div class="alert alert-success">
        <p>{{Session::get('success') }}</p>
        
    </div>
    @endif
    <div class="row login-wrapper">
        <div class=" col-md-5 shadow-lg p-5 mb-5 rounded">
            <form action="login" method="POST">
                @csrf
                <div class="form-group row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email :</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password:</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    </div>
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>

            </form>
            <p>Don't have an account yet? <a href="/register">register here</a></p>
        </div>

    </div>

</div>
@endsection
@extends('master')
@section('content')
<div class="container">
    <div class="row d-flex justify-content-between">
        <p>results</p>
        <a href="/products">🔙 Go Back</a>
    </div>

    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Pic</th>
                </tr>
                @foreach ($results as $result)
                 <tbody>
                    <td>{{$result->id}}</td>
                    <td>{{$result->name}}</td>
                    <td>{{$result->description}}</td>
                    <td>{{$result->price}}</td>
                    <td><img src="{{$result->picture}}" alt=""></td>
                    <td><a class="btn btn-primary" href="/productdetail/{{$result->id}}">Shop</a></td>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>

</div>

@endsection
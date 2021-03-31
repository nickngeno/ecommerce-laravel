@extends('master');
@section('content')
<div class="container-fluid">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            @foreach($products as $product)
            <div class="carousel-item {{$product['id'] ==1 ? 'active' : ''}}">
                <img class="d-block w-100 slider-img" src="{{$product->picture}}" alt="First slide">
                <div class="carousel-caption d-none d-md-block slider-text">
                    <h5>{{$product->name}}</h5>
                    <p>{{$product->description}}.</p>
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<div class="container">
    <div class="trending-products">
        @foreach($products as $product)
        <a href="productdetail/{{$product->id}}">
            <div class="card mr-3">
                <img class="card-img-top" src="{{$product->picture}}" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <span class="badge badge-pill badge-primary">${{$product->price}}</span>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
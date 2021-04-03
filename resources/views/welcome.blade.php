@extends('master')
@section('content')
<div class="content">
    <div class="row">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://productview2.fanobject.com/0027/9741/00279741_00.jpg?" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block slider-text">
                        <h5>Chelsea Fc Home Kit</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://images.footballfanatics.com/manchester-city/manchester-city-home-shirt-2020-21_ss4_p-12014287+u-1h0c9x7zhod9c4jnxjvu+v-cdc2c3c260364949bbcbdb029d515b17.jpg?_hv=1&w=340" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block slider-text">
                        <h5>Manchester City Home Kit</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://images.footballfanatics.com/manchester-united/manchester-united-home-shirt-2020-21_ss4_p-12013843+u-xtr1w4xbtu4xsrdzdz8+v-8ec7537ae24f4568bc623ff9279cf738.jpg?_hv=1&w=340" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block slider-text">
                        <h5>Manchester United Home Kit</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="row trending-products">
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
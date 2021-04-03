@extends('master')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-6 product-detail">
            <h3>{{$product->name}}</h3>
            <img src="{{$product->picture}}" alt="">
            <h3 class="description">Description</h3>
            <hr>
            <p>{{$product->description}}</p>

        </div>
        <div class="col-md-6 pricing-detail">
        🔙<a href="/products">Go Back</a>
            <h3>Product price: ${{$product->price}} </h3>
            <form action="/addtocart" method="POST">
            @csrf
                <div class="form-group">
                    <input type="hidden" name="product_id" value={{$product->id}} min=0>
                </div>
                <button class="btn btn-primary mt-2" type="submit">Add to Cart</button>
            </form>
            <button class="btn btn-success mt-2">Buy Now</button>
        </div>
    </div>

</div>

@endsection
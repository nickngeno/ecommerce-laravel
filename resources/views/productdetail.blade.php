@extends('master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 product-detail">
            <h2>{{$product->name}}</h2>
            <img src="{{$product->picture}}" alt="">
            <h3 class="description">Description</h3>
            <hr>
            <p>{{$product->description}}</p>

        </div>
        <div class="col-md-6 pricing-detail">
            <a href="/products">🔙 Go Back</a>
            <h3>Product price: ${{$product->price}} </h3>
            <p>Add the product to cart</p>
            <form action="">
                <div class="form-group">
                    <label for="">Quantity</label>
                    <input type="number" name="quantity" min=0>
                </div>
                <button class="btn btn-primary mt-2">Add to Cart</button>
            </form>
            <button class="btn btn-success mt-2">Buy Now</button>
        </div>
    </div>

</div>

@endsection
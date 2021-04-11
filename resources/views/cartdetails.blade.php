@extends('master')
@section('content')
<div class=" container content">
    <h5 style="font-weight: bold;">My Cart</h3>
        @if(session()->has('user') && $products != null)
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Picture</th>
                            <th>Product Name</th>
                            <th>Price</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td><img src="{{$product->picture}}" alt="" style="width: 70px;height: auto;"></td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td><a href="/removefromcart/{{$product->cart_id}}">🚮 Remove from Cart</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 cart-buttons">
                <div>
                    <a href="/products" class="btn btn-warning">Proceed to Shop</a>
                    <a href="/checkout" class="btn btn-success">Buy Now</a>
                </div>

                <table class="table" style="width: 400px;">
                    <tbody>
                        <tr>
                            <th>Subtotal</th>
                            <td>{{$amounts[0]}}</td>
                        </tr>
                        <tr>
                            <th>VAT</th>
                            <td>{{$amounts[1]}}</td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td><strong>$ {{$amounts[2]}} </strong></td>
                        </tr>
                    </tbody>
                    <tfoot style="text-align: center; font-style:italic">
                        <tr>
                            <td><strong>Note:</strong> Local delivery fees not included</td>
                        </tr>

                    </tfoot>
                </table>
            </div>
        </div>
        @elseif(session()->has('user') && $message != null)
        <div class="empty-cart">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            <p style="text-align: center;padding:1rem; font-style:italic">{{$message}}</p>
            <p><a href="/products" class="btn btn-warning"> Start Shopping</a></p>
        </div>
        @else
        <div class="empty-cart">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            <p style="text-align: center;padding:1rem; font-style:italic">{{$message}}</p>
            <p>Already have an account? <a href="/login"> Login</a> to see the items in your cart.</p>
            <a href="/products" class="btn btn-primary">Start Shopping</a>

        </div>
        @endif
</div>
@endsection
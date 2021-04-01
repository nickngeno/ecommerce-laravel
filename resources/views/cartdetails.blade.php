@extends('master')
@section('content')
<div class="container mt-3">
    <h5>My Cart</h3>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <tr>
                        <thead>
                            <th>ProductID</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>SubTotal</th>
                        </thead>
                    </tr>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->user_id}}</td>
                            <td>{{$product->product_id}}</td>
                            <td>1</td>
                            <td>120</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 total-cost">
                <table class="table" style="width: 400px;">
                    <tbody>
                        <tr>
                            <th>Subtotal</th>
                            <td>120</td>
                        </tr>
                        <tr>
                            <th>VAT</th>
                            <td> 0</td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td>KSH 120</td>
                        </tr>
                    </tbody>
                </table>
                <span class="mr-4"><strong>Note:</strong> Local delivery fees not included</span>
            </ iv>
        </div>
</div>
@endsection
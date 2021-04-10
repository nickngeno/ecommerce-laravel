@extends('master')
@section('content')
<div class="content">
    <h5 style="font-weight: bold;">My Orders</h3>
        @if(session()->has('user') && $myorders != null)
        <!-- @php printf($myorders) @endphp -->
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>OrderID</th>
                            <th>Picture</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Payment Status</th>
                            <th>Delivery Status</th>
                            <th>Address</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($myorders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td><img src="{{$order->picture}}" alt="" style="width: 70px;height: auto;"></td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->price}}</td>
                            <td>{{$order->payment_status}}</td>
                            <td>{{$order->status}}</td>
                            <td>{{$order->address}}</td>
                        </tr>
                        @endforeach
                    </tbody>
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
            <a href="/products" class="btn btn-warning">Start Shopping</a>

        </div>
        @endif
</div>
@endsection
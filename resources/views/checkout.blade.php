@extends('master')
@section('content')

<div class="content">
    <h5 style="font-weight: bold;">My Cart</h3>
        <div class="row">
            <div class="col-md-8">
                <p>Total cart amount : <strong>$ {{$amounts[2]}}</strong> </p>
                <form action="/ordernow" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="address" class="col-sm-2">Address</label>
                        <div class="col-sm-10">
                            <input type="text" name="address" id="address" class="form-control" placeholder="enter your address" aria-describedby="helpId">
                        </div>
                    </div><br>
                    <div class="form-group row">
                        <label for="transactionID" class="col-sm-2">M-Pesa confirmation</label>
                        <div class="col-md-10">
                            <input type="text" name="transactionID" id="transactionID" class="form-control" placeholder="transactionID" aria-describedby="helpId">
                        </div>
                    </div><br>

                    <button type="submit" class="btn btn-primary">Order</button>
                </form>
            </div>
            <div class="col-md-4">
                <h3>Follow the instructions to complete your purchase</h3>
                <ol>
                    <li>Visit your MPesa menu</li>
                    <li>Lipa na M-Pesa</li>
                    <li>Enter till no: <strong>567 6187</strong></li>
                    <li>Enter amount</li>
                    <li>Enter your pin</li>
                </ol>
            </div>
        </div>
</div>

@endsection
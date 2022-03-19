@extends('layouts.customerapp')
@section('content')
@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif
    <h1>Order Details</h1>
    <h4>Order Id: {{$order->id}}</h4>
    <h4>Order By: {{$order->customer->name}}</h4>
    <h4>Phone: {{$order->customer->phone}}</h4>
    <h5>Order Details </h5>
    <table class="table table-bordered">
        <tr>
            <td>Name</td>
            <td>Unit Price</td>
            <td>quantity</td>
        </tr>
        @foreach($order->orderdetails as $od)
            <tr>
                <td>{{$od->product->name}}</td>
                <td>{{$od->unit_price}}</td>
                <td>{{$od->quantity}}</td>
            </tr>
        @endforeach
    </table>
@endsection
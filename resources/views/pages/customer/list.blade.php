@extends('layouts.customerapp')
@section('content')
@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif
    <table class="table table-borded">
        <tr>
            <th></th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Description</th>
            <th></th>
        </tr>
        @foreach($inventory as $inventory)
            <tr>
                <td><img src="{{asset('images/' . $inventory->image_path)}}" alt=""></td>
                <td>{{$inventory->name}}</td>
                <td>{{$inventory->price}}</td>
                <td>{{$inventory->quantity}}</td>
                <td>{{$inventory->description}}</td>
                <td> <a href="{{route('products.addtocart',['id'=>$inventory->product_id])}}" class="btn btn-primary" style="color:white">Add to Cart</a></td>
            </tr>
        @endforeach
    </table>
    <a href="{{route('products.viewcart')}}" class="btn btn-primary" style="color:white">View Cart</a>
    <a href="{{route('customer.dashboard')}}" class="btn btn-secondary" >Back</a>
@endsection

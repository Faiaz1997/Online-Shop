@extends('layouts.app')
@section('content')
@if (session('alert'))
<div class="alert alert-success">
    {{ session('alert') }}
</div>
@endif
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Shopping</title>
</head>

<body>
    <div class="d-flex justify-content-center mt-4">
        <a href="{{route('products.viewcart')}}" class="btn btn-primary mb-5" style="color:white">View Cart</a>
    </div>
    <div class="home-container">
        @foreach($inventory as $inventory)
        <div class="card" style="width: 20rem;padding:1rem; align-items:center;">
            <img class="card-img-top" src="{{asset('images/' . $inventory->image_path)}}" alt="Product Image" style="width: 18rem;height:12rem;margin:1rem">
            <div class="card-body">
                <h5 class="card-title d-flex justify-content-center">{{$inventory->name}}</h5>
                <h5 class="card-title d-flex justify-content-center">Price: {{$inventory->price}}</h5>
                <div class="scroll-box">
                <p class="card-text">{{$inventory->description}}</p>
                </div>
                <a href="{{route('products.addtocart',['id'=>$inventory->product_id])}}" class="btn btn-primary d-flex justify-content-center" style="color:white">Add to Cart</a>
            </div>
        </div>
        @endforeach
    </div>


</body>

</html>
@endsection
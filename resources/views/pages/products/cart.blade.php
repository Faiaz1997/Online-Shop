
@extends('layouts.customerapp')
@section('content')
    @if(Session::has('cart'))
        <table class="table table-bordered">
            <tr>
                <td>Name</td>
                <td>Quantity</td>
                <td>Unit Price</td>
                <td>Total</td>
            </tr>
            @php
            $total = 0
            @endphp
            @foreach ($cart as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->price * $item->quantity}}</td>
                    @php 
                        $total += $item->price * $item->quantity
                    @endphp
                </tr>
            @endforeach
            <tr>
                <td></td><td></td><td></td>
                <td>Grand Total</td>
                <td>{{$total}}</td>
            </tr>
        </table>
        <form action="{{route('products.checkout')}}"method="post">
        {{csrf_field()}}
            <input type="hidden" name="bill" value="{{$total}}">
            <input type="submit" class="btn btn-success" value="checkout">
            <a href="{{route('products.emptycart')}}" class="btn btn-warning" >Empty Cart</a>
        </form>
        <a href="{{route('products.list')}}" class="btn btn-secondary" >Back</a>
    @else
    @if (session('alert'))
    <div class="alert alert-warning">
        {{ session('alert') }}
    </div>
    @endif
    @endif
@endsection
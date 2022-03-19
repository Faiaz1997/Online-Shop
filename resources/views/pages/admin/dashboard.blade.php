@extends('layouts.adminapp')
@section('content')
<h2>Admin Dashboard</h2>
<a href="{{route('inventory.list')}}"><button type="button" class="btn btn-primary" >Inventory</button></a>
<a href="{{route('inventory.create')}}"><button type="button" class="btn btn-primary" >Add</button></a>
@endsection


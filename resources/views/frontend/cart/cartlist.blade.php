@php
$totalCost = 0;
@endphp



@extends('layouts.front')

@section('title')
My Cart
@endsection


@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
     <div class="container">
         <h6 class="mb-0">
            <a href="{{ url('/') }}">
Home
</a> /
<a href="{{ url('cart') }}">
Cart
</a> /

</h6>
</div>
</div>
<h1>Shopping Cart</h1>
<div class="cart-items">
  <div class="container text-center">
  @foreach($products as $item)
    @php
    $subtotal = $item->price * $item->stock;
    $totalCost += $subtotal;
    @endphp

    <div class="row mb-4">
        <div class="col">
            <div>
            
            </div>
        </div>
        <div class="col text-center">
            <h3>{{ $item->name }}</h3>
        </div>
        <div class="col">
            <p>Price: {{ $item->price }}</p>
            <form action="/updatecart/{{$item->id}}" method="POST">
                @csrf
                @method('PUT')
                <p>Quantity: <input type="number" name="stock" value="{{ $item->stock }}" min="1"></p>
                <button type="submit" class="btn btn-primary">Update Quantity</button>
            </form>
            <p>Subtotal: {{ $subtotal }}</p>
        </div>
        <!-- <div class="col">
            <a href="/removecart/{{$item->id}}" class="btn btn-warning">Remove cart</a>
        </div> -->
    </div>
    <hr>
@endforeach

<div>
    <h4>Total Cost: {{ $totalCost }}</h4>
</div>
@endsection
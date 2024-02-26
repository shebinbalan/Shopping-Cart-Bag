@extends('layouts.admin')
@section('content')
<div class="card">
<div class="card-header">
        <h4>Cart List</h4>
        <hr>
    </div>
<div class="card-body">
  <table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>User Name</th>
            <th>Product Name</th>
            <th>Quantity</th>
                   
        </tr>
    </thead>
    <tbody>
    @foreach($carts as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{ optional($item->user)->name }}</td>
        <td>{{ $item->products->name }}</td> 
        <td>{{$item->prod_qty}}</td>
      
        
       
    </tr>
@endforeach
    </tbody>
  </table>
</div>
@endsection
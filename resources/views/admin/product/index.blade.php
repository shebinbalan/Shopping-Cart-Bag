@extends('layouts.admin')
@section('content')
<div class="card">
<div class="card-header">
        <h4>Products Page</h4>
        <hr>
    </div>
<div class="card-body">
  <table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Id</th>
             <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Action</th>           
        </tr>
    </thead>
    <tbody>
    @foreach($products as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->price}}</td>
        <td>{{$item->stock}}</td>
       
        <td>
            <a href="{{url('edit-product/'.$item->id)}}" class="btn btn-primary btn-sm">Edit</a>
            <a href="{{url('delete-product/'.$item->id)}}" class="btn btn-danger btn-sm">Delete</a>
        </td>
    </tr>
@endforeach
    </tbody>
  </table>
</div>
@endsection
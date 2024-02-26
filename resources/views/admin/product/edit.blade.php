@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Products</h4>
    </div>
<div class="card-body">
    <form action="{{url('update-product/'.$products->id)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
           <div class="col-md-6 mb-3">
                <label for=""> Product Name</label>
                <input type="text" class="form-control" name="name" value="{{$products->name}}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Price(USD)</label>
                <input type="text" class="form-control" name="price" value="{{$products->price}}">
            </div>
           
           
            <div class="col-md-6 mb-3">
                <label for="">Stock</label>
                <input type="number" class="form-control" name="stock" value="{{$products->stock}}">
            </div>
           
            <div class="col-md-12">
             <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
</div>
@endsection
@extends('layouts.front')

@section('title')
{{$products->name}}
@endsection
@section('content')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{url('/add-rating')}}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{$products->id}}">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Rate {{$products->name}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="rating-css">
    <div class="star-icon">  
    
     
    </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
<div class="container">
<h6 class="mb-0">
<a href="{{ url('category') }}">
Collections
</a> /
<a href="{{ url('category/'.$products->category->slug) }}">
{{ $products->category->name }}
</a> /
<a href="{{ url('category/'.$products->category->slug.'/'.$products->slug) }}"> {{ $products->name }}
</a>
</h6>
</div>
</div>
<!-- <div class="py-3 mb-4 shadow-sm bg-warning border-top">
<div class="container">
<h6 class="mb-0">Collections /{{ $products->category->name }}  / {{ $products->name }} </h6>
</div>
</div> -->

</span>
 </div>
 <p class="mt-3">
{!! $products->small_description !!}
</p>
<hr>
@if($products->qty > 0)
<label class="badge bg-success">In stock</label>
@else
<label class="badge bg-danger">Out of stock</label> 
@endif
<div class="row mt-2">
<div class="col-md-2">
    <input type="hidden" value="{{ $products->id}}" class="prod_id">
<label for="Quantity">Quantity</label>
<div class="input-group text-center mb-3" style="width: 130px;">
<button class="input-group-text decrement-btn">-</button>
<input type="text" name="quantity" value="1" class="form-control qty-input text-center"/>
 <button class="input-group-text increment-btn">+</button>
</div>
</div>
<div class="col-md-10">
<br/>
@if($products->qty > 0)
<button type="button" class="btn btn-success me-3 addToCartBtn float-start">Add to Cart<i class="fa fa-shoping-cart"></i></button>
@endif

 
</div>
</div>

</div>



</div>

</div>

</div>





@endsection
@section('scripts')

<script type="text/javascript">
    $(document).ready(function(){

        $('.addToCartBtn').click(function(e){
           e.preventDefault();
             var product_id = $(this).closest('.product_data').find('.prod_id').val();
             var product_qty = $(this).closest('.product_data').find('.qty-input').val();
           
             $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
            $.ajax({
                method:'POST',
                url : "{{URL::to('addtocart')}}",
                data:{
                    'product_id':  product_id,
                    'product_qty':  product_qty,
                },            
                success:function(response){
                    swal(response.status);
                }

            });
          });

        $('.increment-btn').click(function(e){
           e.preventDefault();
           
           var inc_value =$('.qty-input').val();
           var value =parseInt(inc_value,10);
           value=isNaN(value) ? 0 :value;
           if(value<10)
           {
            value++;
            $('.qty-input').val(value);
           }

         });

        
        $('.decrement-btn').click(function(e){
           e.preventDefault();
           
           var dec_value =$('.qty-input').val();
           var value =parseInt(dec_value,10);
           value=isNaN(value) ? 0 :value;
           if(value>1)
           {
            value--;
            $('.qty-input').val(value);
           }

         });


         $('.addToWishlist').click(function(e){
         e.preventDefault();
         var product_id = $(this).closest('.product_data').find('.prod_id').val();
         $.ajaxSetup({
       headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
       });
         $.ajax({
                method:'POST',
                url : "{{URL::to('add-to-wishlist')}}",
                data:{
                    'product_id':  product_id,
                    
                },            
                success:function(response){
                    swal(response.status);
                }

            });

      });
    });

</script>
@endsection


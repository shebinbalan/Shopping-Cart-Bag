@extends('layouts.admin')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<div class="card">
    <div class="card-header">
        <h4>Add Products</h4>
    </div>
<div class="card-body">
    <form action="{{url('insert-product')}}" method="POST" id="ajax-form">
        @csrf
        <div class="row">
          
            <div class="col-md-6 mb-3">
                <label for=""> Product Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Price(USD)</label>
                <input type="text" class="form-control" name="price">
            </div>
           
           
            <div class="col-md-6 mb-3">
                <label for="">Stock</label>
                <input type="number" class="form-control" name="stock">
            </div>
           
            <div class="col-md-12">
             <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
</div>
<script type="text/javascript">
    $('#ajax-form').submit(function(e) {
        e.preventDefault();
       
        var url = $(this).attr("action");
        let formData = new FormData(this);
  
        $.ajax({
                type:'POST',
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => {
                    alert('Form submitted successfully');
                    location.reload();
                },
                error: function(response){
                    $('#ajax-form').find(".print-error-msg").find("ul").html('');
                    $('#ajax-form').find(".print-error-msg").css('display','block');
                    $.each( response.responseJSON.errors, function( key, value ) {
                        $('#ajax-form').find(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                    });
                }
        });      
    });
    
</script>
@endsection
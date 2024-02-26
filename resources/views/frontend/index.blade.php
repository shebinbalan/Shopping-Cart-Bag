@extends('layouts.front')

@section('title')
Welcome to Shopping Cart
@endsection

@section('content')
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Featured Products Carousel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-b/Uj+Y0vew4NQa6r8wI/JS3tlRY6c0rGr/y9au9BvB4pvH8jEU3fizHuh3UkWz3Z" crossorigin="anonymous">
    <style>
        /* Custom CSS */
        .carousel-item img {
            height: 400px;
            object-fit: cover;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Featured Products</h2>
    <div class="row">
        @foreach($featured_products as $prod)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div id="carousel{{ $prod->id }}" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                           
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $prod->id }}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $prod->id }}" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $prod->name }}</h5>
                        <span class="float-start"> Price&nbsp;&nbsp; :&nbsp;{{$prod->price  }}</span> 
                       <span class="float-end">Stock&nbsp;&nbsp; :&nbsp;{{ $prod->stock }}</s></span>   
                        <!-- Add to Cart Button --><br>
                        <form action="add_to_cart" method="POST">
                            @csrf
                            <input type= "hidden" name="product_id" value="{{ $prod->id }}">
                            <input type= "text" name="prod_qty" placeholder="Enter Quantity">
                        <button class="btn btn-primary">Add to Cart</button>
    </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-Ui1yfI8iNtYIeXIsfzsuKXG57D4nfxDbfyx4j37XxKU2O7iF3QoJr9tnG97FhJsz" crossorigin="anonymous"></script>


@endsection
@section('scripts')
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
$('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
});
});
</script>
@endsection
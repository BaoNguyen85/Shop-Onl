@extends('layout')
@section('layout_content')
<section class="banner-dreamer">
    <img src="{{ asset('public/uploads/collection/'.$collection->collection_img) }}" alt="banner">
</section>
<section class="introduce">
    <h4>{{ $collection->collection_title }}</h4>
    <h3>{{ $collection->collection_description }}</h3>
    <p>{{ $collection->collection_content }}</p>
</section>
<section class="list-products-collection">
    @foreach($products as $key => $pro)
    <div class="product-collection" data-id="{{ $pro->product_id }}">
        <a href="{{ URL::to('product-detail/'.$pro->product_id) }}">
            <img src="{{ asset('public/uploads/product/'.$pro->product_image) }}" alt="product">
            <p>{{ $pro->product_name }}</p>
        </a>
        <div class="title-collection">
            <a href="{{ URL::to('product-detail/'.$pro->product_id) }}">{{ number_format($pro->product_price,0,',','.') }}đ</a>
            <a href="#">
                <i class="fa-solid fa-cart-shopping"></i>
            </a>
        </div>
        
    </div>
    @endforeach
</section>
<script>
    var cartAddUrl = {!! json_encode(route('cart.add')) !!};
</script>
@endsection
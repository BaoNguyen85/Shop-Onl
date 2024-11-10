@extends('layout')
@section('layout_content')
<section class="banner-sale">
    <img src="{{ asset('sales_banners.jpg') }}" alt="banner-sale">
</section>
<section class="menu-product">
    <a class="menu-item" href="{{ route('filter.category', 0) }}">Thời trang nam</a>
    <a class="menu-item" href="{{ route('filter.category', 1) }}">Thời trang nữ</a>
    <a class="menu-item" href="{{ route('filter.category', 2) }}">Thời trang trẻ em</a>
</section>
<section class="list-products">
    @foreach($all_products as $key => $products )
    <div class="product" data-id="{{ $products->product_id }}">
        <a href="{{ URL::to('product-detail/'.$products->product_id) }}">
            <img src="{{ asset('public/uploads/product/'.$products->product_image ) }}" alt="product">
            <p>{{ $products->product_name }}</p>
        </a>
        <div class="title">
            <a href="{{ URL::to('product-detail/'.$products->product_id) }}">{{ number_format($products->product_price,0,',','.') }}đ</a>
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
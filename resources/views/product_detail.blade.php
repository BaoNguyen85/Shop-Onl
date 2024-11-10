@extends('layout')
@section('layout_content')
@foreach($product as $key => $pro)
<section class="breadcrumb">
    <a href="{{ URL::to('/') }}">Trang chủ</a> &nbsp; > &nbsp;
    @if($pro->product_cate == 0)
    <a href="{{ route('filter.category', 0) }}">Nam</a>
    @elseif($pro->product_cate == 1)
    <a href="{{ route('filter.category', 1) }}">Nữ</a>
    @else
    <a href="{{ route('filter.category', 2) }}">Trẻ em</a>
    @endif
    &nbsp; > &nbsp;
    <a href="">{{ $pro->product_name }}</a>
</section>
<section class="product-detail">
    <img src="{{ asset('public/uploads/product/'.$pro->product_image ) }}" alt="">
    <div class="detail">
        <h2>{{ $pro->product_name }}</h2>
        <p>{{ number_format($pro->product_price,0,',','.') }}đ</p>
        @foreach($all_size as $key => $size)
        <p>
            @if($size->size_id == $pro->product_size)
            {{ $size->size_name }}
            @endif
        </p>
        @endforeach
        {{-- <p>Số lượng - 1 +</p> --}}
        <div class="quantity-selector">
            <div class="title">
                Số lượng
            </div>
            <div class="box-quantity">
                <button class="decrease-quantity" data-action="decrease"><i class="fa-solid fa-minus"></i></button>
                <input type="text" id="product-quantity" value="1" readonly>
                <button class="increase-quantity" data-action="increase"><i class="fa-solid fa-plus"></i></button>
            </div>
        </div>
        <div class="btn-group">
            <button class="btn-addcart" data-product-id="{{ $pro->product_id }}"><i class="fa-solid fa-cart-shopping"></i>&nbsp; Thêm vào giỏ hàng</button>
            <button class="btn-buynow">Mua hàng</button>
        </div>
    </div>
</section>
@endforeach
<section class="related">
    <h2>Sản phẩm liên quan</h2>
    <div class="list-products-related">
        @foreach($related_product as $key => $related)
        <div class="product" data-id="{{ $related->product_id }}">
            <a href="{{ URL::to('product-detail/'.$related->product_id) }}">
                <img src="{{ asset('public/uploads/product/'.$related->product_image ) }}" alt="product">
                <p>{{ $related->product_name }}</p>
            </a>
            <div class="title">
                <a href="{{ URL::to('product-detail/'.$related->product_id) }}">{{ number_format($related->product_price,0,',','.') }}đ</a>
                <a href="#">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</section>
<script>
    var cartAddUrl = {!! json_encode(route('cart.add')) !!};
</script>
@endsection
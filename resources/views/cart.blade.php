@extends('layout')
@section('layout_content')
<section class="cart">
    <h3><i class="fa-solid fa-cart-shopping"></i> Giỏ hàng</h3>
    <div class="content">
        <div class="list-product">
            <div class="title">
                <p>Hình ảnh</p>
                <p>Tên sản phẩm</p>
                <p>Số lượng</p>
                <p>Size</p>
                <p>Thành tiền</p>
                <p>Xóa</p>
            </div>
            @if(Session::has('cart') && count(Session::get('cart')) > 0)
            @php $total = 0; @endphp
                @foreach(Session::get('cart') as $key => $cart)
                <div class="product">
                    <img src="{{ asset('public/uploads/product/'.$cart['image']) }}" alt="{{ $cart['name'] }}">
                    <p>{{ $cart['name'] }}</p>
                    <div class="quantity-control">
                        <p class="decrease-quantity" data-product-id="{{ $key }}"><i class="fa-solid fa-minus"></i></p>
                        <p class="product-quantity">{{ $cart['quantity'] }}</p>
                        <p class="increase-quantity" data-product-id="{{ $key }}"><i class="fa-solid fa-plus"></i></p>
                    </div>
                    <p>{{ $cart['size'] }}</p>
                    <p>{{ number_format($cart['price'] * $cart['quantity'], 0, ',', '.') }}đ</p>
                    <p><a href="{{ route('cart.remove', $key) }}"><i class="fa-solid fa-x"></i></a></p>
                </div>
                @php $total += $cart['price'] * $cart['quantity']; @endphp
                @endforeach
            @else
                <p>Giỏ hàng của bạn đang trống.</p>
            @endif
            <div class="btn-order-cart">
                <a href="{{ URL::to('/order') }}">Đặt hàng</a>
            </div>
        </div>
        @if(Session::has('cart') && count(Session::get('cart')) > 0)
        <div class="total">
            <div>Tổng tiền:</div>
            <div>{{ number_format($total, 0, ',', '.') }}đ</div>
        </div>
        @endif
    </div>
</section>
<script>
    var cartUpdateUrl = {!! json_encode(route('cart.update')) !!};
</script>
@endsection

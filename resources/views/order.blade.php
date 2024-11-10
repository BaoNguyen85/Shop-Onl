@extends('layout')
@section('layout_content')
<section class="order">
    <h2>Thông tin đặt hàng</h2>
    <form action="{{ URL::to('/confirm-order') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @foreach($all_customer as $key => $customer)
        @if($customerID == $customer->customer_id)
        <div class="order-form">
            <div class="order-left">
                <div class="order-input">
                    <label for="">Họ tên:</label>
                    <input name="customer_id" type="hidden" value="{{ $customer->customer_id }}">
                    <p>{{ $customer->customer_name }}</p>
                </div>
                <div class="order-input">
                    <label for="">Email:</label>
                    <p>{{ $customer->customer_mail }}</p>
                </div>
                <div class="order-input">
                    <label for="">Địa chỉ:</label>
                    <p>{{ $customer->customer_address }}</p>
                </div>
                <div class="order-select">
                    <label for="">Phương thức thanh toán:</label>
                    <select name="payment_status" id="">
                        <option value="1">Thanh toán khi nhận hàng</option>
                        <option value="2">Trả sau</option>
                    </select>
                </div>
            </div>
            <div class="order-right">
                <div class="order-input">
                    <label for="">Số điện thoại:</label>
                    <p>{{ $customer->customer_phone }}</p>
                </div>
                <div class="order-input">
                    <label for="">Ngày sinh:</label>
                    <p>{{ $customer->customer_birth }}</p>
                </div>
            </div>
        </div>
        @endif
        @endforeach
        <div class="list-product">
            <div class="title">
                <p>Hình ảnh</p>
                <p>Tên sản phẩm</p>
                <p>SL</p>
                <p>Size</p>
                <p>Thành tiền</p>
            </div>
            @if(Session::has('cart') && count(Session::get('cart')) > 0)
            @php $total = 0; @endphp
            @foreach(Session::get('cart') as $key => $cart)
            <div class="product-order">
                <div class="image">
                    <img src="{{ asset('public/uploads/product/'.$cart['image']) }}" alt="">
                </div>
                <p>{{ $cart['name'] }}</p>
                <p>{{ $cart['quantity'] }}</p>
                <p>{{ $cart['size'] }}</p>
                <p>{{ number_format($cart['price'], 0, ',', '.') }}đ</p>
            </div>
            @php $total += $cart['price'] * $cart['quantity']; @endphp
            @endforeach
            @endif
        </div>
        <div class="result">
            <p>Tổng tiền: {{ number_format($total, 0, ',', '.') }}đ</p>
            <input name="order_total" type="hidden" value="{{ $total }}">
        </div>
        <div class="btn-order">
            <button type="submit">Đặt hàng</button>
        </div>
    </form>
</section>
@endsection
@extends('admin_layout')
@section('layout_admin')
<div class="content-order">
    <h2>Chi tiết đơn hàng</h2>
    <div class="order-detail-column">
        <div class="left">
            <div>Mã đơn hàng: abc</div>
            <div>Khách hàng: {{ $customer->customer_name }}</div>
            <div>Số điện thoại: {{ $customer->customer_phone }}</div>
            <div>Email: {{ $customer->customer_mail }}</div>
            <div>Thanh toán: Thanh toán khi nhận hàng</div>
            <div>Tổng tiền: 1.900.000đ</div>
        </div>
        <div class="right">
            <div>Trạng thái: Chờ xác nhận</div>
            <div>Ngày đặt: 10/09/2024</div>
            <div>Ngày sinh: {{ $customer->customer_birth }}</div>
            <div>Địa chỉ: {{ $customer->customer_address }}</div>
        </div>
    </div>
    <div class="order-detail">
        <h2>Danh sách sản phẩm</h2>
        <div class="list-product">
            <div class="title">
                <div>STT</div>
                <div>Hình ảnh</div>
                <div>Tên sản phẩm</div>
                <div>Giá mới</div>
                <div>SL</div>
                <div>Size</div>
                <div>Loại</div>
                <div>Bộ sưu tập</div>
            </div>
            @foreach($order_details_product as $key => $product)
            <div class="title">
                <div>1</div>
                <div>
                    @foreach($all_product as $key => $products)
                        @if($products->product_id == $product->product_id)
                        <img src="{{ asset('public/uploads/product/'.$products->product_image) }}" alt="">
                        @endif
                    @endforeach
                </div>
                <div>{{ $product->product_name }}</div>
                <div>{{ $product->product_price }}</div>
                <div>{{ $product->product_quantity }}</div>
                <div>
                    @foreach($all_size as $key => $size)
                        @if($size->size_id == $product->product_size)
                        {{ $size->size_name }}
                        @endif
                    @endforeach
                </div>
                <div>
                    @if($product->product_cate == 0)
                    Nam
                    @elseif($product->product_cate == 1)
                    Nữ
                    @else
                    Trẻ em
                    @endif
                </div>
                <div>
                    @foreach($all_collection as $key => $collection)
                        @if($product->product_collection == $collection->collection_id)
                        {{ $collection->collection_name }}
                        @endif
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
        <div class="confirm-order">
            <label for="">Trạng thái đơn hàng</label>&nbsp;&nbsp;
            <select name="" id="">
                <option value="">Chờ xác nhận</option>
                <option value="">Xác nhận</option>
                <option value="">Hủy đơn</option>
            </select>
        </div>
        <div class="btn-confirm">
            <button type="submit">Cập nhật đơn hàng</button>
        </div>
    </div>
</div>
@endsection
@if(Session::has('message'))
    <script>
        alert('{{ Session::get('message') }}');
    </script>
@endif
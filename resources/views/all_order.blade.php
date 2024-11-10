@extends('admin_layout')
@section('layout_admin')
<div class="content-order">
    <h2>Danh sách đơn hàng</h2>
    <div class="list-order">
        <div class="title">
            <div>STT</div>
            <div>Mã đơn hàng</div>
            <div>Khách hàng</div>
            <div>Trạng thái</div>
            <div>Ngày đặt</div>
            <div>Thanh toán</div>
            <div>Tổng tiền</div>
            <div>Xem chi tiết</div>
        </div>
        @php $i = 1 @endphp
        @foreach($all_order as $key => $order)
        <div class="title">
            <div>{{ $i }}</div>
            <div>{{ $order->order_code }}</div>
            <div>
                @foreach($all_customer as $key => $customer)
                @if($order->customer_id == $customer->customer_id )
                    {{ $customer->customer_name }}
                @endif
                @endforeach
            </div>
            <div>
                @if($order->order_status == 1 )
                Chờ xác nhận
                @else
                Đã xác nhận
                @endif
            </div>
            <div>{{ $order->order_date }}</div>
            <div>
                @if($order->order_payment_status == 1 )
                Thanh toán khi nhận hàng
                @else
                Ghi nợ
                @endif
            </div>
            <div>{{ number_format($order->order_total,0,',','.') }}đ</div>
            <div>
                <a href="{{ URL::to('/view-order/'.$order->order_code) }}"><i class="fa-solid fa-eye"></i></a>
            </div>
        </div>
        @php $i++ @endphp
        @endforeach
    </div>
</div>
@endsection
@if(Session::has('message'))
    <script>
        alert('{{ Session::get('message') }}');
    </script>
@endif
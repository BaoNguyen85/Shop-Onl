@extends('admin_layout')
@section('layout_admin')
<div class="content-customer">
    <h2>Danh sách khách hàng</h2>
    <div class="list-customer">
        <div class="title">
            <div>STT</div>
            <div>Họ tên</div>
            <div>Số điện thoại</div>
            <div>Email</div>
            <div>Ngày sinh</div>
            <div>Địa chỉ</div>
            <div>Chi tiết</div>
        </div>
        @php $i = 1 @endphp
        @foreach($all_customer as $key => $customer)
        <div class="title">
            <div>{{ $i }}</div>
            <div>{{ $customer->customer_name }}</div>
            <div>{{ $customer->customer_phone }}</div>
            <div>{{ $customer->customer_mail }}</div>
            <div>{{ $customer->customer_birth}}</div>
            <div>{{ $customer->customer_address }}</div>
            <div>
                <a href="{{ URL::to('/view-customer/'.$customer->customer_id) }}"><i class="fa-solid fa-eye"></i></a>
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
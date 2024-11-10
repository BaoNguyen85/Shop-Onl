@extends('layout')
@section('layout_content')
<section class="box">
    <form action="{{ URL::to('/customer-register') }}" method="POST">
        {{ csrf_field() }}
        <h1>ĐĂNG KÝ</h1>
        <div class="content">
            <div class="input">
                <label for="">Họ tên</label>
                <input type="text" name="customer_name" id="" required>
            </div>
            <div class="input">
                <label for="">Ngày sinh</label>
                <input type="date" name="customer_birth" id="" required>
            </div>
            <div class="input">
                <label for="">Email</label>
                <input type="email" name="customer_mail" id="" required>
            </div>
            <div class="input">
                <label for="">Điện thoại</label>
                <input type="phone" name="customer_phone" id="" required>
            </div>
            <div class="input">
                <label for="">Địa chỉ</label>
                <input type="text" name="customer_address" id="" required>
            </div>
            <div class="input">
                <label for="">Mật khẩu</label>
                <input type="password" name="customer_password" id="" required>
            </div>
            <div class="input-btn">
                <button class="btn" type="submit">Đăng ký</button>
            </div>
        </div>
    </form>
</section>
@endsection
@if(Session::has('message'))
    <script>
        alert('{{ Session::get('message') }}');
    </script>
@endif
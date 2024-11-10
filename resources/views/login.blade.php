@extends('layout')
@section('layout_content')
<section class="box">
    <form action="{{ URL::to('/customer-dashboard') }}" method="POST">
        {{ csrf_field() }}
        <h1>ĐĂNG NHẬP</h1>
        <div class="content">
            <div class="input">
                <label for="">Email</label>
                <input type="email" name="customer_mail" id="" required>
            </div>
            <div class="input">
                <label for="">Mật khẩu</label>
                <input type="password" name="customer_password" id="" required>
            </div>
            <div class="input-btn">
                <button class="btn" type="submit">Đăng nhập</button>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin</title>
    <link href="{{asset ('/../resources/css/admin.css') }}" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{asset ('/../resources/js/admin.js') }}"></script>
</head>
<body>
    <section class="header">
        <a href="{{ URL::to('/welcome-admin') }}">
            <img src="{{asset ('/../public/logo.png') }}" alt="logo">
        </a>
        <div>
            <img src="{{asset ('/../public/admin.png') }}" alt="logo">
            {{-- @if(isset($adminName)) --}}
            <a href="">Hello, {{ $adminName }}!</a>
            <a href="{{ URL::to('/admin-logout') }}">Đăng xuất</a>
            {{-- @endif --}}
        </div>
    </section>
    <section class="container-box">
        <div class="sidebar">
            <div class="list-side pt-4">
                <a href="{{ URL::to('/welcome-admin') }}">Dashboard</a>
            </div>
            <div class="list-side">
                <a href="{{ URL::to('/add-product-page') }}">Thêm sản phẩm</a>
            </div>
            <div class="list-side">
                <a href="{{ URL::to('/all-products') }}">Danh sách sản phẩm</a>
            </div>
            <div class="list-side">
                <a href="{{ URL::to('/add-collection-page') }}">Thêm bộ sưu tập</a>
            </div>
            <div class="list-side">
                <a href="{{ URL::to('/all-collection') }}">Danh sách bộ sưu tập</a>
            </div>
            <div class="list-side">
                <a href="{{ URL::to('/all-order') }}">Đơn hàng</a>
            </div>
            <div class="list-side">
                <a href="{{ URL::to('/all-customer') }}">Danh sách khách hàng</a>
            </div>
        </div>
        @yield('layout_admin')
    </section>
    
</body>
</html>
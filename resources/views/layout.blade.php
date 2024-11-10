<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link href="{{asset ('/../resources/css/main.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{asset ('/../resources/css/login.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{asset ('/../resources/css/cart.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{asset ('/../resources/css/order.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{asset ('/../resources/css/collection.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{asset ('/../resources/css/thank-you.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{asset ('/../resources/css/product-detail.css') }}" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{asset ('/../resources/js/main.js') }}"></script>
    <script src="{{asset ('/../resources/js/cart.js') }}"></script>
</head>
<body>
    <section class="header">
        <div class="container">
            @if(isset($customerName))
            <a href="{{ URL::to('/index') }}">
                <img src="{{asset ('/../public/logo.png') }}" alt="logo">
            </a>
            <a href="{{ URL::to('/index') }}">Trang chủ</a>
            @else
            <a href="{{ URL::to('/') }}">
                <img src="{{asset ('/../public/logo.png') }}" alt="logo">
            </a>
            <a href="{{ URL::to('/') }}">Trang chủ</a>
            @endif
            <a href="{{ URL::to('/products') }}">Sản phẩm</a>
            <div class="dropdown">
                <a href="#" class="dropdown-toggle">Bộ sưu tập</a>
                <ul class="dropdown-menu">
                    @foreach($all_collection as $key => $collection)
                    <li><a href="{{URL::to ('/collection/'.$collection->collection_id) }}">{{ $collection->collection_name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <a href="">Về chúng tôi</a>
            <a href="
            @if(isset($customerName))
            {{ URL::to('/cart') }}
            @else
            {{ URL::to('/login') }}
            @endif
            ">Giỏ hàng</a>
            
            @if(isset($customerName))
                <a href=""><i class="fa-solid fa-user"></i>&nbsp;{{ $customerName }}</a>
                <a href="{{ URL::to('/logout') }}">Đăng xuất</a>
            @else
                @if (Request::is('login'))
                    <a class="btn-contact" href="{{ URL::to('/register') }}">Đăng ký</a>
                @elseif (Request::is('register'))
                    <a class="btn-contact" href="{{ URL::to('/login') }}">Đăng nhập</a>
                @else
                    <a class="btn-contact" href="{{ URL::to('/login') }}">Đăng nhập</a>
                @endif
            @endif
        </div>
    </section>
    @yield('layout_content')
    <section class="footer">
        <div class="col1">
            <a href="">Chính sách bảo hành 1 đổi 1</a>
            <a href="">Đối tác với hơn 100 thương hiệu lớn</a>
            <a href="">Cửa hàng khắp nới trên thế giới</a>
        </div>
        <div class="col1">
            <a href="">Email: abc@gmail.com</a>
            <a href="">Điện thoại: 0999 999 999</a>
        </div>
        <div class="col1">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1003450.317909157!2d106.03717619299407!3d10.75544886553294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529292e8d3dd1%3A0xf15f5aad773c112b!2zVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1725302906491!5m2!1svi!2s" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
</body>
</html>
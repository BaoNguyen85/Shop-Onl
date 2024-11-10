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
    <section class="login">
        <form action="{{ URL::to('/admin-dashboard') }}" method="POST">
            {{ csrf_field() }}
        <div class="box-login">
            <h2>Đăng nhập Admin</h2>
            <div class="login-input-group">
                <div class="login-input">
                    <label for="">Email</label>
                    <input type="email" name="admin_mail">
                </div>
                <div class="login-input">
                    <label for="">Password</label>
                    <input type="password" name="admin_password">
                </div>
                <div class="btn-login">
                    <button>Đăng nhập</button>
                </div>
            </div>
        </div>
        </form>
    </section>
</body>
</html>
@if(Session::has('message'))
    <script>
        alert('{{ Session::get('message') }}');
    </script>
@endif
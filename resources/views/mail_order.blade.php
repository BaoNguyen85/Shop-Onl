<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <section style="
    max-width: 1247px;
    margin: 1rem auto;
    border: 0.5px solid rgba(43, 43, 43, 0.822);
    padding: 1rem 2rem;
    border-radius: 1.5rem;">
        <p style="text-align: center;">Đây là email tự động. Quý khách vui lòng không trả lời email này.</p>
        <div style="
        text-align: center;
        background: linear-gradient(90deg, #3470e1 0%, #9642fe 100%);
        color: white;
        padding: 1rem 0;
        margin-bottom: 1rem;">
            <h2 style="text-align: center">SKY FASHION</h2>
            <h3 style="text-align: center">XÁC NHẬN ĐƠN HÀNG</h3>
        </div>

        <p>Quý khách vừa thực hiện đặt hàng tại shop với thông tin như sau:</p>
        <h4 style="color: #5E55FA;">THÔNG TIN KHÁCH HÀNG</h4>
        <p><b>Họ tên:</b> {{ $orderInfo['customer_name'] }}</p>
        <p><b>Email:</b> {{ $orderInfo['customer_mail'] }}</p>
        <p><b>Số điện thoại:</b> {{ $orderInfo['customer_phone'] }}</p>
        <p><b>Địa chỉ:</b> {{ $orderInfo['customer_address'] }}</p>
        <h4 style="color: #5E55FA;">THÔNG TIN ĐƠN HÀNG</h4>
        <p><b>Mã đơn hàng:</b>{{ $orderInfo['order_code'] }} </p>
        <p><b>Danh sách sản phẩm:</b></p>

        
        <table class="table table-striped" style="border: 1px; width:100%">
            <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>SL</th>
                    <th>Size</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($cart_array as $cart)
                    <tr style="vertical-align: middle;text-align:center">
                        <td><img style="width: 7rem;
                            height: 10rem;
                            object-fit: cover;" 
                            src="{{ asset('public/uploads/product/'.$cart['product_image']) }}" alt=""></td>
                        <td>{{ $cart['product_name'] }}</td>
                        <td>{{ $cart['product_quantity'] }}</td>
                        <td>{{ $cart['product_size'] }}</td>
                        <td>{{ $cart['product_price'] }}đ</td>
                    </tr>
                    @endforeach
            </tbody>      
        </table>
        <h4 style="color: #5E55FA;">THANH TOÁN</h4>
        <p><b>Tổng:</b> 1.000.000đ</p>
        <p><b>Phương thức thanh toán:</b> Thanh toán bằng tiền mặt</p>
        <p><b>Trạng thái thanh toán:</b> Chưa thanh toán</p>
    </section>
</body>
</html>
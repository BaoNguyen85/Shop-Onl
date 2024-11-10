@extends('layout')
@section('layout_content')
<section class="thank-you-section">
    <i class="fas fa-check-circle thank-you-icon"></i>
    <h1>Cảm ơn bạn!</h1>
    <p>Chúng tôi đã nhận được yêu cầu của bạn. Một email xác nhận đã được gửi đi.</p>
    <a class="btn-home" href="{{ URL::to('/') }}">Quay lại trang chủ</a>
</section>
@endsection
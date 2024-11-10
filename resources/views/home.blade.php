@extends('layout')
@section('layout_content')
<section class="banner1">
    <img class="img1" src="{{asset ('/../public/img1.jpg') }}" alt="banner1">
    <img class="img2" src="{{asset ('/../public/img2.jpg') }}" alt="banner2">
</section>
<section class="banner2">
    <div class="title">
        <h1>PHONG CÁCH - BỨC PHÁ - KHÁC BIỆT</h1>
    </div>
    <img class="img3" src="{{asset ('/../public/img3.jpg') }}" alt="banner3">
</section>
<section class="banner3">
    <div class="title">
        <h1>GIÁ TRỊ - THƯƠNG HIỆU - UY TÍN</h1>
    </div>
    <img class="img4" src="{{asset ('/../public/img4.jpg') }}" alt="banner4">
</section>
@endsection
@if(Session::has('message'))
    <script>
        alert('{{ Session::get('message') }}');
    </script>
@endif
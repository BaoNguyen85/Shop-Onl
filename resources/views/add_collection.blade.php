@extends('admin_layout')
@section('layout_admin')
<div class="content">
    <form action="{{URL::to ('/save-collection') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <h2>Thêm bộ sưu tập</h2>
        <div class="input">
            <label for="">Tên bộ sưu tập</label>
            <input type="text" name="collection_name">
        </div>
        <div class="input">
            <label for="">Tiêu đề bộ sưu tập</label>
            <input type="text" name="collection_title">
        </div>
        <div class="input">
            <label for="">Mô tả bộ sưu tập</label>
            <input type="text" name="collection_description">
        </div>
        <div class="input">
            <label for="">Nội dung bộ sưu tập</label>
            <input type="text" name="collection_content">
        </div>
        <div class="input">
            <label for="">Hình ảnh bộ sưu tập</label>
            <input type="file" name="collection_img">
        </div>
        <div class="btn-submit">
            <button type="submit">Thêm bộ sưu tập</button>
        </div>
    </form>
</div>
@endsection
@if(Session::has('message'))
    <script>
        alert('{{ Session::get('message') }}');
    </script>
@endif
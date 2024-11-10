@extends('admin_layout')
@section('layout_admin')
<div class="content">
    <form action="{{URL::to ('/save-product') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <h2>Thêm sản phẩm</h2>
        <div class="input">
            <label for="">Tên sản phẩm</label>
            <input type="text" name="product_name">
        </div>
        <div class="input">
            <label for="">Giá cũ</label>
            <input type="text" name="product_oldprice">
        </div>
        <div class="input">
            <label for="">Giá mới</label>
            <input type="text" name="product_price">
        </div>
        <div class="input">
            <label for="">Hình ảnh sản phẩm</label>
            <input type="file" name="product_image">
        </div>
        <div class="input">
            <label for="">Số lượng</label>
            <input type="number" name="product_quantity">
        </div>
        <div class="group">
            <div class="input">
                <label for="">Size</label>
                <select name="product_size" id="">
                    @foreach($all_size as $key => $size)
                    <option value="{{ $size->size_id }}">{{ $size->size_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input">
                <label for="">Loại sản phẩm</label>
                <select name="product_cate" id="">
                    <option value="0">Nam</option>
                    <option value="1">Nữ</option>
                    <option value="2">Trẻ em</option>
                </select>
            </div>
            <div class="input">
                <label for="">Bộ sưu tập</label>
                <select name="product_collection" id="">
                    @foreach($all_collection as $key => $collection)
                    <option value="{{ $collection->collection_id }}">{{ $collection->collection_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="btn-submit">
            <button type="submit">Thêm sản phẩm</button>
        </div>
    </form>
</div>
@endsection
@if(Session::has('message'))
    <script>
        alert('{{ Session::get('message') }}');
    </script>
@endif
@extends('admin_layout')
@section('layout_admin')
<div class="content">
    @foreach($edit_product as $key => $edit)
    <form action="{{URL::to ('/update-product/'.$edit->product_id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <h2>Thêm sản phẩm</h2>
        <div class="input">
            <label for="">Tên sản phẩm</label>
            <input type="text" name="product_name" value="{{ $edit->product_name }}">
        </div>
        <div class="input">
            <label for="">Giá cũ</label>
            <input type="text" name="product_oldprice" value="{{ $edit->product_oldprice }}">
        </div>
        <div class="input">
            <label for="">Giá mới</label>
            <input type="text" name="product_price" value="{{ $edit->product_price }}">
        </div>
        <div class="input">
            <label for="">Hình ảnh sản phẩm</label>
            <img src="{{ asset('public/uploads/product/'.$edit->product_image) }}" alt="">
            <input type="file" name="product_image" value="{{ $edit->product_image }}">
        </div>
        <div class="input">
            <label for="">Số lượng</label>
            <input type="number" name="product_quantity" value="{{ $edit->product_quantity }}">
        </div>
        <div class="group">
            <div class="input">
                <label for="">Size</label>
                <select name="product_size" id="">
                    @foreach($all_size as $key => $size)
                    @if($edit->product_size == $size->size_id)
                    <option value="{{ $size->size_id }}">{{ $size->size_name }}</option>
                    @endif
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
                    @if($edit->product_collection == $collection->collection_id)
                    <option value="{{ $collection->collection_id }}">{{ $collection->collection_name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="btn-submit">
            <button type="submit">Cập nhật sản phẩm</button>
        </div>
    </form>
    @endforeach
</div>
@endsection

@extends('admin_layout')
@section('layout_admin')
<div class="content">
    <h2>Danh sách sản phẩm</h2>
    <div class="list-product">
        <div class="title">
            <div>STT</div>
            <div>Hình ảnh</div>
            <div>Tên sản phẩm</div>
            <div>Giá cũ</div>
            <div>Giá mới</div>
            <div>SL</div>
            <div>Size</div>
            <div>Loại</div>
            <div>Bộ sưu tập</div>
            <div>Chỉnh sửa</div>
        </div>
        @php $i=1 @endphp
        @foreach($all_product as $key => $product)
        <div class="title">
            <div>@php echo $i++ @endphp</div>
            <div><img src="{{ asset('public/uploads/product/'.$product->product_image) }}" alt=""></div>
            <div>{{ $product->product_name }}</div>
            <div>{{ number_format($product->product_oldprice,0,',','.') }}đ</div>
            <div>{{ number_format($product->product_price,0,',','.') }}đ</div>
            <div>{{ $product->product_quantity }}</div>
            <div>
                @foreach($all_size as $key => $size)
                @if($size->size_id == $product->product_size)
                    {{ $size->size_name }}
                @endif
                @endforeach
            </div>
            <div>
                @if($product->product_cate == 0) Nam
                @elseif($product->product_cate == 1) Nữ
                @else Trẻ em
                @endif
            </div>
            <div>
                @foreach($all_collection as $key => $collection)
                @if($collection->collection_id == $product->product_collection)
                    {{ $collection->collection_name }}
                @endif
                @endforeach
            </div>
            <div>
                <a href="{{URL::to ('/edit-product/'.$product->product_id) }}"><i class="fa-solid fa-pen"></i></a>
                 &nbsp;
                <a href="{{URL::to ('/delete-product/'.$product->product_id) }}"><i class="fa-solid fa-x"></i></a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
@if(Session::has('message'))
    <script>
        alert('{{ Session::get('message') }}');
    </script>
@endif
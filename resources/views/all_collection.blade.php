@extends('admin_layout')
@section('layout_admin')
<div class="content">
    <h2>Danh sách bộ sưu tập</h2>
    <div class="list-collection">
        <div class="title">
            <div>STT</div>
            <div>Hình ảnh</div>
            <div>Tên bộ sưu tập</div>
            <div>Tiêu đề bộ sưu tập</div>
            <div>Mô tả bộ sưu tập</div>
            <div>Nội dung bộ sưu tập</div>
            <div>Chỉnh sửa</div>
        </div>
        @php $i=1 @endphp
        @foreach($all_collection as $key => $collection)
        <div class="title">
            <div>@php echo $i++ @endphp</div>
            <div><img src="{{ asset('public/uploads/collection/'.$collection->collection_img) }}" alt=""></div>
            <div>{{ $collection->collection_name }}</div>
            <div>{{ $collection->collection_title }}</div>
            <div>{{ $collection->collection_description }}</div>
            <div>{{ $collection->collection_content }}</div>
            <div>
                <a href="{{URL::to ('/edit-collection/'.$collection->collection_id) }}"><i class="fa-solid fa-pen"></i></a>
                 &nbsp;
                <a href="{{URL::to ('/delete-collection/'.$collection->collection_id) }}"><i class="fa-solid fa-x"></i></a>
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
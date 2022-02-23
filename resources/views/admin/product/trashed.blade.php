@extends('layout.admin')
@section('title','Thùng rác sản phẩm')
@section('main')
<form action="" method="GET"></form>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control btn-dark mr-sm-2" type="search" name='keywork' placeholder="Nhập tên cần tìm kiếm..." aria-label="Search">
      <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fas fa-search">   </i></button>
      <a href="{{route('product.themmoi')}}" class="btn btn-success ml-2"><i class="fas fa-plus"> Thêm mới </i></a>
    </form>
    <hr>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="width:30px;"><b>STT</b></th>
                    <th>Tên</th>
                    <th>Trạng thái</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Giá sản phẩm</th>
                    <th>Giảm giá sản phẩm</th>
                    <th>Mô tả sản phẩm</th>
                    <th>trạng thái sản phẩm</th>
                    <th>danh mục</th>
                    <th>Mặc định ngày hiện tại</th>
                    <th>Chọn sửa hoặc xóa</th>
                </tr>
            </thead>
            <tbody>
            @foreach($cats as $model)
                <tr>
                    
                    <td><b>{{$model->id}}</b></td>
                    <td>{{$model->name}}</td>
                    <td>{{$model->image}}</td>
                    <td>{{$model->price}}</td>
                    <td>{{$model->salse_price}}</td>
                    <td>{{$model->description}}</td>
                    <td>{{$model->status}}</td>
                    <td>{{$model->category_id}}</td>
                    <td>{{$model->created_at}}</td>
                    <td class="text-right">
                        <a href="{{route('product.edit', $model->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="{{route('product.forcedelete', $model->id)}}" onclick="return confirm('bạn có chắc muốn xóa không?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        <a href="{{route('product.restore', $model->id)}}" onclick="return confirm('yes', 'khôi phục thành công')" class="btn btn-success"><i class="fas fa-trash-restore"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <hr>

        <div class="clear">
            {{$cats->appends(request()->all())->links()}}
        </div>
   
@stop()
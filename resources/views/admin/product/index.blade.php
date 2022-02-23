@extends('layout.admin')
@section('title','PRODUCT')
@section('main')
<form action="" method="GET"></form>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control btn-dark mr-sm-2" type="search" name='keywork' placeholder="Nhập tên cần tìm kiếm..." aria-label="Search">
      <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fas fa-search">   </i></button>
      <a href="{{route('product.create')}}" class="btn btn-success ml-2"><i class="fas fa-plus"> Thêm mới </i></a>
    </form>
    <hr>
        <table class="table table-bordered table-hover">
            <thead>
                <tr style="text-align: center;">
                    <th style="width:30px;"><b>STT</b></th>
                    <th>Tên sản phẩm</th>
                    <th>ảnh</th>
                    <th>Giá</th>
                    <th>Giảm giá</th>
                    <th>Trạng thái</th>
                    <th>Mặc định ngày hiện tại</th>
                    <th>Chọn sửa hoặc xóa</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $model)
                <tr style="text-align: center;">
                    
                    <td><b>{{$model->id}}</b></td>
                    <td>{{$model->name}}</td>
                    <td><img src="{{url('public/uploads/'.$model->image)}}" width="100px" alt=""></td>
                    <td>{{number_format($model->price)}}</td>
                    <td>{{number_format($model->salse_price)}}</td>
                    <td>{{$model->status==0 ? 'Ẩn' : 'Hiện'}}</td>
                    
                    <td>{{$model->created_at}}</td>
                    <td class="text-right">
                    <form action="{{route('product.destroy', $model->id)}}" method="POST">
                        @csrf @method('DELETE')
                        <a href="{{route('product.edit', $model->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <button onclick="return confirm('bạn có chắc muốn xóa không?')" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <hr>

        <div class="clear">
            {{$data->appends(request()->all())->links()}}
        </div>
   
@stop()
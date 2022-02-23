@extends('layout.admin')
@section('title','CATEGORY')
@section('main')
<form action="" method="GET"></form>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control btn-dark mr-sm-2" type="search" name='keywork' placeholder="Nhập tên cần tìm kiếm..." aria-label="Search">
      <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fas fa-search">   </i></button>
      <a href="{{route('category.themmoi')}}" class="btn btn-success ml-2"><i class="fas fa-plus"> Thêm mới </i></a>
    </form>
    <hr>
        <table class="table table-bordered table-hover">
            <thead>
                <tr style="text-align: center;">
                    <th style="width:30px;"><b>STT</b></th>
                    <th>Tên</th>
                    <th>Trạng thái</th>
                    <th>Mặc định ngày hiện tại</th>
                    <th>Chọn sửa hoặc xóa</th>
                </tr>
            </thead>
            <tbody>
            @foreach($cats as $model)
                <tr style="text-align: center;">
                    
                    <td><b>{{$model->id}}</b></td>
                    <td>{{$model->name}}</td>
                    <td>{{$model->status}}</td>
                    <td>{{$model->created_at}}</td>
                    <td class="text-right">
                        <a href="{{route('category.edit', $model->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="{{route('category.delete', $model->id)}}" onclick="return confirm('bạn có chắc muốn xóa không?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
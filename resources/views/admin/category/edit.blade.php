@extends('layout.admin')
@section('title','Chỉnh sửa danh mục')
@section('main')

<form action="" method="POST">
@csrf
    <div class="form-group">
        <label for="">Thêm danh mục sản phẩm</label>
        <input type="text" name="name"  class="form-control" value="{{$cat->name}}">
        @error('name')
          <small style="color:red;">{{$message}}</small>
        @enderror
    </div>
    
    <div class="form-group">
    <label for="">Trạng thái</label>
        <div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="status" id="" value="0" {{$cat -> status == 0 ? 'checked' : ''}} >
            Hiển thị
          </label>
          
        </div>
        <div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="status" id="" value="1" {{$cat -> status == 1 ? 'checked' : ''}} >
            Ẩn
          </label>
        </div>
        @error('status')
          <small style="color:red;">{{$message}}</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-success"><i class="fas fa-save"> Lưu lại</i></button>
</form>
@stop()
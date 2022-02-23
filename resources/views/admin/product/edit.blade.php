@extends('layout.admin')
@section('title','Chỉnh sửa sản phẩm-'.$product->name)
@section('main')

<form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
@csrf @method('PUT')

    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label for=""> sản phẩm</label>
                <input type="text" name="name" id="" class="form-control" value="{{$product->name}}" aria-describedby="helpId">
                @error('name')
                <small style="color:red;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> ảnh sản phẩm</label>
                <img src="{{url('public/uploads/'.$product->image)}}" width="100px" alt="">
              
                <input type="file" name="upload" id="" class="form-control" value="$product->name" >
                @error('upload')
                <small style="color:red;">{{$message}}</small>
                @enderror
            </div>



            <div class="form-group">
              <label for="">Trạng thái</label>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="status" value="0">
                      Ẩn
                    </label>
                    
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input " name="status" id="" value="1">
                      Hiển thị
                    </label>
                  </div>
                  @error('status')
                    <small style="color:red;">{{$message}}</small>
                  @enderror
              </div>
        </div>



        <div class="col-md-3">
           
            <div class="form-group">
                <label for="">Giá</label>
                <input type="text" name="price" id="" class="form-control" value="{{$product->price}}" aria-describedby="helpId">
                @error('price')
                <small style="color:red;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Giảm giá</label>
                <input type="text" name="salse_price" id="" class="form-control" value="{{$product->salse_price}}" aria-describedby="helpId">
                @error('salse_price')
                <small style="color:red;">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Danh mục</label>
                  <select class="form-control" name="category_id" id="">
                    <option value="">Chọn danh mục _ _ _</option>
                    @foreach($cats as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                  </select>
                </div>
                @error('category_id')
                <small style="color:red;">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="form-group">
          <label for="">Các ảnh sản phẩm khác</label>
          <input type="file" class="form-control " name="uploads[]" id="" multiple>
          @error('name')
          <small style="color:red;">{{$message}}</small>
          @enderror
        </div>
        <div class="form-group">
          @foreach($image as $img)
            <div class="row">
              <div class="col-md-3">
                <a href=""class="thumbnail">
                  <img src="{{url('public/uploads/'.$img->name)}}" alt="" style="width:100%">
                  <hr>
                  <div class="caption">
                    <a href="{{route('product.deleteImage', $img->id)}}" class="btn btn-danger">Xóa</a>
                  </div>
                </a>
              </div>
            </div>
          @endforeach
        </div>

        <div class="form-group">
          <label for="">Mô tả</label>
          
          <textarea name="description"  class="form-control summernote">{{$product->description}}</textarea>
          @error('description')
          <small style="color:red;">{{$message}}</small>
          @enderror
        </div>
      <div class="col-md-12">
        <button type="submit" class="btn btn-success"><i class="fas fa-save"> Lưu lại</i></button>
      </div>
    </div>
    
  
    
</form>
@stop()
@section('css')
<link rel="stylesheet" href="{{url('public/admin')}}/plugins/summernote/summernote.min.css">
@stop()
@section('js')
<script src="{{url('public/admin')}}/plugins/summernote/summernote.min.js"></script>
<script>
  $('.summernote').summernote({
    height:150
  });
</script>
@stop()
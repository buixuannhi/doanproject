@extends('layout.admin')
@section('title','Thêm sản phẩm')
@section('main')

<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
@csrf

    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label for="">Thêm sản phẩm</label>
                <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
                @error('name')
                <small style="color:red;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Thêm ảnh sản phẩm</label>
                <input type="file" class="form-control upload" name="upload" id="" >
                <img src="" id="show_thumb" style="width:200px">
                @error('upload')
                <small style="color:red;">{{$message}}</small>
                @enderror
            </div>



            <div class="form-group">
              <label for="">Trạng thái</label>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="status" id="" value="0" {{old('status') == 0 ? 'checked':''}} >
                      Hiển thị
                    </label>
                    
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input " name="status" id="" value="1" {{old('status') == 1 ? 'checked':''}}>
                      Ẩn
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
                <input type="text" name="price" id="" class="form-control" placeholder="" aria-describedby="helpId">
                @error('price')
                <small style="color:red;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Giảm giá</label>
                <input type="text" name="salse_price" id="" class="form-control" placeholder="" aria-describedby="helpId">
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
          <label for="">Mô tả</label>
        
          <textarea name="description"  class="form-control summernote"></textarea>
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

  $('.upload').change(function(){
    var file = $(this).get(0).files[0];
    if(file){
      var render = new FileReader();
   

      render.onload=function(){
        $('#show_thumb').attr('src',render.result);
      }
      render.readAsDataURL(file);
    }


  });

</script>
@stop()
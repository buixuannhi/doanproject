@extends('layout.home')
@section('main')
     


<div class="container">
<hr>
   <div class="row">
      <div class="col-md-2">
         <div class="card">
           <div class="cart-header">
            <b class="btn btn-primary" style="font-size:12px"><b>Danh mục sản phẩm</b></b>
            </div>
           
            <ul class="list-group">
            @foreach($cats as $cat)
               <li class="list-group-item d-flex justify-content-between align-items-center">
               <a href="{{route('home.category', ['id' => $cat->id, 'slug' => slug($cat->name)])}}">{{$cat->name}}</a>
                  <span class="badge badge-danger badge-pill">{{$cat->product->count()}}</span>
               </li>
            </ul>
           @endforeach
         </div>
      </div>
      <div class="col-md-10">
      
<h3 class="heading underline">
@if(isset($cat))
{{$cat->name}}
@else
   Sản phẩm được yêu thích
@endif
</h3>
         <h3 class="heading underline"></h3>
         <div class="row">
            @foreach($products as $model)
               <div class="col-md-3 mt-5" style="border-bottom: 5px solid #f3f3f3 !important;  border-right: 5px solid #f3f3f3 !important; padding: 10px 15px 20px; overflow: hidden;">
                  <a href="{{route('home.product', ['id' => $model->id, 'slug' => slug($model->name)])}}" >
                     <div style="text-align: center">
                        <img src="{{url('public/uploads')}}/{{$model->image}}" style=" width:250px;">
                     </div>
                     <div class="" >
                        <b style="color:#666666;">{{$model->name}}</b>
                     </div>
                  </a>
                  <div class="row" style="text-align: center; padding-top: 12px;">
                     <div class="col-md-3">
                        <p style="border: 1px solid #f3f3f3; width:60px">
                           55 inch
                        </p>
                     </div>
                     <div class="col-md-3">
                     <p style="border: 1px solid #f3f3f3; width:25px; ">
                        4k
                     </p>
                     </div>
                  </div>
                  <div >
                     oline giá rẻ
                  </div>
                  <div style="padding-top: 12px;text-decoration: line-through; color:#7d7d7d">
                     <b>{{number_format($model->price)}}  <s style="text-decoration: underline; font-size: 12px;">đ</s></b>
                  </div>
                  <div style="padding-top: 12px; font-size: 16px;">
                     <b>{{$model->salse_price}} <s style="text-decoration: underline; font-size: 12px;">đ</s></b>
                  </div>
               </div>
            @endforeach
         </div>
      </div>
      
   </div>
</div>


@stop()
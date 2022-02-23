@extends('layout.home')
@section('main')



<main role="main">
<div class="container" style="    padding-bottom: 0;">
<h3 class="heading underline" >
<b>Chi tiết sản phẩm: </b>{{$product->name}}
</h3>
</div>
        <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
        <div class="container mt-4" style=" background-color: red;">

            <div id="thongbao" class="alert alert-danger d-none face" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="card">
                <div class="container-fliud">
                   

                        <div class="wrapper row">
                            <div class="preview col-md-6">
                                <div class="preview-pic tab-content">
                                    <div class="tab-pane" id="pic-1">
                                        <img src="https://i0.wp.com/www.tivixiaomi.com/wp-content/uploads/2021/05/50-800x800-1.png?fit=800%2C800&ssl=1">
                                    </div>
                                    <div class="tab-pane" id="pic-2">
                                        <img src="https://i0.wp.com/www.tivixiaomi.com/wp-content/uploads/2021/05/50-800x800-1.png?fit=800%2C800&ssl=1">
                                        
                                    </div>

                                    <div class="tab-pane active" id="pic-3">

                                        <img src="{{url('public/uploads')}}/{{$product->image}}" alt="{{$product->name}}" style="width:100%">
                                        <div class="" style="font-size: 25px; text-align:center">
                                        <p><b>Thiết kế sang trọng tinh tế, tinh tế</b></p>
                                        <p style="color:#585858">mang đến sự thẩm mỹ, thanh thoát</p>
                                        
                                        </div>
                                        <div style="text-align:center">
                                        <p style="color:blue"><u>Tất cả điểm nổi bật</u></p>
                                        </div>
                                        <div class="row">
                                        @foreach($product->images as $img)
                                          <div class="col-md-3">
                                            <img src="{{url('public/uploads')}}/{{$img->name}}" alt="{{$product->name}}" style="width:100%">
                                          </div>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="details col-md-6">
                                <p class="product-title"><b style="color:#585858">{{$product->name}}</b></p>
                                <div class="rating">
                                    <div class="stars">
                                        <span class="fa fa-star checked" style="color:yellow"></span>
                                        <span class="fa fa-star checked" style="color:yellow"></span>
                                        <span class="fa fa-star checked" style="color:yellow"></span>
                                        <span class="fa fa-star" style="color:yellow"></span>
                                        <span class="fa fa-star" ></span>
                                    </div>
                                    <span class="review-no">999 reviews</span>
                                </div>
                                <p class="product-description"><b>Mô tả: </b>{!!Str::words($product->description,6)!!}</p>
                                @if($product->salse_price > 0)
                                <small class="text-muted"><b>Giá cũ:</b> <del><s><span>{{number_format($product->price)}} <u>đ</u></span></s></del></small>
                                <p class="product-title"><b style="color:##585858">Giá hiện tại: </b> <span><big><b style="color:#e07b39">{{number_format($product->salse_price)}}<u style="font-size: 14px;">đ</u></b></big></span></p>
                                @else
                                Giá: {{number_format($product->price)}}
                                @endif
                                <p><b>Danh mục:</b> {{$product->cat->name}}</p>
                                <p class="vote"><strong>100%</strong> hàng <strong>Chất lượng</strong>, đảm bảo <strong>Uy tín</strong>!</p>
                                
                                <form action="{{route('cart.add',$product->id)}}" method="get">
                                    <label for="soluong"><b>Số lượng đặt mua:</b></label>
                                    <input type="number" class="form-control" id="soluong"  name="quantity" style="    width: 55px;">
                                    <div class="action mt-3">
                                      <button type="submit" class="btn btn-success"><i class="fas fa-shopping-cart" style="color:red"></i> Thêm vào giỏ hàng</button>
                                      <a class="btn btn-danger like btn btn-default" href="#"><span class="fa fa-heart"></span></a>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                </div>
                <hr>
                <h3 class="heading underline">
                  <b>Nội dung sản phẩm: </b>{{$product->name}}
                </h3>
                <div class="text-justifi">
                {!!($product->description)!!}
                </div>
            </div>
        </div>
        <!-- End block content -->
    </main>
@stop()
@extends('layout.home')
@section('main')
     

<div class="container" style="padding-top: 0;">
    <h3 class="" style="text-align:center;">
        <b class="btn btn-danger" style="font-size:25px"><b>Giỏ hàng</b></b>
    </h3>

    <div class="jumbotron">
        <h1 class="display-3" style="color:black">Chưa có đơn hàng nào được chọn...!</h1>
        <hr class="my-2">

        <div class="text-center">
            <a href="{{route('home.sanpham')}}" class="btn btn-primary">Tiếp tục mua sắm</a>
        </div>
   </div>
    
</div>


@stop()
@extends('layout.home')
@section('main')
     

<div class="container" style="padding-top: 0;">
    <h3 class="" style="text-align:center;">
        <b class="btn btn-danger" style="font-size:25px"><b>Lịch sử đặt hàng</b></b>
    </h3>
 
    <table class="table table-bordered table-hover mt-5">
        <thead>
        <b class="" style="text-align:center" style="font-size:25px"><b>Thông tin đặt hàng</b></b>
        <hr>
            <tr style="text-align: center;">
                <th style="width:555px;">Mã đơn hàng</th> 
                <td>#{{$order->id}}</td>
            </tr>
            <tr style="text-align: center;">
                <th style="width:555px;">Ngày đặt hàng </th>
                <td>{{$order->created_at->format('d-m-Y')}}</td>
            </tr>
            <tr style="text-align: center;"> 
                <th style="width:555px;">Tổng tiền </th>
                <td>{{number_format($order->total_price)}} <u>đ</u></td>
            </tr>
            <tr style="text-align: center;"> 
                <th style="width:555px;">Trạng thái</th>
                <td><u>{{$order->status}}</u></td>
            </tr>
            
        </thead>
    </table>

<div class="row mt-5">
<div class="col-md-6">
        <table class="table mt-5">
        <b class="" style="text-align:center" style="font-size:25px"><b>Thông tin tài khoản</b></b>
        <hr>
            <thead>
                <tr style="text-align:center">
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Điện thoại</th>
                    <th>Địa chỉ</th>
                </tr>
            </thead>
            <tbody>
                <td>{{$order->cus->name}}</td>
                <td>{{$order->cus->email}}</td>
                <td>{{$order->cus->phone}}</td>
                <td>{{$order->cus->address}}</td>
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <table class="table mt-5">
        <b class="" style="text-align:center" style="font-size:25px"><b>Thông tin đặt hàng</b></b>
        <hr>
            <thead>
                <tr style="text-align:center">
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Điện thoại</th>
                    <th>Địa chỉ</th>
                </tr>
            </thead>
            <tbody>
                <td>{{$order->cus->name}}</td>
                <td>{{$order->cus->email}}</td>
                <td>{{$order->cus->phone}}</td>
                <td>{{$order->cus->address}}</td>
            </tbody>
        </table>
    </div>
    <hr>
    <table class="table mt-5">
    <b class="" style="text-align:center" style="font-size:25px"><b></b></b>
        <thead>
            <tr style="text-align:center">
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Số lượng sản phẩm</th>
                <th>Tổng số tiền</th>
            </tr>
        </thead>
        <tbody>
        @foreach($order->details as $item)
        <?php $key=1;?>
            <tr > 
                <td  style="text-align:center;"><b>{{$key}}</b></td>
                <td  style="text-align:center;"><b>{{$item->prod->name}}</b></td>
                <td  style="text-align:center;">{{number_format($item->price)}}<u>đ</u></td>
                <td  style="text-align:center;">{{$item->quantity}}</td>
                <td  style="text-align:center;">{{number_format($item->price * $item->quantity)}}<u>đ</u></td>
            </tr>
            <?php $key++ ?>
        @endforeach
        </tbody>
    </table> 
</div>
</div>
@stop()
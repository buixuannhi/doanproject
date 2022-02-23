@extends('layout.admin')
@section('title','Quản lí đơn hàng')
@section('main')

<div class="container" style="padding-top: 0;">
    <h3 class="" style="text-align:center;">
        <b class="btn btn-danger" style="font-size:25px"><b>Lịch sử đặt hàng</b></b>
    </h3>
 
    <table class="table table-bordered table-hover mt-5">
        <thead>
        <b class="" style="text-align:center" style="font-size:25px"><b>Thông tin đặt hàng</b></b>
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
                <th style="padding-bottom: 22px;">Trạng thái</th>

                <td style="padding-bottom:0px">

                <form action="{{route('admin.order.status', $order->id)}}" method="POST"> @csrf
                    <div class="row">
                        <div class="col-md-4">
                            @if($order->status == 0)
                            <a  class="btn btn-danger">Đang chờ xác thực</a>
                            @elseif($order->status == 1)
                            <a  class="btn btn-primary">Đã xác thực</a>
                            @elseif($order->status == 2)
                            <a  class="btn btn-danger">Đang giao hàng</a>
                            @elseif($order->status == 3)
                            <a  class="btn btn-success">Đã giao hàng</a>
                            @else()
                            <a  class="btn btn-danger">Đã hủy</a>
                            @endif
                        </div>

                        <div class="col-md-8" style="padding-top: 2;" >
                        @if($order->status !=3)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="status" class="form-control" name="" id="inputstatus">
                                            <option value="">Mời chọn_ _ _</option>
                                            <option value="2">Đang giao hàng</option>
                                            <option value="3">Đã giao hàng</option>
                                            <option value="4">Đã hủy</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </div>
                        @endif
                        </div>
                        
                    </div>
                </form>
                
                </td>
            </tr>
        </thead>
    </table>


<div class="row mt-5">


        <table class="table mt-5">
        <b class="" style="text-align:center" style="font-size:25px"><b>Thông tin tài khoản</b></b>
            <thead>
                <tr style="text-align:center">
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Điện thoại</th>
                    <th>Địa chỉ</th>
                </tr>
            </thead>
            <tbody>
                <tr style="text-align:center">
                    <td>{{$order->cus->name}}</td>
                    <td>{{$order->cus->email}}</td>
                    <td>{{$order->cus->phone}}</td>
                    <td>{{$order->cus->address}}</td>
                </tr>
            </tbody>
        </table>
  
    <table class="table mt-5">
    <b class="" style="text-align:center" style="font-size:25px"><b>Thông tin đặt hàng</b></b>
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

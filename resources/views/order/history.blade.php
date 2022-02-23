@extends('layout.home')
@section('main')
     

<div class="container" style="padding-top: 0;">
    <h3 class="" style="text-align:center;">
        <b class="btn btn-danger" style="font-size:25px"><b>Lịch sử đặt hàng</b></b>
    </h3>
           
    <table class="table mt-5">
        <thead>
            <tr style="text-align:center">
  
                <th>Id</th>
                <th>Created at</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Chọn</th>
            </tr>
        </thead>
        <tbody>
        <?php $key=1;?>
        @foreach($orders as $order)
            <tr>
                <td  style="text-align:center"><b>{{$order->id}}</b></td>
                <td  style="text-align:center;">{{$order->created_at->format('d-m-Y')}}</td>
                <td  style="text-align:center;">{{number_format($order->total_price)}} <u>đ</u></td>
                <td  style="text-align:center; color:red;">{{$order->status == 0 ? 'chưa xác thực' : 'Đã xác thực'}}</td>
                <td style="text-align:center">
                    <a href="{{route('order.detail', $order->id)}}" class="btn btn-primary">Chi tiết sản phẩm</a>
                    <a href="{{route('order.pdf', $order->id)}}" target="_blank" class="btn btn-danger">PDF</a>
                    <a href="{{route('order.pdf', $order->id)}}?action=dowload" target="_blank" class="btn btn-success">Tải PDF xuống</a>
                </td>
            </tr>
            <?php $key++ ?>
        @endforeach
        </tbody>
    </table>
    <div class="text-center">
    {{$orders->links()}}
    </div>
</div>


@stop()
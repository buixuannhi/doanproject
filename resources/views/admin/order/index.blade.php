@extends('layout.admin')
@section('title','Quản lí đơn hàng')
@section('main')

<div class="container" style="padding-top: 0;">
    <h3 class="" style="text-align:center;">
        <b class="btn btn-danger" style="font-size:25px"><b>Lịch sử đặt hàng</b></b>
    </h3>
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="text-center">
                <a href="?status=0" class="btn btn-danger">Chưa xác thực</a>
                <a href="?status=1" class="btn btn-primary">Đã xác thực</a>
                <a href="?status=2" class="btn btn-danger">Đang giao hàng</a>
                <a href="?status=3" class="btn btn-success">Đã giao hàng</a>
            </div>
        </div>
    </div>  
    <hr class="mt-5">
    <div class="container">
        <form action="">
            <div class="row">
        
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Date range:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" name="dateStart" class="form-control float-right" name="dateStart">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Date and time range:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                            </div>
                            <input type="text" name="dateEnd" class="form-control float-right" name="dateEnd">
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" style="width: 270px;">Cập nhật</button>
            </div>
        </form>
    </div>
    <table class="table mt-5">
        <thead>
            <tr style="text-align:center">
                <th>Id</th>
                <th>Ngày đặt hàng</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Tên người đặt hàng</th>
                <th>Điện thoại</th>
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
                <td  style="text-align:center"><b>{{$order->cus->name}}</b></td>
                <td  style="text-align:center"><b>{{$order->cus->phone}}</b></td>
                <td style="text-align:center">
                    <a href="{{route('admin.order.detail', $order->id)}}" class="btn btn-primary">Chi tiết sản phẩm</a>
                    <a href="{{route('order.pdf', $order->id)}}" target="_blank" class="btn btn-danger">PDF</a>
                    <a href="{{route('order.pdf', $order->id)}}?action=dowload" target="_blank" class="btn btn-success">Tải PDF xuống</a>
                </td>   
            </tr>
            <?php $key++ ?>
        @endforeach
        </tbody>
    </table>
    <div class="text-center">
    {{$orders->appends(request()->all())->links()}}
    </div>
</div>
@stop()

@section('css')
<link rel="stylesheet" href="{{url('public/admin')}}/plugins/daterangepicker/daterangepicker.css">

@stop()


@section('js')

<script src="{{url('public/admin')}}/plugins/moment/moment.min.js"></script>
<script src="{{url('public/admin')}}/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="{{url('public/admin')}}/plugins/daterangepicker/daterangepicker.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('public/admin')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script>
   

    //cần
    $('#dateStart').daterangepicker()
    //cần tiếp
    $('#dateEnd').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'yyyy/mm/dd hh:mm A'
      }
    })



    //Date range as a button
    // $('#daterange-btn').daterangepicker(
    //   {
    //     ranges   : {
    //       'Today'       : [moment(), moment()],
    //       'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
    //       'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
    //       'Last 30 Days': [moment().subtract(29, 'days'), moment()],
    //       'This Month'  : [moment().startOf('month'), moment().endOf('month')],
    //       'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    //     },
    //     startDate: moment().subtract(29, 'days'),
    //     endDate  : moment()
    //   },
    //   function (start, end) {
    //     $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    //   }
    // )
 
</script>
@stop()
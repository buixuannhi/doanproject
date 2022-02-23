<!doctype html>
<html lang="en">
  <head>
    <title>Email</title>
    <!-- body chỉnh lại đúng lỗi chính tả -->
    
    <style>
    b{
        text-align:center;
    }
    body{
        font-family:"DejaVu Sans"; 
    }
    .h3{
        text-align: center;
    }
    table{
        width: 100%;
        border:1px solid #333;
        border-collapse: collapse;
        margin-bottom: 25px;
    }

    table tr th, table tr td{
        border: 1px solid #333;
        padding: 10px;
        box-sizing: border-box;
        text-align: left;
    }
    .col-md-6{
        width:52%;
        float:left
    }
    .clear{
        clear: both;
    }
    </style>
  </head>
  <body>
     <div class="email-content">
      <h2 style="text-align:center;">Chi tiết của đơn hàng</h2>
        <table class="table">
            <thead>
                <tr style="text-align: center;">
                    <th style="text-align:center;">Mã đơn hàng</th> 
                    <td style="text-align:center;">#{{$order->id}}</td>
                </tr>
                <tr style="text-align: center;">
                    <th style="text-align:center;">Ngày đặt hàng </th>
                    <td style="text-align:center;">{{$order->created_at->format('d-m-Y')}}</td>
                </tr>
                <tr style="text-align: center;"> 
                    <th style="text-align:center;">Tổng số lượng </th>
                    <td style="text-align:center;">{{number_format($order->total_price)}} <u>đ</u></td>
                </tr>
                <tr style="text-align: center;"> 
                    <th style="text-align:center;">Trạng thái</th>
                    <td style="text-align:center;">{{$order->status}}</td>
                </tr>
            </thead>
        </table>
        <div class="">
        <b style="text-align:center" style="font-size:25px">Thông tin tài khoản: </b>
        <div class="clear"></div>
        
            <table class="table mt-5">
                <thead style="text-align:center;">
                    <tr>
                        <th style="text-align:center;">Tên</th>
                        <td style="text-align:center;">{{$order->name}}</td>
                    </tr>
                    <tr>
                        <th style="text-align:center;">Email</th>
                        <td style="text-align:center;">{{$order->email}}</td>
                    </tr>
                    <tr>
                        <th style="text-align:center;">Điện thoại</th>
                        <td style="text-align:center;">{{$order->phone}}</td>
                    </tr>
                    <tr>
                        <th style="text-align:center;">Địa chỉ</th>
                        <td style="text-align:center;">{{$order->address}}</td>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="clear"></div>
    
        <b style="text-align:center" style="font-size:25px"><b>Thông tin sản phẩm: </b></b>
        <table class="table mt-5" style="text-align:center">
            <thead>
                <tr style="text-align:center">
                    <th style="text-align:center;">STT</th>
                    <th style="text-align:center;">Tên sản phẩm</th>
                    <th style="text-align:center;">Giá sản phẩm</th>
                    <th style="text-align:center;">Số lượng sản phẩm</th>
                    <th style="text-align:center;">Tổng số tiền</th>
                </tr>
            </thead>

            <tbody>
            @foreach($order->details as $item)
            <?php $key=1;?>
                <tr > 
                    <td  style="text-align:center;"><b>{{$key}}</b></td>
                    <td  style="text-align:center;"><b>{{$item->prod->name}}</b></td>
                    <td  style="text-align:center;">{{number_format($item->price)}} <u>đ</u></td>
                    <td  style="text-align:center;">{{$item->quantity}}</td>
                    <td  style="text-align:center;">{{$item->price * $item->quantity}} <u>đ</u></td>
                </tr>
                <?php $key++ ?>
            @endforeach
            </tbody>
        </table> 
    </div>
  
</body>
</html>
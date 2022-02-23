<!doctype html>
<html lang="en">
  <head>
    <title>Email</title>
    
    <style>
    .h3{
        text-align: center;
    }
    .a{
        background-color: yellow;
        display: inline-block;
        padding: 10px 25px;
        color: #fff;
    }
    .email-content{
        width: 700px;
        margin: 0 auto;
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
    </style>
  </head>
  <body>
     <div class="email-content">
     <h3 style="text-align:center">Xin chào bạn: {{$auth->name}}</h3>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium sint excepturi, recusandae impedit id reiciendis ipsum. Recusandae ea quia pariatur sint magni corrupti amet, provident iusto, expedita, illum mollitia id.
      </p>
      <p>bạn đã đặt hàng tại cửa hàng oline của chúng tôi. Để xác nhận đơn này vui lòng bn hãy click vào link dưới đây để xác nhận:</p>
      <a href="{{route('order.confirm', $order->token)}}" style="color:blue"><u>Click vào đây</u></a>
      <h2>Chi tiết của đơn hàng</h2>
      <table class="table">
          <thead>
              <tr>
                  <th>Mã đơn hàng</th> 
                  <td>{{$order->id}}</td>
              </tr>
              <tr>
                  <th>Ngày đặt hàng </th>
                  <td>{{$order->created_at}}</td>
              </tr>
              <tr> 
                  <th>Tổng số lượng </th>
                  <td>{{number_format($cart->totalQuantity)}}</td>
              </tr>
              <tr> 
                  <th>Tổng tiền </th>
                  <td>{{number_format($order->total_price)}} <u>đ</u></td>
              </tr>
          </thead>
          <tbody>
              
      </table>
      <table class="table mt-5">
           
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
                <?php $key=1;?>
                @foreach($order->details as $dt)
                <?php 
                    $subTotal = $dt['price']*$dt['quantity']; 
                ?>
                    <tr > 
                        <td  style="text-align:center;"><b>{{$key}}</b></td>
                        <td  style="text-align:center;"><b>{{$dt->prod->name}}</b></td>
                        <td  style="text-align:center;">{{number_format($dt->price)}} <u>đ</u></td>
                        <td  style="text-align:center;">{{$dt->quantity}}</td>
                        <td  style="text-align:center;">{{number_format($subTotal)}} <u>đ</u></td>
                    </tr>
                    <?php $key++ ?>
                @endforeach
                </tbody>
            </table>
        </div>
    </body>
    </html>
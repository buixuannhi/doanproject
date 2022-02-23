@extends('layout.home')
@section('main')
     

<div class="container" style="padding-top: 0;">
    <h3 class="" style="text-align:center;">
        <b class="btn btn-danger" style="font-size:25px"><b>Giỏ hàng</b></b>
    </h3>

    <p style="font-size:20px"><b style="color:black">Tổng tiền: </b>({{number_format($cart->totalPrice)}}<u> đ</u>) <b style="color:black">,</b> <b b style="color:black"> Số lượng: </b>({{$cart->totalQuantity}}) </span>

           
    <table class="table mt-5">
        <thead>
            <tr style="text-align:center">
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Số lượng sản phẩm</th>
                <th>Tổng số tiền</th>
                <th>Chọn sửa hoặc xóa</th>
            </tr>
        </thead>
        <tbody>
        <?php $key=1;?>
        @foreach($cart->items as $cat)
        <?php 
            $subTotal = $cat['price']*$cat['quantity'];
        ?>
            <tr > 
                <td  style="text-align:center">{{$key}}</td>
                <td  style="text-align:center; padding-top: 31px;">{{$cat['name']}}</td>
                <td  style="text-align:center; padding-top: 31px;">{{number_format($cat['price'])}} <u>đ</u></td>
                <td>
                    <form action="{{route('cart.update', $cat['id'])}}">
                        <input type="number" class="form-control" id="soluong" name="quantity" style="    width: 55px;" value="{{$cat['quantity']}}">
                        <button type="submit" class="btn btn-success">OK !!</button>
                    </form>
                </td>
                <td  style="text-align:center; padding-top: 31px;">{{number_format($subTotal)}} <u>đ</u></td>
                <td style="text-align:center; padding-top: 31px;">
                <a href="{{route('cart.remove', $cat['id'])}}" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc là muốn xóa không?')">Xóa</a>
                </td>
            </tr>
            <?php $key++ ?>
        @endforeach
        </tbody>
    </table>
    <hr>
    <div class="text-center">
    <a href="{{route('home.sanpham')}}" class="btn btn-primary">Tiếp tục mua sắm</a>
    <a href="{{route('cart.clear')}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc là muốn xóa không?')">Xóa hết khỏi giỏ hàng</a>
    <a href="{{route('order.checkout')}}" class="btn btn-success">Đặt hàng</a>
    </div>
</div>


@stop()
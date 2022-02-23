@extends('layout.home')
@section('main')
      <!-- end header -->
    
     
                    <div class="titlepage " style=" text-align:center">
                        <h2><b>Thông tin khách hàng</b></h2>
                    </div>

   

    <!-- contact -->
   <!-- contact -->
        <div class="container" style=" backgrougn-color:">
       
            <div class="row" style="background-color: dodgerblue; ">
            
                <div class="col-md-6">
                <h3 style="text-align:center;">Thông tin tài khoản</h3>
                    <form action="" method="POST"> @csrf
                    <input type="hidden" name="customer_id" value="{{$auth->id}}">
                    <input type="hidden" name="total_price" value="{{$cart->totalPrice}}">
                        <div class="form-group">
                            <label for="exampleInputName1">Tên</label>
                            <input type="text" name="auth_name" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" value="{{$auth->name}}">
                           
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="auth_email" class="form-control" id="exampleInputEmail1" value="{{$auth->email}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPhone1">Điện thoại</label>
                            <input type="text" name="auth_phone" class="form-control" id="exampleInputPhone1" value="{{$auth->phone}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputAddress1">Địa chỉ</label>
                            <input type="text" name="auth_address" class="form-control" id="exampleInputAddress1" value="{{$auth->address}}">
                        </div>
                    </div>




                    
                   
                    <div class="col-md-6">
                    
                    <h3>Thông tin người nhận</h3>
                        <div class="form-group">
                            <label for="exampleInputName1">Tên</label>
                            <input type="text"  name="name" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="Mời bạn nhập tên...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Mời bạn nhập email...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPhone1">Điện thoại</label>
                            <input type="text" name="phone" class="form-control" id="exampleInputPhone1" placeholder="mời bạn nhập số điện thoại...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputAddress1">Địa chỉ</label>
                            <input type="text" name="address" class="form-control" id="exampleInputAddress1" placeholder="Mời bạn nhập địa chỉ...">
                        </div>
                        <h4><input type="checkbox" id="is_me"/> <small><label for="is_me"></label>Đó chính là tôi</small></h4>
                    </div>
                    
                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-danger" style="padding-right: 545px;padding-left: 545px;">Mua_ngay</button>
                    </div>
                    
                </form>
            </div>
            <hr class="mt-5">
            <table class="table mt-5">
            <p class="mt-5" style="font-size:20px; text-align:center"><b style="color:black">Tổng tiền: </b>({{number_format($cart->totalPrice)}}) <u>đ</u><b style="color:black">,</b> <b b style="color:black"> Tổng số lượng: </b>({{$cart->totalQuantity}}) </span>
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
                @foreach($cart->items as $cat)
                <?php 
                    $subTotal = $cat['price']*$cat['quantity']; 
                ?>
                    <tr > 
                        <td  style="text-align:center"><b>{{$key}}</b></td>
                        <td  style="text-align:center; "><b>{{$cat['name']}}</b></td>
                        <td  style="text-align:center; ">{{number_format($cat['price'])}} <u>đ</u></td>
                        <td  style="text-align:center; ">{{$cat['quantity']}}</td>
                        <td  style="text-align:center; ">{{number_format($subTotal)}} <u>đ</u></td>
                    </tr>
                    <?php $key++ ?>
                @endforeach
                </tbody>
            </table>
        </div>
    <!-- end contact -->

      @stop()

      @section('js')
        <script>
            $('#is_me').click(function(){
                var checked = $(this).is(':checked');
                if(checked){    
                    var _name = $('input[name="auth_name"]').val();
                    var _email = $('input[name="auth_email"]').val();
                    var _phone = $('input[name="auth_phone"]').val();
                    var _address = $('input[name="auth_address"]').val();
                    
                    $('input[name="name"]').val(_name);
                    $('input[name="email"]').val(_email);
                    $('input[name="phone"]').val(_name);
                    $('input[name="address"]').val(_address);
                }else{
                    $('input[name="name"]').val('');
                    $('input[name="email"]').val('');
                    $('input[name="phone"]').val('');
                    $('input[name="address"]').val('');
                }
            });
        </script>
        @stop()
 
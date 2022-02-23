@extends('layout.home')
@section('main')
      <!-- end header -->
    
     
                    <div class="titlepage" style=" text-align:center">
                        <h2 style="color:blue;"><b>Hồ sơ cá nhân</b></h2>
                    </div>

   

    <!-- contact -->
        <div class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="POST"> @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputName4">Name</label>
                                <input type="name" name="name" value="{{$account->name}}" class="form-control" id="inputName4">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="inputAddress">Address</label>
                                <input type="address" name="address" value="{{$account->address}}" class="form-control" id="inputAddress" placeholder="">
                                </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" name="email" value="{{$account->email}}" class="form-control" id="inputEmail4">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="inputPhone">Phone</label>
                                <input type="phone" name="phone" value="{{$account->phone}}" class="form-control" id="inputPhone" placeholder="">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputPassword4">Password có hoặc không?</label>
                                <input type="password" name="password" class="form-control" id="inputPassword4">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="inputBirhday">Birhday</label>
                                <input type="birthday" name="birhday" value="{{$account->birhday}}" class="form-control" id="inputBirhday" placeholder="">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputYourPassword4">Your Password</label>
                                <input type="password" name="confirm_password" class="form-control" id="inputYourPassword4">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="inputGender">Gender</label>
                                <input type="radio" name="gender" value="0"/>Male
                                <input type="radio" name="gender" value="1"/>FeMale
                                </div>
                            </div>
                        <button type="submit" class="btn btn-success">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end contact -->
 
      @stop()
   </body>
</html>
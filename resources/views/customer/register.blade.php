@extends('layout.home')
@section('main');
      <!-- end header -->
    
     
                    <div class="titlepage" style=" text-align:center">
                        <h2 style="color:blue;"><b>Đăng Ký</b></h2>
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
                                <input type="name" name="name" class="form-control" id="inputName4">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="inputAddress">Address</label>
                                <input type="address" name="address" class="form-control" id="inputAddress" placeholder="">
                                </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" name="email" class="form-control" id="inputEmail4">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="inputPhone">Phone</label>
                                <input type="phone" name="phone" class="form-control" id="inputPhone" placeholder="">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputPassword4">Password</label>
                                <input type="password" name="password" class="form-control" id="inputPassword4">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="inputBirhday">Birhday</label>
                                <input type="birthday" name="birhday" class="form-control" id="inputBirhday" placeholder="">
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
                        <button type="submit" class="btn btn-primary">Đăng ký</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end contact -->
 
      @stop()
   </body>
</html>
@extends('layout.home')
@section('main')
      <!-- end header -->
    
     
                    <div class="titlepage" style=" text-align:center">
                        <h2 style="color:blue;"><b>Đăng nhập</b></h2>
                    </div>

   

    <!-- contact -->
        <div class="contact" >
            <div class="container" >
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="POST" > @csrf

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" name="email" class="form-control" id="inputEmail4">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Password</label>
                                    <input type="password" name="password" class="form-control" id="inputPassword4">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" name="remember" type="checkbox" value="1"/>
                                    <label class="form-check-label" for="gridCheck">
                                        Check me out
                                    </label>
                                </div>
                            </div>
                    
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end contact -->
 
      @stop()
   </body>
</html>
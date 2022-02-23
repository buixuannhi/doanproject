
    
<!-- project mưới -->
<div class="bgded overlay" style="background-image:url('images/demo/backgrounds/01.png');"> 
  <!-- ################################################################################################ -->
  <div class="wrapper row0">
    <div id="topbar" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <div class="fl_left"> 
        <!-- ################################################################################################ -->
        <ul class="nospace">
          <li><i class="fas fa-phone"></i> +00 (123) 456 7890</li>
          <li><i class="far fa-envelope"></i> info@domain.com</li>
        </ul>
        <!-- ################################################################################################ -->
      </div>
      <div class="fl_right"> 
        <!-- ################################################################################################ -->
        <ul class="nospace">
        @if(auth()->guard('kh')->check())
        <li><a href="{{route('cart.view')}}" title="Sign Up"><i class="fas fa-shopping-cart"> Giỏ hàng</i></a></li>
        <li><a href="{{route('home.index')}}"><i class="fas fa-home"> Trang chủ</i></a></li>
        <li><a href="{{route('customer.profile')}}" title="Help Centre"><i class="fas fa-user"> HI: {{auth()->guard('kh')->user()->name}}</i></a></li>
        <li><a href="{{route('customer.logout')}}" title="Sign Up"><i class="fas fa-sign-in-alt"> Đăng xuất</i></a></li>
        @else
        <li><a href="{{route('cart.view')}}" title="Sign Up"><i class="fas fa-shopping-cart"> Giỏ hàng</i></a></li>
        <li><a href="{{route('customer.login')}}" title="Login"><i class="fas fa-user"> Đăng nhập</i></a></li>
        <li><a href="{{route('customer.register')}}" title="Sign Up"><i class="fas fa-user"> Đăng ký</i></a></li>
        @endif
        </ul>
        <!-- ################################################################################################ -->
      </div>
      <!-- ################################################################################################ -->
    </div>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row1">
    <header id="header" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <div id="logo" class="fl_left">
        <h1><a href="index.html">world tivi</a></h1>
      </div>
      <!-- ################################################################################################ -->
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li class="active"><a href="{{route('home.index')}}">Trang chủ</a></li>
          <li class="active"><a href="{{route('home.sanpham')}}">Sản phẩm</a></li>
          <li class="active"><a href="{{route('admin.index')}}">Quản lí danh mục</a></li>

        </ul>
      </nav>
      <!-- ################################################################################################ -->
    </header>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article class="center">
      <h3 class="heading underline">Vestibulum metus semper</h3>
      <p>Mattis elit ut interdum risus id luctus consectetuer velit neque ornare quam at ornare nisi velit nec turpis.</p>
      <footer><a class="btn" href="#">Morbi accumsan ligula</a></footer>
    </article>
    <!-- ################################################################################################ -->
  </div>
  <!-- ################################################################################################ -->
</div>

<div class="wrapper row3">
  <main class="hoc container clear " style="    padding-bottom: 0px;"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="center btmspace-80">
      <h6 class="heading underline font-x2">Aliquam erat volutpat</h6>
    </div>
    <ul class="nospace group overview btmspace-80">
      <li class="one_quarter">
        <article><a href="#"><i class="fas fa-eraser" style="color:blue"></i></a>
          <h6 class="heading"><a href="#">Vivamus laoreet orci vel massa phasellus</a></h6>
        </article>
      </li>
      <li class="one_quarter">
        <article><a href="#"><i class="fas fa-cut" style="color:green"></i></a>
          <h6 class="heading"><a href="#">Sem iaculis blandit ultrices adipiscing</a></h6>
        </article>
      </li>
      <li class="one_quarter">
        <article><a href="#"><i class="fas fa-hand-holding-heart" style="color:red"></i></a>
          <h6 class="heading"><a href="#">Rhoncus sapien magna turpis proin</a></h6>
        </article>
      </li>
      <li class="one_quarter">
        <article><a href="#"><i class="fas fa-rocket" style="color:blue"></i></a>
          <h6 class="heading"><a href="#">Dictum quisque est imperdiet pulvinar</a></h6>
        </article>
      </li>
    </ul>
    <footer class="center"><a class="btn" href="#">Quis molestie convallis</a></footer>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div> 
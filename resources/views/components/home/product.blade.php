
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="heading underline">
                    <h3 class="title">{{$title}}</h3> 
                </div>
            </div>
           
            
            <h3 class="heading underline"></h3>
         <div class="row">
            @foreach($products as $model)
               <div class="col-md-3 mt-5" style="border-bottom: 5px solid #f3f3f3 !important;  border-right: 5px solid #f3f3f3 !important; padding: 10px 15px 20px; overflow: hidden;">
                  <a href="{{route('home.product', ['id' => $model->id, 'slug' => slug($model->name)])}}" >
                     <div style="text-align: center">
                        <img src="{{url('public/uploads')}}/{{$model->image}}" style=" width:250px;">
                     </div>
                     <div class="" >
                        <b style="color:#666666;">{{$model->name}}</b>
                     </div>
                  </a>
                  <div class="row" style="text-align: center; padding-top: 12px;">
                     <div class="col-md-3">
                        <p style="border: 1px solid #f3f3f3; width:60px">
                           55 inch
                        </p>
                     </div>
                     <div class="col-md-3">
                     <p style="border: 1px solid #f3f3f3; width:25px; ">
                        4k
                     </p>
                     </div>
                  </div>
                  <div >
                     oline giá rẻ
                  </div>
                  <div style="padding-top: 12px;text-decoration: line-through; color:#7d7d7d">
                     <b>{{number_format($model->price)}}  <s style="text-decoration: underline; font-size: 12px;">đ</s></b>
                  </div>
                  <div style="padding-top: 12px; font-size: 16px;">
                     <b>{{$model->salse_price}} <s style="text-decoration: underline; font-size: 12px;">đ</s></b>
                  </div>
               </div>
            @endforeach
         </div>
      </div>
      
   </div>
</div>


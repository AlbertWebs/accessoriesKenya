 <!-- brand slider start -->
 <?php $Brand = DB::table('brands')->inRandomOrder()->get(); ?>
 <div class="brand-slider-section pb-6rem bg-white">
    <div class="container">
       <div class="row">
          <div class="col-12">
             <div class="brand-init style1">
                @foreach ($Brand as $item)
                  <div class="slider-item">
                     <div class="single-brand">
                        <a href="{{url('/')}}" class="brand-thumb">
                        <img src="{{url('/')}}/uploads/brands/{{$item->image}}" alt="{{$item->name}}">
                        </a>
                     </div>
                  </div> 
                @endforeach
             </div>
          </div>
       </div>
    </div>
 </div>
 <!-- brand slider end -->
<section style="background-image: url('{{url('/')}}/uploads/banners/<?php $Banner = DB::table('banners')->where('name','Banner')->get() ?>@foreach($Banner as $banner){{$banner->image}}@endforeach');" class="section-30 section-sm-40 section-md-66 section-lg-bottom-90 bg-gray-dark page-title-wrap">
      <div class="shell">
        <div class="page-title">
          <h4></h4>
        </div>
      </div>
    </section>
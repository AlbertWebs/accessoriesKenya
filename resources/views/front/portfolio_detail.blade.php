@extends('front.master')
@section('content')

  <main class="page-content">
  @include('front.breadcrumb')
    <section class="section-50 section-sm-90 section-md-bottom-120 section-lg-bottom-165">
      <div class="shell isotope-wrap text-center">
        <div class="range">
        @foreach($Portfolio as $Portfolio)
          <div class="cell-xs-12 offset-top-40">
            <div class="section-title text-center">
							<h2>{{$Portfolio->title}}</h2>
						</div>
            <div class="row">
              <div data-isotope-layout="fitRows" data-isotope-group="gallery" data-photo-swipe-gallery="gallery" class="isotope isotope-gutter-default">
                  
                <div data-filter="Category 1" class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                  <div class="thumbnail thumbnail-variant-3">
                    <figure><img src="{{url('/')}}/uploads/portfolio/{{$Portfolio->image_one}}" alt="" width="370" height="278"/> </figure>
                    <div class="caption"><a href="{{url('/')}}/uploads/portfolio/{{$Portfolio->image_one}}" data-photo-swipe-item="" data-size="1200x900" class="link link-original"></a></div>
                  </div>
                </div>

                <div data-filter="Category 1" class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                  <div class="thumbnail thumbnail-variant-3">
                    <figure><img src="{{url('/')}}/uploads/portfolio/{{$Portfolio->image_two}}" alt="" width="370" height="278"/> </figure>
                    <div class="caption"><a href="{{url('/')}}/uploads/portfolio/{{$Portfolio->image_two}}" data-photo-swipe-item="" data-size="1200x900" class="link link-original"></a></div>
                  </div>
                </div>

                <div data-filter="Category 1" class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                  <div class="thumbnail thumbnail-variant-3">
                    <figure><img src="{{url('/')}}/uploads/portfolio/{{$Portfolio->image_three}}" alt="" width="370" height="278"/> </figure>
                    <div class="caption"><a href="{{url('/')}}/uploads/portfolio/{{$Portfolio->image_three}}" data-photo-swipe-item="" data-size="1200x900" class="link link-original"></a></div>
                  </div>
                </div>

                <div data-filter="Category 1" class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                  <div class="thumbnail thumbnail-variant-3">
                    <figure><img src="{{url('/')}}/uploads/portfolio/{{$Portfolio->image_four}}" alt="" width="370" height="278"/> </figure>
                    <div class="caption"><a href="{{url('/')}}/uploads/portfolio/{{$Portfolio->image_four}}" data-photo-swipe-item="" data-size="1200x900" class="link link-original"></a></div>
                  </div>
                </div>

                <div data-filter="Category 1" class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                  <div class="thumbnail thumbnail-variant-3">
                    <figure><img src="{{url('/')}}/uploads/portfolio/{{$Portfolio->image_five}}" alt="" width="370" height="278"/> </figure>
                    <div class="caption"><a href="{{url('/')}}/uploads/portfolio/{{$Portfolio->image_five}}" data-photo-swipe-item="" data-size="1200x900" class="link link-original"></a></div>
                  </div>
                </div>
                  
              </div>

            </div>
          </div>
        @endforeach
        </div>
      </div>
    </section>
  </main>
       
@endsection
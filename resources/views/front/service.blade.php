@extends('front.master')
@section('content')
@foreach($Services as $Service)
<main class="page-content">
@include('front.breadcrumb')
    <section class="section-60 section-sm-75 section-lg-90">
      <div class="shell">
      <h3>   {{$Service->title}}</h3>
       
      
      
        <article class="post-info offset-top-40">
          
          <div class="post-main">
            <div class="post-left">
              <!-- <ul class="post-meta">
                <li>
                  <time datetime="2019-05-01">May 2019</time>
                </li>
                <li>by Albert Miro</li>
                <li>
                  <ul class="list-hashtags">
                    <li><a href="#">web</a></li>
                    <li><a href="#">design</a></li>
                    <li><a href="#">project</a></li>
                    <li><a href="#">tips</a></li>
                  </ul>
                </li>
              </ul> -->
            </div>
            <div class="post-body">
              <p>{!!html_entity_decode($Service->content)!!}</p>
            </div>
          </div>
        </article>
      </div>
    </section>
  
    <section class="section-50 section-sm-90 section-lg-top-120 section-lg-bottom-145"> `
  <div class="shell isotope-wrap">
    <div class="range">
      <div class="cell-xs-12 text-center">
        <h3><span>Our</span><em>Work</em><span></span></h3>
        <!-- <ul class="isotope-filters-responsive offset-top-40">
          <li>
            <p>Choose your category:</p>
          </li>
          <li class="block-top-level">
            <button data-custom-toggle="#isotope-1" data-custom-toggle-disable-on-blur="true" class="isotope-filters-toggle btn btn-sm btn-default">Filter<span class="caret"></span></button>
            <div id="isotope-1" class="isotope-filters isotope-filters-minimal isotope-filters-horizontal">
              <ul class="list-inline">

                <li><a data-isotope-filter="*" data-isotope-group="gallery" href="#" class="active">All</a></li>
                <?php $Category = DB::table('services')->get(); ?>
                @foreach($Category as $category)
                <li><a data-isotope-filter="Category_{{$category->id}}" data-isotope-group="gallery" href="#">{{$category->title}}</a></li>
                @endforeach
               
              </ul>
            </div>
          </li>
        </ul> -->
      </div>
      <div class="cell-xs-12 offset-top-40">
        <div class="row">
          <div data-isotope-layout="fitRows" data-isotope-group="gallery" data-photo-swipe-gallery="gallery" class="isotope isotope-gutter-default">
              
              @foreach($images as $key => $image)
                <div data-filter="" class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                  <div class="thumbnail thumbnail-variant-3"><a target="_blank" href="{{ $image }}" class="link link-external"><span class="icon icon-sm fa fa-link"></span></a>
                    <figure><img src="{{ $image }}" alt="" width="370" height="278"/> </figure>
                    <div class="caption"><a href="{{ $image }}" data-photo-swipe-item="" data-size="1200x900" class="link link-original"></a></div>
                  </div>
                </div>
              @endforeach
           
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
   
    <section class="section-60 section-sm-100 bg-primary">
      <div class="shell text-center text-md-left">
        <div class="range range-md-middle range-md-center">
         
          <div class="cell-md-4 cell-lg-3 offset-top-30 offset-md-top-0"><a href="{{url('/quote')}}" class="btn btn-xl btn-white-outline">Request Quote</a></div>
          <div class="cell-md-4 cell-lg-3 offset-top-30 offset-md-top-0"><a href="{{url('/contact')}}" class="btn btn-xl btn-white-outline">Contact Us</a></div>
          <div class="cell-md-4 cell-lg-3 offset-top-30 offset-md-top-0"><a href="{{url('/rfp')}}" class="btn btn-xl btn-white-outline">Submit an RFP</a></div>
          
        </div>
      </div>
    </section>
    <div class="divider-spectrum"></div>
</main>
@endforeach
@endsection
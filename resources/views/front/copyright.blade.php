@extends('front.master')
@section('content')
<style type="text/css">
 a{
   color:#66139B;
 }
</style>
<div id="blog-page-contain">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-8"> 
        @if($Copyright->isEmpty())
        <center>
          No copyrights Added
        </center>
        @else
          <!-- left block Start  -->
          <div id="left">
          @foreach($Copyright as $terms)
            <div class="single-post-item">
              
              <div class="single-post-details">
            
                <div class="description" style="font-size:20px; color:#000; padding-top:80px; padding-bottom:80px">

                  <p>{!!html_entity_decode($terms->content)!!}</p>
                 
                </div>
              </div>
            </div>

          @endforeach
       
            
          </div>
          <!-- left block end  --> 
        @endif
        </div>
      
      </div>
    </div>
  </div>
@endsection
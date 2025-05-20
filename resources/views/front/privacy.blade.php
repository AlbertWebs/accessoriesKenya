@extends('front.master')
@section('content')
<style type="text/css">
 a{
   color:#0090f0;
 }
 h2{
   color:#0090f0;
   font-size:24px;
 }
</style>
<div id="blog-page-contain">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-8"> 
        @if($Privacy->isEmpty())
        <center>
          
        </center>
        @else
          <!-- left block Start  -->
          <div id="left" style="font-size:20px; color:#000; padding-top:80px; padding-bottom:80px">
          @foreach($Privacy as $terms)
           
                <div class="description">
                  <p>{!!html_entity_decode($terms->content)!!}</p>
                 
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
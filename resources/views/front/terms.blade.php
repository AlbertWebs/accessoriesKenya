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
        @if($Term->isEmpty())
        <center>
          
        </center>
        @else
          <!-- left block Start  -->
          <div id="left" style="font-size:20px; color:#000; padding-top:80px; padding-bottom:80px">
          @foreach($Term as $terms)
         
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
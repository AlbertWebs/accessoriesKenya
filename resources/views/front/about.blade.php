@extends('front.master')
@section('content')
        <div class="container">
              <div class="row">
                <div class="col-md-12 col-sm-8"> 
                  <p style="font-size:20px; color:#000; padding-top:80px; padding-bottom:80px" class="text-center">
                    @foreach($About as $about)
              
                
                        {!!html_entity_decode($about->content)!!}

                    
                    @endforeach
                  </p>
                </div>
              </div>
        </div>
        
      

       
        @include('front.brands')

@endsection
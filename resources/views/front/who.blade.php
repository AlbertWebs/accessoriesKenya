@extends('front.master')
@section('content')

  <main class="page-content">
    @include('front.breadcrumb')
    <section class="section-30 section-sm-top-50">
      <div class="shell">
        <h3 class="text-center">What we do</h3>
        <div class="range range-sm-center offset-top-40">
          <div class="cell-lg-10">
            <div id="tabs-2" class="tabs-custom tabs-vertical tabs-corporate">
              <ul class="nav nav-tabs">
              @foreach($Action as $action)
                <li class="<?php if($action->id == 1){echo "active";}else{ echo "";} ?>"><a href="#tabs-2-{{$action->id}}" data-toggle="tab">{{$action->title}}</a></li>
              @endforeach
             </ul>
             
              <div class="tab-content text-secondary">
              @foreach($Action as $action)
                <div id="tabs-2-{{$action->id}}" class="tab-pane fade <?php if($action->id == 1){echo "in active";}else{ echo "";} ?>">
                  {!!html_entity_decode($action->content)!!}
                </div>
                @endforeach
             </div>
             
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="divider-spectrum"></div>
  </main>

@endsection
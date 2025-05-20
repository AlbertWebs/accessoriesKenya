@extends('front.master')
@section('content')
@include('front.breadcrumb'); 
<center>
<h1>{{$page_title}}</h1>
<br>
<a style="background-color:#0090f0;" href="{{url('/')}}" class="btn btn-dark3 text-capitalize">Back to Home</a>
<br> &nbsp; <br>
</center>
@endsection


@extends('layouts.app')

@section('content')
    <div class="container">
    <h1 style="text-align:center">

    @if(Session::has('success'))
         <div class="alert alert-success text-center" style="margin-top:20px">
            <a href="#" class="close">×</a>
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif

     @if(Session::has('error'))
         <div class="alert alert-danger text-center" style="margin-top:20px">
            <a href="#" class="close">×</a>
            <p>{{ Session::get('error') }}</p>
        </div>
    @endif
       Now you Will Subscribe  {{$data->name }}
       <br>
       <form method="post" action="{{url('increaseSubscribe')}}">
       @csrf
       <input type="hidden" name="user" value="{{$data->id}}"/>
        <button type="submit" class="btn btn-primary">Subscribe</button>
       </form>

       <br>

       @if (count($usersSubscribed) > 0)
        Number Of Subscribes :  {{count($usersSubscribed)}}
       @endif 
    </h1>
    </div>
     @endsection

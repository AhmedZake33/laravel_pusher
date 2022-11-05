

@extends('layouts.app')

@section('content')
    <div class="container center">
       <h2> {{$video->name}} Viewers ({{$video->viewers}})</h2>
       <iframe width="560" height="315" src="https://www.youtube.com/embed/vmADdY1iQ2E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
@endsection

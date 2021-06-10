@extends('layout')

@section('contenu')
    @foreach($ads as $ad)
        <a href="my_ads/{{$ad->id}}"> 
            <div> 
                <h1> {{$ad->titre}} </h1>
            </div>
        </a>
        <hr>
    @endforeach
@endsection
@extends('layout')

@section('contenu')
    @foreach($ads as $ad) 
        <a href="/ad/{{$ad->id}}"> 
            <div>
                <h1> {{$ad->titre}} </h1>
                <p> {{$ad->prix}} </p>
            </div>
        </a>
    @endforeach
@endsection
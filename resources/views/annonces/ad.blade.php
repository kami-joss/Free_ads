@extends('layout')

@section('contenu') 
    <div>
        <h1> {{$titre}} </h1>
        <p> {{$description}} </p>
        <p> {{$prix}} € </p>
        @if($update === true)
            <div> 
                <a href="/my_ads/{{$id}}/edit_ad"> Edit </a>
            </div>
        @endif
    </div>
@endsection
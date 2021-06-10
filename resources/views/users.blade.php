@extends('layout');

@section('contenu') 
    <h1> Users : </h1>
    @foreach($users as $user) {
        <li> {{ $user }} </li>
    } 
    @endforeach
@endsection
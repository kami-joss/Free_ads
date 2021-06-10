@extends('layout')

@section('contenu')
    <form method="post">
    @csrf
        <p><label for="name"> Name : </label></p>
        <p><input type="text" name="name"></p>
        @if ($errors->has('name')) 
            <p> {{$errors->first()}} </p>
        @endif
        <p><label for="email"> Email : </label></p>
        <p><input type="text" name="email" value={{ old('email') }}></p>
        @if($errors->has('email')) 
            <p> {{$errors->first()}} </p>
        @endif
        <p><label for="password"> Password : </label></p>
        <p><input type="password" name="password"></p>
        @if($errors->has('password'))
            <p> {{$errors->first()}} </p>
        @endif
        <p><button type="submit"> Subscribe </button></p>
    </form>
    <a href="/login"> Cancel </a>
@endsection
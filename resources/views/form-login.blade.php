@extends('layout')

@section('contenu')
    <form method="post">
    @csrf
        <p><label for="email"> Email </label></p>
        <p><input type="text" name="email"></p>
        @if ($errors->has('email'))
            <p> {{$errors->first()}} </p>
        @endif
        <p><label for="password"> Password </label></p>
        <p><input type="password" name="password"></p>
        @if($errors->has('password')) 
            <p> {{$errors->first()}}</p>
        @endif
        <button type="submit"> Login </button>
    </form>
    <a href="/register"> Not yet registered ? </a>
@endsection
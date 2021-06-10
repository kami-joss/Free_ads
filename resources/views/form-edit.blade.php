@extends('layout')

@section('contenu')
    <form method="post">
    @csrf
        <p><label for="name"> New name : </label></p>
        <p><input type="text" name="name" value={{ $user['name'] }}></p>
        @if ($errors->has('name')) 
            <p> {{$errors->first()}} </p>
        @endif
        <p><label for="email"> New email : </label></p>
        <p><input type="text" name="email" value={{ $user['email'] }}></p>
        @if($errors->has('email')) 
            <p> {{$errors->first()}} </p>
        @endif
        <p><label for="password"> New password : </label></p>
        <p><input type="password" name="password"></p>
        @if($errors->has('password'))
            <p> {{$errors->first()}} </p>
        @endif
        <p>
            <button type="submit"> Edit </button>
            <a href="/user">Cancel </a>
        </p>

    </form>
@endsection
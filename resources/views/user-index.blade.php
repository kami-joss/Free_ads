@extends('layout');

@section('contenu')
    <h1> My account </h1>
    <p> Welcome {{ $name }} ! </p>
    <p> <a href="/edit"> Edit account </a> </p>
    <p> <a href="/ad"> Post an add </a> </p>
    <p> <a href="/my_ads"> My ads </a> </p>
    <p> <a href="/logout"> Logout </a> </p>
    <p> <a href="user/delete"> Delete my account </a> </p>
@endsection
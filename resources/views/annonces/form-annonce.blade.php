@extends('layout')

@section('contenu')
<h1> Post an ad </h1>
<form method="post" enctype="multipart/form-data">
    @csrf
    <p> <input type="text" name="titre" placeholder="Titre"> </p>
    <p> <textarea name="description" placeholder="About your ad"> </textarea> </p>
    <p> <input type="file" name="image[]" accept="Image/jpg Image/png" multiple> </p>
    <p> <input type="text" name="prix" placeholder="Price"> </p>
    <button type="submit"> Post </button>
</form>
<a href="/user"><button> Cancel </button></a>

@endsection

    
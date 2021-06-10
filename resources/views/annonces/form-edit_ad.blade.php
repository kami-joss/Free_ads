@extends('layout')

@section('contenu')
<h1> Post an ad </h1>
<form method="post" enctype="multipart/form-data">
    @csrf
    <p> <input type="text" name="titre" placeholder="Titre" value={{$titre}}> </p>
    <p> <textarea name="description" placeholder="About your ad" value={{$description}}> </textarea> </p>
    <p> <input type="file" name="image[]" accept="Image/jpg Image/png" multiple> </p>
    <p> <input type="text" name="prix" placeholder="Price" value={{$prix}}> </p>
    <button type="submit"> Update </button>
</form>
<a href="/my_ads/{{$id}}/delete"> Delete Ad </a>
<a href="/my_ads/{{$id}}"><button class="btn btn-danger"> Cancel </button></a>
@endsection

    
@extends('welcome')
@section('content')
<form action="/create" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name='prenom'>
    <input type="text" name='nom'>
    <input type="number" name='age'>
    <input type="file" name="img" id="">
    <input type="file" name="cv" id="">
    <input type="file" name="lettre" id="">
    <button type="submit">Créer</button>
</form>
@endsection
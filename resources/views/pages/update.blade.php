@extends('welcome')
@section('content')
    <form action="/show/{{$show->id}}/update" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <input type="text" name="nom" value="{{$show->nom}}">
        <input type="text" name="prenom" value="{{$show->prenom}}">
        <input type="number" name="age" value="{{$show->age}}">
        <input type="file" name="img" >
        <img src="{{asset('storage/img/'.$show->img)}}" alt="">
        <button class="btn btn-success" type="submit">Update !</button>
    </form>
@endsection


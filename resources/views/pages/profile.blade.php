@extends('welcome')
@section('content')
    @foreach ($all as $item)
    {{$item->prenom}}
    {{$item->nom}}
    {{$item->age}}
    <img src="{{asset('storage/img/'.$item->img)}}" style="width: 10%">
    {{$item->cv}}
    {{$item->lettre}}
    <button class="btn btn-success"><a class='text-decoration-none text-white' href="/download/{{$item->id}}">Télécharger</a></button>
    <form action="/delete/{{$item->id}}" method="post">
        <button class="btn btn-danger">
        @csrf
        @method('DELETE')
        Supprimer
        </button>
    </form>
    <a href="/show/{{$item->id}}"><button class="btn btn-primary">Modifier</button></a>
    @endforeach
@endsection
@extends('layouts.app')

@section('title','Listagem')

@section('content')


<div class="container mt-5">
    <h1>Lista de Musicas:</h1>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Musica</th>
            <th scope="col">Duração</th>
          </tr>
        </thead>
        <tbody>
            @foreach($musicas as $musica)
            <tr>
                <th>{{$musica->nome}}</th>
                <th>{{$musica->tempo}}</th>
                <th class='d-flex'>
                <form action="{{route('admin.albums.musicas.destroy', [$album->id, $musica->id])}}" method="POST">
                  @csrf
                  @method('DELETE')
                <button style="border:0;background:transparent;" type="submit">
                    <span class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                    </svg></span>
                    </button>
                  </form>
                </th>
            </tr>
            @endforeach
        </tbody>
      </table>




        <div class="form-group">
            <a class="btn btn-primary" href="{{route('admin.albums.musicas.create',$album->id)}}" role="button">Adicionar</a>
        </div>


        <form action="" enctype="multipart/form-data" method="POST">
            @csrf
        </form>
</div>

@endsection

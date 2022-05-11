@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h1>Adicione nova Musica:</h1>
    <hr>
    <form action="{{route('admin.albums.musicas.store', $album->id)}}" method="POST">
        @csrf
        @isset($musica)
             @method('PUT')
        @endisset
        <div class="form-group">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" value= "{{old('nome', $genero->nome ?? '')}}"
                class="form-control" placeholder="adicione um nome">
            </div>
            <div class="form-group">
                <label for="tempo">Tempo:</label>
                <input type="number" step="any" name="tempo" id="tempo" value= "{{old('tempo', $genero->valor ?? '')}}"
                class="form-control" placeholder="adicione um tempo">
            </div>
            <br>
            <div class="form-group">
                <input type="submit" name="submit"
                class="btn btn-primary">
            </div>
        </div>
    </form>
</div>





@endsection

@extends('layouts.app')

@section('title','Listagem')

@section('content')
<div class="container mt-5">
    <h1>Adicione novo album:</h1>
    <hr>
    <form action="{{$action}}" method="POST">
        @csrf
        @isset($album)
             @method('PUT')
        @endisset
        <div class="form-group">



            <div class="form-group">
                <label for="artista">Artista:</label>
                <input type="text" name="artista" id="artista" value= "{{old('artista', $album->artista ?? '')}}"
                class="form-control" placeholder="adicione um artista">
                @error('artista')
                <span><small>{{$message}}</small></span>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="genero_id">Genero:</label>
                <select class="form-select form-select-sm" name="genero_id" aria-label=".form-select-sm example">
                <option disabled selected>Selecione um Genero</option>

                @foreach($generos as $genero)
                <option value="{{$genero->id}}"{{old('genero_id', $album->genero->id ?? '') == $genero->id? 'selected' : ''}}>{{$genero->nome}}</option>
                @endforeach
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="valor">Valor:</label>
                <input type="number" step="any" name="valor" id="valor" value= "{{old('valor', $album->valor ?? '')}}"
                class="form-control" placeholder="adicione um valor">
            </div>
            <br>
            <div class="form-group">
                <input type="submit" name="submit"
                class="btn btn-primary">
            </div>
        </div>
        <br>
        <br>
    </form>
</div>

@endsection

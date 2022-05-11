@extends('layouts.app')

@section('title','Listagem')

@section('content')


<div class="container mt-5">
    <h1>Adicione novo genero:</h1>
    <hr>
    <form action="{{$action}}" method="POST">
        @csrf
        @isset($genero)
             @method('PUT')
        @endisset
        <div class="form-group">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" value= "{{old('nome', $genero->nome ?? '')}}"
                class="form-control" placeholder="adicione um nome">
                @error('nome')
                <span><small>{{$message}}</small></span>
                @enderror
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
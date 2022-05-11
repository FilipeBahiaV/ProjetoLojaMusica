@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <form action="{{ route('admin.albums.index') }}" method="GET">
            <select class="form-select" aria-label="Default select example" name="genero_id" id="genero">
                <option value="">Selecione um genero</option>
                @foreach ($generos as $genero)
                    <option value="{{ $genero->id }}" {{ $genero->id == $genero_id ? 'selected' : '' }}>
                        {{ $genero->nome }}</option>
                @endforeach
            </select>



            <div class="d-flex mx-2">
                <a class="btn btn-dark" href="{{ route('admin.albums.index') }}">Voltar</a>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-dark" value="Pesquisar">
                </div>
            </div>
        </form>
    </div>
    <div class="container mt-5">
        <h1>Lista dos Albuns</h1>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Artista</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($albums as $album)
                    <tr>
                        <th>{{ $album->artista }}</th>
                        <th>{{ $album->genero->nome }}</th>
                        <th>{{ $album->valor }}</th>
                        <th class="d-flex">
                            <a class="mr" href={{ route('admin.albums.musicas.index', $album->id) }}>
                                <span class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-file-earmark-music" viewBox="0 0 16 16">
                                        <path
                                            d="M11 6.64a1 1 0 0 0-1.243-.97l-1 .25A1 1 0 0 0 8 6.89v4.306A2.572 2.572 0 0 0 7 11c-.5 0-.974.134-1.338.377-.36.24-.662.628-.662 1.123s.301.883.662 1.123c.364.243.839.377 1.338.377.5 0 .974-.134 1.338-.377.36-.24.662-.628.662-1.123V8.89l2-.5V6.64z" />
                                        <path
                                            d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                    </svg>
                                </span>
                            </a>

                            <a class="mr" href="{{ route('admin.albums.show', $album->id) }}">
                                <span class="btn btn-primary" title="ver">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-clipboard2-check-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z" />
                                        <path
                                            d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5Zm6.769 6.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708Z" />
                                    </svg>
                                </span>
                            </a>



                            <form class="mr" action="{{ route('admin.albums.destroy', $album->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a style="border:0;background:transparent;" type="submit">
                                    <span class="btn btn-primary" title="excluir">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                        </svg></span>
                                </a>
                            </form>


                            <a class="mr" href="{{ route('admin.albums.edit', $album->id) }}">
                                <span class="btn btn-primary" title="editar">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                    </svg></span>
                            </a>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="form-group">
            <a class="btn btn-primary" href="{{ route('admin.albums.create') }}" role="button">Create</a>
        </div>
    </div>
@endsection

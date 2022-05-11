@extends('layouts.app')

@section('content')

<section class='container mt-5'>

    <h1>Album:</h1>
    <div>
        <span class='col s12'></span>
        <h3>Artista:</h3>
        <p>{{$album->artista}}
        </p>

    </div>
    <div>
        <span class='col s12'></span>
        <h3>Genero:</h3>
        <p>{{$album->genero->nome}}
        </p>

    </div>
    <div>
        <span class='col s12'></span>
        <h3>Preço:</h3>
        <p>{{$album->valor}}
        </p>

    </div>

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
                </th>
            </tr>
            @endforeach
        </tbody>
      </table>




    <div class="form-group">
        <a class="btn btn-primary" href="{{route('admin.albums.index')}}" role="button">Voltar</a>
                </div>
    </div>

</section>







@endsection

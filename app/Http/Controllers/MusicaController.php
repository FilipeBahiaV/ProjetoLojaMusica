<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Musica;

class MusicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idAlbum)
    {
        $album = Album::find($idAlbum);

        $musicas = Musica::where('album_id', $idAlbum)->get();

        return view('albums.musicas.index', compact('album', 'musicas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idAlbum)
    {
        $album = Album::find($idAlbum);
        return view('albums.musicas.create', compact('album'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idAlbum)
    {
        $musica = new Musica();
        $musica->nome = $request->nome;
        $musica->tempo = $request->tempo;
        $musica->album_id = $idAlbum;
        $musica->save();
        return redirect()->route('admin.albums.musicas.index', $idAlbum);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idAlbum, $idMusica)
    {
        $musica = Musica::find($idMusica);

        $musica->delete();
        return redirect()->route('admin.albums.musicas.index', $idAlbum);
    }
}

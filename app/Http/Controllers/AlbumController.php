<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Genero;
use App\Models\Musica;
use Illuminate\Support\Facades\DB;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $albums = Album::with(['genero'])
        ->orderBy('artista', 'asc');


        $genero_id = $request->genero_id;
        //filtro de genero
        if($genero_id){
            $albums->where('genero_id', $genero_id);
        }
        //pegando os dados retornados a partir da execuçao da query
        $albums = $albums->get();
        $generos = Genero::orderBy('nome')->get();



        return view('albums.index', compact('albums' , 'generos', 'genero_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $generos = Genero::all();
        $action = route('admin.albums.store');
        return view('albums.create', compact('action', 'generos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Album::create($request->All());
        return redirect()->route('admin.albums.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $album = Album::with(['genero'])->find($id);
            $todasMusicas = Musica::all();
            $musicas = $todasMusicas->where('album_id', $id);
            //return view('albums.show', compact('album','musicas'));
            return response()->view('albums.show', compact('album','musicas'))->setStatusCode(200);}
        catch(Exception $e){
            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $album = Album::with(['genero'])->find($id);

        $generos = Genero::all();
        $action = route('admin.albums.update', $album->id);
        return view('albums.create', compact('album', 'action', 'generos'));
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
        DB::begintransaction();
        $album = Album::find($id);

        $album->update($request->all());
        $album->genero->update($request->all());
        DB::Commit();

        return redirect()->route('admin.albums.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Album::destroy($id);
        return redirect()->route('admin.albums.index');
    }
}

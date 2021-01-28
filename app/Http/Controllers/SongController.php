<?php

namespace App\Http\Controllers;

use App\Song;
use App\Album;
use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::all();

        return view('songs.index', compact("songs"));

        /*
        oppure

        $data = [
            "songs" => $songs
        ];

        return view('songs.index', $data);

        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $albums = Album::all();

        return view('songs.create', compact('albums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $song = new Song();

        $song->title = $request->input('title');
        $song->description = $request->input('description');
        $song->length = $request->input('length');
        // $song->album_id = $request->input('album_id');

        /* Metodo 1 */
        if(!empty($request->input('album_id'))) {
            $album_id = $request->input('album_id');
            $album = Album::find($album_id);
            $song->album()->associate($album);
        }

        /* Metodo 2 */
        // Con fill - fillable nel model con aggiunta di album_id

        $song->save();

        return redirect()->route('songs.index')->withSuccess('Salvataggio avvenuto correttamente');


        // //oppure
        // $data = $request->all();
        //
        // $song = new Song();
        //
        // //versione 1 -> campo campo
        // //$song->title = $data["title"];
        // //$song->description = $data["description"];
        // //$song->length = $data["length"];
        //
        // //versione 2 -> fill
        // $song->fill($data);
        //
        // $song->save();
        //
        // return redirect()->route('songs.index')->withSuccess('Salvataggio avvenuto correttamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        return view('songs.show', compact('song'));

        /*
        $song = Song::find($id);
        $data = [
            "song" => $song
        ];
        return view("songs.show", $data);
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
        $albums = Album::all();

        $data = [
            'albums' => $albums,
            'song' => $song
        ];

        return view('songs.edit', $data);

        /* oppure
        $song = Song::find($id);
        $data = [
            "song" => $song
        ];
        return view("songs.edit", $data);
        */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song)
    {
        $song->title = $request->input('title');
        $song->description = $request->input('description');
        $song->length = $request->input('length');

        if(!empty($request->input('album_id'))) {
            $album_id = $request->input('album_id');
            $album = Album::find($album_id);
            $song->album()->associate($album);
        } else {
            $song->album()->dissociate();
        }

        $song->save();

        return redirect()->route('songs.index')->withSuccess('Salvataggio avvenuto correttamente');

        /*
        oppure
        $data = $request->all();

        $song = Song::find($id);

        versione 1 : campo campo
        $song->title = $data["title"];
        $song->description = $data["description"];
        $song->length = $data["length"];

        versione 2 : fill
        $song->fill($data);

        $song->save();

        return redirect()->route('songs.index')->withSuccess('Salvataggio avvenuto correttamente');
        */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        $song->delete();

        return redirect()->route('songs.index')->withSuccess('Cancellazione avvenuta correttamente');

        /*
        oppure
        $song = Song::find($id);

        $song->delete();

        return redirect()->route('songs.index')->withSuccess('Cancellazione avvenuta correttamente');
        */
    }
}

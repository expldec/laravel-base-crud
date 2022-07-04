<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comic.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->getValidationRules());
        // Salva i dati nel database
        $data = $request->all();

        $new_comic = new Comic();
        $new_comic->fill($data);
        $new_comic->save();

        // Reindirizzo sulla rotta che mostra i dettagli di pasta salvata
        return redirect()->route('comics.show', ['comic' => $new_comic->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::find($id);
        return view('comic.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic_to_update = Comic::findOrFail($id);
        return view('comic.edit', compact('comic_to_update'));
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
         // Validazione dei dati
         $request->validate($this->getValidationRules());

         // Salvataggio dei dati
         $data = $request->all();
 
         $comic = Comic::findOrFail($id);
 
         $comic->update($data);
 
         return redirect()->route('comics.show', ['comic' => $comic->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);
        $comic->delete();
        return redirect()->route('comics.index');
    }

    private function getValidationRules()
    {
        return [
            'title' => 'required|max:50|min:5',
            'price' => 'required|max:999.99',
            'series' => 'required|max:50',
            'sale_date' => 'required',
            'type' => 'required|max:30',
            'description' => 'required|max:1500',
            'thumb' => 'required|max:600'
        ];
    }
}

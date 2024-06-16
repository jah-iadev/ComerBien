<?php

namespace App\Http\Controllers;

use App\Models\Fotosplato;
use App\Models\Plato;
use Illuminate\Http\Request;

/**
 * Class FotosplatoController
 * @package App\Http\Controllers
 */
class FotosplatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fotosplatos = Fotosplato::paginate(10);
        $platos = Plato::all();

        return view('fotosplato.index', compact('fotosplatos', 'platos'))
            ->with('i', (request()->input('page', 1) - 1) * $fotosplatos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fotosplato = new Fotosplato();
        $plato = Plato::all();

        $platos = [];
        foreach ($plato as $plato) {
        
            $platos[$plato->id] = $plato->nombre;
        }    
        return view('fotosplato.create', compact('fotosplato', 'platos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Fotosplato::$rules);

        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $carpetaDestino = 'assets/FotosPlatos/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('foto')->move($carpetaDestino,$filename);
        }
        $path = $carpetaDestino . $filename;
        //dd ($request->input('plato_id'));
        $fotosplato = Fotosplato::create([
            'foto' => $path,
            'plato_id' => $request->input('plato_id'),
        ]);

        return redirect()->route('fotosplato.index')
            ->with('success', 'Foto de plato creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fotosplato = Fotosplato::find($id);
        $platos = Plato::all();

        return view('fotosplato.show', compact('fotosplato', 'platos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fotosplato = Fotosplato::find($id);

        return view('fotosplato.edit', compact('fotosplato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Fotosplato $fotosplato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fotosplato $fotosplato)
    {
        request()->validate(Fotosplato::$rules);

        $fotosplato->update($request->all());

        return redirect()->route('fotosplato.index')
            ->with('success', 'Foto de plato actualizada correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $fotosplato = Fotosplato::find($id)->delete();

        return redirect()->route('fotosplato.index')
            ->with('success', 'Foto de plato borrada correctamente ');
    }
}

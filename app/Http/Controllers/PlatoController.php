<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use App\Models\Restaurante;
use Illuminate\Http\Request;

/**
 * Class PlatoController
 * @package App\Http\Controllers
 */
class PlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $platos = Plato::paginate(10);
        $restaurantes = Restaurante::all();

        return view('plato.index', compact('platos','restaurantes'))
            ->with('i', (request()->input('page', 1) - 1) * $platos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plato = new Plato();
        $restaurante = Restaurante::all();

        $restaurantes = [];
        foreach ($restaurante as $restaurante) {
        
            $restaurantes[$restaurante->id] = $restaurante->nombre;
        }

        return view('plato.create', compact('plato', 'restaurantes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Plato::$rules);

        $plato = Plato::create($request->all());

        return redirect()->route('plato.index')
            ->with('success', 'Nuevo plato creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plato = Plato::find($id);
        $restaurante = Restaurante::all();

        return view('plato.show', compact('plato', 'restaurante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plato = Plato::find($id);
        //$restaurante_plato = $plato->restaurante_id;
        $restaurante = Restaurante::all();

        $restaurantes = [];
        foreach ($restaurante as $restaurante) {
        
            $restaurantes[$restaurante->id] = $restaurante->nombre;
        }

        return view('plato.edit', compact('plato', 'restaurantes'));
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Plato $plato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plato $plato)
    {
        request()->validate(Plato::$rules);

        $plato->update($request->all());

        return redirect()->route('plato.index')
            ->with('success', 'Plato updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $plato = Plato::find($id)->delete();

        return redirect()->route('plato.index')
            ->with('success', 'Plato deleted successfully');
    }
}

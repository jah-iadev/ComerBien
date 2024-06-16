<?php

namespace App\Http\Controllers;

use App\Models\FotosRestaurante;
use App\Models\Restaurante;
use Illuminate\Http\Request;

/**
 * Class FotosRestauranteController
 * @package App\Http\Controllers
 */
class FotosRestauranteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fotosRestaurantes = FotosRestaurante::paginate(10);
        $restaurantes = Restaurante::all();

        return view('fotos-restaurante.index', compact('fotosRestaurantes', 'restaurantes'))
            ->with('i', (request()->input('page', 1) - 1) * $fotosRestaurantes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fotosRestaurante = new FotosRestaurante();
        $restaurante = Restaurante::all();

        $restaurantes = [];
        foreach ($restaurante as $restaurante) {
        
            $restaurantes[$restaurante->id] = $restaurante->nombre;
        }
        return view('fotos-restaurante.create', compact('fotosRestaurante', 'restaurantes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(FotosRestaurante::$rules);

        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $carpetaDestino = 'assets/FotosRestaurantes/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('foto')->move($carpetaDestino,$filename);
        }
        $path = $carpetaDestino . $filename;
        $fotosRestaurante = FotosRestaurante::create([
            'foto' => $path,
            'restaurante_id' => $request->input('restaurante_id'),
        ]);

        return redirect()->route('fotosrestaurante.index')
            ->with('success', 'FotosRestaurante created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fotosRestaurante = FotosRestaurante::find($id);
        $restaurantes = Restaurante::all();

        return view('fotos-restaurante.show', compact('fotosRestaurante', 'restaurantes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fotosRestaurante = FotosRestaurante::find($id);

        return view('fotos-restaurante.edit', compact('fotosRestaurante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  FotosRestaurante $fotosRestaurante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FotosRestaurante $fotosRestaurante)
    {
        request()->validate(FotosRestaurante::$rules);

        $fotosRestaurante->update($request->all());

        return redirect()->route('fotosrestaurante.index')
            ->with('success', 'FotosRestaurante updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $fotosRestaurante = FotosRestaurante::find($id)->delete();

        return redirect()->route('fotosrestaurante.index')
            ->with('success', 'FotosRestaurante deleted successfully');
    }
}

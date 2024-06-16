<?php

namespace App\Http\Controllers;

use App\Models\FotosRestaurante;
use App\Models\Plato;
use App\Models\FotosPlato;
use App\Models\Restaurante;
use Illuminate\Http\Request;

/**
 * Class RestauranteController
 * @package App\Http\Controllers
 */
class RestauranteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurantes = Restaurante::paginate(10);

        return view('restaurante.index', compact('restaurantes'))
            ->with('i', (request()->input('page', 1) - 1) * $restaurantes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurante = new Restaurante();
        return view('restaurante.create', compact('restaurante'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Restaurante::$rules);

        $restaurante = Restaurante::create($request->all());

        return redirect()->route('restaurante.index')
            ->with('success', 'Restaurante created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurante = Restaurante::find($id);

        return view('restaurante.show', compact('restaurante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurante = Restaurante::find($id);

        return view('restaurante.edit', compact('restaurante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Restaurante $restaurante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurante $restaurante)
    {
        request()->validate(Restaurante::$rules);

        $restaurante->update($request->all());

        return redirect()->route('restaurante.index')
            ->with('success', 'Restaurante updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $restaurante = Restaurante::find($id)->delete();

        return redirect()->route('restaurante.index')
            ->with('success', 'Restaurante deleted successfully');
    }

    public function main()
    {
        $restauranteUltimos4 = Restaurante::orderBy('created_at', 'desc')->limit(4)->get();
        $fotosrestaurante = FotosRestaurante::all();

        $fotos4 = [];
        if (!empty($restauranteUltimos4)) {
            foreach ($restauranteUltimos4 as $restaurante) {
        
                if (!empty($fotosrestaurante)) {
                    foreach ($fotosrestaurante as $fotoRestaurante) {
                        if ($restaurante->id == $fotoRestaurante->restaurante_id) {
                            $fotos4 [$restaurante->id] = $fotoRestaurante->foto;
                            break;
                        }
                    }
                }
            }
        } else {
            echo '<p>No hay restaurantes disponibles</p>';
        }

        $restaurante5 = Restaurante::orderBy('created_at')->skip(4)->take(1)->first();

        
        if (!empty($restaurante5)) {
                    foreach ($fotosrestaurante as $fotoRestaurante) {
                        if ($restaurante5->id == $fotoRestaurante->restaurante_id) {
                            $foto5 = $fotoRestaurante->foto;
                            break;
                        }
                    }
                }
        
        $Restaurantes = Restaurante::all();
        
        return view('index', compact('restauranteUltimos4', 'fotos4', 'restaurante5', 'foto5', 'Restaurantes'));
        }

    public function page_restaurante($id){

        $restaurante = Restaurante::find($id);
        $foto = FotosRestaurante::where('restaurante_id', $id)->first();
        $platos = Plato::where('restaurante_id', $id)->get();
        $fotosPlato = FotosPlato::all();
        
        $fotos_Plato = [];
        if (!empty($platos)) {
            foreach ($platos as $plato) {
        
                if (!empty($fotosPlato)) {
                    foreach ($fotosPlato as $fotoPlato) {
                        if ($plato->id == $fotoPlato->plato_id) {
                            $fotos_Plato [$plato->id] = $fotoPlato->foto;
                            break;
                        }
                    }
                }
            }
        } else {
            echo '<p>No hay restaurantes disponibles</p>';
        }
        //dd($fotos_Plato);

        return view('page-restaurante', compact('restaurante', 'platos', 'foto', 'fotos_Plato'));
    }
    }
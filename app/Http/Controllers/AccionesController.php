<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acciones;
use Illuminate\Support\Facades\Auth;

class AccionesController extends Controller
{
    /**
     * Display a listing of the resource. (Mostrar una lista del recurso.)
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return 'Vista index()';
        $acciones = Acciones::all();
        return view('/acciones/index')->with('acciones',$acciones);
    }

    /**
     * Show the form for creating a new resource. (Muestra el formulario para crear un nuevo recurso.)
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/acciones/create');
    }

    /**
     * Store a newly created resource in storage. (Almacene un recurso recién creado en el almacenamiento.)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $acciones = new Acciones();
        $acciones->actividad_id = $request->get('actividad_id');
        $acciones->obra_id = $request->get('obra_id');
        $acciones->empresa_id = $request->get('empresa_id');
        $acciones->tarea_id = $request->get('tarea_id');
        $acciones->novedad_id = $request->get('novedad_id');
        $acciones->avance = $request->get('avance');
        $acciones->fotourl = $request->get('fotourl');
        // $acciones->empresa_id = Auth::user()->empresa_id;
        $acciones->save();

        return redirect('/acciones');
    }

    /**
     * Display the specified resource. ( Muestra el recurso especificado.)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource. ( Muestra el formulario para editar el recurso especificado.)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $accion = Acciones::find($id);
         return view('/acciones/edit')->with('accion',$accion);
    }

    /**
     * Update the specified resource in storage. (Actualice el recurso especificado en el almacenamiento.)
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $accion = Acciones::find($id);
        $accion->actividad_id = $request->get('actividad_id');
        $accion->obra_id = $request->get('obra_id');
        $accion->empresa_id = $request->get('empresa_id');
        $accion->tarea_id = $request->get('tarea_id');
        $accion->novedad_id = $request->get('novedad_id');
        $accion->avance = $request->get('avance');
        $accion->fotourl = $request->get('fotourl');

        $accion->save();

        return redirect('acciones');
    }

    /**
     * Remove the specified resource from storage. (Elimina el recurso especificado del almacenamiento.)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accion = Acciones::find($id);
        $accion->delete();

        return redirect('acciones');
    }
}

<?php

namespace App\Http\Controllers;

use App\Nota;
use Illuminate\Http\Request;
use App;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $notas = App\Nota::Paginate(3);
        return view('Inicio',compact('notas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notaAgregar = new Nota;

        $request->validate([
            'nombre'=> 'required',
            'descripcion'=>'required',

        ]);
        $notaAgregar->Nombre = $request->nombre;
        $notaAgregar->Descripcion = $request->descripcion;
        $notaAgregar->save();
        return back()->with('agregar','La nota se agregado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show(Nota $nota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notaActualizar= App\nota::findOrFail($id);
        return view('editar',compact('notaActualizar'));
    }

    /**
     * Update the specified resource in storage.
     
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    {
        $notaupdate=App\Nota::findOrFail($id);
        $notaupdate->Nombre = $request->nombre;
        $notaupdate->Descripcion= $request->descripcion;
        $notaupdate->save();
        return back()->with('update','se actualizo correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {
    $notaeliminar = App\nota::findOrFail($id);
    $notaeliminar -> delete();
    return back()->with('eliminar','elemento eliminado');
    }
}

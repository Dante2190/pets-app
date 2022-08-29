<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use App\Models\Desparacitacion;
use Illuminate\Http\Request;

class DesparacitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function nueva_desparacitacion($id)
    {
        $datos = DB::table('productos')->where('productos.tipo', '=', 'Desparacitador')->get();
        return view('desparacitacion.create',['productos' => $datos],compact('id'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $desparacitacion = new Desparacitacion();
    $desparacitacion->fecha_desparacitacion = $request->get('fecha_desparacitacion');
    $desparacitacion->id_producto = $request->get('id_producto');
    $desparacitacion->proxima_desparacitacion = $request->get('proxima_desparacitacion');
    $desparacitacion->id_mascota = $request->get('id_mascota');
    //dd($request->get('Nuevo_usuario'));
    $desparacitacion->save();
    $id= $request->get('id_mascota');
    $datos['desparacitacions']=Desparacitacion::where('id_mascota','=',$desparacitacion->id_mascota)->get();
        return view('desparacitacion.index',$datos,compact('id'));
    //return redirect('cliente')->with('mensaje','Nuevo producto registrado Exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Desparacitacion  $desparacitacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos['desparacitacions']=Desparacitacion::where('id_mascota','=',$id)->get();
        return view('desparacitacion.index',$datos,compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Desparacitacion  $desparacitacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Desparacitacion $desparacitacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Desparacitacion  $desparacitacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Desparacitacion $desparacitacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Desparacitacion  $desparacitacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Desparacitacion $desparacitacion)
    {
        //
    }
}

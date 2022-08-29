<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nueva_consulta($id)
    {
        return view('consulta.create',compact('id'));
    }
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $consulta = new Consulta();
    $consulta->fecha_cita = $request->get('fecha_cita');
    $consulta->motivo = $request->get('motivo');
    $consulta->examenes = $request->get('examenes');
    $consulta->tratamiento = $request->get('tratamiento');
    $consulta->proxima_cita = $request->get('proxima_cita');
    $consulta->id_mascota = $request->get('id_mascota');
    //dd($request->get('Nuevo_usuario'));
    $id= $request->get('id_mascota');
    $consulta->save();
    $datos['consultas']=Consulta::where('id_mascota','=',$consulta->id_mascota)->get();
        return view('consulta.index',$datos,compact('id'));
    //return redirect('consulta')->with('mensaje','Nueva consulta registrado Exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vacuna  $vacuna
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos['consultas']=Consulta::where('id_mascota','=',$id)->get();
        return view('consulta.index',$datos,compact('id'));
    }
}

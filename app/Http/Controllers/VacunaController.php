<?php

namespace App\Http\Controllers;

use App\Models\Vacuna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class VacunaController extends Controller
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
    public function nueva_vacuna($id)
    {
        $datos = DB::table('productos')->where('productos.tipo', '=', 'Vacuna')->get();
        return view('vacuna.create',['productos' => $datos],compact('id'));
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
        $vacuna = new Vacuna();
    $vacuna->fecha_vacuna = $request->get('fecha_vacuna');
    $vacuna->peso = $request->get('peso');
    $vacuna->vacuna = $request->get('vacuna');
    $vacuna->proxima_vacuna = $request->get('proxima_vacuna');
    $vacuna->id_mascota = $request->get('id_mascota');
    //dd($request->get('Nuevo_usuario'));
    $vacuna->save();
    $id= $request->get('id_mascota');
    $datos['vacunas']=Vacuna::where('id_mascota','=',$vacuna->id_mascota)->get();
        return view('vacuna.index',$datos,compact('id'));
    //return redirect(Route('mascota.create', $vacuna->id_mascota))->with('mensaje','Nueva Mascota registrada Exitosamente!');       
    //return redirect('cliente')->with('mensaje','Nuevo producto registrado Exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vacuna  $vacuna
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos['vacunas']=Vacuna::where('id_mascota','=',$id)->get();
        return view('vacuna.index',$datos,compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vacuna  $vacuna
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacuna $vacuna)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vacuna  $vacuna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacuna $vacuna)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vacuna  $vacuna
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacuna $vacuna)
    {
        //
    }
}

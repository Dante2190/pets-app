<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['configuracions']=Configuracion::all();
        return view('configuracion.index',$datos);
    }
    public function create()
    {
        return view('configuracion.create');
    }
    public function store(Request $request)
    {
        $configuracion = new Configuracion();
    $configuracion->iva = $request->get('iva');
    $configuracion->venta = $request->get('venta');
    //dd($request->get('Nuevo_usuario'));
    $configuracion->save();
    return redirect('configuracion')->with('mensaje','Configuracion completada Exitosamente!');
    }
    public function edit($id)
    {
        $configuracion=Configuracion::findOrFail($id);
        return view('configuracion.edit',compact('configuracion'));
    }
    public function update(Request $request,$id)
    {
        $datosConfig=request()->except('_token','_method');
        Configuracion::where('id','=',$id)->update($datosConfig);
        $configuracion=Configuracion::findOrFail($id);
//return view('rol.edit',compact('rol'));
        return redirect('configuracion')->with('mensaje','Configuracion Actualizada Exitosamente!');
    }
}

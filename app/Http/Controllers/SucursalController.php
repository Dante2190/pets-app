<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Setting;
Use Exception;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['sucursals']=Sucursal::all();
        return view('sucursal.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sucursal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $sucursal = new Sucursal();
    $sucursal->nombre = $request->get('nombre');
    $sucursal->direccion = $request->get('direccion');
    $sucursal->telefono = $request->get('telefono');
    $sucursal->save();
    return redirect('sucursal')->with('mensaje','Nueva sucursal registrada Exitosamente!');
        } catch(\Illuminate\Database\QueryException $ex){ 
            return redirect('sucursal')->with('mensaje','La Nueva sucursal no pudo ser registrada, verifique el numero de telefono!');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function show(Sucursal $sucursal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sucursal=Sucursal::findOrFail($id);
        return view('sucursal.edit',compact('sucursal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        try{
        $datosSucursal=request()->except('_token','_method');
        Sucursal::where('id','=',$id)->update($datosSucursal);
        $sucursal=Sucursal::findOrFail($id);
        return redirect('sucursal')->with('mensaje','Informacion de sucursal Actualizada Exitosamente!');
    } catch(\Illuminate\Database\QueryException $ex){ 
        return redirect('sucursal')->with('mensaje','Sucursal no pudo ser actualizada correctamente, verifique la informacion a modificar!');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sucursal $sucursal)
    {
        //
    }
}

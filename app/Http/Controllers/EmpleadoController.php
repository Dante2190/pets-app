<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Models\Sucursal;
use Illuminate\Support\Facades\DB;
Use Exception;
class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datos['empleados']=Empleado::all();
        return view('empleado.index',$datos);
    }
    public function create()
    {
        $datos['sucursals']=Sucursal::all();
        return view('empleado.create',$datos);
    }
    public function store(Request $request)
    {
        try {
            $empleado = new Empleado();
    $empleado->nombre = $request->get('nombre');
    $empleado->apellido = $request->get('apellido');
    $empleado->celular = $request->get('celular');
    $empleado->dui = $request->get('dui');
    $empleado->cargo = $request->get('cargo');
    $empleado->id_sucursal = $request->get('id_sucursal');
    $empleado->save();
    return redirect('empleado')->with('mensaje','Nuevo empleado registrado Exitosamente!');
        } catch(\Illuminate\Database\QueryException $ex){ 
            return redirect('empleado')->with('mensaje','El Empleado no se pudo registrar, verifique su numero de DUI o Telefono!'); 
        }
    }
    public function edit($id)
    {
        $datos['sucursals']=Sucursal::all();
        $empleado=Empleado::findOrFail($id);
        return view('empleado.edit',$datos,compact('empleado'));
    }
    public function update(Request $request,$id)
    {
        try{
        $datosEmpleado=request()->except('_token','_method');
        Empleado::where('id','=',$id)->update($datosEmpleado);
        $empleado=Empleado::findOrFail($id);
        return redirect('empleado')->with('mensaje','Informacion de empleado Actualizado Exitosamente!');
    } catch(\Illuminate\Database\QueryException $ex){ 
        return redirect('empleado')->with('mensaje','Empleado no pudo ser actualizado correctamente, verifique la informacion a modificar!');
    }
    }
}

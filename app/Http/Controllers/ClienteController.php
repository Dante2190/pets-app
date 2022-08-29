<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use Exception;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$datos['clientes']=Cliente::all();
      //  return view('cliente.index',$datos);

        $clientes = trim($request->get('clientes'));
        $datos = DB::table('clientes')
                ->select('id','nombre','dui','direccion','contacto','whatsapp','email')
                ->where('nombre','LIKE', '%'.$clientes.'%')
                ->orWhere('direccion','LIKE', '%'.$clientes.'%')

                ->paginate(10);

        return view('cliente.index', compact('datos','clientes'));
    }
    public function create()
    {
        return view('cliente.create');
    }
    public function store(Request $request)
    {
        try{
        $cliente = new Cliente();
    $cliente->nombre = $request->get('nombre');
    $cliente->dui = $request->get('dui');
    $cliente->direccion = $request->get('direccion');
    $cliente->contacto = $request->get('contacto');
    $cliente->whatsapp = $request->get('whatsapp');
    $cliente->email = $request->get('email');
    //whatsapp
    //dd($request->get('Nuevo_usuario'));
    $cliente->save();
    return redirect('cliente')->with('mensaje','Nuevo cliente registrado Exitosamente!');
} catch(\Illuminate\Database\QueryException $ex){
    return redirect('cliente')->with('mensaje','El cliente no pudo ser registrado, verifique su email, dui y numero de contacto!');
}
    }
    public function edit($id)
    {
        $cliente=Cliente::findOrFail($id);
        return view('cliente.edit',compact('cliente'));
    }
    public function update(Request $request,$id)
    {
        try{
        $datosCliente=request()->except('_token','_method');
        Cliente::where('id','=',$id)->update($datosCliente);
        $cliente=Cliente::findOrFail($id);
//return view('rol.edit',compact('rol'));
        return redirect('cliente')->with('mensaje','Informacion de cliente Actualizado Exitosamente!');
    } catch(\Illuminate\Database\QueryException $ex){
        return redirect('cliente')->with('mensaje','Cliente no pudo ser actualizado, verifique la información a modificar!');
    }
    }
}

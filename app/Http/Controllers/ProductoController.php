<?php

namespace App\Http\Controllers;
use App\Models\Sucursal;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productos = trim($request->get('productos'));
        $datos = DB::table('productos')
                ->select('id','nombre','descripcion','tipo','stock','precio','vencimiento','id_sucursal')
                ->where('nombre','LIKE', '%'.$productos.'%')
                ->orWhere('descripcion','LIKE', '%'.$productos.'%')
                ->orWhere('tipo','LIKE', '%'.$productos.'%')
                ->paginate(10);

        return view('producto.index', compact('datos','productos'));

      //  $datos['productos']=Producto::all();
       // return view('producto.index',$datos);

    }
    public function create()
    {
        $datos['sucursals']=Sucursal::all();
        return view('producto.create',$datos);
    }
    public function store(Request $request)
    {
        $producto = new Producto();
    $producto->nombre = $request->get('nombre');
    $producto->descripcion = $request->get('descripcion');
    $producto->stock = $request->get('stock');
    $producto->precio = $request->get('precio');
    $producto->tipo = $request->get('tipo');
    $producto->vencimiento = $request->get('vencimiento');
    $producto->id_sucursal = $request->get('id_sucursal');
    //dd($request->get('Nuevo_usuario'));
    $producto->save();
    return redirect('producto')->with('mensaje','Nuevo producto registrado Exitosamente!');
    }
    public function edit($id)
    {
        $producto=Producto::findOrFail($id);
        $datos['sucursals']=Sucursal::all();
        return view('producto.edit',$datos,compact('producto'));
    }
    public function update(Request $request,$id)
    {
        $datosProducto=request()->except('_token','_method');
        Producto::where('id','=',$id)->update($datosProducto);
        $producto=Producto::findOrFail($id);
        return redirect('producto')->with('mensaje','Informacion de Producto Actualizado Exitosamente!');
    }
}

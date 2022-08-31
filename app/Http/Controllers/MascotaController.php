<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nueva($id)
    {
        return view('mascota.create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            /*if($request->hasFile('foto')){
                $campos=[
                    'foto'=>'required|max:10000|mimes:jpeg,png,jpg',
                    ];
                    $mensaje=[
                        'foto.required'=>'La foto es requerida'
                    ];
            }
            $this->validate($request,$campos,$mensaje);*/
        $datosMascota=request()->except('_token');
        if($request->hasFile('foto')){
            $datosMascota['foto']=$request->file('foto')->store('uploads','public');
        }
    Mascota::insert($datosMascota);
    //return redirect(Route('mascota.create', $request->id))->with('mensaje','Nueva Mascota registrada Exitosamente!');

    return redirect('cliente')->with('mensaje','Nueva Mascota registrada Exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*
        $animales = trim($request->get('animales'));
        $datos = DB::table('mascotas')
                ->select('id','nombre','especie','sexo','raza','color','nacimiento','razgos','foto','id_cliente')
                ->where('mascotas.id_cliente',$id)
                ->where('nombre','LIKE', '%'.$animales.'%')
                ->orWhere('especie','LIKE', '%'.$animales.'%')
                ->paginate(10);*/
                $datos['mascotas']=Mascota::where('id_cliente','=',$id)->get();
                return view('mascota.index',$datos,compact('id'));
        //return view('mascota.index',compact('id','datos','animales'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function edit(Mascota $mascota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mascota $mascota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mascota $mascota)
    {
        //
    }
}

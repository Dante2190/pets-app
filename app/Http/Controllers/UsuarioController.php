<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Models\User;
class UsuarioController extends Controller
{
    public function index()
    {
        return view('usuario.index');
    }
    public function password()
    {
        return view('usuario.password');
    }
    public function create()
    {
        $datos = DB::table('empleados')->get();
        return view('usuario.create',['empleados' => $datos]);
    }
    public function store(Request $request)
    {
         $campos=[
            'Name'=>'required|string|max:25',
            ];
            $mensaje=[
            'required'=>'El nombre de usuario es requerido',
            ];

            $this->validate($request,$campos,$mensaje);

            $datosUsuario=request()->except('_token');
            User::insert($datosUsuario);
            return redirect('home')->with('mensaje','Nuevo Usuario Agregado Exitosamente!');

    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $datos = DB::table('empleados')->get();
        return view('usuario.edit',compact('user'),['empleados' => $datos]);
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->save();
        return redirect()->action([HomeController::class, 'index']);
    }
    public function update($id)
    {
        $datosUser=request()->except('_token','_method');
        User::where('id','=',$id)->update($datosUser);
        $User=User::findOrFail($id);
return redirect('home')->with('mensaje','Usuario Modificado Exitosamente!');
    }

    public function update_profile(Request $request,$id)
    {
        if (Hash::check($request->get('password'), Auth::user()->password)) {
            $user = Auth::user();
            $user->email = $request->input('email');
            $user->save();
        return redirect()->back()->with("success","Email modificado exitosamente!");
        }else{
            return redirect()->back()->with("error","Contraseña incorrecta!");
        }
    }

    public function changePasswordPost(Request $request) {
        if(strcmp($request->get('new-password'), $request->get('repeat-password')) == 0){
            if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
                return redirect()->back()->with("error","Su contraseña actual no coincide con la contraseña.");
            }

            if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
                return redirect()->back()->with("error","La nueva contraseña no puede ser la misma que su contraseña actual.");
            }
            if (Hash::check($request->get('current-password'), Auth::user()->password)) {
                $user = Auth::user();
                $user->password = bcrypt($request->get('new-password'));
                $user->save();
                return redirect()->back()->with("success","Contraseña cambiada correctamente!");
            }
        }else{
            return redirect()->back()->with("error","Verifique su contraseña y repitala de nuevo");
        }
    }
}

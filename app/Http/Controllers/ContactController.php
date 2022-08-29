<?php

namespace App\Http\Controllers;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;
class ContactController extends Controller
{
    public function sendEmail(Request $req){
        //validacion form
        $id_cliente=$req->get('id_cliente');
        $cliente=Cliente::findOrFail($id_cliente);
        $data=[
            //'name'=>$req->name,
            'email'=>$req->email,
            'message'=>$req->message
        ];

        $email = $cliente->email;

        Mail::to($email)->send(new ContactMail($data));
        return redirect('cliente')->with('mensaje','Recordatorio Enviado con exito!');
//dd($email);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Mascota;
use Illuminate\Support\Facades\DB;
use PDF;

class PostController extends Controller
{
    public function downloadPDF()
    {
        $clientes = DB::table('clientes')->get();

        $data = [
            'title' => 'Todos los clientes ',
            'date' => date('d/m/y'),
            'clientes' => $clientes
        ];

        $pdf = PDF::loadView('pdf.pdfCliente', $data);
        return $pdf->download('Cliente.pdf');
    }
    public function downloadProdPDF(){
        $productos = DB::table('productos')->orderBy('id_sucursal', 'DESC')->get();

        $data = [
            'title' => 'Todos los productos ',
            'date' => date('d/m/y'),
            'productos' => $productos
        ];

        $pdf = PDF::loadView('pdf.pdfProducto', $data);
        return $pdf->download('productos.pdf');
    }
    public function downloadCPDF($idCliente)
    {
        $clientes = DB::table('clientes')
        ->where('id',$idCliente)
        ->get();

        $data = [
            'title' => 'Cliente ',
            'date' => date('d/m/y'),
            'clientes' => $clientes
        ];

        $pdf = PDF::loadView('pdf.pdfCliente', $data);
        return $pdf->download('Cliente.pdf');
    }

    public function consultaPDF($idMascota)
    {
        $mascotas = DB::table('mascotas')
        ->where('id',$idMascota)
        ->get();

        $data = [
            'title' => 'Mascota ',
            'date' => date('d/m/y'),
            'mascotas' => $mascotas
        ];

        $pdf = PDF::loadView('pdf.pdfConsulta', $data);
        return $pdf->download('Consulta.pdf');
    }
}

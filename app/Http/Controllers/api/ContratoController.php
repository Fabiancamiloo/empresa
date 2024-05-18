<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Contrato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContratoController extends Controller
{
    public function index()
    {
        $contratos = DB::table('contratos')->get();
        return response()->json(['contratos' => $contratos]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'reserva_id' => 'required|exists:reservas,id',
            'terminos' => 'required|string',
            'fecha_contrato' => 'required|date',
            'estado' => 'required|string|max:255',
        ]);

        $contrato = new Contrato();
        $contrato->reserva_id = $request->reserva_id;
        $contrato->terminos = $request->terminos;
        $contrato->fecha_contrato = $request->fecha_contrato;
        $contrato->estado = $request->estado;
        $contrato->save();

        return response()->json(['contrato' => $contrato]);
    }

    public function show($id)
    {
        $contrato = Contrato::find($id);
        return response()->json(['contrato' => $contrato]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'reserva_id' => 'required|exists:reservas,id',
            'terminos' => 'required|string',
            'fecha_contrato' => 'required|date',
            'estado' => 'required|string|max:255',
        ]);

        $contrato = Contrato::find($id);
        $contrato->reserva_id = $request->reserva_id;
        $contrato->terminos = $request->terminos;
        $contrato->fecha_contrato = $request->fecha_contrato;
        $contrato->estado = $request->estado;
        $contrato->save();

        return response()->json(['contrato' => $contrato]);
    }

    public function destroy($id)
    {
        $contrato = Contrato::find($id);
        $contrato->delete();

        $contratos = DB::table('contratos')->get();
        return response()->json(['contratos' => $contratos, 'success' => true]);
    }
}

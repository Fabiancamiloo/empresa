<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = DB::table('pagos')->get();
        return response()->json(['pagos' => $pagos]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'contrato_id' => 'required|exists:contratos,id',
            'monto' => 'required|numeric',
            'fecha_pago' => 'required|date',
            'metodo_pago' => 'required|string|max:255',
        ]);

        $pago = new Pago();
        $pago->contrato_id = $request->contrato_id;
        $pago->monto = $request->monto;
        $pago->fecha_pago = $request->fecha_pago;
        $pago->metodo_pago = $request->metodo_pago;
        $pago->save();

        return response()->json(['pago' => $pago]);
    }

    public function show($id)
    {
        $pago = Pago::find($id);
        return response()->json(['pago' => $pago]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'contrato_id' => 'required|exists:contratos,id',
            'monto' => 'required|numeric',
            'fecha_pago' => 'required|date',
            'metodo_pago' => 'required|string|max:255',
        ]);

        $pago = Pago::find($id);
        $pago->contrato_id = $request->contrato_id;
        $pago->monto = $request->monto;
        $pago->fecha_pago = $request->fecha_pago;
        $pago->metodo_pago = $request->metodo_pago;
        $pago->save();

        return response()->json(['pago' => $pago]);
    }

    public function destroy($id)
    {
        $pago = Pago::find($id);
        $pago->delete();

        $pagos = DB::table('pagos')->get();
        return response()->json(['pagos' => $pagos, 'success' => true]);
    }
}

<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = DB::table('reservas')->get();
        return response()->json(['reservas' => $reservas]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'equipo_id' => 'required|exists:equipos,id',
            'cliente_id' => 'required|exists:clientes,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'estado' => 'required|string|max:255',
        ]);

        $reserva = new Reserva();
        $reserva->equipo_id = $request->equipo_id;
        $reserva->cliente_id = $request->cliente_id;
        $reserva->fecha_inicio = $request->fecha_inicio;
        $reserva->fecha_fin = $request->fecha_fin;
        $reserva->estado = $request->estado;
        $reserva->save();

        return response()->json(['reserva' => $reserva]);
    }

    public function show($id)
    {
        $reserva = Reserva::find($id);
        return response()->json(['reserva' => $reserva]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'equipo_id' => 'required|exists:equipos,id',
            'cliente_id' => 'required|exists:clientes,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'estado' => 'required|string|max:255',
        ]);

        $reserva = Reserva::find($id);
        $reserva->equipo_id = $request->equipo_id;
        $reserva->cliente_id = $request->cliente_id;
        $reserva->fecha_inicio = $request->fecha_inicio;
        $reserva->fecha_fin = $request->fecha_fin;
        $reserva->estado = $request->estado;
        $reserva->save();

        return response()->json(['reserva' => $reserva]);
    }

    public function destroy($id)
    {
        $reserva = Reserva::find($id);
        $reserva->delete();

        $reservas = DB::table('reservas')->get();
        return response()->json(['reservas' => $reservas, 'success' => true]);
    }
}

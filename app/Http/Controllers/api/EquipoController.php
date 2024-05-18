<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipoController extends Controller
{
    public function index()
    {
        $equipos = DB::table('equipos')->get();
        return response()->json(['equipos' => $equipos]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'tipo' => 'required|string|max:255',
            'precio_por_día' => 'required|numeric',
            'cantidad_disponible' => 'required|integer',
        ]);

        $equipo = new Equipo();
        $equipo->nombre = $request->nombre;
        $equipo->descripcion = $request->descripcion;
        $equipo->tipo = $request->tipo;
        $equipo->precio_por_día = $request->precio_por_día;
        $equipo->cantidad_disponible = $request->cantidad_disponible;
        $equipo->save();

        return response()->json(['equipo' => $equipo]);
    }

    public function show($id)
    {
        $equipo = Equipo::find($id);
        return response()->json(['equipo' => $equipo]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'tipo' => 'required|string|max:255',
            'precio_por_día' => 'required|numeric',
            'cantidad_disponible' => 'required|integer',
        ]);

        $equipo = Equipo::find($id);
        $equipo->nombre = $request->nombre;
        $equipo->descripcion = $request->descripcion;
        $equipo->tipo = $request->tipo;
        $equipo->precio_por_día = $request->precio_por_día;
        $equipo->cantidad_disponible = $request->cantidad_disponible;
        $equipo->save();

        return response()->json(['equipo' => $equipo]);
    }

    public function destroy($id)
    {
        $equipo = Equipo::find($id);
        $equipo->delete();

        $equipos = DB::table('equipos')->get();
        return response()->json(['equipos' => $equipos, 'success' => true]);
    }
}

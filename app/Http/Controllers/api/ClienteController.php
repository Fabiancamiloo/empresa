<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = DB::table('clientes')->get();
        return response()->json(['clientes' => $clientes]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'empresa' => 'nullable|string|max:255',
            'telefono' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $cliente = new Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->empresa = $request->empresa;
        $cliente->telefono = $request->telefono;
        $cliente->email = $request->email;
        $cliente->save();

        return response()->json(['cliente' => $cliente]);
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);
        return response()->json(['cliente' => $cliente]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'empresa' => 'nullable|string|max:255',
            'telefono' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $cliente = Cliente::find($id);
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->empresa = $request->empresa;
        $cliente->telefono = $request->telefono;
        $cliente->email = $request->email;
        $cliente->save();

        return response()->json(['cliente' => $cliente]);
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();

        $clientes = DB::table('clientes')->get();
        return response()->json(['clientes' => $clientes, 'success' => true]);
    }
}

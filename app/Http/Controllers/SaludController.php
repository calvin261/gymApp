<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Salud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaludController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $saluds = Salud::all();
        return view('admin.salud.index', compact('saluds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.salud.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $valid_number = 'required|numeric';
        $request->validate([
            'genero' => 'required',

            'altura' => $valid_number,
            'peso' => $valid_number,
            'imc' => $valid_number,
        ]);
        $user = Auth::user();
        $client = Client::where('correo', $user->email)->firstOrFail();
        $salud = new Salud($request->all());
        $salud->client_id = $client->id;
        $salud->save();


        registrarAccionAuditoria(Auth::user(), 'Creación de Registro de Salud', sprintf(
            'El usuario %s ha creado un registro de salud para el cliente %s',
            Auth::user()->name,
            $client->nombre
        ));
        return redirect()->route('saluds.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $salud = Salud::find($id);
        return view('admin.salud.edit', compact('salud'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Auth::user();
        $client = Client::where('correo', $user->email)->firstOrFail();
        $salud = Salud::find($id);
        $salud->client_id = $client->id;
        $salud->update($request->all());
        registrarAccionAuditoria(Auth::user(), 'Actualización de Registro de Salud', sprintf(
            'El usuario %s ha actualizado un registro de salud para el cliente %s',
            Auth::user()->name,
            $client->nombre
        ));

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plan = Salud::find($id);
        $plan->delete();

        registrarAccionAuditoria(Auth::user(), 'Eliminación de Registro de Salud', sprintf(
            'El usuario %s ha eliminado un registro de salud',
            Auth::user()->name
        ));
        return redirect()->route('saluds.index');
    }
}

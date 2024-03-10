<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Curso;
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
        if (Auth::user()->entrenador) {
            $cursos = Curso::with(['clientes', 'clientes.salud'])
                ->where('entrenador_id', Auth::user()->entrenador->id)
                ->get();
            $saluds = collect(); // Inicializa una colección vacía para los estados de salud

            foreach ($cursos as $curso) {
                // Itera sobre los clientes del curso para obtener sus estados de salud
                foreach ($curso->clientes as $cliente) {
                    // Verifica si el cliente tiene un estado de salud
                    if ($cliente->salud) {
                        // Agrega el estado de salud del cliente a la colección
                        $saluds->push($cliente->salud);
                    }
                }
            }
        } else {
            // Si el usuario no es un entrenador, obtén todos los estados de salud
            $saluds = Salud::all();
        }

        return view('admin.salud.index', compact('saluds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->entrenador) {
            $cursos = Curso::with(['clientes', 'clientes.salud'])
                ->where('entrenador_id', Auth::user()->entrenador->id)
                ->get();
            $clientes = collect(); // Inicializa una colección vacía para los estados de salud

            foreach ($cursos as $curso) {
                // Itera sobre los clientes del curso para obtener sus estados de salud
                foreach ($curso->clientes as $cliente) {
                    // Verifica si el cliente tiene un estado de salud
                    $clientes->push($cliente);
                }
            }
        } else {
            $clientes = Client::all();
        }
        return view('admin.salud.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $valid_number = 'required|numeric';
        $request->validate([
            'genero' => 'required',
            'client_id' => 'required',
            'altura' => $valid_number,
            'peso' => $valid_number,
            'imc' => $valid_number,
        ]);

        $client = Client::findOrFail($request->client_id);

        Salud::create($request->all());

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
        if (Auth::user()->entrenador) {
            $cursos = Curso::with(['clientes', 'clientes.salud'])
                ->where('entrenador_id', Auth::user()->entrenador->id)
                ->get();
            $clientes = collect(); // Inicializa una colección vacía para los estados de salud

            foreach ($cursos as $curso) {
                // Itera sobre los clientes del curso para obtener sus estados de salud
                foreach ($curso->clientes as $cliente) {
                    // Verifica si el cliente tiene un estado de salud
                    $clientes->push($cliente);
                }
            }
        } else {
            $clientes = Client::all();
        }
        $salud = Salud::find($id);
        return view('admin.salud.edit', compact('salud', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $client = Client::findOrFail($request->client_id);
        $salud = Salud::find($id);
        $salud->update($request->all());
        registrarAccionAuditoria(Auth::user(), 'Actualización de Registro de Salud', sprintf(
            'El usuario %s ha actualizado un registro de salud para el cliente %s',
            Auth::user()->name,
            $client->nombre
        ));

        return redirect()->route('saluds.index');
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

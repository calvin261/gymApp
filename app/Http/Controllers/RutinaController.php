<?php

namespace App\Http\Controllers;

use App\Models\Rutina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RutinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $rutinas = Rutina::all();
        return view('admin.rutinas.index', compact('rutinas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.rutinas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        Rutina::create($request->all());
        registrarAccionAuditoria(Auth::user(), 'Creación de Rutina', sprintf(
            'El usuario %s ha creado la rutina %s',
            Auth::user()->name,
            $request->nombre
        ));
        return redirect()->route('rutinas.index');
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
        $rutina = Rutina::find($id);

        return view('admin.rutinas.edit', compact('rutina'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $plan = Rutina::find($id);
        $plan->update($request->all());
        registrarAccionAuditoria(Auth::user(), 'Creación de Rutina', sprintf(
            'El usuario %s ha creado la rutina %s',
            Auth::user()->name,
            $request->nombre
        ));
        return redirect()->route('rutinas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rutina = Rutina::find($id);
        $nombreRutina = $rutina->nombre;
        $rutina->delete();

        registrarAccionAuditoria(Auth::user(), 'Eliminación de Rutina', sprintf(
            'El usuario %s ha eliminado la rutina %s',
            Auth::user()->name,
            $nombreRutina
        ));

        return redirect()->route('rutinas.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Entrenadore;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EntrenadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entrenadores = Entrenadore::all();
        return view('admin.entrenadores.index', compact('entrenadores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.entrenadores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required|numeric',
            'correo' => 'required|email|unique:entrenadores,correo,' . $request->id . ',id',
            'especialidad' => 'required',
            'password' => [
                'required',
                'confirmed',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            ],
        ]);

        $userData = [
            'name' => $request->nombre,
            'email' => $request->correo,
            'password' => Hash::make($request->password)
        ];

        $user = User::create($userData);
        $request->merge(['user_id' => $user->id]);
        Entrenadore::create($request->all());

        registrarAccionAuditoria(Auth::user(), 'Creación de Entrenador', sprintf(
            'El usuario %s ha creado al entrenador %s',
            Auth::user()->name,
            $request->nombre
        ));

        return redirect()->route('entrenadores.index');
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
        $entrenador = Entrenadore::find($id);
        return view('admin.entrenadores.edit', compact('entrenador'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required|numeric',
            'especialidad' => 'required',
        ]);
        $entrenador = Entrenadore::find($id);
        $entrenador->update($request->all());


        registrarAccionAuditoria(Auth::user(), 'Actualización de Entrenador', sprintf(
            'El usuario %s ha actualizado los datos del entrenador %s',
            Auth::user()->name,
            $request->nombre
        ));
        return redirect()->route('entrenadores.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $entrenador = Entrenadore::find($id);
        registrarAccionAuditoria(Auth::user(), 'Actualización de Plan', sprintf(
            'El usuario %s ha eliminado el entrenador %s',
            Auth::user()->name,
            $entrenador->nombre
        ));

        $user = User::find($entrenador->user_id);
        $user->delete();
        $entrenador->delete();

        return redirect()->route('entrenadores.index');
    }
}

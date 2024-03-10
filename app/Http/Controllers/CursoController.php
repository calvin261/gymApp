<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use App\Models\Curso;
use App\Models\Entrenadore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->entrenador) {
            $cursos = Curso::where('entrenador_id', Auth::user()->entrenador->id)->get();
        } else {
            $cursos = Curso::all();
        }
        return view('admin.cursos.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->entrenador) {
            $entrenadores = Entrenadore::where('id', Auth::user()->entrenador->id)->get();
        } else {
            $entrenadores = Entrenadore::all();
        }
        return view('admin.cursos.create', compact('entrenadores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nombre = $request->nombre;
        $descripcion = $request->descripcion;
        $horasInicio = $request->horas_inicio;
        $horasFin = $request->horas_fin;
        $dias = $request->dias;
        $entrenadorId = $request->entrenador_id;

        // Crear el horario en formato JSON
        $horario = [];
        foreach ($dias as $key => $dia) {
            if (!empty($horasInicio[$key]) && !empty($horasFin[$key])) {
                $horario[$dia] = [
                    'hora_inicio' => $horasInicio[$key],
                    'hora_fin' => $horasFin[$key]
                ];
            }
        }

        // Convertir el horario a formato JSON
        $horarioJson = json_encode($horario);

        // Validar los datos
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'horas_inicio' => 'required',
            'horas_fin' => 'required',
            'dias' => 'required',
            'entrenador_id' => 'required|exists:entrenadores,id'
        ]);

        // Crear el curso con el horario en formato JSON
        Curso::create([
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'horario' => $horarioJson,
            'entrenador_id' => $entrenadorId
        ]);

        $this->registrarAccionAuditoria('Creación de Curso', 'Se ha creado un nuevo curso.');

        return redirect()->route('cursos.index');
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
        $curso = Curso::findOrFail($id);
        if (Auth::user()->entrenador) {
            $entrenadores = Entrenadore::where('id', Auth::user()->entrenador->id)->get();
        } else {
            $entrenadores = Entrenadore::all();
        }
        return view('admin.cursos.edit', compact('curso', 'entrenadores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $curso = Curso::findOrFail($id);

        // Procesar los datos recibidos del formulario
        $nombre = $request->nombre;
        $descripcion = $request->descripcion;
        $horasInicio = $request->horas_inicio;
        $horasFin = $request->horas_fin;
        $dias = $request->dias;
        $entrenadorId = $request->entrenador_id;

        // Crear el horario en formato JSON
        $horario = [];

        foreach ($dias as $key => $dia) {
            // Verifica si la hora de inicio y la hora de fin no están vacías o son null
            if (
                isset($horasInicio[$key]) && isset($horasFin[$key]) &&
                ($horasInicio[$key] !== null) && ($horasFin[$key] !== null)
            ) {
                $horario[$dia] = [
                    'hora_inicio' => $horasInicio[$key],
                    'hora_fin' => $horasFin[$key]
                ];
            }
        }

        // Convertir el horario a formato JSON
        $horarioJson = json_encode($horario);

        // Validar los datos
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'horas_inicio' => 'required',
            'horas_fin' => 'required',
            'dias' => 'required',
            'entrenador_id' => 'required|exists:entrenadores,id'
        ]);

        // Actualizar el curso con los nuevos datos
        $curso->update([
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'horario' => $horarioJson,
            'entrenador_id' => $entrenadorId
        ]);

        $this->registrarAccionAuditoria('Actualización de Curso', 'Se ha actualizado un curso existente.');

        return redirect()->route('cursos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();
        $this->registrarAccionAuditoria('Eliminación de Curso', 'Se ha eliminado un curso.');

        return redirect()->route('cursos.index');
    }
    private function registrarAccionAuditoria(string $nombreAccion, string $descripcion)
    {
        Auditoria::create([
            'user_id' => Auth::id(),
            'nombre' => $nombreAccion,
            'descripcion' => $descripcion,
        ]);
    }
}

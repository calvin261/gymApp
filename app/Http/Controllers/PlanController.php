<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = Plan::all();
        return view('admin.plans.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.plans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'validez' => 'required|numeric',
            'precio' => 'required|numeric',
            'pagado' => 'required'
        ]);

        Plan::create($request->all());
        registrarAccionAuditoria(Auth::user(), 'Creación de Plan', sprintf(
            'El usuario %s ha creado el plan %s',
            Auth::user()->name,
            $request->nombre
        ));
        return redirect()->route('plans.index');
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
        $plan = Plan::find($id);
        return view('admin.plans.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'validez' => 'numeric',
            'precio' => 'numeric',
        ]);
        $plan = Plan::find($id);
        $plan->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'validez' => $request->validez,
            'precio' => $request->precio,
            'pagado' => $request->pagado
        ]);
        registrarAccionAuditoria(Auth::user(), 'Actualización de Plan', sprintf(
            'El usuario %s ha actualizado el plan %s',
            Auth::user()->name,
            $request->nombre
        ));
        return redirect()->route('plans.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plan = Plan::find($id);
        $nombrePlan = $plan->nombre;
        $plan->delete();

        registrarAccionAuditoria(Auth::user(), 'Eliminación de Plan', sprintf(
            'El usuario %s ha eliminado el plan %s',
            Auth::user()->name,
            $nombrePlan
        ));

        return redirect()->route('plans.index');
    }
}

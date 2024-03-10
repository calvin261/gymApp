<?php

namespace App\Livewire;

use App\Models\Auditoria;
use App\Models\Client;
use App\Models\Curso;
use App\Models\Entrenadore;
use App\Models\Plan;
use App\Models\Rutina;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use function Spatie\LaravelPdf\Support\pdf;

class Dashboard extends Component
{
    public $modalPagar = false; // Inicializar la variable modalPagar como false
    public $dayOfWeek;

    public function mount()
    {
        // Inicializamos la variable $dayOfWeek en el método mount()
        $this->dayOfWeek = strtolower(date('l'));
    }
    public function render()
    {
        $user = Auth::user();

        if ($user->client) {
            $cursos = Curso::all();
            $client = Client::where('correo', $user->email)->firstOrFail();
            $plans = Plan::all();
            $rutinas = Rutina::all();
            $salud = $client->salud;
            return view('dashboard', [
                'salud' => $salud,
                'client' => $client,
                'plans' => $plans,
                'rutinas' => $rutinas,
                'cursos' => $cursos
            ]);
        } elseif ($user->entrenador) {
            $entrenador = Entrenadore::where('user_id', $user->id)->first();
            $cursos = Curso::withCount('clientes')->where('entrenador_id', $entrenador->id)->get();

            return view('admin.entrenadores.dashboard', ['entrenador' => $entrenador, 'cursos' => $cursos]);
        } else {
            $numberClients = Client::all()->count();
            $numberEntrenadores = Entrenadore::all()->count();
            $numberCursos = Curso::all()->count();
            $numeroPlanes = Plan::all()->count();
            $planesPagados = Client::where('pagado', true)->count();
            $precioTotal = Client::where('pagado', true)
                ->join('plans', 'clients.plan_id', '=', 'plans.id')
                ->sum('precio');
            return view('admin.dashboard', compact(
                'numberClients',
                'numeroPlanes',
                'precioTotal',
                'planesPagados',
                'numberEntrenadores',
                'numberCursos'
            ));
        }
    }
    public function udpateClientRutina(Client $client, $rutina_id = null)
    {

        // Asignar el rutina_id al cliente
        $client->update(['rutina_id' => $rutina_id]);

        // Obtener la rutina asociada
        $rutina = Rutina::find($rutina_id);

        registrarAccionAuditoria($client->user, 'Actualización de Rutina', sprintf(
            'El usuario %s ha actualizado la rutina a %s',
            $client->user->name,
            $rutina ? $rutina->Nombre : 'Sin rutina'
        ));
    }
    public function udpateClientPlan(Client $client, $plan_id = null)
    {
        $client->update(['plan_id' => $plan_id]);
        $plan = Rutina::find($plan_id);

        registrarAccionAuditoria($client->user, 'Actualización de Plan', sprintf(
            'El usuario %s ha actualizado el plan a %s',
            $client->user->name,
            $plan ? $plan->Nombre : 'Sin plan'
        ));
    }
    public function udpateClientCursos(Client $client, $cursoIds = null)
    {
        // Verificar si $cursoIds es null y eliminar todos los cursos del cliente
        if ($cursoIds === null) {
            $client->cursos()->detach();
        } else {
            // Obtener los IDs de los cursos seleccionados y convertirlos a un array
            $cursoIdsArray = explode(',', $cursoIds);

            // Actualizar los cursos del cliente eliminando los cursos actuales y guardando los nuevos
            $client->cursos()->detach();
            $client->cursos()->attach($cursoIdsArray);
        }
    }
    public function udpateClientPago(Client $client, $pago)
    {

        $plan = Plan::find($client->plan->id);
        $client->pagado = true;
        $client->save();
        $this->modalPagar = false;

        registrarAccionAuditoria($client->user, 'Pago Plan', sprintf(
            'El usuario %s ha pagado el plan a %s',
            $client->user->name,
            $plan ? $plan->Nombre : 'Sin plan'
        ));
    }
}

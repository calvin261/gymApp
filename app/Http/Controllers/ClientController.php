<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Plan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Browsershot\Browsershot;

use function Spatie\LaravelPdf\Support\pdf;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $plans = Plan::all();
        return view('admin.clients.create', compact("plans"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required|numeric',
            'correo' => 'required|email|unique:clients,correo,' . $request->id . ',id',
            'provincia' => 'required',
            'fechaNacimiento' => 'required|date',
            'ciudad' => 'required',
            'direccion' => 'required',
            'plan_id' => 'required',
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
        Client::create($request->all());
        registrarAccionAuditoria(Auth::user(), 'Creación de Cliente', sprintf(
            'El usuario %s ha creado al cliente %s',
            Auth::user()->name,
            $request->nombre
        ));

        return redirect()->route('clients.index');
    }
    public function comprobante(Client $client)
    {

        $pdf = Pdf::loadView('pdf.inc', [
            'client' => $client
        ]);
        return $pdf->stream();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::find($id);
        registrarAccionAuditoria(Auth::user(), 'Eliminación de Cliente', sprintf(
            'El usuario %s ha eliminado al cliente %s',
            Auth::user()->name,
            $client->nombre
        ));

        $user = User::find($client->user_id);

        $user->delete();
        $client->delete();
        return redirect()->route('clients.index');
    }

    public function upload(Request $request)
    {

        $fileName = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('uploads', $fileName, 'public');

        return response()->json(['location' => 'storage/' . $path]);
    }
}

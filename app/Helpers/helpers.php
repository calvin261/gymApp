
<?php

use App\Models\Auditoria;

function registrarAccionAuditoria($usuario, $accion, $descripcion)
{
    // Lógica para registrar la acción en la tabla de auditoría
    // Por ejemplo:
    Auditoria::create([
        'user_id' => $usuario->id,
        'nombre' => $accion,
        'descripcion' => substr($descripcion, 0, 140),
    ]);
}

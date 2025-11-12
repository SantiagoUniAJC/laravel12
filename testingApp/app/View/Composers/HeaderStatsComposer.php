<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Paciente;
use App\Models\Especialista;
use App\Models\User;
use App\Models\Cita;
use App\Models\Cliente;

class HeaderStatsComposer
{
    /**
     * Create a new class instance.
     */
    public function compose(View $view): void
    {
        $view->with([
            'totalPacientes' => Paciente::where('estado', 'Activo')->count(),
            'totalEspecialistas' => Especialista::where('estado', 'Activo')->count(),
            'totalUsuarios' => User::where('estado', 'Activo')->count(),
            'totalClientes' => Cliente::where('estado', 'Activo')->count(),
            // citas para hoy
            'totalCitasHoy' => Cita::whereDate('fecha_cita', now()->toDateString())->count(),
        ]);
    }
}

<?php

use Livewire\Volt\Component;
use App\Models\HistoriaClinica;

new class extends Component {
    public HistoriaClinica $historia;

    public function mount(HistoriaClinica $historia): void
    {
        $this->historia = $historia;
    }
}; ?>

<div>
    Estas en la vista de mostrar Motivo de Consulta de: {{ $historia->paciente->nombre_completo }}
</div>

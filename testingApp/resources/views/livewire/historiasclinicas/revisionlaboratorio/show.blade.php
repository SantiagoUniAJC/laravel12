<?php

use Livewire\Volt\Component;
use App\Models\HistoriaClinica;

new class extends Component {
    
    public $historia;
    public $paciente;

    
    public function mount($historia)
    {
        $this->historia = HistoriaClinica::with('paciente')->find($historia);

        $this->infoLaboralActual = $this->historia->paciente->infoLaboralActual;
        
        $this->paciente = $this->historia->paciente;
    }
    
}; ?>

<div>
    Estas en informacion laboral actual del paciente:
    <span class="font-semibold text-red-600">{{ $paciente->nombreCompleto }}</span>
</div>

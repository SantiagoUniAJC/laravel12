<?php

use Livewire\Volt\Component;
use App\Models\HistoriaClinica;
use App\Models\HC\Diagnostico;

new class extends Component {
    public $historia;
    public $item;

    public function mount($historia)
    {
        $this->historia = HistoriaClinica::with('paciente')->find($historia);

        $this->item = Diagnostico::where(function($q){
            $q->where('historia_clinica_id', $this->historia->id)
              ->orWhere('paciente_id', $this->historia->paciente_id);
        })->first();
    }

}; ?>

@include('livewire.historiasclinicas._show_model', ['item' => $item, 'title' => 'Diagnóstico'])

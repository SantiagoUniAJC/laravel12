<?php

use App\Models\HistoriaClinica;
use Livewire\Volt\Component;

new class extends Component {
    public HistoriaClinica $historia;
    public array $data = [];

    public function mount(HistoriaClinica $historia): void
    {
        $this->historia = $historia;
    }

    public function guardar(): \Illuminate\Http\RedirectResponse
    {
        // Este formulario es un scaffold genérico para antecedentes laborales.
        // Ajusta la lógica de guardado según el modelo real si lo deseas.
        return redirect(route('historias-clinicas.create', [$this->historia->paciente_id, $this->historia->cita_id]))->with('success', 'Antecedentes laborales (simulado)');
    }
}; ?>

<div>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white text-center">Crear Antecedentes Laborales</h1>
        <flux:menu.separator />
    </x-slot>

    <div class="max-w-full mx-auto p-6 bg-white dark:bg-zinc-900 rounded-lg shadow-md">
        <form wire:submit.prevent='guardar' enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 gap-4">
                <x-input-field name="empresa_actual" label="Empresa Actual" model="data.empresa_actual" />
                <x-input-field name="cargo_actual" label="Cargo Actual" model="data.cargo_actual" />
                <x-input-field name="tiempo_en_cargo" label="Tiempo en el Cargo" model="data.tiempo_en_cargo" type="number" />
                <x-textarea-field name="observaciones" label="Observaciones" model="data.observaciones" />
            </div>

            <flux:menu.separator />
            <div class="flex justify-center">
                <x-action-button class="mt-2" label="Guardar Antecedentes Laborales" variant="success" />
            </div>
        </form>
    </div>
</div>

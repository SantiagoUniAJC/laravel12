<?php
use Carbon\Carbon;
?>

@props(['item' => null, 'title' => 'Detalle', 'historia' => null])

<div class="space-y-6">
    {{-- HEADER --}}
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white text-center tracking-wide">{{ $title }}
        </h1>
        <flux:menu.separator />
    </x-slot>

    {{-- CONTENT --}}
    <x-slot name="content">
        <div class="bg-white dark:bg-zinc-800 rounded-2xl shadow-md border border-zinc-200 dark:border-zinc-700 p-6">
            @if (empty($item))
                <div class="text-sm text-zinc-500 dark:text-zinc-400 text-center py-4">
                    No hay información registrada para este elemento.
                </div>
            @else
                @php
                    $attrs = $item->getAttributes();
                    $skip = ['id', 'created_at', 'updated_at', 'paciente_id', 'historia_clinica_id'];
                @endphp

                <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-5 gap-5">
                    @foreach ($attrs as $key => $value)
                        @continue(in_array($key, $skip))
                        @php
                            $label = ucwords(str_replace(['_', '-'], [' ', ' '], $key));
                            $display = $value;
                            if (is_string($value)) {
                                $decoded = json_decode($value, true);
                                if (
                                    json_last_error() === JSON_ERROR_NONE &&
                                    (is_array($decoded) || is_object($decoded))
                                ) {
                                    $display = $decoded;
                                }
                            }
                        @endphp

                        <div class="p-4 bg-zinc-100 dark:bg-zinc-700 rounded-xl shadow-sm hover:shadow transition">
                            <div class="flex items-center mb-2 space-x-2">
                                <x-icon name="briefcase" class="w-5 h-5 text-indigo-500 dark:text-purple-400" />
                                <h3 class="text-sm font-semibold text-zinc-800 dark:text-zinc-100">
                                    {{ $label }}
                                </h3>
                            </div>

                            @if (is_array($display) || is_object($display))
                                <ul class="list-disc ml-6 text-sm text-zinc-700 dark:text-zinc-200 leading-relaxed">
                                    @foreach ((array) $display as $k => $v)
                                        <li>
                                            <strong>{{ is_string($k) ? ucfirst(str_replace(['_', '-'], [' ', ' '], $k)) . ': ' : '' }}</strong>
                                            {{ is_bool($v) ? ($v ? 'Sí' : 'No') : (is_array($v) ? implode(', ', (array) $v) : $v) }}
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-sm text-right text-zinc-700 dark:text-zinc-200 leading-snug mt-1">
                                    {{ is_bool($display) ? ($display ? 'Sí' : 'No') : ($display ?: '-') }}
                                </p>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

    </x-slot>

    {{-- FOOTER --}}
    <x-slot name="footer">
        @if ($historia?->paciente?->infoLaboralActual)
            <div class="mt-6 text-center text-sm text-zinc-600 dark:text-zinc-400 border-t border-zinc-700/30 pt-3">
                <p class="leading-relaxed">
                    <strong class="text-zinc-800 dark:text-zinc-200">Última actualización:</strong>
                    {{ Carbon::parse($historia->paciente->infoLaboralActual->updated_at)->format('d/m/Y H:i') }}
                    <span class="mx-2 text-zinc-400">|</span>
                    <strong class="text-zinc-800 dark:text-zinc-200">Usuario:</strong>
                    {{ $historia->user->nombres }} {{ $historia->user->apellidos }}
                </p>
            </div>
        @endif

        {{-- BOTONES DE ACCIÓN --}}
        <div class="mt-6 flex flex-col sm:flex-row justify-between gap-3">
            <x-action-button variant="warning" label="Actualizar Información Laboral" class="w-full sm:w-auto" />

            <x-action-button
                href="{{ route('historias-clinicas.create', [
                    'paciente' => $historia->paciente->id,
                    'cita' => $historia->cita->id,
                ]) }}"
                variant="success" label="Regresar" class="w-full sm:w-auto" />
        </div>
    </x-slot>
</div>

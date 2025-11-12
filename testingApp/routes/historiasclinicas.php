<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Gestion de rutas para Historias Clinicas

Route::prefix('historias-clinicas')->name('historias-clinicas.')
    ->group(function () {
        Volt::route('/', 'historiasclinicas.index')->name('index');
        Volt::route('{paciente}/create/{cita}', 'historiasclinicas.create')->name('create');
        Volt::route('{historia}/edit', 'historiasclinicas.edit')->name('edit');
        Volt::route('{historia}/show', 'historiasclinicas.show')->name('show');

        // Subrutas dinámicas
        $rutas = [
            'infolabactual',
            'motivoconsulta',
            'antecedenteFamiliar',
            'antecedentePersonal',
            'habitoExtralaboral',
            'revisionLaboratorio',
            'examenFisico',
            'pruebasNeurologicas',
            'examenComplementario',
            'diagnostico',
            'sistemaVigilancia',
            'recomendacionesMedicas',
        ];

        foreach ($rutas as $ruta) {
            Volt::route('{historia}/' . $ruta, "historiasclinicas.$ruta")
                ->name($ruta);

            Volt::route('{historia}/' . $ruta . '/create', "historiasclinicas.$ruta.create")
                ->name("$ruta.create");

            Volt::route('{historia}/' . $ruta . '/show', "historiasclinicas.$ruta.show")
                ->name("$ruta.show");
        }
    });




// Volt::route('historias-clinicas/{historia}/infolabactual', 'historiasclinicas.infolabactual')->name('historias-clinicas.infolabactual');
// Volt::route('historias-clinicas/{historia}/infolabactual/create', 'historiasclinicas.infolabactual.create')->name('historias-clinicas.infolabactual.create');

// Volt::route('historias-clinicas/{historia}/motivoconsulta', 'historiasclinicas.motivoconsulta')->name('historias-clinicas.motivoconsulta');
// Volt::route('historias-clinicas/{historia}/motivoconsulta/create', 'historiasclinicas.motivoconsulta.create')->name('historias-clinicas.motivoconsulta.create');

// Volt::route('historias-clinicas/{historia}/antecedenteFamiliar', 'historiasclinicas.antecedenteFamiliar')->name('historias-clinicas.antecedenteFamiliar');
// Volt::route('historias-clinicas/{historia}/antecedenteFamiliar/create', 'historiasclinicas.antecedenteFamiliar.create')->name('historias-clinicas.antecedenteFamiliar.create');

// Volt::route('historias-clinicas/{historia}/antecedentePersonal', 'historiasclinicas.antecedentePersonal')->name('historias-clinicas.antecedentePersonal');
// Volt::route('historias-clinicas/{historia}/antecedentePersonal/create', 'historiasclinicas.antecedentePersonal.create')->name('historias-clinicas.antecedentePersonal.create');

// Volt::route('historias-clinicas/{historia}/habitoExtralaboral', 'historiasclinicas.habitoExtralaboral')->name('historias-clinicas.habitoExtralaboral');
// Volt::route('historias-clinicas/{historia}/habitoExtralaboral/create', 'historiasclinicas.habitoExtralaboral.create')->name('historias-clinicas.habitoExtralaboral.create');

// Volt::route('historias-clinicas/{historia}/revisionLaboratorio', 'historiasclinicas.revisionLaboratorio')->name('historias-clinicas.revisionLaboratorio');
// Volt::route('historias-clinicas/{historia}/revisionLaboratorio/create', 'historiasclinicas.revisionLaboratorio.create')->name('historias-clinicas.revisionLaboratorio.create');

// Volt::route('historias-clinicas/{historia}/examenFisico', 'historiasclinicas.examenFisico')->name('historias-clinicas.examenFisico');
// Volt::route('historias-clinicas/{historia}/examenFisico/create', 'historiasclinicas.examenFisico.create')->name('historias-clinicas.examenFisico.create');

// Volt::route('historias-clinicas/{historia}/pruebasNeurologicas', 'historiasclinicas.pruebasNeurologicas')->name('historias-clinicas.pruebasNeurologicas');
// Volt::route('historias-clinicas/{historia}/pruebasNeurologicas/create', 'historiasclinicas.pruebasNeurologicas.create')->name('historias-clinicas.pruebasNeurologicas.create');

// Volt::route('historias-clinicas/{historia}/examenComplementario', 'historiasclinicas.examenComplementario')->name('historias-clinicas.examenComplementario');
// Volt::route('historias-clinicas/{historia}/examenComplementario/create', 'historiasclinicas.examenComplementario.create')->name('historias-clinicas.examenComplementario.create');

// Volt::route('historias-clinicas/{historia}/diagnostico', 'historiasclinicas.diagnostico')->name('historias-clinicas.diagnostico');
// Volt::route('historias-clinicas/{historia}/diagnostico/create', 'historiasclinicas.diagnostico.create')->name('historias-clinicas.diagnostico.create');

// Volt::route('historias-clinicas/{historia}/sistema-vigilancia', 'historiasclinicas.sistema-vigilancia')->name('historias-clinicas.sistema-vigilancia');
// Volt::route('historias-clinicas/{historia}/sistema-vigilancia/create', 'historiasclinicas.sistema-vigilancia.create')->name('historias-clinicas.sistema-vigilancia.create');

// Volt::route('historias-clinicas/{historia}/recomendaciones-medicas', 'historiasclinicas.recomendaciones-medicas')->name('historias-clinicas.recomendaciones-medicas');
// Volt::route('historias-clinicas/{historia}/recomendaciones-medicas/create', 'historiasclinicas.recomendaciones-medicas.create')->name('historias-clinicas.recomendaciones-medicas.create');

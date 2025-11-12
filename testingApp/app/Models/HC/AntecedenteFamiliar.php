<?php

namespace App\Models\HC;

use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;
use App\Models\HistoriaClinica;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class AntecedenteFamiliar extends Model
{
     protected $fillable = [
        'diabetes',
        'hipertension',
        'accidente_cardiovascular',
        'cancer',
        'epilepsia',
        'enfermedad_mental',
        'alergias',
        'enfermedad_respiratoria',
        'otros_antedecentes_familiares',
        'antedecentes_familiares_observaciones',
        'cefalea',
        'diabetes_personal',
        'epilepsia_personal',
        'enfermedad_visual',
        'hepatitis',
        'cancer_personal',
        'hernias',
        'enfermedad_oidos',
        'varices',
        'enfermedad_respiratoria_personal',
        'enfermedad_gastrointestinal',
        'enfermedad_cardiaca',
        'dermatitis',
        'enfermedad_renal',
        'hipertension_personal',
        'alergias_personal',
        'enfermedad_tiroides',
        'enfermedad_osteomuscular',
        'enfermedad_psiquiatrica',
        'traumaticos',
        'cirugias',
        'covid_19_personal',
        'otros_enfermedades_personales',
        'antedecentes_personales_observaciones',
        'paciente_id',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function historiaClinica()
    {
        return $this->belongsTo(HistoriaClinica::class);
    }
}

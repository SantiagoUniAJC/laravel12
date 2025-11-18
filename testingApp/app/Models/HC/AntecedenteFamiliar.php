<?php

namespace App\Models\HC;

use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;
use App\Models\HistoriaClinica;

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
        'cefalea',
        'enfermedad_visual',
        'hepatitis',
        'covid_19',
        'hernias',
        'enfermedad_oidos',
        'varices',
        'enfermedad_gastrointestinal',
        'enfermedad_cardiaca',
        'dermatitis',
        'enfermedad_renal',
        'enfermedad_tiroides',
        'enfermedad_osteomuscular',
        'enfermedad_psiquiatrica',
        'traumaticos',
        'cirugias',
        'cuales_cirugias',
        'otros_antecedentes_familiares',
        'antecedentes_familiares_observaciones',
        'paciente_id',
        'historia_clinica_id',
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

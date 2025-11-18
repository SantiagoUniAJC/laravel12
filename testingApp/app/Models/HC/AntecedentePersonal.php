<?php

namespace App\Models\HC;

use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;
use App\Models\HistoriaClinica;

class AntecedentePersonal extends Model
{
    protected $fillable = [
        'gestas',
        'partos',
        'cesareas',
        'nacidos_vivos',
        'abortos',
        'otros_antecedentes_ginecobstetricos',
        'menarca',
        'fecha_ultima_menstruacion',
        'fecha_ultima_citologia',
        'ciclos',
        'resultado_ultima_citologia',
        'planifica',
        'hemoclasificacion_referido_por_usuario',
        'porta_carnet',
        'antitetanica',
        'antitetanica_fecha_ultima_dosis',
        'antitetanica_esquema_completo',
        'hepatitis_a',
        'hepatitis_a_fecha_ultima_dosis',
        'hepatitis_a_esquema_completo',
        'hepatitis_b',
        'hepatitis_b_fecha_ultima_dosis',
        'hepatitis_b_esquema_completo',
        'fiebre_amarilla',
        'fiebre_amarilla_fecha_ultima_dosis',
        'fiebre_amarilla_esquema_completo',
        'influenza',
        'influenza_fecha_ultima_dosis',
        'influenza_esquema_completo',
        'varicela',
        'varicela_fecha_ultima_dosis',
        'varicela_esquema_completo',
        'meningococo',
        'meningococo_fecha_ultima_dosis',
        'meningococo_esquema_completo',
        'virus_papiloma_humano',
        'virus_papiloma_humano_fecha_ultima_dosis',
        'virus_papiloma_humano_esquema_completo',
        'covid_19',
        'covid_19_fecha_ultima_dosis',
        'covid_19_esquema_completo',
        'otros',
        'otros_fecha_ultima_dosis',
        'otros_esquema_completo',
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

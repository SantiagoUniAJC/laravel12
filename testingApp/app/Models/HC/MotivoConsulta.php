<?php

namespace App\Models\HC;

use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;

class MotivoConsulta extends Model
{
    protected $fillable = [
        'motivo_consulta',
        'descripcion_consulta',
        'estado_actual_de_salud',
        'restricciones_medicas_vigentes',
        'descripcion_estado_actual_de_salud',
        'empresa_anterior',
        'cargo_anterior',
        'tiempo_laborado',
        'factores_riesgo',
        'uso_epp',
        'motivo_retiro',
        'fecha_retiro',
        'accidentes_laborales',
        'accidentes_laborales_empresa_anterior',
        'accidentes_laborales_empresa_actual',
        'fecha_accidente_laboral',
        'empresa_accidente_laboral',
        'descripcion_accidente_laboral',
        'fue_calificada_e_indemnizada',
        'secuelas',
        'descripcion_secuelas',
        'historia_clinica_id',
        'paciente_id',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}

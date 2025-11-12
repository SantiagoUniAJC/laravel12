<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static buscar(string|null $search)
 */
class HistoriaClinica extends Model
{
    protected $fillable = [
        'paciente_id',
        'user_id',
        'cita_id',
        'estado'
    ];

    public function scopeBuscar($query, $valor)
    {
        return $query
            ->whereHas('paciente', function ($q) use ($valor) {
                $q->where('nombres', 'LIKE', "%$valor%")
                    ->orWhere('apellidos', 'LIKE', "%$valor%")
                    ->orWhere('numero_identificacion', 'LIKE', "%$valor%");
            });
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cita()
    {
        return $this->belongsTo(Cita::class);
    }
}

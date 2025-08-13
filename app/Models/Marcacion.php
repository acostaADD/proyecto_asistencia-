<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Marcacion extends Model
{
    use HasFactory;

    protected $table = 'marcacion';

    protected $fillable = [
        'tipo_marcacion',
        'fecha_hora_ingreso',
        'fecha_hora_salida',
        'empleado_id',
    ];

public function marcacion()
{
    return $this->belongsTo(Empleados::class, 'empleado_id');

}
}

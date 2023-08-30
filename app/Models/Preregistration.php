<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preregistration extends Model
{
    use HasFactory;

    protected $table = 'preregistrations';
    protected $fillable = [
        'db4_status',
        'fecha_de_inters',
        'nombres',
        'apellidos',
        'tipos_de_documento',
        'numero_de_documento',
        'fecha_de_expedicion',
        'ciudad_de_expedicion',
        'departamento',
        'numero_celular_de_contacto',
        'correo_electrnico',
        'programa_acadmico',
        'por_que_le_interesa_esta_programa_acadmico',
        'status'
    ];
}

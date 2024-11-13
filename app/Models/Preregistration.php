<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preregistration extends Model
{
    use HasFactory;

    protected $table = 'preregistrations';
    public $timestamps = false; 
    protected $fillable = [
        'db4_status',
        'fecha_de_inters',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'tipos_de_documento',
        'numero_de_documento',
        'fecha_de_expedicion',
        'ciudad_de_expedicion',
        'departamento',
        'numero_celular_de_contacto',
        'correo_electrnico',
        'programa_acadmico',
        'tipo_de_inscripcin',
        'que_le_motivo_a_estudiar_este_programa_acadmico',
        'status',

        'modalidad',
        'metodologia',
        'periodo_academico',
        'horario',
        'genero',
        'fecha_nacimiento',
        'nacionalidad',
        'ciudad_nacimiento',
        'eps',
        'libreta_militar',
        'permanent_address',
        'school_name',
        'titulo_obtenido',
        'nombre_padre',
        'nombre_madre',
        'nombre_convive',
        'convive_type',
        'convive_document',
        'document_convive',
        'tel_convive',
        'email_convive',
        'ocupacion_convive',
        'convive_estudio',
        'ciudad_trabajo__convive',
        'sitio_trabajo__convive',
        'telefono_trabajo__convive',
        'direccion_trabajo__convive',
        'cargo_convive',
        'profesion_convive',
        'cash_month',
        'economic',
        'economic_person',
        'personal_economic','blood_group','marital_status','alergias','permanent_province','permanent_district'

    ];

    public function icfes()
    {
        return $this->hasOne(Icfes::class);
    }

    
    public function entrevistas()
    {
        return $this->hasOne(Interview::class);
    }
}

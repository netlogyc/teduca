@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="">
                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset class="row gx-2 scheduler-border">
                                        <legend>Preregistro</legend>
                                        <p><mark class="text-primary">{{ __('field_interesting_date') }}:</mark> {{ $row->fecha_de_inters }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('Primer nombre') }}:</mark> {{ $row->primer_nombre }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('Segundo nombre') }}:</mark> {{ $row->segundo_nombre }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('Primer apellido') }}:</mark> {{ $row->primer_apellido }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('Segundo apellido') }}:</mark> {{ $row->segundo_apellido }}</p><hr/>
                                        {{-- <p><mark class="text-primary">{{ __('field_last_name') }}:</mark> {{ $row->apellidos }}</p><hr/> --}}
                                        <p><mark class="text-primary">{{ __('field_document_type') }}:</mark> {{ $row->tipos_de_documento }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('field_document_number') }}:</mark> {{ $row->numero_de_documento }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('expedition_date') }}:</mark> {{ $row->fecha_de_expedicion }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('field_status') }}:</mark> 
                                            @if( $row->status == 1 )
                                            {{ __('gender_male') }}
                                            @elseif( $row->status == 2 )
                                            {{ __('gender_female') }}
                                            @elseif( $row->status == 3 )
                                            {{ __('gender_other') }}
                                            @endif
                                        </p><hr/>
                                        <p><mark class="text-primary">{{ __('field_religion') }}:</mark> {{ $row->religion }}</p><hr/>
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <fieldset class="row gx-2 scheduler-border">
                                        <p><mark class="text-primary">{{ __('municipio_location') }}:</mark> {{ $row->ciudad_de_expedicion }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('departamento_location') }}:</mark> {{ $row->departamento }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('cell_phone_number') }}:</mark> {{ $row->numero_celular_de_contacto }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('field_email') }}:</mark> {{ $row->correo_electrnico }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('academic_program') }}:</mark> {{ $row->programa_acadmico }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('interest') }}:</mark> {{ $row->por_que_le_interesa_esta_programa_acadmico }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('field_status') }}:</mark> {{ $row->numero_de_documento }}</p><hr/>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-block">
                        <div class="">
                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset class="row gx-2 scheduler-border">
                                        <legend>Registro</legend>
                                        <p><mark class="text-primary">{{ __('modalidad') }}:</mark> {{ $row->modalidad }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('metodologia') }}:</mark> {{ $row->metodologia }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('periodo_academico') }}:</mark> {{ $row->periodo_academico }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('horario') }}:</mark> {{ $row->horario }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('genero') }}:</mark> {{ $row->genero }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('fecha_nacimiento') }}:</mark> {{ $row->fecha_nacimiento }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('nacionalidad') }}:</mark> {{ $row->nacionalidad }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('ciudad_nacimiento') }}:</mark> {{ $row->ciudad_nacimiento }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('eps') }}:</mark> {{ $row->eps }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('libreta_militar') }}:</mark> {{ $row->libreta_militar }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('permanent_address') }}:</mark> {{ $row->permanent_address }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('school_name') }}:</mark> {{ $row->school_name }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('titulo_obtenido') }}:</mark> {{ $row->titulo_obtenido }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('nombre_padre') }}:</mark> {{ $row->nombre_padre }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('nombre_madre') }}:</mark> {{ $row->nombre_madre }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('nombre_convive') }}:</mark> {{ $row->nombre_convive }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('convive_type') }}:</mark> {{ $row->convive_type }}</p><hr/>
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <fieldset class="row gx-2 scheduler-border">
                                        <p><mark class="text-primary">{{ __('convive_document') }}:</mark> {{ $row->convive_document }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('document_convive') }}:</mark> {{ $row->document_convive }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('tel_convive') }}:</mark> {{ $row->tel_convive }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('email_convive') }}:</mark> {{ $row->email_convive }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('ocupacion_convive') }}:</mark> {{ $row->ocupacion_convive }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('convive_estudio') }}:</mark> {{ $row->convive_estudio }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('ciudad_trabajo__convive') }}:</mark> {{ $row->ciudad_trabajo__convive }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('sitio_trabajo__convive') }}:</mark> {{ $row->sitio_trabajo__convive }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('telefono_trabajo__convive') }}:</mark> {{ $row->telefono_trabajo__convive }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('direccion_trabajo__convive') }}:</mark> {{ $row->direccion_trabajo__convive }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('cargo_convive') }}:</mark> {{ $row->cargo_convive }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('profesion_convive') }}:</mark> {{ $row->profesion_convive }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('cash_month') }}:</mark> {{ $row->cash_month }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('economic') }}:</mark> {{ $row->economic }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('economic_person') }}:</mark> {{ $row->economic_person }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('personal_economic') }}:</mark> {{ $row->personal_economic }}</p><hr/>


                                        <p><mark class="text-primary">{{ __('Codigo Icfes snp') }}:</mark> {{ $row->icfes->icfes_snp  }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('Fecha de presentación') }}:</mark> {{ $row->icfes->icfes_date  }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('Tipo de Icfes') }}:</mark> {{ $row->icfes->icfes_type  }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('Puntaje total Icfes') }}:</mark> {{ $row->icfes->icfes_total  }}</p><hr/>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-block">
                        <div class="">
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset class="row gx-2 scheduler-border">
                                        <legend>Entrevista</legend>
                                        <p><mark class="text-primary"> {{ ucfirst(strtolower(__('metas_profesionales_mediano_plazo')))}}:</mark> {{ $row->entrevistas->metas_profesionales_mediano_plazo }}</p><hr/>
                                        <p><mark class="text-primary"> {{ ucfirst(strtolower(__('metas_profesionales_largo_plazo') ))}}:</mark> {{ $row->entrevistas->metas_profesionales_largo_plazo }}</p><hr/>
                                        <p><mark class="text-primary"> {{ ucfirst(strtolower(__('metas_personales_mediano_plazo') ))}}:</mark> {{ $row->entrevistas->metas_personales_mediano_plazo }}</p><hr/>
                                        <p><mark class="text-primary"> {{ ucfirst(strtolower(__('metas_personales_largo_plazo') ))}}:</mark> {{ $row->entrevistas->metas_personales_largo_plazo }}</p><hr/>
                                        <p><mark class="text-primary"> {{ ucfirst(strtolower(__('cuales_son_sus_fortalezas') ))}}:</mark> {{ $row->entrevistas->cuales_son_sus_fortalezas }}</p><hr/>
                                        <p><mark class="text-primary"> {{ ucfirst(strtolower(__('cuales_son_sus_debilidades'))) }}:</mark> {{ $row->entrevistas->cuales_son_sus_debilidades }}</p><hr/>
                                        <p><mark class="text-primary"> {{ ucfirst(strtolower(__('como_convertiria_debilidades_en_fortalezas'))) }}:</mark> {{ $row->entrevistas->como_convertiria_debilidades_en_fortalezas }}</p><hr/>
                                        <p><mark class="text-primary"> {{ ucfirst(strtolower(__('hace_cuando_termino_educacion_media') ))}}:</mark> {{ $row->entrevistas->hace_cuando_termino_educacion_media }}</p><hr/>
                                        <p><mark class="text-primary"> {{ ucfirst(strtolower(__('cuales_materias_se_dificultaban'))) }}:</mark> {{ $row->entrevistas->cuales_materias_se_dificultaban }}</p><hr/>
                                        <p><mark class="text-primary"> {{ ucfirst(strtolower(__('cuales_materias_le_agradaban'))) }}:</mark> {{ $row->entrevistas->cuales_materias_le_agradaban }}</p><hr/>
                                        <p><mark class="text-primary"> {{ ucfirst(strtolower(__('que_le_gusta_en_tiempo_libre'))) }}:</mark> {{ $row->entrevistas->que_le_gusta_en_tiempo_libre }}</p><hr/>
                                        <p><mark class="text-primary"> {{ ucfirst(strtolower(__('que_le_motivo_elegir'))) }}:</mark> {{ $row->entrevistas->que_le_motivo_elegir }}</p><hr/>
                                        <p><mark class="text-primary"> {{ ucfirst(strtolower(__('cual_es_el_campo_accion') ))}}:</mark> {{ $row->entrevistas->cual_es_el_campo_accion }}</p><hr/>
                                        <p><mark class="text-primary"> {{ ucfirst(strtolower(__('que_perspectiva_profesional_tiene') ))}}:</mark> {{ $row->entrevistas->que_perspectiva_profesional_tiene }}</p><hr/>
                                        <p><mark class="text-primary"> {{ ucfirst(strtolower(__('cual_seria_su_aporte') ))}}:</mark> {{ $row->entrevistas->cual_seria_su_aporte }}</p><hr/>
                                        <p><mark class="text-primary"> {{ ucfirst(strtolower(__('que_otras_instituciones_educativas'))) }}:</mark> {{ $row->entrevistas->que_otras_instituciones_educativas }}</p><hr/>
                                        <p><mark class="text-primary"> {{ ucfirst(strtolower(__('conoce_el_valor_de_carrera'))) }}:</mark> {{ $row->entrevistas->conoce_el_valor_de_carrera }}</p><hr/>
                                        <p><mark class="text-primary"> {{ ucfirst(strtolower(__('cuales_opciones_de_grado') ))}}:</mark> {{ $row->entrevistas->cuales_opciones_de_grado }}</p><hr/>
                                        <p><mark class="text-primary"> {{ ucfirst(strtolower(__('por_que_quiere_estudiar_ctb'))) }}:</mark> {{ $row->entrevistas->por_que_quiere_estudiar_ctb }}</p><hr/>
                                        <p><mark class="text-primary"> {{ ucfirst(strtolower(__('cuales_son_sus_expectativas'))) }}:</mark> {{ $row->entrevistas->cuales_son_sus_expectativas }}</p><hr/>
                                        <p><mark class="text-primary"> {{ ucfirst(strtolower(__('porque_deberiamos_aceptarlo'))) }}:</mark> {{ $row->entrevistas->porque_deberiamos_aceptarlo }}</p><hr/>
                                        <p><mark class="text-primary"> {{ ucfirst(strtolower(__('como_contribuiria_al_crecimiento'))) }}:</mark> {{ $row->entrevistas->como_contribuiria_al_crecimiento }}</p><hr/>
                                        <p><mark class="text-primary"> {{ ucfirst(strtolower(__('RESULTADO'))) }}:</mark>{{ $row->entrevistas->resultado }} </p><hr/>
                                    </fieldset>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection
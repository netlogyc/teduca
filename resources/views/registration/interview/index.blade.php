<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Entrevista aspirante</title>
         @include('registration.layouts.common.header_script')

    </head>
    <body style="">
        
            <!-- Start Content-->

            
        <div class="main-body mt-5">
            <div class="page-wrapper">
                <div class="container ">
                    <div class="row">
                        <!-- [ Card ] start -->
                       
                        <div class="col-sm-12">
                            <div class="card shadow p-3 mb-5 bg-white ">

                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <img src="{{ asset('dashboard/images/ctb.png') }}" alt="Photo"  class="img-fluid">
                                        <h2 class="h2" style="color: #D62A29; font-weight:bold">FORMULARIO ÚNICO DE ENTREVISTA</h2>
                                    </div>
                                </div>

                                <div class="">
                                    <form id="wizard-advanced-form" class="needs-validation" novalidate
                                        action="{{ route($route . '.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row mx-auto">


                                                   <input type="text" value="{{ $candidate->id }}" name="id" style="display: none">
                                                    <legend>{{ __('Aspectos personales') }}</legend>
                                                    <div class="form-group col-md-6">
                                                        <label for="metas_profesionales_mediano_plazo">{{ __('metas_profesionales_mediano_plazo') }} <span>*</span></label>
                                                        <textarea class="form-control" id="metas_profesionales_mediano_plazo" name="metas_profesionales_mediano_plazo" rows="2"></textarea>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('metas_profesionales_mediano_plazo') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="metas_profesionales_largo_plazo">{{ __('metas_profesionales_largo_plazo') }} <span>*</span></label>
                                                        <textarea class="form-control" id="metas_profesionales_largo_plazo" name="metas_profesionales_largo_plazo" rows="2"></textarea>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('metas_profesionales_largo_plazo') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="metas_personales_mediano_plazo">{{ __('metas_personales_mediano_plazo') }} <span>*</span></label>
                                                        <textarea class="form-control" id="metas_personales_mediano_plazo" name="metas_personales_mediano_plazo" rows="2"></textarea>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('metas_personales_mediano_plazo') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="metas_personales_largo_plazo">{{ __('metas_personales_largo_plazo') }} <span>*</span></label>
                                                        <textarea class="form-control" id="metas_personales_largo_plazo" name="metas_personales_largo_plazo" rows="2"></textarea>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('metas_personales_largo_plazo') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="cuales_son_sus_fortalezas">{{ __('cuales_son_sus_fortalezas') }} <span>*</span></label>
                                                        <textarea class="form-control" id="cuales_son_sus_fortalezas" name="cuales_son_sus_fortalezas" rows="2"></textarea>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('cuales_son_sus_fortalezas') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="cuales_son_sus_debilidades">{{ __('cuales_son_sus_debilidades') }} <span>*</span></label>
                                                        <textarea class="form-control" id="cuales_son_sus_debilidades" name="cuales_son_sus_debilidades" rows="2"></textarea>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('cuales_son_sus_debilidades') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="como_convertiria_debilidades_en_fortalezas">{{ __('como_convertiria_debilidades_en_fortalezas') }} <span>*</span></label>
                                                        <textarea class="form-control" id="como_convertiria_debilidades_en_fortalezas" name="como_convertiria_debilidades_en_fortalezas" rows="2"></textarea>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('como_convertiria_debilidades_en_fortalezas') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="hace_cuando_termino_educacion_media">{{ __('hace_cuando_termino_educacion_media') }} <span>*</span></label>
                                                        <textarea class="form-control" id="hace_cuando_termino_educacion_media" name="hace_cuando_termino_educacion_media" rows="2"></textarea>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('hace_cuando_termino_educacion_media') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="cuales_materias_se_dificultaban">{{ __('cuales_materias_se_dificultaban') }} <span>*</span></label>
                                                        <textarea class="form-control" id="cuales_materias_se_dificultaban" name="cuales_materias_se_dificultaban" rows="2"></textarea>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('cuales_materias_se_dificultaban') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="cuales_materias_le_agradaban">{{ __('cuales_materias_le_agradaban') }} <span>*</span></label>
                                                        <textarea class="form-control" id="cuales_materias_le_agradaban" name="cuales_materias_le_agradaban" rows="2"></textarea>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('cuales_materias_le_agradaban') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="que_le_gusta_en_tiempo_libre">{{ __('que_le_gusta_en_tiempo_libre') }} <span>*</span></label>
                                                        <textarea class="form-control" id="que_le_gusta_en_tiempo_libre" name="que_le_gusta_en_tiempo_libre" rows="2"></textarea>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('que_le_gusta_en_tiempo_libre') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                    </div>

                                                    <legend>{{ __('Conocimiento de la carrera') }}</legend>
                                                    <div class="form-group col-md-6">
                                                        <label for="que_le_motivo_elegir">{{ __('que_le_motivo_elegir') }} <span>*</span></label>
                                                        <textarea class="form-control" id="que_le_motivo_elegir" name="que_le_motivo_elegir" rows="2"></textarea>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('que_le_motivo_elegir') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="cual_es_el_campo_accion">{{ __('cual_es_el_campo_accion') }} <span>*</span></label>
                                                        <textarea class="form-control" id="cual_es_el_campo_accion" name="cual_es_el_campo_accion" rows="2"></textarea>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('cual_es_el_campo_accion') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="que_perspectiva_profesional_tiene">{{ __('que_perspectiva_profesional_tiene') }} <span>*</span></label>
                                                        <textarea class="form-control" id="que_perspectiva_profesional_tiene" name="que_perspectiva_profesional_tiene" rows="2"></textarea>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('que_perspectiva_profesional_tiene') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="cual_seria_su_aporte">{{ __('cual_seria_su_aporte') }} <span>*</span></label>
                                                        <textarea class="form-control" id="cual_seria_su_aporte" name="cual_seria_su_aporte" rows="2"></textarea>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('cual_seria_su_aporte') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="que_otras_instituciones_educativas">{{ __('que_otras_instituciones_educativas') }} <span>*</span></label>
                                                        <textarea class="form-control" id="que_otras_instituciones_educativas" name="que_otras_instituciones_educativas" rows="2"></textarea>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('que_otras_instituciones_educativas') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="conoce_el_valor_de_carrera">{{ __('conoce_el_valor_de_carrera') }} <span>*</span></label>
                                                        <textarea class="form-control" id="conoce_el_valor_de_carrera" name="conoce_el_valor_de_carrera" rows="2"></textarea>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('conoce_el_valor_de_carrera') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="cuales_opciones_de_grado">{{ __('cuales_opciones_de_grado') }} <span>*</span></label>
                                                        <textarea class="form-control" id="cuales_opciones_de_grado" name="cuales_opciones_de_grado" rows="2"></textarea>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('cuales_opciones_de_grado') }}
                                                        </div>
                                                    </div>
                                                    <legend>{{ __('Conocimiento de la institución') }}</legend>
                                                    <div class="form-group col-md-6">
                                                        <label for="por_que_quiere_estudiar_ctb">{{ __('por_que_quiere_estudiar_ctb') }} <span>*</span></label>
                                                        <textarea class="form-control" id="por_que_quiere_estudiar_ctb" name="por_que_quiere_estudiar_ctb" rows="2"></textarea>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('por_que_quiere_estudiar_ctb') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="cuales_son_sus_expectativas">{{ __('cuales_son_sus_expectativas') }} <span>*</span></label>
                                                        <textarea class="form-control" id="cuales_son_sus_expectativas" name="cuales_son_sus_expectativas" rows="2"></textarea>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('cuales_son_sus_expectativas') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="porque_deberiamos_aceptarlo">{{ __('porque_deberiamos_aceptarlo') }} <span>*</span></label>
                                                        <textarea class="form-control" id="porque_deberiamos_aceptarlo" name="porque_deberiamos_aceptarlo" rows="2"></textarea>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('porque_deberiamos_aceptarlo') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="como_contribuiria_al_crecimiento
                                                        
                                                        ">{{ __('como_contribuiria_al_crecimiento') }} <span>*</span></label>
                                                        <textarea class="form-control" id="como_contribuiria_al_crecimiento" name="como_contribuiria_al_crecimiento" rows="2"></textarea>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('como_contribuiria_al_crecimiento') }}
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="RESULTADO">{{ __('RESULTADO') }} <span>*</span></label>
                                                        <select class="form-control" name="resultado" id="resultado" required>
                                                            <option value="">{{ __('select') }}</option>
                                                            <option value="Aprobado">
                                                                {{ __('Aprobado') }}</option>
                                                            <option value="Rechazado">
                                                                {{ __('Rechazado') }}</option>
                                                        </select>
                                                    </div>

                                                    <div class="p-5 text-center">
                                                        <button type="submit" class="btn btn-success "><i class="fas fa-check"></i> {{ __('btn_save') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                    
                                        </div>
                                    </form>
                                </div>
    
                            </div>
                        </div>
                        <!-- [ Card ] end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content-->

        
    </body>

    @include('admin.layouts.common.footer_script')
</html>

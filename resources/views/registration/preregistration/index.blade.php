<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Preinscripción</title>
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
                                        <h2 class="h2" style="color: #D62A29; font-weight:bold">FORMULARIO ÚNICO DE PRE INSCRIPCIÓN</h2>
                                    </div>
                                </div>

                                <div class="">
                                    <form id="wizard-advanced-form" class="needs-validation" novalidate
                                        action="{{ route($route . '.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row mx-auto">


                                                    <div class="form-group col-md-6">
                                                        <label for="email">{{ __('fecha_de_inters') }} <span>*</span></label>
                                                        <input type="date" class="form-control date" name="fecha_de_inters" id="fecha_de_inters"
                                                            value="{{ old('fecha_de_inters') }}" required>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('fecha_de_inters') }}
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="form-group col-md-6">
                                                        <label for="first_name">{{ __('primer_nombre') }}
                                                            <span>*</span></label>
                                                        <input type="text" class="form-control" name="primer_nombre"
                                                            id="primer_nombre" value="{{ old('primer_nombre') }}" required>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('primer_nombre') }}
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="segundo_nombre">{{ __('segundo_nombre') }}
                                                            <span>*</span></label>
                                                        <input type="text" class="form-control" name="segundo_nombre"
                                                            id="segundo_nombre" value="{{ old('segundo_nombre') }}" required>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('segundo_nombre') }}
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="primer_apellido">{{ __('primer_apellido') }}
                                                            <span>*</span></label>
                                                        <input type="text" class="form-control" name="primer_apellido"
                                                            id="primer_apellido" value="{{ old('primer_apellido') }}" required>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('primer_apellido') }}
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="segundo_apellido">{{ __('segundo_apellido') }}
                                                            <span>*</span></label>
                                                        <input type="text" class="form-control" name="segundo_apellido"
                                                            id="segundo_apellido" value="{{ old('segundo_apellido') }}" required>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('segundo_apellido') }}
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-12"></div>
                                                    
                                                
                                                    <div class="form-group col-md-6 ">
                                                        <label for="tipos_de_documento">{{ __('tipos_de_documento') }} <span>*</span></label>
                                                        <select class="form-control" name="tipos_de_documento" id="tipos_de_documento" required>
                                                            <option value="">{{ __('select') }}</option>
                                                            <option value="Cedula de ciudadania"
                                                                @if (old('tipos_de_documento') == 'Cedula de ciudadania') selected @endif>
                                                                {{ __('cedula') }}</option>
                                                            <option value="Tarjeta de identidad"
                                                                @if (old('tipos_de_documento') == 'Tarjeta de identidad') selected @endif>
                                                                {{ __('tarjeta_identidad') }}</option>
                                                            <option value="Cedula extranjera"
                                                                @if (old('tipos_de_documento') == 'Cedula extranjera') selected @endif>
                                                                {{ __('cedula_extranjera') }}</option>
                                                            <option value="Pasaporte"
                                                                @if (old('tipos_de_documento') == 'Pasaporte') selected @endif>
                                                                {{ __('pasaporte') }}</option>
                                                        </select>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('tipos_de_documento') }}
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="numero_de_documento">{{ __('numero_de_documento') }}</label>
                                                        <input type="number" class="form-control" name="numero_de_documento"
                                                            id="numero_de_documento" value="{{ old('numero_de_documento') }}">

                                                        <div class="invalid-feedback">
                                                            {{ __('numero_de_documento') }} {{ __('numero_de_documento') }}
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="departamento">{{ __('departamento') }}</label>
                                                        <input type="text" class="form-control" name="departamento"
                                                            id="departamento" value="{{ old('departamento') }}">

                                                        <div class="invalid-feedback">
                                                            {{ __('departamento') }} {{ __('departamento') }}
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="ciudad_de_expedicion">{{ __('ciudad_de_expedicion') }}</label>
                                                        <input type="text" class="form-control" name="ciudad_de_expedicion"
                                                            id="ciudad_de_expedicion" value="{{ old('ciudad_de_expedicion') }}">

                                                        <div class="invalid-feedback">
                                                            {{ __('ciudad_de_expedicion') }} {{ __('ciudad_de_expedicion') }}
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="fecha_de_expedicion">{{ __('fecha_de_expedicion') }}</label>
                                                        <input type="date" class="form-control date" name="fecha_de_expedicion"
                                                            id="fecha_de_expedicion" value="{{ old('fecha_de_expedicion') }}">

                                                        <div class="invalid-feedback">
                                                            {{ __('fecha_de_expedicion') }} {{ __('fecha_de_expedicion') }}
                                                        </div>
                                                    </div>

                                                   
                                                    <div class="form-group col-md-6 ">
                                                        <label for="numero_celular_de_contacto">{{ __('numero_celular_de_contacto') }}</label>
                                                        <input type="number" class="form-control" name="numero_celular_de_contacto"
                                                            id="numero_celular_de_contacto" value="{{ old('numero_celular_de_contacto') }}">

                                                        <div class="invalid-feedback">
                                                            {{ __('numero_celular_de_contacto') }} {{ __('numero_celular_de_contacto') }}
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="correo_electrnico">{{ __('correo_electrnico') }}</label>
                                                        <input type="email" class="form-control" name="correo_electrnico"
                                                            id="correo_electrnico" value="{{ old('correo_electrnico') }}">

                                                        <div class="invalid-feedback">
                                                            {{ __('correo_electrnico') }} {{ __('correo_electrnico') }}
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="correo_electrnico">{{ __('Confirmar correo electronico') }}</label>
                                                        <input type="email" class="form-control" name=""
                                                            id="correo_electrnico" value="{{ old('correo_electrnico') }}">

                                                        <div class="invalid-feedback">
                                                            {{ __('correo_electrnico') }} {{ __('correo_electrnico') }}
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="programa_acadmico">{{ __('programa_acadmico') }} <span>*</span></label>
                                                        <select class="form-control" name="programa_acadmico" id="programa_acadmico" required>
                                                            <option value="">{{ __('select') }}</option>
                                                            <option value="Tecnología en regencia de farmacia - presencial">{{ __('Tecnología en regencia de farmacia - presencial') }}</option>
                                                            <option value="Tecnología en quimica industrial - presencial">{{ __('Tecnología en quimica industrial - presencial') }}</option>
                                                            <option value="Tecnología en dirección comercial- presencial">{{ __('Tecnología en dirección comercial- presencial') }}</option>
                                                            <option value="Tecnología en producción de música y audio - presencial">{{ __('Tecnología en producción de música y audio - presencial') }}</option>
                                                            <option value="Tecnico profesional en operación de sonido y grabación - presencial">{{ __('Tecnico profesional en operación de sonido y grabación - presencial') }}</option>
                                                            <option value="Tecnología en gestión de la seguridad y salud en el trabajo - virtual">{{ __('Tecnología en gestión de la seguridad y salud en el trabajo - virtual') }}</option>
                                                        </select>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('programa_acadmico') }}
                                                        </div>
                                                    </div>

                                                    

                                                    <div class="form-group col-md-6">
                                                        <label for="tipo_inscripcion">{{ __('tipo_inscripcion') }} <span>*</span></label>
                                                        <select class="form-control" name="tipo_de_inscripcin" id="tipo_inscripcion" required>
                                                            <option value="">{{ __('select') }}</option>
                                                            <option value="Primer semestre">{{ __('Primer semestre') }}</option>
                                                            <option value="Homologación externa">{{ __('Homologación externa') }}</option>
                                                            <option value="Homologación interna">{{ __('Homologación interna') }}</option>
                                                            <option value="Nivelación (Regencia de farmacia)">{{ __('Nivelación (Regencia de farmacia)') }}</option>
                                                         
                                                        </select>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('tipo_inscripcion') }}
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label for="por_que_le_interesa_esta_programa_acadmico">{{ __('por_que_le_interesa_esta_programa_acadmico') }} <span>*</span></label>
                                                        <textarea class="form-control" id="por_que_le_interesa_esta_programa_acadmico" name="que_le_motivo_a_estudiar_este_programa_acadmico" rows="5"></textarea>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('por_que_le_interesa_esta_programa_acadmico') }}
                                                        </div>
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

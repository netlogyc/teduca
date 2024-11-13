<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Inscripción</title>
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
                                        <h2 class="h2" style="color: #D62A29; font-weight:bold">FORMULARIO ÚNICO DE INSCRIPCIÓN</h2>
                                </div>

                                <div class="">
                                    <form id="wizard-advanced-form" class="" novalidate
                                    action="{{ route($route . '.store') }}"  method="post" enctype="multipart/form-data">
                                        {{-- <form id="wizard-advanced-form" class="needs-validation" novalidate
                                        action="{{ route($route . '.store') }}" method="post" enctype="multipart/form-data"> --}}
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row mx-auto">

                                                    {{-- {{ $Nombres }} --}}
                                                    <div class="form-group col-md-3">
                                                        <label for="first_name">{{ __('primer_nombre') }}
                                                            <span>*</span></label>
                                                        <input type="text" class="form-control" name="primer_nombre"
                                                            id="primer_nombre" value=" {{ $candidate->primer_nombre}}" required readonly>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('primer_nombre') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="segundo_nombre">{{ __('segundo_nombre') }}
                                                            <span>*</span></label>
                                                        <input type="text" class="form-control" name="segundo_nombre"
                                                            id="segundo_nombre" value=" {{ $candidate->segundo_nombre}}" required readonly>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('segundo_nombre') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="primer_apellido">{{ __('primer_apellido') }}
                                                            <span>*</span></label>
                                                        <input type="text" class="form-control" name="primer_apellido"
                                                            id="primer_apellido" value=" {{ $candidate->primer_apellido}}" required readonly>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('primer_apellido') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="segundo_apellido">{{ __('segundo_apellido') }}
                                                            <span>*</span></label>
                                                        <input type="text" class="form-control" name="segundo_apellido"
                                                            id="segundo_apellido" value=" {{ $candidate->segundo_apellido}}" required readonly>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('segundo_apellido') }}
                                                        </div>
                                                    </div>
                                                    {{-- {{ $telefono }} --}}
                                                    <div class="form-group col-md-3 ">
                                                        <label for="numero_celular_de_contacto">{{ __('numero_celular_de_contacto') }}</label>
                                                        <input type="text" class="form-control" name="numero_celular_de_contacto"
                                                            id="numero_celular_de_contacto" value=" {{ intval($candidate->numero_celular_de_contacto)}}" readonly>

                                                        <div class="invalid-feedback">
                                                            {{ __('numero_celular_de_contacto') }} {{ __('numero_celular_de_contacto') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="correo_electrnico">{{ __('correo_electrnico') }}</label>
                                                        <input type="email" class="form-control" name="correo_electrnico"
                                                            id="correo_electrnico" value="{{  $candidate->correo_electrnico }}" readonly>

                                                        <div class="invalid-feedback">
                                                            {{ __('correo_electrnico') }} {{ __('correo_electrnico') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3 ">
                                                        <label for="tipos_de_documento">{{ __('tipos_de_documento') }} <span>*</span></label>
                                                        <select class="form-control" name="tipos_de_documento" id="tipos_de_documento" required disabled>
                                                            <option value="">{{ __('select') }}</option>
                                                            <option value="Cedula de ciudadania"
                                                                @if ( $candidate->tipos_de_documento == 'Cedula de ciudadania') selected @endif>
                                                                {{ __('cedula') }}</option>
                                                            <option value="Tarjeta de identidad"
                                                                @if ($candidate->tipos_de_documento  == 'Tarjeta de identidad') selected @endif>
                                                                {{ __('tarjeta_identidad') }}</option>
                                                            <option value="Cedula extranjera"
                                                                @if ($candidate->tipos_de_documento  == 'Cedula extranjera') selected @endif>
                                                                {{ __('cedula_extranjera') }}</option>
                                                            <option value="Pasaporte"
                                                                @if ($candidate->tipos_de_documento  == 'Pasaporte') selected @endif>
                                                                {{ __('pasaporte') }}</option>
                                                        </select>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('tipos_de_documento') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="numero_de_documento">{{ __('numero_de_documento') }}</label>
                                                        <input type="number" class="form-control" name="numero_de_documento"
                                                            id="numero_de_documento" value="{{ $candidate->numero_de_documento  }}" readonly>

                                                        <div class="invalid-feedback">
                                                            {{ __('numero_de_documento') }} {{ __('numero_de_documento') }}
                                                        </div>
                                                    </div>
                                                    {{-- {{ $tipo inscription }} --}}
                                                    <div class="form-group col-md-4">
                                                        <label for="tipo_inscripcion">{{ __('tipo_inscripcion') }} <span>*</span></label>
                                                        <select class="form-control" name="tipo_de_inscripcin" id="tipo_inscripcion" required disabled>
                                                            <option value="">{{ __('select') }}</option>
                                                            <option value="Primer semestre" @if ( $candidate->tipo_de_inscripcin == 'Primer semestre') selected @endif>{{ __('Primer semestre') }}</option>
                                                            <option value="Homologación externa" @if ( $candidate->tipo_de_inscripcin == 'Homologación externa') selected @endif>{{ __('Homologación externa') }}</option>
                                                            <option value="Homologación interna" @if ( $candidate->tipo_de_inscripcin == 'Homologación interna') selected @endif>{{ __('Homologación interna') }}</option>
                                                            <option value="Nivelación (Regencia de farmacia)" @if ( $candidate->tipo_de_inscripcin == 'Nivelación (Regencia de farmacia)') selected @endif>{{ __('Nivelación (Regencia de farmacia)') }}</option>
                                                         
                                                        </select>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('tipo_inscripcion') }}
                                                        </div>
                                                    </div> 
                                                    <div class="form-group col-md-4">
                                                        <label for="modalidad">{{ __('modalidad') }} <span>*</span></label>
                                                        <select class="form-control" name="modalidad" id="modalidad" required>
                                                            <option value="Pregrado" >{{ __('Pregrado') }}</option>
                                                            
                                                        </select>

                                                        <div class="invalid-feedback">
                                                            {{ __('modalidad') }} {{ __('modalidad') }}
                                                        </div>
                                                    </div> 
                                                    <div class="form-group col-md-4">
                                                        <label for="metodologia">{{ __('metodologia') }} <span>*</span></label>
                                                        <select class="form-control" name="metodologia" id="metodologia" required>
                                                            <option value="Presencial" >{{ __('presencial') }}</option>
                                                            <option value="Virtual">{{ __('virtual ') }}</option>
                                                        </select>

                                                        <div class="invalid-feedback">
                                                            {{ __('metodologia') }} {{ __('metodologia') }}
                                                        </div>
                                                    </div> 
                                                    {{-- {{ $periodo academico }} --}}
                                                    <div class="form-group col-md-4">
                                                        <label for="periodo_academico">{{ __('periodo_academico') }}
                                                            <span>*</span></label>
                                                        <input type="text" class="form-control" name="periodo_academico"
                                                            id="periodo_academico" value="{{ old('periodo_academico') }}" required placeholder="Ej: 20241 (AÑO+PERIODO)">

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('periodo_academico') }}
                                                        </div>
                                                    </div> 
                                                    
                                                    <div class="form-group col-md-4">
                                                        <label for="cubrimiento">{{ __('cubrimiento') }} <span>*</span></label>
                                                        <select class="form-control" name="metodologia" id="metodologia" required>
                                                            <option value="Bogotá - Cundinamarca (Colombia)" >{{ __('Bogotá - Cundinamarca (Colombia)') }}</option>
                                                        </select>

                                                        <div class="invalid-feedback">
                                                            {{ __('metodologia') }} {{ __('metodologia') }}
                                                        </div>
                                                    </div> 
                                                     {{-- {{ $programa academico }} --}}
                                                     
                                                     <div class="form-group col-md-4">
                                                        <label for="programa_acadmico">{{ __('programa_acadmico') }} <span>*</span></label>
                                                        <select class="form-control" name="programa_acadmico" id="programa_acadmico" required disabled>
                                                            <option value="">{{ __('select') }}</option>
                                                            <option @if ( $candidate->programa_acadmico == 'Tecnología en regencia de farmacia - presencial') selected @endif value="Tecnología en regencia de farmacia - presencial">{{ __('Tecnología en regencia de farmacia - presencial') }}</option>
                                                            <option @if ( $candidate->programa_acadmico == 'Tecnología en quimica industrial - presencial') selected @endif value="Tecnología en quimica industrial - presencial">{{ __('Tecnología en quimica industrial - presencial') }}</option>
                                                            <option @if ( $candidate->programa_acadmico == 'Tecnología en dirección comercial- presencial') selected @endif value="Tecnología en dirección comercial- presencial">{{ __('Tecnología en dirección comercial- presencial') }}</option>
                                                            <option @if ( $candidate->programa_acadmico == 'Tecnología en producción de música y audio - presencial') selected @endif value="Tecnología en producción de música y audio - presencial">{{ __('Tecnología en producción de música y audio - presencial') }}</option>
                                                            <option @if ( $candidate->programa_acadmico == 'Tecnico profesional en operación de sonido y grabación - presencial') selected @endif value="Tecnico profesional en operación de sonido y grabación - presencial">{{ __('Tecnico profesional en operación de sonido y grabación - presencial') }}</option>
                                                            <option @if ( $candidate->programa_acadmico == 'Tecnología en gestión de la seguridad y salud en el trabajo - virtual') selected @endif value="Tecnología en gestión de la seguridad y salud en el trabajo - virtual">{{ __('Tecnología en gestión de la seguridad y salud en el trabajo - virtual') }}</option>
                                                        </select>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('programa_acadmico') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="horario">{{ __('Horario') }} <span>*</span></label>
                                                        <select class="form-control" name="horario" id="horario" required>
                                                            <option value="Día" >{{ __('Día') }}</option>
                                                            <option value="Noche">{{ __('Noche ') }}</option>
                                                        </select>

                                                        <div class="invalid-feedback">
                                                            {{ __('horario') }} {{ __('horario') }}
                                                        </div>
                                                    </div> 
                                                    <div class="form-group col-md-4">
                                                        <label for="genero">{{ __('Genero') }} <span>*</span></label>
                                                        <select class="form-control" name="genero" id="genero" required>
                                                            <option value="Masculino" >{{ __('Masculino') }}</option>
                                                            <option value="Femenino">{{ __('Femenino ') }}</option>
                                                            <option value="Otro">{{ __('Otro ') }}</option>
                                                        </select>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('genero') }}
                                                        </div>
                                                    </div> 
                                                    {{-- {{ $Fecha de nacimiento }} --}}
                                                    <div class="form-group col-md-4">
                                                        <label for="fecha_nacimiento">{{ __('Fecha de nacimiento') }} <span>*</span></label>
                                                        <input type="date" class="form-control date" name="fecha_nacimiento" id="fecha_nacimiento"
                                                            value="{{ old('fecha_nacimiento') }}" required>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('fecha_nacimiento') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="nacionalidad">{{ __('Nacionalidad') }} <span>*</span></label>
                                                        <select class="form-control" name="nacionalidad" id="nacionalidad" required>
                                                            <option value="">{{ __('select') }}</option>
                                                            <option {{ old('nacionalidad') == 'Argentina' ? 'selected' : '' }} value="Argentina">{{ __('Argentina') }}</option>
                                                            <option {{ old('nacionalidad') == 'Bolivia' ? 'selected' : '' }} value="Bolivia">{{ __('Bolivia') }}</option>
                                                            <option {{ old('nacionalidad') == 'Brasil' ? 'selected' : '' }} value="Brasil">{{ __('Brasil') }}</option>
                                                            <option {{ old('nacionalidad') == 'Colombia' ? 'selected' : '' }} value="Colombia">{{ __('Colombia') }}</option>
                                                            <option {{ old('nacionalidad') == 'Chile' ? 'selected' : '' }} value="Chile">{{ __('Chile') }}</option>
                                                            <option {{ old('nacionalidad') == 'Ecuador' ? 'selected' : '' }} value="Ecuador">{{ __('Ecuador') }}</option>
                                                            <option {{ old('nacionalidad') == 'Peru' ? 'selected' : '' }} value="Peru">{{ __('Peru') }}</option>
                                                            <option {{ old('nacionalidad') == 'Venezuela' ? 'selected' : '' }} value="Venezuela">{{ __('Venezuela') }}</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('nacionalidad') }}
                                                        </div>
                                                    </div> 
                                                    <div class="form-group col-md-4">
                                                        <label for="ciudad_nacimiento">{{ __('Ciudad de nacimiento') }}
                                                            <span>*</span></label>
                                                        <input type="text" class="form-control" name="ciudad_nacimiento"
                                                            id="ciudad_nacimiento" value="{{ old('ciudad_nacimiento') }}" required>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('ciudad_nacimiento') }}
                                                        </div>
                                                    </div>
                                                    
                                                    {{-- {{ $Tipo de sangre }} --}}
                                                    <div class="form-group col-md-4">
                                                        <label for="blood_group">{{ __('field_blood_group') }}</label>
                                                        <select class="form-control" name="blood_group" id="blood_group">
                                                            <option value="">{{ __('select') }}</option>
                                                            <option value="1"
                                                                @if (old('blood_group') == 1) selected @endif>
                                                                {{ __('A+') }}</option>
                                                            <option value="2"
                                                                @if (old('blood_group') == 2) selected @endif>
                                                                {{ __('A-') }}</option>
                                                            <option value="3"
                                                                @if (old('blood_group') == 3) selected @endif>
                                                                {{ __('B+') }}</option>
                                                            <option value="4"
                                                                @if (old('blood_group') == 4) selected @endif>
                                                                {{ __('B-') }}</option>
                                                            <option value="5"
                                                                @if (old('blood_group') == 5) selected @endif>
                                                                {{ __('AB+') }}</option>
                                                            <option value="6"
                                                                @if (old('blood_group') == 6) selected @endif>
                                                                {{ __('AB-') }}</option>
                                                            <option value="7"
                                                                @if (old('blood_group') == 7) selected @endif>
                                                                {{ __('O+') }}</option>
                                                            <option value="8"
                                                                @if (old('blood_group') == 8) selected @endif>
                                                                {{ __('O-') }}</option>
                                                        </select>
    
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('field_blood_group') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="alergias">{{ __('Alergias a alguna sustancia o material') }} <span>*</span></label>
                                                        <select class="form-control" name="alergias" id="alergias" required>
                                                            <option value="">{{ __('select') }}</option>
                                                            <option value="Si" @if (old('alergias') == 'Si') selected @endif>
                                                                {{ __('Si') }}</option>
                                                            <option value="No" @if (old('alergias') == 'No') selected @endif>
                                                                {{ __('No') }}</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('alergias') }}
                                                        </div>
                                                    </div> 
                                                    <div class="form-group col-md-4">
                                                        <label for="marital_status">{{ __('field_marital_status') }}</label>
                                                        <select class="form-control" name="marital_status"
                                                            id="marital_status">
                                                            <option value="">{{ __('select') }}</option>
                                                            <option value="1"
                                                                @if (old('marital_status') == 1) selected @endif>
                                                                {{ __('marital_status_single') }}</option>
                                                            <option value="2"
                                                                @if (old('marital_status') == 2) selected @endif>
                                                                {{ __('marital_status_married') }}</option>
                                                            <option value="3"
                                                                @if (old('marital_status') == 3) selected @endif>
                                                                {{ __('marital_status_widowed') }}</option>
                                                            <option value="4"
                                                                @if (old('marital_status') == 4) selected @endif>
                                                                {{ __('marital_status_divorced') }}</option>
                                                            <option value="6"
                                                                @if (old('marital_status') == 6) selected @endif>
                                                                {{ __('marital_status_separado') }}</option>
    
                                                            <option value="7"
                                                                @if (old('marital_status') == 7) selected @endif>
                                                                {{ __('marital_status_religioso') }}</option>
    
                                                            <option value="8"
                                                                @if (old('marital_status') == 8) selected @endif>
                                                                {{ __('marital_status_union') }}</option>
                                                            <option value="5"
                                                                @if (old('marital_status') == 5) selected @endif>
                                                                {{ __('marital_status_other') }}</option>
    
                                                        </select>
    
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('field_marital_status') }}
                                                        </div>
                                                    </div>
                                                    {{-- eps --}}
                                                    <div class="form-group col-md-4">
                                                        <label for="eps">{{ __('Eps') }}</label>
                                                        <select class="form-control" name="eps" id="eps">
                                                            <option value="">{{ __('select') }}</option>
                                                            @foreach ( $eps as  $p)    
                                                                <option @if (old('eps') == $p->name ) selected @endif value="{{ $p->name }}">{{ $p->name }}</option>
                                                            @endforeach
                                                          
                                                        </select>
    
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('eps') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="libreta_militar">{{ __('Libreta militar') }}
                                                            </label>
                                                        <input type="text" class="form-control" name="libreta_militar"
                                                            id="libreta_militar" value="{{ old('libreta_militar') }}" required>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('libreta_militar') }}
                                                        </div>
                                                    </div>
                                                    {{-- direccion --}}
                                                    <div class="col-md-12">
                                                        <fieldset class="row ">
                                                            <legend>{{ __('field_permanent') }} {{ __('field_address') }}</legend>
            
                                                            @include('common.inc.permanent_province')
            
                                                            <div class="form-group col-md-4">
                                                                <label for="permanent_address">{{ __('field_address') }}<span>*</span></label>
                                                                <input type="text" class="form-control" name="permanent_address"
                                                                    id="permanent_address" value="{{ old('permanent_address') }}" required> 
            
                                                                <div class="invalid-feedback">
                                                                    {{ __('required_field') }} {{ __('field_address') }}
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    {{-- Colegio --}}
                                                    <legend>{{ __('tab_educational_info') }}</legend>
                                                    <div class="form-group col-md-6">
                                                        <label for="school_name">{{ __('Nombre de plantel educativo donde termino secundaria') }}</label>
                                                        <input type="text" class="form-control" name="school_name"
                                                            id="school_name" value="{{ old('school_name') }}">

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('field_school_name') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="titulo_obtenido">{{ __('Titulo obtenido') }}</label>
                                                        <input type="text" class="form-control" name="titulo_obtenido"
                                                            id="titulo_obtenido" value="{{ old('titulo_obtenido') }}">

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('titulo_obtenido') }}
                                                        </div>
                                                    </div>
                                                    {{-- Pruebas de estado --}}
                                                    <legend>{{ __('Pruebas de estado') }}</legend>
                                                    <div class="form-group col-md-3">
                                                        <label for="icfes_snp">{{ __('Número de SNP') }}
                                                            <span>*</span></label>
                                                        <input type="number" class="form-control" name="icfes_snp"
                                                            id="icfes_snp" value="{{ old('icfes_snp') }}" required>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('icfes_snp') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="icfes_date">{{ __('Fecha de presentación') }}
                                                            <span>*</span></label>
                                                        <input type="date" class="form-control date" name="icfes_date"
                                                            id="icfes_date"  value="{{ old('icfes_date') }}" required>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('icfes_date') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="icfes_type">{{ __('Tipo icfes') }}</label>
                                                        <select class="form-control" name="icfes_type" id="icfes_type">
                                                            <option value="">{{ __('select') }}</option>
                                                            <option @if (old('icfes_type') == 'presentado_2016_en_adelante') selected @endif value="presentado_2016_en_adelante">Presentado desde 2016 en adelante</option>
                                                            <option @if (old('icfes_type') == 'presentado_2014_2015') selected @endif value="presentado_2014_2015">Presentado entre 2014 y 2015</option>
                                                            <option @if (old('icfes_type') == 'presentado_2005_2013') selected @endif value="presentado_2005_2013">Presentado entre 2005 y 2013</option>
                                                            <option @if (old('icfes_type') == 'presentado_2004') selected @endif value="presentado_2004">Presentado en el 2004</option>
                                                            <option @if (old('icfes_type') == 'presentado_2000_2003') selected @endif value="presentado_2000_2003">Presentado entre el 2000 y 2003</option>
                                                            <option @if (old('icfes_type') == 'presentado_1999') selected @endif value="presentado_1999">Presentado antes 1999</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('icfes_type') }}
                                                        </div>     
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="first_name">{{ __('Copia resultados Saber 11') }}
                                                            <span>*</span></label>
                                                        <input type="file" class="form-control" name="icfes_file"
                                                            id="icfes_file" value="" required>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('icfes_file') }}
                                                        </div>
                                                    </div>

                                                    <div id="materias" style="display: none;">
                                                        <div class="materia presentado_2016_en_adelante" style="display: none;">
                                                            <div class="row">
                                                                <div class="form-group col-md-3">
                                                                    <label for="matematicas">{{ __('Matemáticas') }}<span>*</span></label>
                                                                    <input type="number" value="{{ old('matematicas_2016') }}" class="form-control" id="matematicas" name="matematicas_2016" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('matematicas') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="sociales">{{ __('Sociales y Ciudadanas ') }}<span>*</span></label>
                                                                    <input type="number" value="{{ old('sociales_2016') }}" class="form-control" id="sociales" name="sociales_2016" required>

                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('sociales') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                  
                                                                    <label for="lectura_critica">{{ __('Lectura Crítica') }}<span>*</span></label>
                                                                    <input type="number" value="{{ old('lectura_critica_2016') }}" class="form-control" id="lectura_critica" name="lectura_critica_2016" required>

                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('lectura_critica') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="ingles">{{ __('Inglés') }}<span>*</span></label>
                                                                    <input value="{{ old('ingles_2016') }}" type="number"  class="form-control" id="ingles" name="ingles_2016" required>

                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('ingles') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="ciencias_naturales">{{ __('Ciencias Naturales') }}<span>*</span></label>
                                                                    <input value="{{ old('ciencias_naturales_2016') }}" type="number" class="form-control" id="ciencias_naturales" name="ciencias_naturales_2016" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('ciencias_naturales') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="puntaje_total_1">{{ __('Puntaje Total') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="puntaje_total_1" name="puntaje_total_2016" value="{{ old('puntaje_total_2016') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('puntaje_total_1') }}
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="materia presentado_2014_2015" style="display: none;">
                                                            <div class="row">
                                                                <div class="form-group col-md-3">
                                                                    <label for="lectura_critica_2">{{ __('Lectura Crítica') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="lectura_critica_2" name="lectura_critica_2014" value="{{ old('lectura_critica_2014') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('lectura_critica_2') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="sociales_2">{{ __('Sociales y Ciudadanas') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="sociales_2" name="sociales_2014" value="{{ old('sociales_2014') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('sociales_2') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="matematicas_2">{{ __('Matemáticas') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="matematicas_2" name="matematicas_2014" value="{{ old('matematicas_2014') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('matematicas_2') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="razonamiento_cuantico_2">{{ __('Razonamiento Cuántico') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="razonamiento_cuantico_2" name="razonamiento_cuantico_2014" value="{{ old('razonamiento_cuantico_2014') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('razonamiento_cuantico_2') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="ingles_2">{{ __('Ingles') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="ingles_2" name="ingles_2014" value="{{ old('ingles_2014') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('ingles_2') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="competencias_ciudadanas_2">{{ __('Competencias Ciudadanas') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="competencias_ciudadanas_2" name="competencias_ciudadanas_2014" value="{{ old('competencias_ciudadanas_2014') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('competencias_ciudadanas_2') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="ciencias_naturales_2">{{ __('Ciencias Naturales') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="ciencias_naturales_2" name="ciencias_naturales_2014" value="{{ old('ciencias_naturales_2014') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('ciencias_naturales_2') }}
                                                                    </div>
                                                                </div>  
                                                                <div class="form-group col-md-3">
                                                                    <label for="puntaje_total_2">{{ __('Puntaje Total') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="puntaje_total_2" name="puntaje_total_2014" value="{{ old('puntaje_total_2014') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('puntaje_total_2') }}
                                                                    </div>
                                                                </div>    
                                                            </div>
                                                        </div>
                                                        <div class="materia presentado_2005_2013" style="display: none;">
                                                            <div class="row">
                                                                <div class="form-group col-md-3">
                                                                    <label for="biologia_3">{{ __('Biología') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="biologia_3" name="biologia_2005" value="{{ old('biologia_2005') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('biologia_3') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="fisica_3">{{ __('Física') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="fisica_3" name="fisica_2005" value="{{ old('fisica_2005') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('fisica_3') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="lenguaje_3">{{ __('Lenguaje') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="lenguaje_3" name="lenguaje_2005" value="{{ old('lenguaje_2005') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('lenguaje_3') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="quimica_3">{{ __('Quimica') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="quimica_3" name="quimica_2005" value="{{ old('quimica_2005') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('quimica_3') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="filosofia_3">{{ __('Filosofia') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="filosofia_3" name="filosofia_2005" value="{{ old('filosofia_2005') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('filosofia_3') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="interdiscipinlar_3">{{ __('Interdisciplinar') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="interdiscipinlar_3" name="interdiscipinlar_2005" value="{{ old('interdiscipinlar_2005') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('interdiscipinlar_3') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="ciencias_sociales_3">{{ __('Ciencias sociales') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="ciencias_sociales_3" name="ciencias_sociales_2005" value="{{ old('ciencias_sociales_2005') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('ciencias_sociales_3') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="matematicas_3">{{ __('Matemáticas') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="matematicas_3" name="matematicas_2005" value="{{ old('matematicas_2005') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('matematicas_3') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="ingles_3">{{ __('Ingles') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="ingles_3" name="ingles_2005" value="{{ old('ingles_2005') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('ingles_3') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="puntaje_total_6">{{ __('Puntaje Total') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="puntaje_total_3" name="puntaje_total_2005" value="{{ old('puntaje_total_2005') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('puntaje_total_6') }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="materia presentado_2004" style="display: none;">
                                                            <div class="row">
                                                                <div class="form-group col-md-3">
                                                                    <label for="biologia_4">{{ __('Biología') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="biologia_4" name="biologia_2004" value="{{ old('biologia_2004') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('biologia_4') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="ciencias_naturales_4">{{ __('Ciencias naturales') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="ciencias_naturales_4" name="ciencias_naturales_2004" value="{{ old('ciencias_naturales_2004') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('ciencias_naturales_4') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="ingles_4">{{ __('Ingles') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="ingles_4" name="ingles_2004" value="{{ old('ingles_2004') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('ingles_4') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="interdiscipinlar_4">{{ __('Interdisciplinar') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="interdiscipinlar_4" name="interdiscipinlar_2004" value="{{ old('interdiscipinlar_2004') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('interdiscipinlar_4') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="filosofia_4">{{ __('Filosofia') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="filosofia_4" name="filosofia_2004" value="{{ old('filosofia_2004') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('filosofia_4') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="lenguaje_4">{{ __('Lenguaje') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="lenguaje_4" name="lenguaje_2004" value="{{ old('lenguaje_2004') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('lenguaje_4') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="fisica_4">{{ __('Física') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="fisica_4" name="fisica_2004" value="{{ old('fisica_2004') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('fisica_4') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="puntaje_total_6">{{ __('Puntaje Total') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="puntaje_total_4" name="puntaje_total_2004" value="{{ old('puntaje_total_2004') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('puntaje_total_6') }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="materia presentado_2000_2003" style="display: none;">
                                                            <div class="row">
                                                                <div class="form-group col-md-3">
                                                                    <label for="matematicas_5">{{ __('Matemáticas') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="matematicas_5" name="matematicas_2000" value="{{ old('matematicas_2000') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('matematicas_5') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="ciencias_sociales_5">{{ __('Ciencias sociales') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="ciencias_sociales_5" name="ciencias_sociales_2000" value="{{ old('ciencias_sociales_2000') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('ciencias_sociales_5') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="lenguaje_5">{{ __('Lenguaje') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="lenguaje_5" name="lenguaje_2000" value="{{ old('lenguaje_2000') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('lenguaje_5') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="fisica_5">{{ __('Física') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="fisica_5" name="fisica_2000" value="{{ old('fisica_2000') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('fisica_5') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="biologia_5">{{ __('Biología') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="biologia_5" name="biologia_2000" value="{{ old('biologia_2000') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('biologia_5') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="quimica_5">{{ __('Quimica') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="quimica_5" name="quimica_2000" value="{{ old('quimica_2000') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('quimica_5') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="interdiscipinlar_5">{{ __('Interdisciplinar') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="interdiscipinlar_5" name="interdiscipinlar_2000" value="{{ old('interdiscipinlar_2000') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('interdiscipinlar_5') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="ingles_5">{{ __('Ingles') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="ingles_5" name="ingles_2000" value="{{ old('ingles_2000') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('ingles_5') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="filosofia_5">{{ __('Filosofia') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="filosofia_5" name="filosofia_2000" value="{{ old('filosofia_2000') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('filosofia_5') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="puntaje_total_6">{{ __('Puntaje Total') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="puntaje_total_5" name="puntaje_total_2000" value="{{ old('puntaje_total_2000') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('puntaje_total_6') }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="materia presentado_1999" style="display: none;">
                                                            <div class="row">
                                                                <div class="form-group col-md-3">
                                                                    <label for="puntaje_total_6">{{ __('Puntaje Total') }}<span>*</span></label>
                                                                    <input type="number" class="form-control" id="puntaje_total_6" name="puntaje_total_1999" value="{{ old('puntaje_total_1999') }}" required>
                                                                    <div class="invalid-feedback">
                                                                        {{ __('required_field') }} {{ __('puntaje_total_6') }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    {{-- Información familiar --}}
                                                    <legend>{{ __('Información familiar') }}</legend>
                                                    <div class="form-group col-md-6">
                                                        <label for="nombre_padre">{{ __('Nombre completo del padre') }}
                                                            <span>*</span></label>
                                                        <input type="text" class="form-control" name="nombre_padre"
                                                            id="nombre_padre" value="{{ old('nombre_padre') }}" required>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('nombre_padre') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="nombre_madre">{{ __('Nombre completo de la madre') }}
                                                            <span>*</span></label>
                                                        <input type="text" class="form-control" name="nombre_madre"
                                                            id="nombre_madre" value="{{ old('nombre_madre') }}" required>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('nombre_madre') }}
                                                        </div>
                                                    </div>
                                                    <legend>{{ __('Persona con la que convive') }}</legend>
                                                    <div class="form-group col-md-6">
                                                        <label for="nombre_convive">{{ __('Nombre completo') }}
                                                            <span>*</span></label>
                                                        <input type="text" class="form-control" name="nombre_convive"
                                                            id="nombre_convive" value="{{ old('nombre_convive') }}" required>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('nombre_convive') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="convive_type">{{ __('Tipo de relación') }}</label>
                                                        <select class="form-control" name="convive_type" id="convive_type">
                                                            <option value="">{{ __('select') }}</option>
                                                            <option @if (old('convive_type') == 'Padre') selected @endif value="Padre">{{ __('Padre') }}</option>
                                                            <option @if (old('convive_type') == 'Madre') selected @endif value="Madre">{{ __('Madre') }}</option>
                                                            <option @if (old('convive_type') == 'Acudiente') selected @endif value="Acudiente">{{ __('Acudiente') }}</option>
                                                            <option @if (old('convive_type') == 'Conyugue') selected @endif value="Conyugue">{{ __('Conyugue') }}</option>
                                                            <option @if (old('convive_type') == 'Pareja') selected @endif value="Pareja">{{ __('Pareja') }}</option>
                                                            <option @if (old('convive_type') == 'Otro') selected @endif value="Otro">{{ __('Otro') }}</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('convive_type') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="convive_document">{{ __('Tipo de documento') }}</label>
                                                        <select class="form-control" name="convive_document" id="convive_document">
                                                            
                                                            <option @if (old('convive_document') == 'Cedula de ciudadania') selected @endif value="Cedula de ciudadania">{{ __('Cedula de ciudadania') }}</option>
                                                            <option @if (old('convive_document') == 'Cedula Extranjera') selected @endif value="Cedula Extranjera">{{ __('Cedula Extranjera') }}</option>
                                                            <option @if (old('convive_document') == 'Pasaporte') selected @endif value="Pasaporte">{{ __('Pasaporte') }}</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('convive_document') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="document_convive">{{ __('Número de documento') }}
                                                            <span>*</span></label>
                                                        <input type="number" class="form-control" name="document_convive"
                                                            id="document_convive" value="{{ old('document_convive') }}" value="" required>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('document_convive') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="tel_convive">{{ __('Número de teléfono') }}
                                                            <span>*</span></label>
                                                        <input type="number" class="form-control" name="tel_convive"
                                                            id="tel_convive" value="{{ old('tel_convive') }}" required>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('tel_convive') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="email_convive">{{ __('Correo electronico') }}
                                                            <span>*</span></label>
                                                        <input type="email" class="form-control" name="email_convive"
                                                            id="email_convive" value="{{ old('email_convive') }}" required>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('email_convive') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="ocupacion_convive">{{ __('Ocupación') }}
                                                            <span>*</span></label>
                                                        <input type="text" class="form-control" name="ocupacion_convive"
                                                            id="ocupacion_convive" value="{{ old('ocupacion_convive') }}" required>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('ocupacion_convive') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="convive_estudio">{{ __('Nivel de estudio') }}</label>
                                                        <select class="form-control" name="convive_estudio" id="convive_estudio">
                                                            <option  value="">{{ __('select') }}</option>
                                                            <option @if (old('convive_estudio') == 'Técnico') selected @endif value="Técnico">{{ __('Técnico') }}</option>
                                                            <option @if (old('convive_estudio') == 'Técnologo') selected @endif value="Técnologo">{{ __('Técnologo') }}</option>
                                                            <option @if (old('convive_estudio') == 'Pasaporte') selected @endif value="Pasaporte">{{ __('Pasaporte') }}</option>
                                                            <option @if (old('convive_estudio') == 'Profesional') selected @endif value="Profesional">{{ __('Profesional') }}</option>
                                                            <option @if (old('convive_estudio') == 'Empirico') selected @endif value="Empirico">{{ __('Empirico') }}</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('convive_estudio') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="ciudad_trabajo__convive">{{ __('Ciudad de trabajo') }}
                                                            <span>*</span></label>
                                                        <input type="text" class="form-control" name="ciudad_trabajo__convive"
                                                            id="ciudad_trabajo__convive" value="{{ old('ciudad_trabajo__convive') }}" required>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('ciudad_trabajo__convive') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="sitio_trabajo__convive">{{ __('Sitio de trabajo') }}
                                                            <span>*</span></label>
                                                        <input type="text" class="form-control" name="sitio_trabajo__convive"
                                                            id="sitio_trabajo__convive" value="{{ old('sitio_trabajo__convive') }}" required>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('sitio_trabajo__convive') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="telefono_trabajo__convive">{{ __('Teléfono del trabajo') }}
                                                            <span>*</span></label>
                                                        <input type="text" class="form-control" name="telefono_trabajo__convive"
                                                            id="telefono_trabajo__convive" value="{{ old('telefono_trabajo__convive') }}" required>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('telefono_trabajo__convive') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="direccion_trabajo__convive">{{ __('Dirección del trabajo') }}
                                                            <span>*</span></label>
                                                        <input type="text" class="form-control" name="direccion_trabajo__convive"
                                                            id="direccion_trabajo__convive" value="{{ old('direccion_trabajo__convive') }}" required>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('direccion_trabajo__convive') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="cargo_convive">{{ __('Cargo') }}
                                                            <span>*</span></label>
                                                        <input type="text" class="form-control" name="cargo_convive"
                                                            id="cargo_convive" value="{{ old('cargo_convive') }}"required>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('cargo_convive') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="profesion_convive">{{ __('Profesión') }}
                                                            <span>*</span></label>
                                                        <input type="text" class="form-control" name="profesion_convive"
                                                            id="profesion_convive" value="{{ old('profesion_convive') }}" required>

                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('profesion_convive') }}
                                                        </div>
                                                    </div>

                                                    

                                                    {{-- Factor socioeconimico --}}
                                                    <legend>{{ __('Factor socioeconimico') }}</legend>
                                                    <div class="form-group col-md-6">
                                                        <label for="cash_month">{{ __('¿Cuál es la cantidad mensual de dinero que recibe su núcleo familiar?') }}</label>
                                                        <select class="form-control" name="cash_month" id="cash_month">
                                                            <option value="">{{ __('select') }}</option>
                                                            <option @if (old('cash_month') == 'Entre 500.000 Y 1.000.000') selected @endif value="Entre 500.000 Y 1.000.000">{{ __('Entre 500.000 Y 1.000.000') }}</option>
                                                            <option @if (old('cash_month') == 'Entre 1.00.001 Y 3.000.000') selected @endif value="Entre 1.00.001 Y 3.000.000">{{ __('Entre 1.00.001 Y 3.000.000') }}</option>
                                                            <option @if (old('cash_month') == 'Entre 3.000.001 Y 5.000.000') selected @endif value="Entre 3.000.001 Y 5.000.000">{{ __('Entre 3.000.001 Y 5.000.000') }}</option>
                                                            <option @if (old('cash_month') == 'Mas de 5.000.000') selected @endif value="Mas de 5.000.000">{{ __('Mas de 5.000.000') }}</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('cash_month') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="economic">{{ __('Los ingresos para financiar su educación son:') }}</label>
                                                        <select class="form-control" name="economic" id="economic">
                                                            <option value="">{{ __('select') }}</option>
                                                            <option @if (old('economic') == 'Empresariales') selected @endif value="Empresariales">{{ __('Empresariales') }}</option>
                                                            <option @if (old('economic') == 'Personales') selected @endif value="Personales">{{ __('Personales') }}</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('economic') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="economic_person">{{ __('¿Tiene personas a cargo económicamente?') }}</label>
                                                        <select class="form-control" name="economic_person" id="economic_person">
                                                            <option value="">{{ __('select') }}</option>
                                                            <option @if (old('economic_person') == 'No') selected @endif value="No">{{ __('No') }}</option>
                                                            <option @if (old('economic_person') == 'Si') selected @endif value="Si">{{ __('Si') }}</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('economic_person') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="personal_economic">{{ __('Si usted labora,¿Cuántos son sus ingresos mensuales?') }}</label>
                                                        <select class="form-control" name="personal_economic" id="personal_economic">
                                                            <option value="">{{ __('select') }}</option>
                                                            <option @if (old('personal_economic') == 'No laboro') selected @endif value="No laboro">{{ __('No laboro') }}</option>
                                                            <option @if (old('personal_economic') == 'Entre 500.000 Y 1.000.000') selected @endif value="Entre 500.000 Y 1.000.000">{{ __('Entre 500.000 Y 1.000.000') }}</option>
                                                            <option @if (old('personal_economic') == 'Entre 1.00.001 Y 3.000.000') selected @endif value="Entre 1.00.001 Y 3.000.000">{{ __('Entre 1.00.001 Y 3.000.000') }}</option>
                                                            <option @if (old('personal_economic') == 'Entre 3.000.001 Y 5.000.000') selected @endif value="Entre 3.000.001 Y 5.000.000">{{ __('Entre 3.000.001 Y 5.000.000') }}</option>
                                                            <option @if (old('personal_economic') == 'Mas de 5.000.000') selected @endif value="Mas de 5.000.000">{{ __('Mas de 5.000.000') }}</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            {{ __('required_field') }} {{ __('personal_economic') }}
                                                        </div>
                                                    </div>
                                                    
                                                    <input type="text" value=" {{ $candidate->id}}" style="display: none" name="id">
                                                    



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

        
        @include('admin.layouts.common.footer_script')
        <script>
            document.getElementById('icfes_type').addEventListener('change', function() {
                const selectedValue = this.value;
                const materiasDiv = document.getElementById('materias');
                
                // Ocultar todas las materias primero
                materiasDiv.style.display = 'none';
                const allMaterias = document.querySelectorAll('.materia');
                allMaterias.forEach(materia => materia.style.display = 'none');
        
                if (selectedValue) {
                    materiasDiv.style.display = 'block';
                    const selectedMaterias = document.querySelectorAll(`.materia.${selectedValue}`);
                    selectedMaterias.forEach(materia => materia.style.display = 'block');
                }
            });
        </script>
    </body>
    {{--  --}}
</html>

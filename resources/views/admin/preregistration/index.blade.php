@extends('admin.layouts.master')
@section('title', $title)
@section('content')


<div class="main-body">
    <div class="page-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $title }} {{ __('list') }}</h5>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <table id="basic-table" class="display table nowrap table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('field_interesting_date') }}</th>
                                        <th>{{ __('Primer nombre') }}</th>
                                        <th>{{ __('Segundo nombre') }}</th>
                                        <th>{{ __('Primer apellido') }}</th>
                                        <th>{{ __('Segundo apellido') }}</th>
                                        <th>{{ __('field_document_type') }}</th>
                                        <th>{{ __('field_document_number') }}</th>

                                        <th>{{ __('expedition_date') }}</th>

                                        <th>{{ __('municipio_location') }}</th>
                                        <th>{{ __('departamento_location') }}</th>
                                        <th>{{ __('cell_phone_number') }}</th>
                                        <th>{{ __('field_email') }}</th>
                                        <th>{{ __('academic_program') }}</th>
                                        <th>{{ __('interest') }}</th>
                                        <th>{{ __('field_status') }}</th>
                                        <th>{{ __('field_action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach( $rows as $key => $row )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $row->fecha_de_inters }}</td>
                                        <td>{{ $row->primer_nombre }}</td>
                                        <td>{{ $row->segundo_nombre }}</td>
                                        <td>{{ $row->primer_apellido }}</td>
                                        <td>{{ $row->segundo_apellido }}</td>
                                        <td>{{ $row->tipos_de_documento }}</td>
                                        <td>{{ $row->numero_de_documento }}</td>
                                        <td>{{ $row->fecha_de_expedicion }}</td>
                                        <td>{{ $row->ciudad_de_expedicion }}</td>
                                        <td>{{ $row->departamento }}</td>
                        
                                        <td>{{ $row->numero_celular_de_contacto }}</td>
                                        <td>{{ $row->correo_electrnico }}</td>
                                        <td>{{ $row->programa_acadmico }}</td>
                                        <td>{{ $row->por_que_le_interesa_esta_programa_acadmico }}</td>
                                        <td>
                                            @if( $row->status == 1 || $row->status == '' || $row->status == null )
                                            <span class="badge badge-pill badge-primary">{{ __('Preinscrito') }}</span>
                                            @elseif ( $row->status == 2 )
                                            <span class="badge badge-pill badge-warning">{{ __('Entrevista') }}</span>
                                            @elseif ( $row->status == 3 )
                                            <span class="badge badge-pill badge-success">{{ __('Aceptado') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                           
                                            <a href="{{ route($route.'.view', $row->id) }}" class="btn btn-icon btn-success btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            @can($access.'-edit')
                                            <button type="button" class="btn btn-icon btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal-{{ $row->id }}">
                                                <i class="far fa-edit"></i>
                                            </button>
                                        
                                            @include($view.'.edit')
                                            @endcan
                                        </td>
                                      
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
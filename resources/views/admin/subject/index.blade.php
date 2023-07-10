@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $title }} {{ __('list') }}</h5>
                    </div>
                    <div class="card-block">
                        @can($access.'-create')
                        <a href="{{ route($route.'.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> {{ __('btn_add_new') }}</a>
                        @endcan

                        <a href="{{ route($route.'.index') }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>
                    </div>

                    <div class="card-block">
                        <form class="needs-validation" novalidate method="get" action="{{ route($route.'.index') }}">
                            <div class="row gx-2">
                                <div class="form-group col-md-3">
                                    <label for="faculty">{{ __('field_faculty') }} <span>*</span></label>
                                    <select class="form-control faculty" name="faculty" id="faculty" required>
                                        <option value="0">{{ __('all') }}</option>
                                        @foreach( $faculties->sortBy('title') as $faculty )
                                        <option value="{{ $faculty->id }}" @if( $selected_faculty == $faculty->id ) selected @endif>{{ $faculty->title }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                        {{ __('required_field') }} {{ __('field_faculty') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="program">{{ __('field_program') }} <span>*</span></label>
                                    <select class="form-control program" name="program" id="program" required>
                                        <option value="0">{{ __('all') }}</option>
                                        @isset($programs)
                                        @foreach($programs->sortBy('title') as $program)
                                        <option value="{{ $program->id }}" @if( $selected_program == $program->id ) selected @endif>{{ $program->title }}</option>
                                        @endforeach
                                        @endisset
                                    </select>

                                    <div class="invalid-feedback">
                                        {{ __('required_field') }} {{ __('field_program') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="subject_type">{{ __('field_subject_type') }}</label>
                                    <select class="form-control" name="subject_type" id="subject_type">
                                        <option value="">{{ __('all') }}</option>
                                        <option value="1" @if( $selected_subject_type == 1 ) selected @endif>{{ __('subject_type_compulsory') }}</option>
                                        <option value="2" @if( $selected_subject_type == 2 ) selected @endif>{{ __('subject_type_optional') }}</option>
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_subject_type') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="class_type">{{ __('field_class_type') }}</label>
                                    <select class="form-control" name="class_type" id="class_type">
                                        <option value="">{{ __('all') }}</option>
                                        <option value="1" @if( $selected_class_type == 1 ) selected @endif>{{ __('class_type_theory') }}</option>
                                        <option value="2" @if( $selected_class_type == 2 ) selected @endif>{{ __('class_type_practical') }}</option>
                                        <option value="3" @if( $selected_class_type == 3 ) selected @endif>{{ __('class_type_both') }}</option>
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_class_type') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="submit" class="btn btn-info btn-filter"><i class="fas fa-search"></i> {{ __('btn_filter') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="card-block">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table id="export-table" class="display table nowrap table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('field_title') }}</th>
                                        <th>{{ __('field_code') }}</th>
                                        <th>{{ __('field_credit_hour_short') }}</th>
                                        <th>{{ __('field_subject_type') }}</th>
                                        <th>{{ __('field_class_type') }}</th>
                                        <th>{{ __('field_program') }}</th>
                                        <th>{{ __('field_status') }}</th>
                                        <th>{{ __('field_action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach( $rows as $key => $row )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $row->title }}</td>
                                        <td>{{ $row->code }}</td>
                                        <td>{{ $row->credit_hour }}</td>
                                        <td>
                                            @if( $row->subject_type == 1 )
                                            {{ __('subject_type_compulsory') }}
                                            @elseif( $row->subject_type == 0 )
                                            {{ __('subject_type_optional') }}
                                            @endif
                                        </td>
                                        <td>
                                            @if( $row->class_type == 1 )
                                            {{ __('class_type_theory') }}
                                            @elseif( $row->class_type == 2 )
                                            {{ __('class_type_practical') }}
                                            @elseif( $row->class_type == 3 )
                                            {{ __('class_type_both') }}
                                            @endif
                                        </td>
                                        <td>
                                            @foreach($row->programs->sortBy('title') as $program)
                                                <span class="badge badge-info">{{ $program->title }}</span>
                                                <br/>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if( $row->status == 1 )
                                            <span class="badge badge-pill badge-success">{{ __('status_active') }}</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">{{ __('status_inactive') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @can($access.'-edit')
                                            <a href="{{ route($route.'.edit', $row->id) }}" class="btn btn-icon btn-primary btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            @endcan

                                            @can($access.'-delete')
                                            <button type="button" class="btn btn-icon btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $row->id }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            <!-- Include Delete modal -->
                                            @include('admin.layouts.inc.delete')
                                            @endcan
                                        </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- [ Data table ] end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection

@section('page_js')
<script type="text/javascript">
"use strict";
$(".faculty").on('change',function(e){
    e.preventDefault();
    var program=$(".program");
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type:'POST',
      url: "{{ route('filter-program') }}",
      data:{
        _token:$('input[name=_token]').val(),
        faculty:$(this).val()
      },
      success:function(response){
          // var jsonData=JSON.parse(response);
          $('option', program).remove();
          $('.program').append('<option value="0">{{ __("all") }}</option>');
          $.each(response, function(){
            $('<option/>', {
              'value': this.id,
              'text': this.title
            }).appendTo('.program');
          });
        }

    });
  });
</script>
@endsection
@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ Card ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('modal_add') }} / {{ __('modal_edit') }} {{ $title }}</h5>
                    </div>
                    <div class="card-block">
                        <a href="{{ route($route.'.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> {{ __('btn_back') }}</a>

                        <a href="{{ route($route.'.create') }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>
                    </div>

                    <div class="card-block">
                        <form class="needs-validation" novalidate method="get" action="{{ route($route.'.create') }}">
                            <div class="row gx-2">
                                @include('common.inc.common_search_filter')

                                <div class="form-group col-md-3">
                                    <button type="submit" class="btn btn-info btn-filter"><i class="fas fa-search"></i> {{ __('btn_filter') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    @isset($rows)
                    @php
                    $weekdays = array('1', '2', '3', '4', '5', '6', '7');
                    @endphp
                    <ul class="nav nav-pills mb-3 card-block" id="myTab" role="tablist">

                        @foreach($weekdays as $weekday)
                        <li class="nav-item">
                            <a class="nav-link @if($weekday == 1) active @endif text-uppercase" id="day{{ $weekday }}-tab" data-bs-toggle="tab" href="#day{{ $weekday }}" role="tab" aria-controls="day{{ $weekday }}" aria-selected="true">
                                @if( $weekday == 1 )
                                {{ __('day_saturday') }}
                                @elseif( $weekday == 2 )
                                    {{ __('day_sunday') }}
                                @elseif( $weekday == 3 )
                                    {{ __('day_monday') }}
                                @elseif( $weekday == 4 )
                                    {{ __('day_tuesday') }}
                                @elseif( $weekday == 5 )
                                    {{ __('day_wednesday') }}
                                @elseif( $weekday == 6 )
                                    {{ __('day_thursday') }}
                                @elseif( $weekday == 7 )
                                    {{ __('day_friday') }}
                                @endif
                            </a>
                        </li>
                        @endforeach

                    </ul>
                    <div class="tab-content" id="myTabContent">

                        @foreach($weekdays as $weekday)
                        <div class="tab-pane fade @if($weekday == 1) show active @endif" id="day{{ $weekday }}" role="tabpanel" aria-labelledby="day{{ $weekday }}-tab">
                            <div class="">
                                <div class="row">
                                    <div class="col-md-12">
                                    <form class="needs-validation" novalidate action="{{ route($route.'.store') }}" method="post" id="fields" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="program" value="{{ $selected_program }}" hidden>
                                    <input type="text" name="session" value="{{ $selected_session }}" hidden>
                                    <input type="text" name="semester" value="{{ $selected_semester }}" hidden>
                                    <input type="text" name="section" value="{{ $selected_section }}" hidden>
                                    <input type="text" name="day" value="{{ $weekday }}" hidden>
                                    @forelse($rows->where('day', $weekday) as $row)
                                        @include('admin.class-routine.form_edit_field')
                                    @empty
                                        @include('admin.class-routine.form_field')
                                    @endforelse
                                    <div id="newField-tab-{{ $weekday }}" class="clearfix"></div>
                                    <div class="card-block">
                                        <button id="addField" type="button" class="btn btn-info" data-bs-tab="tab-{{ $weekday }}"><i class="fas fa-plus"></i> {{ __('btn_add_new') }}</button>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> {{ __('btn_save') }}</button>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    @endisset
                </div>
            </div>
            <!-- [ Card ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection

@section('page_js')
<script type="text/javascript">
    (function ($) {
        "use strict";
        // add Field
        $(document).on('click', '#addField', function () {
            var tab = $(this).attr('data-bs-tab');
            var html = '';
            html += '<hr/>';
            html += '<div id="inputFormField" class="card-block">';
            html += '<div class="row">';
            html += '<div class="form-group col-md-2"><label for="subject">{{ __('field_subject') }} <span>*</span></label><select class="form-control select2" name="subject[]" id="subject" required><option value="">{{ __('select') }}</option> @isset($subjects) @foreach( $subjects as $subject ) <option value="{{ $subject->id }}">{{ $subject->code }} - {{ $subject->title }}</option> @endforeach @endisset </select> <div class="invalid-feedback"> {{ __('required_field') }} {{ __('field_subject') }}</div></div>';
            html += '<div class="form-group col-md-2"><label for="teacher">{{ __('field_teacher') }} <span>*</span></label> <select class="form-control select2" name="teacher[]" id="teacher"><option value="">{{ __('select') }}</option> @isset($teachers) @foreach( $teachers as $teacher ) <option value="{{ $teacher->id }}">{{ $teacher->staff_id }} - {{ $teacher->first_name }} {{ $teacher->last_name }}</option> @endforeach @endisset </select> <div class="invalid-feedback"> {{ __('required_field') }} {{ __('field_teacher') }} </div> </div>';
            html += '<div class="form-group col-md-2"> <label for="room">{{ __('field_room') }} {{ __('field_no') }} <span>*</span></label> <select class="form-control select2" name="room[]" id="room" required> <option value="">{{ __('select') }}</option> @isset($rooms) @foreach( $rooms as $room ) <option value="{{ $room->id }}">{{ $room->title }}</option> @endforeach @endisset </select> <div class="invalid-feedback"> {{ __('required_field') }} {{ __('field_room') }} {{ __('field_no') }} </div> </div>';
            html += '<div class="form-group col-md-2"> <label for="start_time">{{ __('field_time') }} {{ __('field_from') }} <span>*</span></label><input type="time" class="form-control time" name="start_time[]" id="start_time" required><div class="invalid-feedback"> </div></div>';
            html += '<div class="form-group col-md-2"> <label for="end_time">{{ __('field_time') }} {{ __('field_to') }} <span>*</span></label> <input type="time" class="form-control time" name="end_time[]" id="end_time" required> <div class="invalid-feedback"> {{ __('required_field') }} {{ __('field_time') }} {{ __('field_to') }} </div> </div>';
            html += '<div class="form-group col-md-2"><button id="removeField" type="button" class="btn btn-danger btn-filter"><i class="fas fa-trash-alt"></i> {{ __('btn_remove') }}</button></div>';
            html += '</div>';

            $('#newField-'+tab).append(html);

            // Time Picker
            $('.time').bootstrapMaterialDatePicker({
                date: false,
                shortTime: true,
                format: 'HH:mm'
            });
        });

        // remove Field
        $(document).on('click', '#removeField', function () {
            $(this).closest('#inputFormField').remove();

            // Time Picker
            $('.time').bootstrapMaterialDatePicker({
                date: false,
                shortTime: true,
                format: 'HH:mm'
            });
        });
    }(jQuery));


    // Delete Routine
    function deleteRoutine(id) {
        $("#deleteRoutine-"+id).hide();
        $("#delete_routine-"+id).attr("checked", "checked");
    }
</script>
@endsection
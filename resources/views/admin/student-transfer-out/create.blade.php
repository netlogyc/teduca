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
                        <h5>{{ __('modal_add') }} {{ $title }}</h5>
                    </div>
                    <div class="card-block">
                        <a href="{{ route($route.'.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> {{ __('btn_back') }}</a>

                        <a href="{{ route($route.'.create') }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>
                    </div>

                    <div class="card-block">
                        <form class="needs-validation" novalidate method="get" action="{{ route($route.'.create') }}">
                            <div class="row gx-2">
                                <div class="form-group col-md-3">
                                    <label for="student">{{ __('field_student_id') }} <span>*</span></label>
                                    <select class="form-control select2" name="student" id="student" required>
                                        <option value="">{{ __('select') }}</option>
                                        @foreach($students as $student)
                                        <option value="{{ $student->student_id }}" @if($selected_student == $student->student_id) selected @endif>{{ $student->student_id }} - {{ $student->first_name }} {{ $student->last_name }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_student_id') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <button type="submit" class="btn btn-info btn-filter"><i class="fas fa-search"></i> {{ __('btn_search') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-block">
                        @if(isset($row))
                        @php
                            $enroll = \App\Models\Student::enroll($row->id);
                        @endphp

                        @php
                            $total_credits = 0;
                            $total_cgpa = 0;
                        @endphp
                        @foreach( $row->studentEnrolls as $key => $item )

                            @if(isset($item->subjectMarks))
                            @foreach($item->subjectMarks as $mark)

                                @php
                                $marks_per = round($mark->total_marks);
                                @endphp

                                @foreach($grades as $grade)
                                @if($marks_per >= $grade->min_mark && $marks_per <= $grade->max_mark)
                                @php
                                if($grade->point > 0){
                                $total_cgpa = $total_cgpa + ($grade->point * $mark->subject->credit_hour);
                                $total_credits = $total_credits + $mark->subject->credit_hour;
                                }
                                @endphp
                                @break
                                @endif
                                @endforeach

                            @endforeach
                            @endif

                        @endforeach

                        <!-- Transfer Form -->
                        @if($row->status == '3')
                        <div class="text-center text-danger mb-5">{{ __('msg_the_student_already_transfered') }}!</div>
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <fieldset class="row gx-2 scheduler-border">
                                    <legend>{{ __('field_personal_info') }}</legend>
                                    <p><mark class="text-primary">{{ __('field_student_id') }}:</mark> #{{ $row->student_id }}</p>
                                    <hr/>

                                    <p><mark class="text-primary">{{ __('field_name') }}:</mark> {{ $row->first_name }} {{ $row->last_name }}</p>
                                    <hr/>

                                    <p><mark class="text-primary">{{ __('field_gender') }}:</mark> 
                                        @if( $row->gender == 1 )
                                        {{ __('gender_male') }}
                                        @elseif( $row->gender == 2 )
                                        {{ __('gender_female') }}
                                        @elseif( $row->gender == 3 )
                                        {{ __('gender_other') }}
                                        @endif
                                    </p><hr/>

                                    <p><mark class="text-primary">{{ __('field_total_credit_hour') }}:</mark> {{ round($total_credits, 2) }}</p>
                                    <hr/>

                                    <p><mark class="text-primary">{{ __('field_cumulative_gpa') }}:</mark> 
                                        @php
                                        if($total_credits <= 0){
                                            $total_credits = 1;
                                        }
                                        $com_gpa = $total_cgpa / $total_credits;
                                        echo number_format((float)$com_gpa, 2, '.', '');
                                        @endphp
                                    </p>
                                    <hr/>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset class="row gx-2 scheduler-border">
                                    <legend>{{ __('field_academic_information') }}</legend>
                                    <p><mark class="text-primary">{{ __('field_batch') }}:</mark> {{ $row->batch->title ?? '' }}</p><hr/>

                                    <p><mark class="text-primary">{{ __('field_program') }}:</mark> {{ $row->program->title ?? '' }}</p><hr/>

                                    <p><mark class="text-primary">{{ __('field_session') }}:</mark> {{ $enroll->session->title ?? '' }}</p><hr/>

                                    <p><mark class="text-primary">{{ __('field_semester') }}:</mark> {{ $enroll->semester->title ?? '' }}</p><hr/>

                                    <p><mark class="text-primary">{{ __('field_section') }}:</mark> {{ $enroll->section->title ?? '' }}</p><hr/>
                                </fieldset>
                            </div>
                        </div>

                        @if($row->status != 3)
                        <form class="needs-validation" novalidate action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="student">{{ __('field_student_id') }} <span>*</span></label>
                                    <input type="text" class="form-control" name="student" id="student" value="{{ $row->student_id }}" readonly required>

                                    <div class="invalid-feedback">
                                    {{ __('required_field') }} {{ __('field_student_id') }}
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="transfer_id">{{ __('field_transfer_id') }} <span>*</span></label>
                                    <input type="text" class="form-control autonumber" name="transfer_id" id="transfer_id" value="{{ old('transfer_id') }}" required>

                                    <div class="invalid-feedback">
                                    {{ __('required_field') }} {{ __('field_transfer_id') }}
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="university_name">{{ __('field_university_name') }} <span>*</span></label>
                                    <input type="text" class="form-control" name="university_name" id="university_name" value="{{ old('university_name') }}" required>

                                    <div class="invalid-feedback">
                                    {{ __('required_field') }} {{ __('field_university_name') }}
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="date">{{ __('field_date') }} <span>*</span></label>
                                    <input type="date" class="form-control date" name="date" id="date" value="{{ date('Y-m-d') }}" required>

                                    <div class="invalid-feedback">
                                    {{ __('required_field') }} {{ __('field_date') }}
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="status">{{ __('field_status') }}</label>
                                    <select class="form-control select2" name="statuses[]" id="status" multiple required>
                                        @foreach( $statuses as $status )
                                        <option value="{{ $status->id }}" @foreach($row->statuses as $stat) {{ $stat->id == $status->id ? 'selected' : '' }} @endforeach>{{ $status->title }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                    {{ __('required_field') }} {{ __('field_status') }}
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="note">{{ __('field_note') }}</label>
                                    <textarea class="form-control" name="note" id="note" value="{{ __('note') }}"></textarea>

                                    <div class="invalid-feedback">
                                    {{ __('required_field') }} {{ __('field_note') }}
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmModal">
                                        <i class="fas fa-check"></i> {{ __('btn_save') }}
                                    </button>
                                    <!-- Include Confirm modal -->
                                    @include($view.'.confirm')
                                </div>
                            </div>
                        </form>
                        @endif

                        @else
                        @if(isset($selected_student))
                        <div class="text-center text-danger mb-5">{{ __('msg_student_id_does_not_match') }}</div>
                        @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection
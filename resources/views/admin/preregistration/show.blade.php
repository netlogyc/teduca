@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            {{-- <div class="col-md-4">
                <div class="card">
                      @php $student = $row; @endphp
                      @php
                        $curr_enroll = \App\Models\Student::enroll($row->id);
                      @endphp

                      @if(is_file('uploads/'.$path.'/'.$row->photo))
                      <img src="{{ asset('uploads/'.$path.'/'.$row->photo) }}" class="card-img-top img-fluid profile-thumb" alt="{{ __('field_photo') }}" onerror="this.src='{{ asset('dashboard/images/user/avatar-2.jpg') }}';">
                      @else
                      <img src="{{ asset('dashboard/images/user/avatar-2.jpg') }}" class="card-img-top img-fluid profile-thumb" alt="{{ __('field_photo') }}">
                      @endif

                  <div class="card-header">
                    <h5 class="card-title">{{ $row->first_name }} {{ $row->last_name }}</h5>
                  </div>
                  <ul class="list-group list-group-flush">
                    @if(isset($row->student_id))
                    <li class="list-group-item"><mark class="text-primary">{{ __('field_student_id') }}</mark> : #{{ $row->student_id }}</li>
                    @endif
                    @if(isset($row->registration_no))
                    <li class="list-group-item"><mark class="text-primary">{{ __('field_registration_no') }}</mark> : #{{ $row->registration_no }}</li>
                    @endif

                    <li class="list-group-item"><mark class="text-primary">{{ __('field_batch') }}</mark> : {{ $row->batch->title ?? '' }}</li>
                    <li class="list-group-item"><mark class="text-primary">{{ __('field_program') }}</mark> : {{ $row->program->title ?? '' }}</li>
                    <li class="list-group-item"><mark class="text-primary">{{ __('field_phone') }}</mark> : {{ $row->phone }}</li>
                    <li class="list-group-item"><mark class="text-primary">{{ __('field_email') }}</mark> : {{ $row->email }}</li>

                    <li class="list-group-item"><mark class="text-primary">{{ __('field_admission_date') }}</mark> : 
                        @if(isset($setting->date_format))
                        {{ date($setting->date_format, strtotime($row->admission_date)) }}
                        @else
                        {{ date("Y-m-d", strtotime($row->admission_date)) }}
                        @endif
                    </li>

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

                    <li class="list-group-item"><mark class="text-primary">{{ __('field_total_credit_hour') }} :</mark> {{ number_format((float)$total_credits, 2, '.', '') }}</li>

                    <li class="list-group-item"><mark class="text-primary">{{ __('field_cumulative_gpa') }} :</mark> 
                        @php
                        if($total_credits <= 0){
                            $total_credits = 1;
                        }
                        $com_gpa = $total_cgpa / $total_credits;
                        echo number_format((float)$com_gpa, 2, '.', '');
                        @endphp
                    </li>
                  </ul>
                </div>
            </div> --}}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="">
                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset class="row gx-2 scheduler-border">
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

                                    {{-- <fieldset class="row gx-2 scheduler-border">
                                    <p><mark class="text-primary">{{ __('field_national_id') }}:</mark> {{ $row->national_id }}</p><hr/>
                                    <p><mark class="text-primary">{{ __('field_passport_no') }}:</mark> {{ $row->passport_no }}</p>
                                    </fieldset> --}}
                                </div>
                                <div class="col-md-6">
                                    <fieldset class="row gx-2 scheduler-border">
                                    {{-- <legend>{{ __('field_present') }} {{ __('field_address') }}</legend>
                                    <p><mark class="text-primary">{{ __('field_province') }}:</mark> {{ $row->presentProvince->title ?? '' }}</p><hr/>
                                    <p><mark class="text-primary">{{ __('field_district') }}:</mark> {{ $row->presentDistrict->title ?? '' }}</p><hr/>
                                    <p><mark class="text-primary">{{ __('field_address') }}:</mark> {{ $row->present_address }}</p>
                                    </fieldset>

                                    <fieldset class="row gx-2 scheduler-border">
                                    <legend>{{ __('field_permanent') }} {{ __('field_address') }}</legend>
                                    <p><mark class="text-primary">{{ __('field_province') }}:</mark> {{ $row->permanentProvince->title ?? '' }}</p><hr/>
                                    <p><mark class="text-primary">{{ __('field_district') }}:</mark> {{ $row->permanentDistrict->title ?? '' }}</p><hr/>
                                    <p><mark class="text-primary">{{ __('field_address') }}:</mark> {{ $row->permanent_address }}</p>
                                    </fieldset>

                                    <fieldset class="row gx-2 scheduler-border">
                                    <p><mark class="text-primary">{{ __('field_hostel') }}:</mark> {{ $row->hostelRoom->room->hostel->name ?? '' }}</p><hr/>
                                    <p><mark class="text-primary">{{ __('field_room') }}:</mark> {{ $row->hostelRoom->room->name ?? '' }}</p><hr/>
                                    </fieldset>
                                    <fieldset class="row gx-2 scheduler-border">
                                    <p><mark class="text-primary">{{ __('field_route') }}:</mark> {{ $row->transport->transportRoute->title ?? '' }}</p><hr/>
                                    <p><mark class="text-primary">{{ __('field_vehicle') }}:</mark> {{ $row->transport->transportVehicle->number ?? '' }}</p> --}}

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
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection
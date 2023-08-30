@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                      @if(is_file('uploads/'.$path.'/'.$row->photo))
                      <img src="{{ asset('uploads/'.$path.'/'.$row->photo) }}" class="card-img-top img-fluid profile-thumb" alt="{{ __('field_photo') }}" onerror="this.src='{{ asset('dashboard/images/user/avatar-2.jpg') }}';">
                      @else
                      <img src="{{ asset('dashboard/images/user/avatar-2.jpg') }}" class="card-img-top img-fluid profile-thumb" alt="{{ __('field_photo') }}">
                      @endif

                  <div class="card-header">
                    <h5 class="card-title">{{ $row->first_name }} {{ $row->last_name }}</h5>
                  </div>
                  <ul class="list-group list-group-flush">
                    @if(isset($row->registration_no))
                    <li class="list-group-item"><mark class="text-primary">{{ __('field_registration_no') }}</mark> : #{{ $row->registration_no }}</li>
                    @endif

                    {{-- <li class="list-group-item"><mark class="text-primary">{{ __('field_batch') }}</mark> : {{ $row->batch->title ?? '' }}</li> --}}
                    <li class="list-group-item"><mark class="text-primary">{{ __('field_program') }}</mark> : {{ $row->program->title ?? '' }}</li>
                    <li class="list-group-item"><mark class="text-primary">{{ __('field_phone') }}</mark> : {{ $row->phone }}</li>
                    <li class="list-group-item"><mark class="text-primary">{{ __('field_email') }}</mark> : {{ $row->email }}</li>

                    <li class="list-group-item"><mark class="text-primary">{{ __('field_apply_date') }}</mark> : 
                        @if(isset($setting->date_format))
                        {{ date($setting->date_format, strtotime($row->apply_date)) }}
                        @else
                        {{ date("Y-m-d", strtotime($row->apply_date)) }}
                        @endif
                    </li>
                    <li class="list-group-item"><mark class="text-primary">{{ __('field_status') }}</mark> : 
                        @if( $row->status == 1 )
                        <span class="badge badge-pill badge-primary">{{ __('status_pending') }}</span>
                        @elseif( $row->status == 2 )
                        <span class="badge badge-pill badge-success">{{ __('status_approved') }}</span>
                        @else
                        <span class="badge badge-pill badge-danger">{{ __('status_rejected') }}</span>
                        @endif
                    </li>
                  </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-block">
                        <div class="">
                            <div class="row">
                                <div class="col-md-4">
                                    <fieldset class="row gx-2 scheduler-border">
                                    <p><mark class="text-primary">{{ __('field_father_name') }}:</mark> {{ $row->father_name }}</p><hr/>
                                    <p><mark class="text-primary">{{ __('field_father_occupation') }}:</mark> {{ $row->father_occupation }}</p><hr/>
                                    <p><mark class="text-primary">{{ __('field_mother_name') }}:</mark> {{ $row->mother_name }}</p><hr/>
                                    <p><mark class="text-primary">{{ __('field_mother_occupation') }}:</mark> {{ $row->mother_occupation }}</p><hr/>

                                    <p><mark class="text-primary">{{ __('field_gender') }}:</mark> 
                                        @if( $row->gender == 1 )
                                        {{ __('gender_male') }}
                                        @elseif( $row->gender == 2 )
                                        {{ __('gender_female') }}
                                        @elseif( $row->gender == 3 )
                                        {{ __('gender_other') }}
                                        @endif
                                    </p><hr/>

                                    <p><mark class="text-primary">{{ __('field_dob') }}:</mark> 
                                        @if(isset($setting->date_format))
                                        {{ date($setting->date_format, strtotime($row->dob)) }}
                                        @else
                                        {{ date("Y-m-d", strtotime($row->dob)) }}
                                        @endif
                                    </p><hr/>

                                    <p><mark class="text-primary">{{ __('field_marital_status') }}:</mark> 
                                        @if( $row->marital_status == 1 )
                                        {{ __('marital_status_single') }}
                                        @elseif( $row->marital_status == 2 )
                                        {{ __('marital_status_married') }}
                                        @elseif( $row->marital_status == 3 )
                                        {{ __('marital_status_widowed') }}
                                        @elseif( $row->marital_status == 4 )
                                        {{ __('marital_status_divorced') }}
                                        @elseif( $row->marital_status == 5 )
                                        {{ __('marital_status_other') }}
                                        @endif
                                    </p><hr/>

                                    <p><mark class="text-primary">{{ __('field_blood_group') }}:</mark> 
                                        @if( $row->blood_group == 1 )
                                        {{ __('A+') }}
                                        @elseif( $row->blood_group == 2 )
                                        {{ __('A-') }}
                                        @elseif( $row->blood_group == 3 )
                                        {{ __('B+') }}
                                        @elseif( $row->blood_group == 4 )
                                        {{ __('B-') }}
                                        @elseif( $row->blood_group == 5 )
                                        {{ __('AB+') }}
                                        @elseif( $row->blood_group == 6 )
                                        {{ __('AB-') }}
                                        @elseif( $row->blood_group == 7 )
                                        {{ __('O+') }}
                                        @elseif( $row->blood_group == 8 )
                                        {{ __('O-') }}
                                        @endif
                                    </p><hr/>
                                    </fieldset>

                                    <fieldset class="row gx-2 scheduler-border">
                                        @if(is_file('uploads/'.$path.'/'.$row->signature))
                                            <img src="{{ asset('uploads/'.$path.'/'.$row->signature) }}" class="img-fluid field-image" onerror="this.src='{{ asset('dashboard/images/user/avatar-2.jpg') }}';">
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-md-4">
                                    <fieldset class="row gx-2 scheduler-border">
                                    <p><mark class="text-primary">{{ __('field_national_id') }}:</mark> {{ $row->national_id }}</p><hr/>
                                    <p><mark class="text-primary">{{ __('field_passport_no') }}:</mark> {{ $row->passport_no }}</p>
                                    </fieldset>

                                    <fieldset class="row gx-2 scheduler-border">
                                    <legend>{{ __('field_present') }} {{ __('field_address') }}</legend>
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
                                </div>
                                <div class="col-md-4">
                                    <fieldset class="row gx-2 scheduler-border">
                                    <p><mark class="text-primary">{{ __('field_school_name') }}:</mark> {{ $row->school_name }}</p><hr/>
                                    <p><mark class="text-primary">{{ __('field_exam_id') }}:</mark> {{ $row->school_exam_id }}</p><hr/>
                                    <p><mark class="text-primary">{{ __('field_graduation_year') }}:</mark> {{ $row->school_graduation_year }}</p><hr/>
                                    <p><mark class="text-primary">{{ __('field_graduation_point') }}:</mark> {{ $row->school_graduation_point }}</p><hr/>
                                    </fieldset>
                                    
                                    <fieldset class="row gx-2 scheduler-border">
                                    <p><mark class="text-primary">{{ __('field_collage_name') }}:</mark> {{ $row->collage_name }}</p><hr/>
                                    <p><mark class="text-primary">{{ __('field_exam_id') }}:</mark> {{ $row->collage_exam_id }}</p><hr/>
                                    <p><mark class="text-primary">{{ __('field_graduation_year') }}:</mark> {{ $row->collage_graduation_year }}</p><hr/>
                                    <p><mark class="text-primary">{{ __('field_graduation_point') }}:</mark> {{ $row->collage_graduation_point }}</p><hr/>
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
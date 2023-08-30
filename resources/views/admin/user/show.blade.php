@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                      @php $user = $row; @endphp

                      @if(is_file('uploads/'.$path.'/'.$row->photo))
                      <img src="{{ asset('uploads/'.$path.'/'.$row->photo) }}" class="card-img-top img-fluid profile-thumb" alt="{{ __('field_photo') }}" onerror="this.src='{{ asset('dashboard/images/user/avatar-2.jpg') }}';">
                      @else
                      <img src="{{ asset('dashboard/images/user/avatar-2.jpg') }}" class="card-img-top img-fluid profile-thumb" alt="{{ __('field_photo') }}">
                      @endif

                  <div class="card-header">
                    <h5 class="card-title">{{ $row->first_name }} {{ $row->last_name }}</h5>
                  </div>
                  <ul class="list-group list-group-flush">
                    @if(isset($row->staff_id))
                    <li class="list-group-item"><mark class="text-primary">{{ __('field_staff_id') }}</mark> : #{{ $row->staff_id }}</li>
                    @endif

                    <li class="list-group-item"><mark class="text-primary">{{ __('field_department') }}</mark> : {{ $row->department->title ?? '' }}</li>
                    <li class="list-group-item"><mark class="text-primary">{{ __('field_designation') }}</mark> : {{ $row->designation->title ?? '' }}</li>
                    <li class="list-group-item"><mark class="text-primary">{{ __('field_role') }}</mark> : 
                        @foreach($row->roles as $role)
                            {{ $role->name }}
                        @endforeach
                    </li>
                    <li class="list-group-item"><mark class="text-primary">{{ __('field_phone') }}</mark> : {{ $row->phone }}</li>
                    <li class="list-group-item"><mark class="text-primary">{{ __('field_email') }}</mark> : {{ $row->email }}</li>
                  </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-block">
                        <div class="">
                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset class="row gx-2 scheduler-border">
                                    <p><mark class="text-primary">{{ __('field_father_name') }}:</mark> {{ $row->father_name }}</p><hr/>
                                    <p><mark class="text-primary">{{ __('field_mother_name') }}:</mark> {{ $row->mother_name }}</p><hr/>

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

                                    <p><mark class="text-primary">{{ __('field_emergency_phone') }}:</mark> {{ $row->emergency_phone }}</p><hr/>

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

                                    <p><mark class="text-primary">{{ __('field_joining_date') }}:</mark> 
                                        @if(isset($setting->date_format))
                                        {{ date($setting->date_format, strtotime($row->joining_date)) }}
                                        @else
                                        {{ date("Y-m-d", strtotime($row->joining_date)) }}
                                        @endif
                                    </p><hr/>
                                    @if(isset($row->ending_date))
                                    <p><mark class="text-primary">{{ __('field_ending_date') }}:</mark> 
                                        @if(isset($setting->date_format))
                                        {{ date($setting->date_format, strtotime($row->ending_date)) }}
                                        @else
                                        {{ date("Y-m-d", strtotime($row->ending_date)) }}
                                        @endif
                                    </p><hr/>
                                    @endif
                                    </fieldset>

                                    <fieldset class="row gx-2 scheduler-border">
                                    <p><mark class="text-primary">{{ __('field_national_id') }}:</mark> {{ $row->national_id }}</p><hr/>
                                    <p><mark class="text-primary">{{ __('field_passport_no') }}:</mark> {{ $row->passport_no }}</p>
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
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

                                    <fieldset class="row gx-2 scheduler-border">
                                    <p><mark class="text-primary">{{ __('field_hostel') }}:</mark> {{ $row->hostelRoom->room->hostel->name ?? '' }}</p><hr/>
                                    <p><mark class="text-primary">{{ __('field_room') }}:</mark> {{ $row->hostelRoom->room->name ?? '' }}</p><hr/>
                                    </fieldset>
                                    <fieldset class="row gx-2 scheduler-border">
                                    <p><mark class="text-primary">{{ __('field_route') }}:</mark> {{ $row->transport->transportRoute->title ?? '' }}</p><hr/>
                                    <p><mark class="text-primary">{{ __('field_vehicle') }}:</mark> {{ $row->transport->transportVehicle->number ?? '' }}</p>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-payroll-tab" data-bs-toggle="pill" href="#pills-payroll" role="tab" aria-controls="pills-payroll" aria-selected="true">{{ trans_choice('module_payroll_report', 2) }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-leave-tab" data-bs-toggle="pill" href="#pills-leave" role="tab" aria-controls="pills-leave" aria-selected="false">{{ __('tab_leave') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-educational-tab" data-bs-toggle="pill" href="#pills-educational" role="tab" aria-controls="pills-educational" aria-selected="false">{{ __('tab_educational_info') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-payroll-info-tab" data-bs-toggle="pill" href="#pills-payroll-info" role="tab" aria-controls="pills-payroll-info" aria-selected="false">{{ __('tab_payroll_details') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-bank-tab" data-bs-toggle="pill" href="#pills-bank" role="tab" aria-controls="pills-bank" aria-selected="false">{{ __('tab_bank_info') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-notes-tab" data-bs-toggle="pill" href="#pills-notes" role="tab" aria-controls="pills-notes" aria-selected="false">{{ __('tab_notes') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-documents-tab" data-bs-toggle="pill" href="#pills-documents" role="tab" aria-controls="pills-documents" aria-selected="false">{{ __('tab_documents') }}</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-payroll" role="tabpanel" aria-labelledby="pills-payroll-tab">
                                <!-- [ Data table ] start -->
                                <div class="table-responsive">
                                    <table id="basic-table" class="display table nowrap table-striped table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>{{ __('field_basic_salary') }}</th>
                                                <th>{{ __('field_total_earning') }}</th>
                                                <th>{{ __('field_total_allowance') }}</th>
                                                <th>{{ __('field_total_deduction') }}</th>
                                                <th>{{ __('field_gross_salary') }}</th>
                                                <th>{{ __('field_tax') }}</th>
                                                <th>{{ __('field_net_salary') }}</th>
                                                <th>{{ __('field_status') }}</th>
                                                <th>{{ __('field_pay_date') }}</th>
                                                <th>{{ __('field_payment_method') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach( $user->payrolls->sortByDesc('id') as $key => $payroll)
                                            <tr>
                                                <td>
                                                    {{ round($payroll->basic_salary, $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!} / 

                                                    @if( $payroll->salary_type == 1 )
                                                    {{ __('salary_type_fixed') }}
                                                    @elseif( $payroll->salary_type == 2 )
                                                    {{ __('salary_type_hourly') }}
                                                    @endif
                                                </td>
                                                <td>{{ round($payroll->total_earning, $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</td>
                                                <td>{{ round($payroll->total_allowance, $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</td>
                                                <td>{{ round($payroll->total_deduction, $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</td>
                                                <td>{{ round($payroll->gross_salary, $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</td>
                                                <td>{{ round($payroll->tax, $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</td>
                                                <td>{{ round($payroll->net_salary, $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</td>
                                                <td>
                                                    @if($payroll->status == 1)
                                                    <span class="badge badge-pill badge-success">{{ __('status_paid') }}</span>
                                                    @else
                                                    <span class="badge badge-pill badge-danger">{{ __('status_unpaid') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($payroll->status == 1)
                                                    @if(isset($setting->date_format))
                                                    {{ date($setting->date_format, strtotime($payroll->pay_date)) }}
                                                    @else
                                                    {{ date("Y-m-d", strtotime($payroll->pay_date)) }}
                                                    @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    @if( $payroll->payment_method == 1 )
                                                    {{ __('payment_method_card') }}
                                                    @elseif( $payroll->payment_method == 2 )
                                                    {{ __('payment_method_cash') }}
                                                    @elseif( $payroll->payment_method == 3 )
                                                    {{ __('payment_method_cheque') }}
                                                    @elseif( $payroll->payment_method == 4 )
                                                    {{ __('payment_method_bank') }}
                                                    @elseif( $payroll->payment_method == 5 )
                                                    {{ __('payment_method_e_wallet') }}
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- [ Data table ] end -->
                            </div>
                            <div class="tab-pane fade" id="pills-leave" role="tabpanel" aria-labelledby="pills-leave-tab">
                                <!-- [ Data table ] start -->
                                <div class="table-responsive">
                                    <table id="basic-table2" class="display table nowrap table-striped table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>{{ __('field_leave_type') }}</th>
                                                <th>{{ __('field_pay_type') }}</th>
                                                <th>{{ __('field_leave_date') }}</th>
                                                <th>{{ __('field_days') }}</th>
                                                <th>{{ __('field_apply_date') }}</th>
                                                <th>{{ __('field_status') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($user->leaves->sortByDesc('id') as $leave)
                                            <tr>
                                                <td>{{ $leave->leaveType->title ?? '' }}</td>
                                                <td>
                                                    @if($leave->pay_type == 1)
                                                    <span class="badge badge-pill badge-success">{{ __('field_paid_leave') }}</span>
                                                    @elseif($leave->pay_type == 2)
                                                    <span class="badge badge-pill badge-danger">{{ __('field_unpaid_leave') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(isset($setting->date_format))
                                                        {{ date($setting->date_format, strtotime($leave->from_date)) }}
                                                    @else
                                                        {{ date("Y-m-d", strtotime($leave->from_date)) }}
                                                    @endif
                                                    -
                                                    @if(isset($setting->date_format))
                                                        {{ date($setting->date_format, strtotime($leave->to_date)) }}
                                                    @else
                                                        {{ date("Y-m-d", strtotime($leave->to_date)) }}
                                                    @endif
                                                </td>
                                                <td>{{ (int)((strtotime($leave->to_date) - strtotime($leave->from_date))/86400) + 1 }}</td>
                                                <td>
                                                    @if(isset($setting->date_format))
                                                        {{ date($setting->date_format, strtotime($leave->apply_date)) }}
                                                    @else
                                                        {{ date("Y-m-d", strtotime($leave->apply_date)) }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if( $leave->status == 1 )
                                                    <span class="badge badge-pill badge-success">{{ __('status_approved') }}</span>
                                                    @elseif( $leave->status == 2 )
                                                    <span class="badge badge-pill badge-danger">{{ __('status_rejected') }}</span>
                                                    @else
                                                    <span class="badge badge-pill badge-primary">{{ __('status_pending') }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- [ Data table ] end -->
                            </div>
                            <div class="tab-pane fade" id="pills-educational" role="tabpanel" aria-labelledby="pills-educational-tab">
                                <fieldset class="scheduler-border">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><mark class="text-primary">{{ __('field_education_level') }}:</mark> {{ $row->education_level }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('field_graduation_academy') }}:</mark> {{ $row->graduation_academy }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('field_year_of_graduation') }}:</mark> {{ $row->year_of_graduation }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('field_graduation_field') }}:</mark> {{ $row->graduation_field }}</p><hr/>
                                    </div>
                                    <div class="col-md-6">
                                        <p><mark class="text-primary">{{ __('field_experience') }}:</mark> {{ $row->experience }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('field_note') }}:</mark> {{ $row->note }}</p><hr/>

                                        {{-- <p><mark class="text-primary">{{ __('field_program') }}:</mark> 
                                        @foreach($row->programs as $program)
                                            <span class="badge badge-info">{{ $program->title }}</span>
                                        @endforeach
                                        <hr/> --}}
                                    </div>
                                </div>
                                </fieldset>
                            </div>
                            <div class="tab-pane fade" id="pills-payroll-info" role="tabpanel" aria-labelledby="pills-payroll-info-tab">
                                <fieldset class="scheduler-border">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><mark class="text-primary">{{ __('field_contract_type') }}:</mark> 
                                            @if( $row->contract_type == 1 )
                                            {{ __('contract_type_full_time') }}
                                            @elseif( $row->contract_type == 2 )
                                            {{ __('contract_type_part_time') }}
                                            @endif
                                        </p><hr/>

                                        <p><mark class="text-primary">{{ __('field_work_shift') }}:</mark> 
                                            {{ $row->workShift->title ?? '' }}
                                        </p><hr/>

                                        <p><mark class="text-primary">{{ __('field_epf_no') }}:</mark> 
                                            {{ $row->epf_no }}
                                        </p><hr/>
                                    </div>
                                    <div class="col-md-6">
                                        <p><mark class="text-primary">{{ __('field_salary_type') }}:</mark> 
                                            @if( $row->salary_type == 1 )
                                            {{ __('salary_type_fixed') }}
                                            @elseif( $row->salary_type == 2 )
                                            {{ __('salary_type_hourly') }}
                                            @endif
                                        </p><hr/>
                                        
                                        <p><mark class="text-primary">@if($row->salary_type == 1) {{ __('salary_type_fixed') }} @else {{ __('salary_type_hourly') }} @endif {{ __('field_salary') }}:</mark>
                                            {{ round($row->basic_salary, $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}
                                        </p><hr/>
                                    </div>
                                </div>
                                </fieldset>
                            </div>
                            <div class="tab-pane fade" id="pills-bank" role="tabpanel" aria-labelledby="pills-bank-tab">
                                <fieldset class="scheduler-border">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><mark class="text-primary">{{ __('field_bank_account_name') }}:</mark> {{ $row->bank_account_name }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('field_bank_account_no') }}:</mark> {{ $row->bank_account_no }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('field_bank_name') }}:</mark> {{ $row->bank_name }}</p><hr/>
                                    </div>
                                    <div class="col-md-6">
                                        <p><mark class="text-primary">{{ __('field_ifsc_code') }}:</mark> {{ $row->ifsc_code }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('field_bank_brach') }}:</mark> {{ $row->bank_brach }}</p><hr/>
                                        <p><mark class="text-primary">{{ __('field_tin_no') }}:</mark> {{ $row->tin_no }}</p><hr/>
                                    </div>
                                </div>
                                </fieldset>
                            </div>
                            <div class="tab-pane fade" id="pills-notes" role="tabpanel" aria-labelledby="pills-notes-tab">
                                <!-- [ Data table ] start -->
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>{{ __('field_date') }}</th>
                                                <th>{{ __('field_title') }}</th>
                                                <th>{{ __('field_note') }}</th>
                                                <th>{{ __('field_attach') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($user->notes->where('status', 1)->sortBy('id') as $note)
                                            <tr>
                                                <td>
                                                @if(isset($setting->date_format))
                                                {{ date($setting->date_format, strtotime($note->created_at)) }}
                                                @else
                                                {{ date("Y-m-d", strtotime($note->created_at)) }}
                                                @endif
                                                </td>
                                                <td>{{ $note->title }}</td>
                                                <td>{{ $note->description }}</td>
                                                <td>
                                                @if(is_file('uploads/note/'.$note->attach))
                                                <a href="{{ asset('uploads/note/'.$note->attach) }}" class="btn btn-sm btn-icon btn-dark" download><i class="fas fa-download"></i></a>
                                                @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- [ Data table ] end -->
                            </div>
                            <div class="tab-pane fade" id="pills-documents" role="tabpanel" aria-labelledby="pills-documents-tab">
                                <!-- [ Data table ] start -->
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>{{ __('field_title') }}</th>
                                                <th>{{ __('field_document') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ __('field_photo') }}</td>
                                                <td>
                                                @if(is_file('uploads/'.$path.'/'.$user->photo))
                                                    <img src="{{ asset('uploads/'.$path.'/'.$user->photo) }}" class="img-fluid field-image" onerror="this.src='{{ asset('dashboard/images/user/avatar-2.jpg') }}';">
                                                @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('field_signature') }}</td>
                                                <td>
                                                @if(is_file('uploads/'.$path.'/'.$user->signature))
                                                    <img src="{{ asset('uploads/'.$path.'/'.$user->signature) }}" class="img-fluid field-image" onerror="this.src='{{ asset('dashboard/images/user/avatar-2.jpg') }}';">
                                                @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('field_resume') }}</td>
                                                <td>
                                                @if(is_file('uploads/'.$path.'/'.$row->resume))
                                                <a href="{{ asset('uploads/'.$path.'/'.$row->resume) }}" class="btn btn-sm btn-icon btn-dark" download><i class="fas fa-download"></i></a>
                                                @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('field_joining_letter') }}</td>
                                                <td>
                                                @if(is_file('uploads/'.$path.'/'.$row->joining_letter))
                                                <a href="{{ asset('uploads/'.$path.'/'.$row->joining_letter) }}" class="btn btn-sm btn-icon btn-dark" download><i class="fas fa-download"></i></a>
                                                @endif
                                                </td>
                                            </tr>
                                            @foreach($documents as $document)
                                            <tr>
                                                <td>{{ $document->title }}</td>
                                                <td>
                                                @if(is_file('uploads/'.$path.'/'.$document->attach))
                                                <a target="__blank" href="{{ asset('uploads/'.$path.'/'.$document->attach) }}" class="btn btn-sm btn-icon btn-dark" download><i class="fas fa-download"></i></a>
                                                @endif
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
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection
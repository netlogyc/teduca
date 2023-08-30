<!-- [ Main Content ] start -->
<div class="row">
    <div class="col-md-4">
      @if(is_file('uploads/'.$path.'/'.$row->photo))
      <img src="{{ asset('uploads/'.$path.'/'.$row->photo) }}" class="card-img-top img-fluid profile-thumb" alt="{{ __('field_photo') }}" onerror="this.src='{{ asset('dashboard/images/user/avatar-2.jpg') }}';">
      @else
      <img src="{{ asset('dashboard/images/user/avatar-2.jpg') }}" class="card-img-top img-fluid profile-thumb" alt="{{ __('field_photo') }}">
      @endif
      <div class="card-body">
        <h5 class="card-title">{{ $row->first_name }} {{ $row->last_name }}</h5>
      </div>
    </div>

    <div class="col-md-4">
        <fieldset class="row gx-2 scheduler-border">
        <p><mark class="text-primary">{{ __('field_staff_id') }}:</mark> {{ $row->staff_id }}</p><hr/>
        <p><mark class="text-primary">{{ __('field_email') }}:</mark> {{ $row->email }}</p><hr/>
        <p><mark class="text-primary">{{ __('field_phone') }}:</mark> {{ $row->phone }}</p><hr/>
        <p><mark class="text-primary">{{ __('field_emergency_phone') }}:</mark> {{ $row->emergency_phone }}</p><hr/>
        
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
    </div>

    <div class="col-md-4">
        <fieldset class="row gx-2 scheduler-border">
        <p><mark class="text-primary">{{ __('field_department') }}:</mark> 
            {{ $row->department->title ?? '' }}
        </p><hr/>
        <p><mark class="text-primary">{{ __('field_designation') }}:</mark> 
            {{ $row->designation->title ?? '' }}
        </p><hr/>

        <p><mark class="text-primary">{{ __('field_joining_date') }}:</mark> 
            @if(isset($setting->date_format))
            {{ date($setting->date_format, strtotime($row->joining_date)) }}
            @else
            {{ date("Y-m-d", strtotime($row->joining_date)) }}
            @endif
        </p><hr/>

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

        <p><mark class="text-primary">{{ __('field_national_id') }}:</mark> {{ $row->national_id }}</p><hr/>
        <p><mark class="text-primary">{{ __('field_passport_no') }}:</mark> {{ $row->passport_no }}</p><hr/>
        </fieldset>
    </div>
</div>
<!-- [ Main Content ] end -->
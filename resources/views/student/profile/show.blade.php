<!-- [ Main Content ] start -->
<div class="row">
    <div class="col-md-4">
      @if(is_file('uploads/'.$path.'/'.$row->photo))
      <img src="{{ asset('uploads/'.$path.'/'.$row->photo) }}" class="card-img-top img-fluid profile-thumb" alt="{{ __('field_photo') }}" onerror="this.src='{{ asset('dashboard/images/user/avatar-2.jpg') }}';">
      @else
      <img src="{{ asset('dashboard/images/user/avatar-2.jpg') }}" class="card-img-top img-fluid profile-thumb" alt="{{ __('field_photo') }}">
      @endif

      @php
        $enroll = \App\Models\Student::enroll($row->id);
      @endphp

      <br/><br/>
      <fieldset class="row gx-2 scheduler-border">
        <legend>{{ __('field_academic_information') }}</legend>
        <p><mark class="text-primary">{{ __('field_batch') }}:</mark> {{ $row->batch->title ?? '' }}</p><hr/>
        <p><mark class="text-primary">{{ __('field_program') }}:</mark> {{ $row->program->title ?? '' }}</p><hr/>
        <p><mark class="text-primary">{{ __('field_session') }}:</mark> {{ $enroll->session->title ?? '' }}</p><hr/>
        <p><mark class="text-primary">{{ __('field_semester') }}:</mark> {{ $enroll->semester->title ?? '' }}</p><hr/>
        <p><mark class="text-primary">{{ __('field_section') }}:</mark> {{ $enroll->section->title ?? '' }}</p><hr/>
        <p><mark class="text-primary">{{ __('field_status') }}:</mark> 
        @foreach($row->statuses as $key => $status)
            <span class="badge badge-primary">{{ $status->title }}</span>
        @endforeach
        </p><hr/>
        </fieldset>
    </div>

    <div class="col-md-4">
        <fieldset class="row gx-2 scheduler-border">
        <legend>{{ __('tab_profile_info') }}</legend>
        <p><mark class="text-primary">{{ __('field_student_id') }}:</mark> #{{ $row->student_id }}</p><hr/>
        <p><mark class="text-primary">{{ __('field_name') }}:</mark> {{ $row->first_name }} {{ $row->last_name }}</p><hr/>
        <p><mark class="text-primary">{{ __('field_father_name') }}:</mark> {{ $row->father_name }}</p><hr/>
        <p><mark class="text-primary">{{ __('field_mother_name') }}:</mark> {{ $row->mother_name }}</p><hr/>

        <p><mark class="text-primary">{{ __('field_email') }}:</mark> {{ $row->email }}</p><hr/>
        <p><mark class="text-primary">{{ __('field_phone') }}:</mark> {{ $row->phone }}</p><hr/>

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

        <p><mark class="text-primary">{{ __('field_religion') }}:</mark> {{ $row->religion }}</p>
        </fieldset>
    </div>

    <div class="col-md-4">
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
        <p><mark class="text-primary">{{ __('field_national_id') }}:</mark> {{ $row->national_id }}</p><hr/>
        <p><mark class="text-primary">{{ __('field_passport_no') }}:</mark> {{ $row->passport_no }}</p>
        </fieldset>
    </div>
</div>
<!-- [ Main Content ] end -->
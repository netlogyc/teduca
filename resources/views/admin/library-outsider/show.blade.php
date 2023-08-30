    <!-- Show modal content -->
    <div id="showModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">{{ __('modal_view') }} {{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <!-- Details View Start -->
                    <div class="">
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset class="row gx-2 scheduler-border">
                                <p><mark class="text-primary">{{ __('field_library_id') }}:</mark> #{{ $row->member->library_id ?? '' }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_name') }}:</mark> {{ $row->first_name }} {{ $row->last_name }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_occupation') }}:</mark> {{ $row->occupation }}</p><hr/>

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

                                <p><mark class="text-primary">{{ __('field_religion') }}:</mark> {{ $row->religion }}</p><hr/>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset class="row gx-2 scheduler-border">
                                <p><mark class="text-primary">{{ __('field_phone') }}:</mark> {{ $row->phone }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_email') }}:</mark> {{ $row->email }}</p><hr/>
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
                        </div>
                    </div>
                    <!-- Details View End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> {{ __('btn_close') }}</button>
                </div>
            </div>
        </div>
    </div>
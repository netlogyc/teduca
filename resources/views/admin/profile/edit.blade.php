<!-- [ Main Content ] start -->
<div class="row">
    <div class="col-md-12">
        <form class="needs-validation" novalidate action="{{ route($route.'.update', [$row->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <!-- Form Start -->
            <div class="row">
            <div class="form-group col-md-4">
                <label for="first_name">{{ __('field_first_name') }} <span>*</span></label>
                <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $row->first_name }}" required>

                <div class="invalid-feedback">
                  {{ __('required_field') }} {{ __('field_first_name') }}
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="last_name">{{ __('field_last_name') }} <span>*</span></label>
                <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $row->last_name }}" required>

                <div class="invalid-feedback">
                  {{ __('required_field') }} {{ __('field_last_name') }}
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="father_name">{{ __('field_father_name') }}</label>
                <input type="text" class="form-control" name="father_name" id="father_name" value="{{ $row->father_name }}">

                <div class="invalid-feedback">
                  {{ __('required_field') }} {{ __('field_father_name') }}
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="mother_name">{{ __('field_mother_name') }}</label>
                <input type="text" class="form-control" name="mother_name" id="mother_name" value="{{ $row->mother_name }}">

                <div class="invalid-feedback">
                  {{ __('required_field') }} {{ __('field_mother_name') }}
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="gender">{{ __('field_gender') }} <span>*</span></label>
                <select class="form-control" name="gender" id="gender" required>
                    <option value="">{{ __('select') }}</option>
                    <option value="1" @if( $row->gender == 1 ) selected @endif>{{ __('gender_male') }}</option>
                    <option value="2" @if( $row->gender == 2 ) selected @endif>{{ __('gender_female') }}</option>
                    <option value="3" @if( $row->gender == 3 ) selected @endif>{{ __('gender_other') }}</option>
                </select>

                <div class="invalid-feedback">
                  {{ __('required_field') }} {{ __('field_gender') }}
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="dob">{{ __('field_dob') }} <span>*</span></label>
                <input type="date" class="form-control date" name="dob" id="dob" value="{{ $row->dob }}" required>

                <div class="invalid-feedback">
                  {{ __('required_field') }} {{ __('field_dob') }}
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="phone">{{ __('field_phone') }} <span>*</span></label>
                <input type="text" class="form-control" name="phone" id="phone" value="{{ $row->phone }}" required>

                <div class="invalid-feedback">
                  {{ __('required_field') }} {{ __('field_phone') }}
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="emergency_phone">{{ __('field_emergency_phone') }}</label>
                <input type="text" class="form-control" name="emergency_phone" id="emergency_phone" value="{{ $row->emergency_phone }}">

                <div class="invalid-feedback">
                  {{ __('required_field') }} {{ __('field_emergency_phone') }}
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="marital_status">{{ __('field_marital_status') }}</label>
                <select class="form-control" name="marital_status" id="marital_status">
                    <option value="">{{ __('select') }}</option>
                    <option value="1" @if( $row->marital_status == 1 ) selected @endif>{{ __('marital_status_single') }}</option>
                    <option value="2" @if( $row->marital_status == 2 ) selected @endif>{{ __('marital_status_married') }}</option>
                    <option value="3" @if( $row->marital_status == 3 ) selected @endif>{{ __('marital_status_widowed') }}</option>
                    <option value="4" @if( $row->marital_status == 4 ) selected @endif>{{ __('marital_status_divorced') }}</option>
                    <option value="5" @if( $row->marital_status == 5 ) selected @endif>{{ __('marital_status_other') }}</option>
                </select>

                <div class="invalid-feedback">
                  {{ __('required_field') }} {{ __('field_marital_status') }}
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="blood_group">{{ __('field_blood_group') }}</label>
                <select class="form-control" name="blood_group" id="blood_group">
                    <option value="">{{ __('select') }}</option>
                    <option value="1" @if( $row->blood_group == 1 ) selected @endif>{{ __('A+') }}</option>
                    <option value="2" @if( $row->blood_group == 2 ) selected @endif>{{ __('A-') }}</option>
                    <option value="3" @if( $row->blood_group == 3 ) selected @endif>{{ __('B+') }}</option>
                    <option value="4" @if( $row->blood_group == 4 ) selected @endif>{{ __('B-') }}</option>
                    <option value="5" @if( $row->blood_group == 5 ) selected @endif>{{ __('AB+') }}</option>
                    <option value="6" @if( $row->blood_group == 6 ) selected @endif>{{ __('AB-') }}</option>
                    <option value="7" @if( $row->blood_group == 7 ) selected @endif>{{ __('O+') }}</option>
                    <option value="8" @if( $row->blood_group == 8 ) selected @endif>{{ __('O-') }}</option>
                </select>

                <div class="invalid-feedback">
                  {{ __('required_field') }} {{ __('field_blood_group') }}
                </div>
            </div>

            <div class="form-group col-md-8">
                <label for="photo">{{ __('field_photo') }}: <span>{{ __('image_size', ['height' => 300, 'width' => 300]) }}</span></label>
                <input type="file" class="form-control" name="photo" id="photo" value="{{ old('photo') }}">

                <div class="invalid-feedback">
                  {{ __('required_field') }} {{ __('field_photo') }}
                </div>
            </div>

            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> {{ __('btn_update') }}</button>
            </div>
            <div class="clearfix"></div>
            </div>
            <!-- Form End -->
        </form>
    </div>
</div>
<!-- [ Main Content ] end -->
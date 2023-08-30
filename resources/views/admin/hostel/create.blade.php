    <!-- Add modal content -->
    <div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form class="needs-validation" novalidate action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">{{ __('modal_add') }} {{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <!-- Form Start -->
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('field_name') }} <span>*</span></label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_name') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="type">{{ __('field_type') }} <span>*</span></label>
                        <select class="form-control" name="type" id="type" required>
                            <option value="">{{ __('select') }}</option>
                            <option value="1" @if( old('type') == 1 ) selected @endif>{{ __('hostel_type_boys') }}</option>
                            <option value="2" @if( old('type') == 2 ) selected @endif>{{ __('hostel_type_girls') }}</option>
                            <option value="3" @if( old('type') == 3 ) selected @endif>{{ __('hostel_type_staff') }}</option>
                            <option value="4" @if( old('type') == 4 ) selected @endif>{{ __('hostel_type_combine') }}</option>
                        </select>

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_type') }}
                        </div>
                    </div>
                            
                    <div class="form-group">
                        <label for="capacity">{{ __('field_capacity') }} <span>*</span></label>
                        <input type="text" class="form-control" name="capacity" id="capacity" value="{{ old('capacity') }}" required>

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_capacity') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">{{ __('field_address') }}</label>
                        <textarea class="form-control" name="address" id="address">{{ old('address') }}</textarea>

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_address') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="note">{{ __('field_note') }}</label>
                        <textarea class="form-control" name="note" id="note">{{ old('note') }}</textarea>

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_note') }}
                        </div>
                    </div>
                    <!-- Form End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> {{ __('btn_close') }}</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> {{ __('btn_save') }}</button>
                </div>

              </form>
            </div>
        </div>
    </div>
    <!-- Edit modal content -->
    <div id="editModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form class="needs-validation" novalidate action="{{ route($route.'.update', $row->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">{{ __('modal_edit') }} {{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <!-- Form Start -->
                    <div class="form-group">
                        <label for="faculty">{{ __('field_faculty') }} <span>*</span></label>
                        <select class="form-control" name="faculty" id="faculty" required>
                            <option value="">{{ __('select') }}</option>
                            @foreach( $faculties as $faculty )
                            <option value="{{ $faculty->id }}" @if($row->faculty_id == $faculty->id) selected @endif>{{ $faculty->title }}</option>
                            @endforeach
                        </select>

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_faculty') }}
                        </div>
                    </div>

                    <div class="form-group">
                       <label for="title" class="form-label">{{ __('field_program') }} <span>*</span></label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $row->title }}" required>

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_program') }}
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="shortcode" class="form-label">{{ __('field_plan_estudios') }} <span>*</span></label>
                        <input type="text" class="form-control" name="shortcode" id="shortcode" value="{{ $row->shortcode }}" required>

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_plan_estudios') }}
                        </div>
                    </div>
                    
                    {{-- custom --}}
                    <div class="form-group">
                        <label for="title_get" class="form-label">{{ __('field_title_get') }} <span>*</span></label>
                        <input type="text" class="form-control" name="title_get" id="title_get" value="{{ $row->title_get }}" required>

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_title_get') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="code_snies" class="form-label">{{ __('field_code_snies') }} <span>*</span></label>
                        <input type="number" class="form-control" name="code_snies" id="code_snies" value="{{ $row->code_snies }}" required>

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_code_snies') }}
                        </div>
                    </div>
                    <div class="form-group">
                    {{-- <div class="form-group col-md-6"> --}}
                        <label for="validity_init" class="form-label">{{ __('validity_init') }} <span>*</span></label>
                        <input type="date" class="form-control date" name="validity_init" id="validity_init" value="{{ $row->validity_init }}" required>

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('validity_init') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validity_end" class="form-label">{{ __('validity_end') }} <span>*</span></label>
                        <input type="date" class="form-control date" name="validity_end" id="validity_end" value="{{ $row->validity_end }}" required>

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('validity_end') }}
                        </div>
                    </div>


                    {{-- end custom --}}
                    
                    {{-- <div class="form-group">
                        <div class="switch d-inline m-r-10">
                            <input type="checkbox" id="switch-{{ $row->id }}" name="registration" value="1" @if($row->registration == 1) checked @endif>
                            <label for="switch-{{ $row->id }}" class="cr"></label>
                        </div>
                        <label>{{ __('field_registration') }}</label>
                    </div> --}}

                    <div class="form-group">
                        <label for="status" class="form-label">{{ __('select_status') }}</label>
                        <select class="form-control" name="status" id="status">
                            <option value="1" @if( $row->status == 1 ) selected @endif>{{ __('status_active') }}</option>
                            <option value="0" @if( $row->status == 0 ) selected @endif>{{ __('status_inactive') }}</option>
                        </select>
                    </div>
                    <!-- Form End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> {{ __('btn_close') }}</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> {{ __('btn_update') }}</button>
                </div>

              </form>
            </div>
        </div>
    </div>
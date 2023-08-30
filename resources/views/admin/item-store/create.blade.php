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
                        <label for="title" class="form-label">{{ __('field_store') }} <span>*</span></label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_store') }}
                        </div>
                    </div>
                            
                    <div class="form-group">
                        <label for="store_no">{{ __('field_store_no') }} <span>*</span></label>
                        <input type="text" class="form-control" name="store_no" id="store_no" value="{{ old('store_no') }}" required>

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_store_no') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone">{{ __('field_phone') }}</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_phone') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">{{ __('field_email') }}</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_email') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">{{ __('field_address') }}</label>
                        <textarea class="form-control" name="address" id="address">{{ old('address') }}</textarea>

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_address') }}
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
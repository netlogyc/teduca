    <!-- Edit modal content -->
    <div id="changePasswordModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form class="needs-validation" novalidate action="{{ route($route.'-password-change') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">{{ __('change_password') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <!-- Form Start -->
                    <input type="hidden" name="staff_id" value="{{ $row->id }}">

                    <div class="form-group">
                        <label for="password" class="form-label">{{ __('field_password') }} <span>*</span></label>
                        <input type="password" class="form-control" name="password" id="password" value="" required autocomplete="new-password">

                        <div class="invalid-feedback">
                            {{ __('required_field') }} {{ __('field_password') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="form-label">{{ __('field_confirm_password') }} <span>*</span></label>
                        <input type="password" class="form-control" name="password_confirmation" id="password-confirm" value="" required autocomplete="new-password">

                        <div class="invalid-feedback">
                            {{ __('required_field') }} {{ __('field_confirm_password') }}
                        </div>
                    </div>
                    <!-- Form End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> {{ __('btn_close') }}</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> {{ __('btn_change') }}</button>
                </div>

              </form>
            </div>
        </div>
    </div>
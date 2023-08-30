<!-- Edit modal content -->
<div id="lostModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="lostModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="needs-validation" novalidate action="{{ route($route.'.penalty', $row->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="modal-header">
                    <h5 class="modal-title" id="lostModalLabel">{{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <!-- Form Start -->
                    <div class="form-group">
                        <label for="penalty" class="form-label">{{ __('field_penalty') }} ({!! $setting->currency_symbol !!}) <span>*</span></label>
                        <input type="text" class="form-control autonumber" name="penalty" id="penalty" value="{{ old('penalty') }}" required>

                        <div class="invalid-feedback">
                            {{ __('required_field') }} {{ __('field_penalty') }}
                        </div>
                    </div>
                    <!-- Form End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> {{ __('btn_close') }}</button>
                    <button type="submit" class="btn btn-danger"><i class="fas fa-minus"></i> {{ __('btn_lost') }}</button>
                </div>

            </form>
        </div>
    </div>
</div>
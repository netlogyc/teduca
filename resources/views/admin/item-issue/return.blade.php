<!-- Edit modal content -->
<div id="returnModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="returnModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="needs-validation" novalidate action="{{ route($route.'.update', $row->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="modal-header">
                    <h5 class="modal-title" id="returnModalLabel">{{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <!-- Form Start -->
                    <div class="form-group">
                        <label for="return_date" class="form-label">{{ __('field_return_date') }} <span>*</span></label>
                        <input type="date" class="form-control date" name="return_date" id="return_date" value="{{ date('Y-m-d') }}" required>

                        <div class="invalid-feedback">
                            {{ __('required_field') }} {{ __('field_return_date') }}
                        </div>
                    </div>
                    <!-- Form End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> {{ __('btn_close') }}</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-reply"></i> {{ __('btn_return') }}</button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- Edit modal content -->
<div id="addModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form class="needs-validation" novalidate action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">{{ __('modal_add') }} {{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <!-- Form Start -->
                    <input type="hidden" name="member_id" value="{{ $row->id }}">

                    <div class="form-group">
                        <label for="library_id" class="form-label">{{ __('field_library_id') }} <span>*</span></label>
                        <input type="text" class="form-control" name="library_id" id="library_id" value="{{ old('library_id') }}" required>

                        <div class="invalid-feedback">
                            {{ __('required_field') }} {{ __('field_library_id') }}
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
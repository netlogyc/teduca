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
                        <label for="student">{{ __('field_student_id') }} <span>*</span></label>
                        <input type="text" class="form-control" name="student" id="student" value="{{ $row->student->student_id }}" readonly required>

                        <div class="invalid-feedback">
                        {{ __('required_field') }} {{ __('field_student_id') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="transfer_id">{{ __('field_transfer_id') }} <span>*</span></label>
                        <input type="text" class="form-control autonumber" name="transfer_id" id="transfer_id" value="{{ $row->transfer_id }}" required>

                        <div class="invalid-feedback">
                        {{ __('required_field') }} {{ __('field_transfer_id') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="university_name">{{ __('field_university_name') }} <span>*</span></label>
                        <input type="text" class="form-control" name="university_name" id="university_name" value="{{ $row->university_name }}" required>

                        <div class="invalid-feedback">
                        {{ __('required_field') }} {{ __('field_university_name') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="date">{{ __('field_date') }} <span>*</span></label>
                        <input type="date" class="form-control date" name="date" id="date" value="{{ $row->date }}" required>

                        <div class="invalid-feedback">
                        {{ __('required_field') }} {{ __('field_date') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="note">{{ __('field_note') }}</label>
                        <textarea class="form-control" name="note" id="note">{{ $row->note }}</textarea>

                        <div class="invalid-feedback">
                        {{ __('required_field') }} {{ __('field_note') }}
                        </div>
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
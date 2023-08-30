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
                        <label for="name" class="form-label">{{ __('field_name') }} <span>*</span></label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $row->name }}" required>

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_name') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="code">{{ __('field_code') }} <span>*</span></label>
                        <input type="text" class="form-control" name="code" id="code" value="{{ $row->code }}" required>

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_code') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="direction">{{ __('field_direction') }} <span>*</span></label>
                        <select class="form-control" name="direction" id="direction" required>
                            <option value="0" @if( $row->direction == 0 ) selected @endif>{{ __('direction_ltr') }}</option>
                            <option value="1" @if( $row->direction == 1 ) selected @endif>{{ __('direction_rtl') }}</option>
                        </select>

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_direction') }}
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
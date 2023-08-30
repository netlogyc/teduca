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
                        <label for="title" class="form-label">{{ __('field_store') }} <span>*</span></label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $row->title }}" required>

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_store') }}
                        </div>
                    </div>
                            
                    <div class="form-group">
                        <label for="store_no">{{ __('field_store_no') }} <span>*</span></label>
                        <input type="text" class="form-control" name="store_no" id="store_no" value="{{ $row->store_no }}" required>

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_store_no') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone">{{ __('field_phone') }}</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{ $row->phone }}">

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_phone') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">{{ __('field_email') }}</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ $row->email }}">

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_email') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">{{ __('field_address') }}</label>
                        <textarea class="form-control" name="address" id="address">{{ $row->address }}</textarea>

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_address') }}
                        </div>
                    </div>

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
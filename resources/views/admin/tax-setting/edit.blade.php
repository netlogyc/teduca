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
                        <label for="min_amount" class="form-label">{{ __('field_min_amount') }} ({!! $setting->currency_symbol !!}) <span>*</span></label>
                        <input type="text" class="form-control" name="min_amount" id="min_amount" value="{{ round($row->min_amount, 2) }}" required>

                        <div class="invalid-feedback">
                        {{ __('required_field') }} {{ __('field_min_amount') }} 
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="max_amount" class="form-label">{{ __('field_max_amount') }} ({!! $setting->currency_symbol !!}) <span>*</span></label>
                        <input type="text" class="form-control" name="max_amount" id="max_amount" value="{{ round($row->max_amount, 2) }}" required>

                        <div class="invalid-feedback">
                        {{ __('required_field') }} {{ __('field_max_amount') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="percentange" class="form-label">{{ __('field_percentage') }} (%) <span>*</span></label>
                        <input type="text" class="form-control" name="percentange" id="percentange" value="{{ round($row->percentange, 2) }}" required>

                        <div class="invalid-feedback">
                        {{ __('required_field') }} {{ __('field_percentage') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="max_no_taxable_amount" class="form-label">{{ __('field_max_no_taxable_amount') }} ({!! $setting->currency_symbol !!})</label>
                        <input type="text" class="form-control" name="max_no_taxable_amount" id="max_no_taxable_amount" value="{{ round($row->max_no_taxable_amount, 2) }}">

                        <div class="invalid-feedback">
                        {{ __('field_max_no_taxable_amount') }}
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
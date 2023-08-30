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
                        <label for="name" class="form-label">{{ __('field_name') }} <span>*</span></label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_name') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="category">{{ __('field_category') }} <span>*</span></label>
                        <select class="form-control" name="category" id="category" required>
                            <option value="">{{ __('select') }}</option>
                            @foreach( $categories as $category )
                            <option value="{{ $category->id }}" @if(old('category') == $category->id) selected @endif>{{ $category->title }}</option>
                            @endforeach
                        </select>

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_category') }}
                        </div>
                    </div>
                            
                    <div class="form-group">
                        <label for="unit">{{ __('field_unit') }}</label>
                        <input type="text" class="form-control" name="unit" id="unit" value="{{ old('unit') }}">

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_unit') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">{{ __('field_description') }}</label>
                        <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_description') }}
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
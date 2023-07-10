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
                        <label for="title" class="form-label">{{ __('field_room') }} {{ __('field_no') }} <span>*</span></label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_room') }} {{ __('field_no') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="floor" class="form-label">{{ __('field_floor') }}</label>
                        <input type="text" class="form-control" name="floor" id="floor" value="{{ old('floor') }}">

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_floor') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="capacity" class="form-label">{{ __('field_capacity') }}</label>
                        <input type="text" class="form-control autonumber" name="capacity" id="capacity" value="{{ old('capacity') }}" data-v-max="999999999" data-v-min="0">

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_capacity') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="type" class="form-label">{{ __('field_type') }}</label>
                        <input type="text" class="form-control" name="type" id="type" value="{{ old('type') }}">

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_type') }}
                        </div>
                    </div>

                    {{-- <div class="form-group">
                        <label for="program">{{ __('field_assign') }} {{ __('field_program') }} <span>*</span></label>

                        @foreach($programs as $key => $program)
                        <br/>
                        <div class="checkbox d-inline">
                            <input type="checkbox" name="programs[]" id="program-{{ $key }}" value="{{ $program->id }}" @if( old('programs[]') == $program->id ) checked @endif>
                            <label for="program-{{ $key }}" class="cr">{{ $program->title }}</label>
                        </div>
                        @endforeach

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_program') }}
                        </div>
                    </div> --}}
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
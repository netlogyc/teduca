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
                        <label for="number" class="form-label">{{ __('field_number') }} <span>*</span></label>
                        <input type="text" class="form-control" name="number" id="number" value="{{ $row->number }}" required>

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_number') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="type" class="form-label">{{ __('field_type') }}</label>
                        <input type="text" class="form-control" name="type" id="type" value="{{ $row->type }}">

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_type') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="route">{{ __('field_assign') }} {{ __('field_route') }} <span>*</span></label><br/>

                        @foreach($transportRoutes as $key => $transportRoute)
                        <br/>
                        <div class="checkbox d-inline">
                            <input type="checkbox" name="routes[]" id="route-{{ $key }}-{{ $row->id }}" value="{{ $transportRoute->id }}"

                            @foreach($row->transportRoutes as $selected_route)
                                @if($selected_route->id == $transportRoute->id) checked @endif 
                            @endforeach

                            >
                            <label for="route-{{ $key }}-{{ $row->id }}" class="cr">{{ $transportRoute->title }}</label>
                        </div>
                        @endforeach

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_route') }}
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
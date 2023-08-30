    <!-- Show modal content -->
    <div id="editModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form class="needs-validation" novalidate action="{{ route($route.'.update', $row->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">{{ __('modal_view') }} {{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    
                    <h4><mark class="text-primary">{{ __('field_name') }}:</mark> {{ $row->user->first_name ?? '' }} {{ $row->user->last_name ?? '' }}</h4>
                    <hr/>
                    <div class="">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="status">{{ __('field_status') }} <span>*</span></label>
                                    <select class="form-control" name="status" id="status" required>
                                        <option value="1" @if($row->status == 1) selected @endif>{{ __('Preinscrito') }}</option>
                                        <option value="2" @if($row->status == 2) selected @endif>{{ __('Entrevista') }}</option>
                                        <option value="3" @if($row->status == 3) selected @endif>{{ __('Aceptado') }}</option>
                                    </select>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_status') }}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> {{ __('btn_close') }}</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> {{ __('btn_update') }}</button>
                </div>

              </form>
            </div>
        </div>
    </div>
    <!-- Add modal content -->
    <div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <form class="needs-validation" novalidate action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">{{ __('btn_issue') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <!-- Form Start -->
                    @include('common.inc.inventory_search_filter')

                    <div class="form-group col-md-6">
                        <label for="issue_date">{{ __('field_issue_date') }} <span>*</span></label>
                        <input type="date" class="form-control date" name="issue_date" id="issue_date" value="{{ date('Y-m-d') }}" required>

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_issue_date') }}
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="due_date">{{ __('field_due_return_date') }} <span>*</span></label>
                        <input type="date" class="form-control date" name="due_date" id="due_date" value="{{ date('Y-m-d') }}" required>

                        <div class="invalid-feedback">
                          {{ __('required_field') }} {{ __('field_due_return_date') }}
                        </div>
                    </div>
                    <!-- Form End -->
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> {{ __('btn_close') }}</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> {{ __('btn_issue') }}</button>
                </div>

              </form>
            </div>
        </div>
    </div>
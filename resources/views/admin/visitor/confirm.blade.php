    <!-- Confirm modal -->
    <div class="modal fade" id="confirmModal-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="ConfirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
          <form action="{{ route($route.'.out', $row->id) }}" method="get">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h5 class="modal-title" id="ConfirmModalLabel">{{ __('modal_are_you_sure') }}</h5>
                    <p class="text-danger mt-2">{{ __('modal_action_warning') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> {{ __('btn_close') }}</button>
                    <button type="submit" class="btn btn-danger"><i class="fas fa-check"></i> {{ __('btn_confirm') }}</button>
                </div>
            </div><!-- /.modal-content -->
          </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- UnPay modal -->
    <div class="modal fade" id="unpayModal-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="UnpayModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
          <form action="{{ route($route.'.unpay', $payroll_data->id) }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h5 class="modal-title" id="UnpayModalLabel">{{ __('modal_are_you_sure') }}</h5>
                    <p class="text-danger mt-2">{{ __('modal_undo_warning') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> {{ __('btn_close') }}</button>
                    <button type="submit" class="btn btn-danger"><i class="fas fa-check"></i> {{ __('btn_confirm') }}</button>
                </div>
            </div><!-- /.modal-content -->
          </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
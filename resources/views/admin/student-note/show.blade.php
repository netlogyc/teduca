    <!-- Show modal content -->
    <div id="showModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">{{ __('modal_view') }} {{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <!-- Details View Start -->
                    <h4><mark class="text-primary">{{ __('field_title') }}:</mark> {{ $row->title }}</h4>
                    <hr/>
                    <p><mark class="text-primary">{{ __('field_student') }}:</mark> #{{ $row->noteable->student_id ?? '' }} - {{ $row->noteable->first_name ?? '' }} {{ $row->noteable->last_name ?? '' }}</p><hr/>
                    
                    <p><mark class="text-primary">{{ __('field_note') }}:</mark> {!! $row->description !!}</p>

                    <hr/>
                    <p><mark class="text-primary">{{ __('field_status') }}:</mark> 
                    @if( $row->status == 1 )
                    <span class="badge badge-pill badge-success">{{ __('status_active') }}</span>
                    @else
                    <span class="badge badge-pill badge-danger">{{ __('status_inactive') }}</span>
                    @endif
                    </p>
                    <!-- Details View End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> {{ __('btn_close') }}</button>
                </div>
            </div>
        </div>
    </div>
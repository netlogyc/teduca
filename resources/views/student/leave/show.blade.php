    <!-- Show modal content -->
    <div id="showModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">{{ __('modal_view') }} {{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <!-- Details View Start -->
                    <h4><mark class="text-primary">{{ __('field_name') }}:</mark> {{ $row->student->first_name }} {{ $row->student->last_name }}</h4>
                    <hr/>
                    <div class="">
                        <div class="row">
                            <div class="col-md-6">
                                <p><mark class="text-primary">{{ __('field_start_date') }}:</mark> 
                                @if(isset($setting->date_format))
                                    {{ date($setting->date_format, strtotime($row->from_date)) }}
                                @else
                                    {{ date("Y-m-d", strtotime($row->from_date)) }}
                                @endif
                                </p><hr/>

                                <p><mark class="text-primary">{{ __('field_end_date') }}:</mark> 
                                @if(isset($setting->date_format))
                                    {{ date($setting->date_format, strtotime($row->to_date)) }}
                                @else
                                    {{ date("Y-m-d", strtotime($row->to_date)) }}
                                @endif
                                </p><hr/>

                                <p><mark class="text-primary">{{ __('field_days') }}:</mark> 
                                    {{ (int)((strtotime($row->to_date) - strtotime($row->from_date))/86400) + 1 }}
                                </p><hr/>
                            </div>
                            <div class="col-md-6">
                                <p><mark class="text-primary">{{ __('field_review_by') }}:</mark> {{ $row->reviewBy->first_name ?? '' }} {{ $row->reviewBy->last_name ?? '' }}</p><hr/>

                                <p><mark class="text-primary">{{ __('field_apply_date') }}:</mark> 
                                @if(isset($setting->date_format))
                                    {{ date($setting->date_format, strtotime($row->apply_date)) }}
                                @else
                                    {{ date("Y-m-d", strtotime($row->apply_date)) }}
                                @endif</p><hr/>
                                
                                <p><mark class="text-primary">{{ __('field_status') }}:</mark> 
                                    @if( $row->status == 1 )
                                    <span class="badge badge-pill badge-success">{{ __('status_approved') }}</span>
                                    @elseif( $row->status == 2 )
                                    <span class="badge badge-pill badge-danger">{{ __('status_rejected') }}</span>
                                    @else
                                    <span class="badge badge-pill badge-primary">{{ __('status_pending') }}</span>
                                    @endif
                                </p><hr/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                               <p><mark class="text-primary">{{ __('field_leave_subject') }}:</mark> {{ $row->subject }}</p><hr/>

                               <p><mark class="text-primary">{{ __('field_reason') }}:</mark> {{ $row->reason }}</p><hr/>

                               @if(!empty($row->note))
                               <p><mark class="text-primary">{{ __('field_note') }}:</mark> {{ $row->note }}</p><hr/>
                               @endif
                            </div>
                        </div>
                    </div>
                    <!-- Details View End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> {{ __('btn_close') }}</button>
                </div>
            </div>
        </div>
    </div>
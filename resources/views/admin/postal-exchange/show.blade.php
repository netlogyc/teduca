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
                    <h4><mark class="text-primary">{{ __('field_title') }}:</mark> {{ $row->title }}</h4>
                    <hr/>
                    <div class="">
                        <div class="row">
                            <div class="col-md-6">
                                <p><mark class="text-primary">{{ __('field_category') }}:</mark> {{ $row->category->title ?? '' }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_reference') }}:</mark> {{ $row->reference }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_from') }}:</mark> {{ $row->from }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_to') }}:</mark> {{ $row->to }}</p><hr/>
                            </div>
                            <div class="col-md-6">
                                <p><mark class="text-primary">{{ __('field_type') }}:</mark> 
                                    @if( $row->type == 1 )
                                    <span class="badge badge-success"><i class="fas fa-download"></i></span> 
                                    {{ __('exchange_type_import') }}
                                    @elseif( $row->type == 2 )
                                    <span class="badge badge-danger"><i class="fas fa-upload"></i></span> 
                                    {{ __('exchange_type_export') }}
                                    @endif
                                </p><hr/>
                                
                                <p><mark class="text-primary">{{ __('field_date') }}:</mark> 
                                    @if(isset($setting->date_format))
                                    {{ date($setting->date_format, strtotime($row->date)) }}
                                    @else
                                    {{ date("Y-m-d", strtotime($row->date)) }}
                                    @endif
                                </p><hr/>

                                <p><mark class="text-primary">{{ __('field_status') }}:</mark> 
                                @if( $row->status == 1 )
                                <span class="badge badge-pill badge-primary">{{ __('status_on_hold') }}</span>
                                @elseif( $row->status == 2 )
                                <span class="badge badge-pill badge-info">{{ __('status_progress') }}</span>
                                @elseif( $row->status == 3 )
                                <span class="badge badge-pill badge-success">{{ __('status_received') }}</span>
                                @elseif( $row->status == 4 )
                                <span class="badge badge-pill badge-danger">{{ __('status_delivered') }}</span>
                                @endif
                                </p><hr/>

                                <p><mark class="text-primary">{{ __('field_note') }}:</mark> {!! $row->note !!}</p><hr/>

                                <p><mark class="text-primary">{{ __('field_recorded_by') }}:</mark> #{{ $row->recordedBy->staff_id ?? '' }}</p><hr/>
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
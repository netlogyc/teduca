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
                    <h4><mark class="text-primary">{{ __('field_name') }}:</mark> {{ $row->name }}</h4>
                    <hr/>
                    <div class="">
                        <div class="row">
                            <div class="col-md-6">
                                <p><mark class="text-primary">{{ __('field_purpose') }}:</mark> {{ $row->purpose->title ?? '' }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_department') }}:</mark> {{ $row->department->title ?? '' }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_father_name') }}:</mark> {{ $row->father_name }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_phone') }}:</mark> {{ $row->phone }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_email') }}:</mark> {{ $row->email }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_persons') }}:</mark> {{ $row->persons }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_note') }}:</mark> {{ $row->note }}</p><hr/>
                            </div>
                            <div class="col-md-6">
                                <p><mark class="text-primary">{{ __('field_visit_from') }}:</mark> {{ $row->visit_from }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_token') }}:</mark> {{ $row->token }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_date') }}:</mark> 
                                    @if(isset($setting->date_format))
                                    {{ date($setting->date_format, strtotime($row->date)) }}
                                    @else
                                    {{ date("Y-m-d", strtotime($row->date)) }}
                                    @endif
                                </p><hr/>
                                <p><mark class="text-primary">{{ __('field_in_time') }}:</mark> 
                                    <span class="badge badge-pill badge-success">
                                    @if(isset($setting->time_format))
                                    {{ date($setting->time_format, strtotime($row->in_time)) }}
                                    @else
                                    {{ date("h:i A", strtotime($row->in_time)) }}
                                    @endif
                                    </span>
                                </p><hr/>
                                <p><mark class="text-primary">{{ __('field_out_time') }}:</mark> 
                                    @if(isset($row->out_time))
                                    <span class="badge badge-pill badge-danger">
                                    @if(isset($setting->time_format))
                                    {{ date($setting->time_format, strtotime($row->out_time)) }}
                                    @else
                                    {{ date("h:i A", strtotime($row->out_time)) }}
                                    @endif
                                    </span>
                                    @endif
                                </p><hr/>
                                
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
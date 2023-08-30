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
                                <p><mark class="text-primary">{{ __('field_invoice_id') }}:</mark> {{ $row->invoice_id }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_amount') }}:</mark> {{ round($row->amount, $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</p><hr/>
                            </div>
                            <div class="col-md-6">
                                <p><mark class="text-primary">{{ __('field_date') }}:</mark> 
                                    @if(isset($setting->date_format))
                                    {{ date($setting->date_format, strtotime($row->date)) }}
                                    @else
                                    {{ date("Y-m-d", strtotime($row->date)) }}
                                    @endif
                                </p><hr/>
                                
                                <p><mark class="text-primary">{{ __('field_payment_method') }}:</mark> 
                                    @if( $row->payment_method == 1 )
                                    {{ __('payment_method_card') }}
                                    @elseif( $row->payment_method == 2 )
                                    {{ __('payment_method_cash') }}
                                    @elseif( $row->payment_method == 3 )
                                    {{ __('payment_method_cheque') }}
                                    @elseif( $row->payment_method == 4 )
                                    {{ __('payment_method_bank') }}
                                    @elseif( $row->payment_method == 5 )
                                    {{ __('payment_method_e_wallet') }}
                                    @endif
                                </p><hr/>

                                <p><mark class="text-primary">{{ __('field_recorded_by') }}:</mark> #{{ $row->recordedBy->staff_id ?? '' }}</p><hr/>
                            </div>
                            <div class="col-md-12">
                                <p><mark class="text-primary">{{ __('field_note') }}:</mark> {!! $row->note !!}</p><hr/>
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
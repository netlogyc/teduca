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
                    <div class="">
                        <div class="row">
                            <div class="col-md-6">
                                <p><mark class="text-primary">{{ __('field_item') }}:</mark> {{ $row->item->name ?? '' }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_supplier') }}:</mark> {{ $row->supplier->title ?? '' }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_store') }}:</mark> {{ $row->store->title ?? '' }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_quantity') }}:</mark> {{ $row->quantity }}</p><hr/>
                            </div>
                            <div class="col-md-6">
                                <p><mark class="text-primary">{{ __('field_price') }}:</mark> {{ round($row->price, $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</p><hr/>

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

                                <p><mark class="text-primary">{{ __('field_status') }}:</mark> 
                                @if( $row->status == 1 )
                                <span class="badge badge-pill badge-success">{{ __('status_received') }}</span>
                                @else
                                <span class="badge badge-pill badge-danger">{{ __('status_returned') }}</span>
                                @endif
                                <hr/>
                            </div>
                            <div class="col-md-12">
                                <p><mark class="text-primary">{{ __('field_description') }}:</mark> {!! $row->description !!}</p><hr/>
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
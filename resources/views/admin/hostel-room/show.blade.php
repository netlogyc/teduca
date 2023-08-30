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
                                <p><mark class="text-primary">{{ __('field_room') }} {{ __('field_no') }}:</mark> {{ $row->name }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_hostel') }}:</mark> {{ $row->hostel->name ?? '' }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_type') }}:</mark> {{ $row->roomType->title ?? '' }}</p><hr/>
                            </div>
                            <div class="col-md-6">
                                <p><mark class="text-primary">{{ __('field_total') }} {{ __('field_bed') }}:</mark> {{ $row->bed }}</p><hr/>
                                <p><mark class="text-primary">{{ __('status_available') }}:</mark> {{ $row->bed - $row->hostelMembers->where('status', '1')->count() }}</p><hr/>
                                {{-- <p><mark class="text-primary">{{ __('field_fee') }}:</mark> {{ round($row->fee, $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</p><hr/> --}}

                                <p><mark class="text-primary">{{ __('field_status') }}:</mark> 
                                @if( $row->status == 1 )
                                <span class="badge badge-pill badge-success">{{ __('status_active') }}</span>
                                @else
                                <span class="badge badge-pill badge-danger">{{ __('status_inactive') }}</span>
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
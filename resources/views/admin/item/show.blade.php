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
                                <p><mark class="text-primary">{{ __('field_unit') }}:</mark> {{ $row->unit }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_category') }}:</mark> {{ $row->category->title ?? '' }}</p><hr/>

                                <p><mark class="text-primary">{{ __('field_status') }}:</mark> 
                                @if( $row->status == 1 )
                                <span class="badge badge-pill badge-success">{{ __('status_active') }}</span>
                                @else
                                <span class="badge badge-pill badge-danger">{{ __('status_inactive') }}</span>
                                @endif
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p><mark class="text-primary">{{ __('field_quantity') }}:</mark> {{ $row->stocks->where('status', 1)->sum('quantity') - $row->issues->where('status', 0)->sum('quantity') }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_available') }}:</mark> {{ $row->stocks->where('status', 1)->sum('quantity') - ($row->issues->where('status', 0)->sum('quantity') + $row->issues->where('status', 1)->sum('quantity')) }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_issue') }}:</mark> {{ $row->issues->where('status', 1)->sum('quantity') }}</p><hr/>
                            </div>
                        </div>
                        <div class="row">
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
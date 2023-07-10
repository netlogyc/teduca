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
                                <p><mark class="text-primary">{{ __('field_isbn') }}:</mark> {{ $row->isbn }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_category') }}:</mark> {{ $row->category->title ?? '' }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_author') }}:</mark> {{ $row->author }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_publisher') }}:</mark> {{ $row->publisher }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_edition') }}:</mark> {{ $row->edition }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_publish_year') }}:</mark> {{ $row->publish_year }}</p><hr/>

                                <p><mark class="text-primary">{{ __('field_location') }}:</mark> {{ __('field_rack') }}: {{ $row->section }} | {{ __('field_column') }}: {{ $row->column }} | {{ __('field_row') }}: {{ $row->row }}</p><hr/>
                            </div>
                            <div class="col-md-6">
                                <p><mark class="text-primary">{{ __('field_language') }}:</mark> {{ $row->language }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_price') }}:</mark> {{ round($row->price, $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_quantity') }}:</mark> {{ $row->quantity }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_issue') }}:</mark> {{ $row->issues->where('status', '1')->count() }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_lost') }}:</mark> {{ $row->issues->where('status', '0')->count() }}</p><hr/>

                                <p><mark class="text-primary">{{ __('field_status') }}:</mark> 
                                @if( $row->status == 1 )
                                <span class="badge badge-pill badge-success">{{ __('status_available') }}</span>
                                @elseif( $row->status == 2 )
                                <span class="badge badge-pill badge-warning">{{ __('status_damage') }}</span>
                                @else
                                <span class="badge badge-pill badge-danger">{{ __('status_lost') }}</span>
                                @endif
                                </p><hr/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p><mark class="text-primary">{{ __('field_description') }}:</mark> {!! $row->description !!}</p><hr/>
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
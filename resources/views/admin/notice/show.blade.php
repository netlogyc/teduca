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
                                <p><mark class="text-primary">{{ __('field_notice_no') }}:</mark> #{{ $row->notice_no }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_category') }}:</mark> {{ $row->category->title ?? '' }}</p><hr/>

                                <p><mark class="text-primary">{{ __('field_publish_date') }}:</mark> 
                                    @if(isset($setting->date_format))
                                    {{ date($setting->date_format, strtotime($row->date)) }}
                                    @else
                                    {{ date("Y-m-d", strtotime($row->date)) }}
                                    @endif
                                </p><hr/>

                                <p><mark class="text-primary">{{ __('field_status') }}:</mark> 
                                @if( $row->status == 1 )
                                <span class="badge badge-pill badge-success">{{ __('status_active') }}</span>
                                @else
                                <span class="badge badge-pill badge-danger">{{ __('status_inactive') }}</span>
                                @endif
                                <hr/>
                            </div>
                            <div class="col-md-6">
                                <p><mark class="text-primary">{{ __('field_faculty') }}:</mark> 
                                    @if($row->faculty_id == 0)
                                    {{ __('all') }}
                                    @endif
                                    @if(isset($row->faculty->title))
                                    {{ $row->faculty->title }}
                                    @endif
                                </p><hr/>

                                <p><mark class="text-primary">{{ __('field_program') }}:</mark> 
                                    @if($row->program_id == 0)
                                    {{ __('all') }}
                                    @endif
                                    @if(isset($row->program->title))
                                    {{ $row->program->title }}
                                    @endif
                                </p><hr/>

                                <p><mark class="text-primary">{{ __('field_session') }}:</mark> 
                                    @if($row->session_id == 0)
                                    {{ __('all') }}
                                    @endif
                                    @if(isset($row->session->title))
                                    {{ $row->session->title }}
                                    @endif
                                </p><hr/>

                                <p><mark class="text-primary">{{ __('field_semester') }}:</mark> 
                                    @if($row->semester_id == 0)
                                    {{ __('all') }}
                                    @endif
                                    @if(isset($row->semester->title))
                                    {{ $row->semester->title }}
                                    @endif
                                </p><hr/>

                                <p><mark class="text-primary">{{ __('field_section') }}:</mark> 
                                    @if($row->section_id == 0)
                                    {{ __('all') }}
                                    @endif
                                    @if(isset($row->section->title))
                                    {{ $row->section->title }}
                                    @endif
                                </p><hr/>
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
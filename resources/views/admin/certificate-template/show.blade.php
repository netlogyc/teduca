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
                    
                    <div class="template-container" style="border-image: url('{{ asset('uploads/'.$path.'/'.$row->background) }}') 30 round; width: {{ $row->width }}; height: {{ $row->height }};">
                      <div class="template-inner">
                        <!-- Header Section -->
                        <table class="table-no-border">
                            <tbody>
                                <tr>
                                    <td class="temp-logo">
                                      <div class="inner">
                                        @if(is_file('uploads/'.$path.'/'.$row->logo_left))
                                        <img src="{{ asset('uploads/'.$path.'/'.$row->logo_left) }}" alt="Logo">
                                        @endif
                                      </div>
                                    </td>
                                    <td class="temp-title">
                                      <div class="inner">
                                        <h2>{{ $setting->title ?? '' }}</h2>
                                      </div>
                                    </td>
                                    <td class="temp-logo last">
                                      <div class="inner">
                                        @if($row->student_photo == 1)
                                        <img src="{{ asset('dashboard/images/user/avatar-2.jpg') }}" alt="Student">
                                        @endif
                                      </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table-no-border">
                            <tbody>
                                <tr>
                                    <td class="main-title">
                                        <h4>{{ $row->title }}</h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- Header Section -->

                        <!-- Header Section -->
                        <table class="table-no-border">
                            <tbody>
                                <tr>
                                    <td class="meta-data">
                                        <div class="inner">{{ __('field_no') }}: 000197</div>
                                    </td>
                                    <td class="meta-data last">
                                        <div class="inner">{{ __('field_date') }}: 
                                            @if(isset($setting->date_format))
                                            {{ date($setting->date_format, strtotime(date('Y-m-d'))) }}
                                            @else
                                            {{ date("Y-m-d", strtotime(date('Y-m-d'))) }}
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- Header Section -->

                        <!-- Header Section -->
                        <table class="table-no-border">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="temp-body">
                                            {!! $row->body !!}
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- Header Section -->

                        <!-- Header Section -->
                        @if($row->barcode == 1)
                        <table class="table-no-border">
                            <tbody>
                                <tr>
                                    <td style="width: 33.33%; text-align: center;"></td>
                                    <td style="width: 33.33%; text-align: center; font-family: 'IDAHC39M Code 39 Barcode', Times, serif;">
                                        {!! DNS1D::getBarcodeSVG('IDAHC39M', 'C39', 1, 33, '#000', false) !!}
                                    </td>
                                    <td style="width: 33.33%; text-align: center;"></td>
                                </tr>
                            </tbody>
                        </table>
                        @endif
                        <table class="table-no-border">
                            <tbody>
                                <tr>
                                    <td class="temp-footer">
                                      <div class="inner">
                                        <p>{!! $row->footer_left !!}</p>
                                      </div>
                                    </td>
                                    <td class="temp-footer">
                                      <div class="inner">
                                        <p>{!! $row->footer_center !!}</p>
                                      </div>
                                    </td>
                                    <td class="temp-footer">
                                      <div class="inner">
                                        <p>{!! $row->footer_right !!}</p>
                                      </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- Header Section -->
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
@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <form class="needs-validation" novalidate action="{{ route($route.'.siteinfo') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $title }}</h5>
                    </div>
                    <div class="card-block row">
                        
                        <!-- Form Start -->
                        <input name="id" type="hidden" value="{{ (isset($row->id))?$row->id:-1 }}">

                        <div class="form-group col-md-6">
                            <label for="title">{{ __('field_site_title') }} <span>*</span></label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ isset($row->title)?$row->title:'' }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_site_title') }}
                            </div>
                        </div>

                        {{-- <div class="form-group col-md-6">
                            <label for="academy_code">{{ __('field_academy_code') }}</label>
                            <input type="text" class="form-control" name="academy_code" id="academy_code" value="{{ isset($row->academy_code)?$row->academy_code:'' }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_academy_code') }}
                            </div>
                        </div> --}}

                        <div class="form-group col-md-6">
                            <label for="meta_title">{{ __('field_meta_title') }} <span>*</span></label>
                            <input type="text" class="form-control" name="meta_title" id="meta_title" value="{{ isset($row->meta_title)?$row->meta_title:'' }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_meta_title') }}
                            </div>
                        </div>

                        <hr/>

                        <div class="form-group col-md-6">
                            <label for="meta_description">{{ __('field_meta_description') }}: <span>{{ __('field_meta_desc_length') }}</span></label>
                            <textarea class="form-control" name="meta_description" id="meta_description">{{ isset($row->meta_description)?$row->meta_description:'' }}</textarea>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_meta_description') }}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="meta_keywords">{{ __('field_meta_keywords') }}: <span>{{ __('field_keywords_separate') }}</span></label>
                            <textarea class="form-control" name="meta_keywords" id="meta_keywords">{{ isset($row->meta_keywords)?$row->meta_keywords:'' }}</textarea>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_meta_keywords') }}
                            </div>
                        </div>

                        <hr/>

                        <div class="form-group col-md-6">

                            @if(isset($row->logo_path))
                            @if(is_file('uploads/'.$path.'/'.$row->logo_path))
                            <img src="{{ asset('uploads/'.$path.'/'.$row->logo_path) }}" class="img-fluid setting-image" alt="{{ __('field_site_logo') }}">
                            <div class="clearfix"></div>
                            @endif
                            @endif

                            <label for="logo">{{ __('field_site_logo') }}: <span>{{ __('image_size', ['height' => 200, 'width' => 'Any']) }}</span></label>
                            <input type="file" class="form-control" name="logo" id="logo">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_site_logo') }}
                            </div>
                        </div>

                        <div class="form-group col-md-6">

                            @if(isset($row->favicon_path))
                            @if(is_file('uploads/'.$path.'/'.$row->favicon_path))
                            <img src="{{ asset('uploads/'.$path.'/'.$row->favicon_path) }}" class="img-fluid setting-image" alt="{{ __('field_site_favicon') }}">
                            <div class="clearfix"></div>
                            @endif
                            @endif

                            <label for="favicon">{{ __('field_site_favicon') }}: <span>{{ __('image_size', ['height' => 64, 'width' => 64]) }}</span></label>
                            <input type="file" class="form-control" name="favicon" id="favicon">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_site_favicon') }}
                            </div>
                        </div>

                        <hr/>

                        @if(isset($row->date_format))
                        <div class="form-group col-md-4">
                            <label for="date_format">{{ __('field_date_format') }} <span>*</span></label>
                            <select class="form-control" name="date_format" id="date_format" required>
                                <option value="">{{ __('select') }}</option>
                                <option value="d-m-Y" @if( $row->date_format == 'd-m-Y' ) selected @endif>DD-MM-YYYY</option>
                                <option value="m-d-Y" @if( $row->date_format == 'm-d-Y' ) selected @endif>MM-DD-YYYY</option>
                                <option value="Y-m-d" @if( $row->date_format == 'Y-m-d' ) selected @endif>YYYY-MM-DD</option>
                                <option value="d/m/Y" @if( $row->date_format == 'd/m/Y' ) selected @endif>DD/MM/YYYY</option>
                                <option value="m/d/Y" @if( $row->date_format == 'm/d/Y' ) selected @endif>MM/DD/YYYY</option>
                                <option value="Y/m/d" @if( $row->date_format == 'Y/m/d' ) selected @endif>YYYY/MM/DD</option>
                                <option value="d.m.Y" @if( $row->date_format == 'd.m.Y' ) selected @endif>DD.MM.YYYY</option>
                                <option value="m.d.Y" @if( $row->date_format == 'm.d.Y' ) selected @endif>MM.DD.YYYY</option>
                                <option value="Y.m.d" @if( $row->date_format == 'Y.m.d' ) selected @endif>YYYY.MM.DD</option>
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_date_format') }}
                            </div>
                        </div>
                        @endif

                        {{-- @if(isset($row->week_start))
                        <div class="form-group col-md-4">
                            <label for="week_start">{{ __('field_week_start') }} <span>*</span></label>
                            <select class="form-control" name="week_start" id="week_start" required>
                                <option value="">{{ __('select') }}</option>
                                <option value="1" @if( $row->week_start == '1' ) selected @endif>{{ __('day_saturday') }}</option>
                                <option value="2" @if( $row->week_start == '2' ) selected @endif>{{ __('day_sunday') }}</option>
                                <option value="3" @if( $row->week_start == '3' ) selected @endif>{{ __('day_monday') }}</option>
                                <option value="4" @if( $row->week_start == '4' ) selected @endif>{{ __('day_tuesday') }}</option>
                                <option value="5" @if( $row->week_start == '5' ) selected @endif>{{ __('day_wednesday') }}</option>
                                <option value="6" @if( $row->week_start == '6' ) selected @endif>{{ __('day_thursday') }}</option>
                                <option value="7" @if( $row->week_start == '7' ) selected @endif>{{ __('day_friday') }}</option>
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_week_start') }}
                            </div>
                        </div>
                        @endif --}}

                        @if(isset($row->time_format))
                        <div class="form-group col-md-4">
                            <label for="time_format">{{ __('field_time_format') }} <span>*</span></label>
                            <select class="form-control" name="time_format" id="time_format" required>
                                <option value="">{{ __('select') }}</option>
                                <option value="h:i:s" @if( $row->time_format == 'h:i:s' ) selected @endif>{{ __('HH:MM:SS') }}</option>
                                <option value="h:i:s A" @if( $row->time_format == 'h:i:s A' ) selected @endif>{{ __('HH:MM:SS XM') }}</option>
                                <option value="h:i" @if( $row->time_format == 'h:i' ) selected @endif>{{ __(('HH:MM')) }}</option>
                                <option value="h:i A" @if( $row->time_format == 'h:i A' ) selected @endif>{{ __('HH:MM XM') }}</option>
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_time_format') }}
                            </div>
                        </div>
                        @endif

                        @if(isset($row->time_zone))
                        <div class="form-group col-md-4">
                            <label for="time_zone">{{ __('field_time_zone') }} <span>*</span></label>
                            <select class="form-control" name="time_zone" id="time_zone" required>
                                <option value="">{{ __('select') }}</option>
                                <option value="Pacific/Midway" @if( $row->time_zone == 'Pacific/Midway' ) selected @endif>(GMT-11:00) Pacific, Midway</option>
                                <option value="Pacific/Niue" @if( $row->time_zone == 'Pacific/Niue' ) selected @endif>(GMT-11:00) Pacific, Niue</option>
                                <option value="Pacific/Pago_Pago" @if( $row->time_zone == 'Pacific/Pago_Pago' ) selected @endif>(GMT-11:00) Pacific, Pago Pago</option>
                                <option value="Pacific/Honolulu" @if( $row->time_zone == 'Pacific/Honolulu' ) selected @endif>(GMT-10:00) Pacific, Honolulu</option>
                                <option value="Pacific/Rarotonga" @if( $row->time_zone == 'Pacific/Rarotonga' ) selected @endif>(GMT-10:00) Pacific, Rarotonga</option>
                                <option value="Pacific/Tahiti" @if( $row->time_zone == 'Pacific/Tahiti' ) selected @endif>(GMT-10:00) Pacific, Tahiti</option>
                                <option value="Pacific/Marquesas" @if( $row->time_zone == 'Pacific/Marquesas' ) selected @endif>(GMT-09:30) Pacific, Marquesas</option>
                                <option value="America/Adak" @if( $row->time_zone == 'America/Adak' ) selected @endif>(GMT-09:00) America, Adak</option>
                                <option value="Pacific/Gambier" @if( $row->time_zone == 'Pacific/Gambier' ) selected @endif>(GMT-09:00) Pacific, Gambier</option>
                                <option value="America/Anchorage" @if( $row->time_zone == 'America/Anchorage' ) selected @endif>(GMT-08:00) America, Anchorage</option>
                                <option value="America/Juneau" @if( $row->time_zone == 'America/Juneau' ) selected @endif>(GMT-08:00) America, Juneau</option>
                                <option value="America/Metlakatla" @if( $row->time_zone == 'America/Metlakatla' ) selected @endif>(GMT-08:00) America, Metlakatla</option>
                                <option value="America/Nome" @if( $row->time_zone == 'America/Nome' ) selected @endif>(GMT-08:00) America, Nome</option>
                                <option value="America/Sitka" @if( $row->time_zone == 'America/Sitka' ) selected @endif>(GMT-08:00) America, Sitka</option>
                                <option value="America/Yakutat" @if( $row->time_zone == 'America/Yakutat' ) selected @endif>(GMT-08:00) America, Yakutat</option>
                                <option value="Pacific/Pitcairn" @if( $row->time_zone == 'Pacific/Pitcairn' ) selected @endif>(GMT-08:00) Pacific, Pitcairn</option>
                                <option value="America/Creston" @if( $row->time_zone == 'America/Creston' ) selected @endif>(GMT-07:00) America, Creston</option>
                                <option value="America/Dawson" @if( $row->time_zone == 'America/Dawson' ) selected @endif>(GMT-07:00) America, Dawson</option>
                                <option value="America/Dawson_Creek" @if( $row->time_zone == 'America/Dawson_Creek' ) selected @endif>(GMT-07:00) America, Dawson Creek</option>
                                <option value="America/Fort_Nelson" @if( $row->time_zone == 'America/Fort_Nelson' ) selected @endif>(GMT-07:00) America, Fort Nelson</option>
                                <option value="America/Hermosillo" @if( $row->time_zone == 'America/Hermosillo' ) selected @endif>(GMT-07:00) America, Hermosillo</option>
                                <option value="America/Los_Angeles" @if( $row->time_zone == 'America/Los_Angeles' ) selected @endif>(GMT-07:00) America, Los Angeles</option>
                                <option value="America/Phoenix" @if( $row->time_zone == 'America/Phoenix' ) selected @endif>(GMT-07:00) America, Phoenix</option>
                                <option value="America/Tijuana" @if( $row->time_zone == 'America/Tijuana' ) selected @endif>(GMT-07:00) America, Tijuana</option>
                                <option value="America/Vancouver" @if( $row->time_zone == 'America/Vancouver' ) selected @endif>(GMT-07:00) America, Vancouver</option>
                                <option value="America/Whitehorse" @if( $row->time_zone == 'America/Whitehorse' ) selected @endif>(GMT-07:00) America, Whitehorse</option>
                                <option value="America/Belize" @if( $row->time_zone == 'America/Belize' ) selected @endif>(GMT-06:00) America, Belize</option>
                                <option value="America/Boise" @if( $row->time_zone == 'America/Boise' ) selected @endif>(GMT-06:00) America, Boise</option>
                                <option value="America/Cambridge_Bay" @if( $row->time_zone == 'America/Cambridge_Bay' ) selected @endif>(GMT-06:00) America, Cambridge Bay</option>
                                <option value="America/Chihuahua" @if( $row->time_zone == 'America/Chihuahua' ) selected @endif>(GMT-06:00) America, Chihuahua</option>
                                <option value="America/Costa_Rica" @if( $row->time_zone == 'America/Costa_Rica' ) selected @endif>(GMT-06:00) America, Costa Rica</option>
                                <option value="America/Denver" @if( $row->time_zone == 'America/Denver' ) selected @endif>(GMT-06:00) America, Denver</option>
                                <option value="America/Edmonton" @if( $row->time_zone == 'America/Edmonton' ) selected @endif>(GMT-06:00) America, Edmonton</option>
                                <option value="America/El_Salvador" @if( $row->time_zone == 'America/El_Salvador' ) selected @endif>(GMT-06:00) America, El Salvador</option>
                                <option value="America/Guatemala" @if( $row->time_zone == 'America/Guatemala' ) selected @endif>(GMT-06:00) America, Guatemala</option>
                                <option value="America/Inuvik" @if( $row->time_zone == 'America/Inuvik' ) selected @endif>(GMT-06:00) America, Inuvik</option>
                                <option value="America/Managua" @if( $row->time_zone == 'America/Managua' ) selected @endif>(GMT-06:00) America, Managua</option>
                                <option value="America/Mazatlan" @if( $row->time_zone == 'America/Mazatlan' ) selected @endif>(GMT-06:00) America, Mazatlan</option>
                                <option value="America/Ojinaga" @if( $row->time_zone == 'America/Ojinaga' ) selected @endif>(GMT-06:00) America, Ojinaga</option>
                                <option value="America/Regina" @if( $row->time_zone == 'America/Regina' ) selected @endif>(GMT-06:00) America, Regina</option>
                                <option value="America/Swift_Current" @if( $row->time_zone == 'America/Swift_Current' ) selected @endif>(GMT-06:00) America, Swift Current</option>
                                <option value="America/Tegucigalpa" @if( $row->time_zone == 'America/Tegucigalpa' ) selected @endif>(GMT-06:00) America, Tegucigalpa</option>
                                <option value="America/Yellowknife" @if( $row->time_zone == 'America/Yellowknife' ) selected @endif>(GMT-06:00) America, Yellowknife</option>
                                <option value="Pacific/Easter" @if( $row->time_zone == 'Pacific/Easter' ) selected @endif>(GMT-06:00) Pacific, Easter</option>
                                <option value="Pacific/Galapagos" @if( $row->time_zone == 'Pacific/Galapagos' ) selected @endif>(GMT-06:00) Pacific, Galapagos</option>
                                <option value="America/Atikokan" @if( $row->time_zone == 'America/Atikokan' ) selected @endif>(GMT-05:00) America, Atikokan</option>
                                <option value="America/Bahia_Banderas" @if( $row->time_zone == 'America/Bahia_Banderas' ) selected @endif>(GMT-05:00) America, Bahia Banderas</option>
                                <option value="America/Bogota" @if( $row->time_zone == 'America/Bogota' ) selected @endif>(GMT-05:00) America, Bogota</option>
                                <option value="America/Cancun" @if( $row->time_zone == 'America/Cancun' ) selected @endif>(GMT-05:00) America, Cancun</option>
                                <option value="America/Cayman" @if( $row->time_zone == 'America/Cayman' ) selected @endif>(GMT-05:00) America, Cayman</option>
                                <option value="America/Chicago" @if( $row->time_zone == 'America/Chicago' ) selected @endif>(GMT-05:00) America, Chicago</option>
                                <option value="America/Eirunepe" @if( $row->time_zone == 'America/Eirunepe' ) selected @endif>(GMT-05:00) America, Eirunepe</option>
                                <option value="America/Guayaquil" @if( $row->time_zone == 'America/Guayaquil' ) selected @endif>(GMT-05:00) America, Guayaquil</option>
                                <option value="America/Indiana/Knox" @if( $row->time_zone == 'America/Indiana/Knox' ) selected @endif>(GMT-05:00) America, Indiana, Knox</option>
                                <option value="America/Indiana/Tell_City" @if( $row->time_zone == 'America/Indiana/Tell_City' ) selected @endif>(GMT-05:00) America, Indiana, Tell City</option>
                                <option value="America/Jamaica" @if( $row->time_zone == 'America/Jamaica' ) selected @endif>(GMT-05:00) America, Jamaica</option>
                                <option value="America/Lima" @if( $row->time_zone == 'America/Lima' ) selected @endif>(GMT-05:00) America, Lima</option>
                                <option value="America/Matamoros" @if( $row->time_zone == 'America/Matamoros' ) selected @endif>(GMT-05:00) America, Matamoros</option>
                                <option value="America/Menominee" @if( $row->time_zone == 'America/Menominee' ) selected @endif>(GMT-05:00) America, Menominee</option>
                                <option value="America/Merida" @if( $row->time_zone == 'America/Merida' ) selected @endif>(GMT-05:00) America, Merida</option>
                                <option value="America/Mexico_City" @if( $row->time_zone == 'America/Mexico_City' ) selected @endif>(GMT-05:00) America, Mexico City</option>
                                <option value="America/Monterrey" @if( $row->time_zone == 'America/Monterrey' ) selected @endif>(GMT-05:00) America, Monterrey</option>
                                <option value="America/North_Dakota/Beulah" @if( $row->time_zone == 'America/North_Dakota/Beulah' ) selected @endif>(GMT-05:00) America, North Dakota, Beulah</option>
                                <option value="America/North_Dakota/Center" @if( $row->time_zone == 'America/North_Dakota/Center' ) selected @endif>(GMT-05:00) America, North Dakota, Center</option>
                                <option value="America/North_Dakota/New_Salem" @if( $row->time_zone == 'America/North_Dakota/New_Salem' ) selected @endif>(GMT-05:00) America, North Dakota, New Salem</option>
                                <option value="America/Panama" @if( $row->time_zone == 'America/Panama' ) selected @endif>(GMT-05:00) America, Panama</option>
                                <option value="America/Rainy_River" @if( $row->time_zone == 'America/Rainy_River' ) selected @endif>(GMT-05:00) America, Rainy River</option>
                                <option value="America/Rankin_Inlet" @if( $row->time_zone == 'America/Rankin_Inlet' ) selected @endif>(GMT-05:00) America, Rankin Inlet</option>
                                <option value="America/Resolute" @if( $row->time_zone == 'America/Resolute' ) selected @endif>(GMT-05:00) America, Resolute</option>
                                <option value="America/Rio_Branco" @if( $row->time_zone == 'America/Rio_Branco' ) selected @endif>(GMT-05:00) America, Rio Branco</option>
                                <option value="America/Winnipeg" @if( $row->time_zone == 'America/Winnipeg' ) selected @endif>(GMT-05:00) America, Winnipeg</option>
                                <option value="America/Anguilla" @if( $row->time_zone == 'America/Anguilla' ) selected @endif>(GMT-04:00) America, Anguilla</option>
                                <option value="America/Antigua" @if( $row->time_zone == 'America/Antigua' ) selected @endif>(GMT-04:00) America, Antigua</option>
                                <option value="America/Aruba" @if( $row->time_zone == 'America/Aruba' ) selected @endif>(GMT-04:00) America, Aruba</option>
                                <option value="America/Asuncion" @if( $row->time_zone == 'America/Asuncion' ) selected @endif>(GMT-04:00) America, Asuncion</option>
                                <option value="America/Barbados" @if( $row->time_zone == 'America/Barbados' ) selected @endif>(GMT-04:00) America, Barbados</option>
                                <option value="America/Blanc-Sablon" @if( $row->time_zone == 'America/Blanc-Sablon' ) selected @endif>(GMT-04:00) America, Blanc-Sablon</option>
                                <option value="America/Boa_Vista" @if( $row->time_zone == 'America/Boa_Vista' ) selected @endif>(GMT-04:00) America, Boa Vista</option>
                                <option value="America/Campo_Grande" @if( $row->time_zone == 'America/Campo_Grande' ) selected @endif>(GMT-04:00) America, Campo Grande</option>
                                <option value="America/Caracas" @if( $row->time_zone == 'America/Caracas' ) selected @endif>(GMT-04:00) America, Caracas</option>
                                <option value="America/Cuiaba" @if( $row->time_zone == 'America/Cuiaba' ) selected @endif>(GMT-04:00) America, Cuiaba</option>
                                <option value="America/Curacao" @if( $row->time_zone == 'America/Curacao' ) selected @endif>(GMT-04:00) America, Curacao</option>
                                <option value="America/Detroit" @if( $row->time_zone == 'America/Detroit' ) selected @endif>(GMT-04:00) America, Detroit</option>
                                <option value="America/Dominica" @if( $row->time_zone == 'America/Dominica' ) selected @endif>(GMT-04:00) America, Dominica</option>
                                <option value="America/Grand_Turk" @if( $row->time_zone == 'America/Grand_Turk' ) selected @endif>(GMT-04:00) America, Grand Turk</option>
                                <option value="America/Grenada" @if( $row->time_zone == 'America/Grenada' ) selected @endif>(GMT-04:00) America, Grenada</option>
                                <option value="America/Guadeloupe" @if( $row->time_zone == 'America/Guadeloupe' ) selected @endif>(GMT-04:00) America, Guadeloupe</option>
                                <option value="America/Guyana" @if( $row->time_zone == 'America/Guyana' ) selected @endif>(GMT-04:00) America, Guyana</option>
                                <option value="America/Havana" @if( $row->time_zone == 'America/Havana' ) selected @endif>(GMT-04:00) America, Havana</option>
                                <option value="America/Indiana/Indianapolis" @if( $row->time_zone == 'America/Indiana/Indianapolis' ) selected @endif>(GMT-04:00) America, Indiana, Indianapolis</option>
                                <option value="America/Indiana/Marengo" @if( $row->time_zone == 'America/Indiana/Marengo' ) selected @endif>(GMT-04:00) America, Indiana, Marengo</option>
                                <option value="America/Indiana/Petersburg" @if( $row->time_zone == 'America/Indiana/Petersburg' ) selected @endif>(GMT-04:00) America, Indiana, Petersburg</option>
                                <option value="America/Indiana/Vevay" @if( $row->time_zone == 'America/Indiana/Vevay' ) selected @endif>(GMT-04:00) America, Indiana, Vevay</option>
                                <option value="America/Indiana/Vincennes" @if( $row->time_zone == 'America/Indiana/Vincennes' ) selected @endif>(GMT-04:00) America, Indiana, Vincennes</option>
                                <option value="America/Indiana/Winamac" @if( $row->time_zone == 'America/Indiana/Winamac' ) selected @endif>(GMT-04:00) America, Indiana, Winamac</option>
                                <option value="America/Iqaluit" @if( $row->time_zone == 'America/Iqaluit' ) selected @endif>(GMT-04:00) America, Iqaluit</option>
                                <option value="America/Kentucky/Louisville" @if( $row->time_zone == 'America/Kentucky/Louisville' ) selected @endif>(GMT-04:00) America, Kentucky, Louisville</option>
                                <option value="America/Kentucky/Monticello" @if( $row->time_zone == 'America/Kentucky/Monticello' ) selected @endif>(GMT-04:00) America, Kentucky, Monticello</option>
                                <option value="America/Kralendijk" @if( $row->time_zone == 'America/Kralendijk' ) selected @endif>(GMT-04:00) America, Kralendijk</option>
                                <option value="America/La_Paz" @if( $row->time_zone == 'America/La_Paz' ) selected @endif>(GMT-04:00) America, La Paz</option>
                                <option value="America/Lower_Princes" @if( $row->time_zone == 'America/Lower_Princes' ) selected @endif>(GMT-04:00) America, Lower Princes</option>
                                <option value="America/Manaus" @if( $row->time_zone == 'America/Manaus' ) selected @endif>(GMT-04:00) America, Manaus</option>
                                <option value="America/Marigot" @if( $row->time_zone == 'America/Marigot' ) selected @endif>(GMT-04:00) America, Marigot</option>
                                <option value="America/Martinique" @if( $row->time_zone == 'America/Martinique' ) selected @endif>(GMT-04:00) America, Martinique</option>
                                <option value="America/Montserrat" @if( $row->time_zone == 'America/Montserrat' ) selected @endif>(GMT-04:00) America, Montserrat</option>
                                <option value="America/Nassau" @if( $row->time_zone == 'America/Nassau' ) selected @endif>(GMT-04:00) America, Nassau</option>
                                <option value="America/New_York" @if( $row->time_zone == 'America/New_York' ) selected @endif>(GMT-04:00) America, New York</option>
                                <option value="America/Nipigon" @if( $row->time_zone == 'America/Nipigon' ) selected @endif>(GMT-04:00) America, Nipigon</option>
                                <option value="America/Pangnirtung" @if( $row->time_zone == 'America/Pangnirtung' ) selected @endif>(GMT-04:00) America, Pangnirtung</option>
                                <option value="America/Port_of_Spain" @if( $row->time_zone == 'America/Port_of_Spain' ) selected @endif>(GMT-04:00) America, Port of Spain</option>
                                <option value="America/Port-au-Prince" @if( $row->time_zone == 'America/Port-au-Prince' ) selected @endif>(GMT-04:00) America, Port-au-Prince</option>
                                <option value="America/Porto_Velho" @if( $row->time_zone == 'America/Porto_Velho' ) selected @endif>(GMT-04:00) America, Porto Velho</option>
                                <option value="America/Puerto_Rico" @if( $row->time_zone == 'America/Puerto_Rico' ) selected @endif>(GMT-04:00) America, Puerto Rico</option>
                                <option value="America/Santiago" @if( $row->time_zone == 'America/Santiago' ) selected @endif>(GMT-04:00) America, Santiago</option>
                                <option value="America/Santo_Domingo" @if( $row->time_zone == 'America/Santo_Domingo' ) selected @endif>(GMT-04:00) America, Santo Domingo</option>
                                <option value="America/St_Barthelemy" @if( $row->time_zone == 'America/St_Barthelemy' ) selected @endif>(GMT-04:00) America, St. Barthelemy</option>
                                <option value="America/St_Kitts" @if( $row->time_zone == 'America/St_Kitts' ) selected @endif>(GMT-04:00) America, St. Kitts</option>
                                <option value="America/St_Lucia" @if( $row->time_zone == 'America/St_Lucia' ) selected @endif>(GMT-04:00) America, St. Lucia</option>
                                <option value="America/St_Thomas" @if( $row->time_zone == 'America/St_Thomas' ) selected @endif>(GMT-04:00) America, St. Thomas</option>
                                <option value="America/St_Vincent" @if( $row->time_zone == 'America/St_Vincent' ) selected @endif>(GMT-04:00) America, St. Vincent</option>
                                <option value="America/Thunder_Bay" @if( $row->time_zone == 'America/Thunder_Bay' ) selected @endif>(GMT-04:00) America, Thunder Bay</option>
                                <option value="America/Toronto" @if( $row->time_zone == 'America/Toronto' ) selected @endif>(GMT-04:00) America, Toronto</option>
                                <option value="America/Tortola" @if( $row->time_zone == 'America/Tortola' ) selected @endif>(GMT-04:00) America, Tortola</option>
                                <option value="America/Araguaina" @if( $row->time_zone == 'America/Araguaina' ) selected @endif>(GMT-03:00) America, Araguaina</option>
                                <option value="America/Argentina/Buenos_Aires" @if( $row->time_zone == 'America/Argentina/Buenos_Aires' ) selected @endif>(GMT-03:00) America, Argentina, Buenos Aires</option>
                                <option value="America/Argentina/Catamarca" @if( $row->time_zone == 'America/Argentina/Catamarca' ) selected @endif>(GMT-03:00) America, Argentina, Catamarca</option>
                                <option value="America/Argentina/Cordoba" @if( $row->time_zone == 'America/Argentina/Cordoba' ) selected @endif>(GMT-03:00) America, Argentina, Cordoba</option>
                                <option value="America/Argentina/Jujuy" @if( $row->time_zone == 'America/Argentina/Jujuy' ) selected @endif>(GMT-03:00) America, Argentina, Jujuy</option>
                                <option value="America/Argentina/La_Rioja" @if( $row->time_zone == 'America/Argentina/La_Rioja' ) selected @endif>(GMT-03:00) America, Argentina, La Rioja</option>
                                <option value="America/Argentina/Mendoza" @if( $row->time_zone == 'America/Argentina/Mendoza' ) selected @endif>(GMT-03:00) America, Argentina, Mendoza</option>
                                <option value="America/Argentina/Rio_Gallegos" @if( $row->time_zone == 'America/Argentina/Rio_Gallegos' ) selected @endif>(GMT-03:00) America, Argentina, Rio Gallegos</option>
                                <option value="America/Argentina/Salta" @if( $row->time_zone == 'America/Argentina/Salta' ) selected @endif>(GMT-03:00) America, Argentina, Salta</option>
                                <option value="America/Argentina/San_Juan" @if( $row->time_zone == 'America/Argentina/San_Juan' ) selected @endif>(GMT-03:00) America, Argentina, San Juan</option>
                                <option value="America/Argentina/San_Luis" @if( $row->time_zone == 'America/Argentina/San_Luis' ) selected @endif>(GMT-03:00) America, Argentina, San Luis</option>
                                <option value="America/Argentina/Tucuman" @if( $row->time_zone == 'America/Argentina/Tucuman' ) selected @endif>(GMT-03:00) America, Argentina, Tucuman</option>
                                <option value="America/Argentina/Ushuaia" @if( $row->time_zone == 'America/Argentina/Ushuaia' ) selected @endif>(GMT-03:00) America, Argentina, Ushuaia</option>
                                <option value="America/Bahia" @if( $row->time_zone == 'America/Bahia' ) selected @endif>(GMT-03:00) America, Bahia</option>
                                <option value="America/Belem" @if( $row->time_zone == 'America/Belem' ) selected @endif>(GMT-03:00) America, Belem</option>
                                <option value="America/Cayenne" @if( $row->time_zone == 'America/Cayenne' ) selected @endif>(GMT-03:00) America, Cayenne</option>
                                <option value="America/Fortaleza" @if( $row->time_zone == 'America/Fortaleza' ) selected @endif>(GMT-03:00) America, Fortaleza</option>
                                <option value="America/Glace_Bay" @if( $row->time_zone == 'America/Glace_Bay' ) selected @endif>(GMT-03:00) America, Glace Bay</option>
                                <option value="America/Goose_Bay" @if( $row->time_zone == 'America/Goose_Bay' ) selected @endif>(GMT-03:00) America, Goose Bay</option>
                                <option value="America/Halifax" @if( $row->time_zone == 'America/Halifax' ) selected @endif>(GMT-03:00) America, Halifax</option>
                                <option value="America/Maceio" @if( $row->time_zone == 'America/Maceio' ) selected @endif>(GMT-03:00) America, Maceio</option>
                                <option value="America/Moncton" @if( $row->time_zone == 'America/Moncton' ) selected @endif>(GMT-03:00) America, Moncton</option>
                                <option value="America/Montevideo" @if( $row->time_zone == 'America/Montevideo' ) selected @endif>(GMT-03:00) America, Montevideo</option>
                                <option value="America/Paramaribo" @if( $row->time_zone == 'America/Paramaribo' ) selected @endif>(GMT-03:00) America, Paramaribo</option>
                                <option value="America/Punta_Arenas" @if( $row->time_zone == 'America/Punta_Arenas' ) selected @endif>(GMT-03:00) America, Punta Arenas</option>
                                <option value="America/Recife" @if( $row->time_zone == 'America/Recife' ) selected @endif>(GMT-03:00) America, Recife</option>
                                <option value="America/Santarem" @if( $row->time_zone == 'America/Santarem' ) selected @endif>(GMT-03:00) America, Santarem</option>
                                <option value="America/Sao_Paulo" @if( $row->time_zone == 'America/Sao_Paulo' ) selected @endif>(GMT-03:00) America, Sao Paulo</option>
                                <option value="America/Thule" @if( $row->time_zone == 'America/Thule' ) selected @endif>(GMT-03:00) America, Thule</option>
                                <option value="Antarctica/Palmer" @if( $row->time_zone == 'Antarctica/Palmer' ) selected @endif>(GMT-03:00) Antarctica, Palmer</option>
                                <option value="Antarctica/Rothera" @if( $row->time_zone == 'Antarctica/Rothera' ) selected @endif>(GMT-03:00) Antarctica, Rothera</option>
                                <option value="Atlantic/Bermuda" @if( $row->time_zone == 'Atlantic/Bermuda' ) selected @endif>(GMT-03:00) Atlantic, Bermuda</option>
                                <option value="Atlantic/Stanley" @if( $row->time_zone == 'Atlantic/Stanley' ) selected @endif>(GMT-03:00) Atlantic, Stanley</option>
                                <option value="America/St_Johns" @if( $row->time_zone == 'America/St_Johns' ) selected @endif>(GMT-02:30) America, St. Johns</option>
                                <option value="America/Godthab" @if( $row->time_zone == 'America/Godthab' ) selected @endif>(GMT-02:00) America, Godthab</option>
                                <option value="America/Miquelon" @if( $row->time_zone == 'America/Miquelon' ) selected @endif>(GMT-02:00) America, Miquelon</option>
                                <option value="America/Noronha" @if( $row->time_zone == 'America/Noronha' ) selected @endif>(GMT-02:00) America, Noronha</option>
                                <option value="Atlantic/South_Georgia" @if( $row->time_zone == 'Atlantic/South_Georgia' ) selected @endif>(GMT-02:00) Atlantic, South Georgia</option>
                                <option value="Atlantic/Cape_Verde" @if( $row->time_zone == 'Atlantic/Cape_Verde' ) selected @endif>(GMT-01:00) Atlantic, Cape Verde</option>
                                <option value="Africa/Abidjan" @if( $row->time_zone == 'Africa/Abidjan' ) selected @endif>(GMT) Africa, Abidjan</option>
                                <option value="Africa/Accra" @if( $row->time_zone == 'Africa/Accra' ) selected @endif>(GMT) Africa, Accra</option>
                                <option value="Africa/Bamako" @if( $row->time_zone == 'Africa/Bamako' ) selected @endif>(GMT) Africa, Bamako</option>
                                <option value="Africa/Banjul" @if( $row->time_zone == 'Africa/Banjul' ) selected @endif>(GMT) Africa, Banjul</option>
                                <option value="Africa/Bissau" @if( $row->time_zone == 'Africa/Bissau' ) selected @endif>(GMT) Africa, Bissau</option>
                                <option value="Africa/Conakry" @if( $row->time_zone == 'Africa/Conakry' ) selected @endif>(GMT) Africa, Conakry</option>
                                <option value="Africa/Dakar" @if( $row->time_zone == 'Africa/Dakar' ) selected @endif>(GMT) Africa, Dakar</option>
                                <option value="Africa/Freetown" @if( $row->time_zone == 'Africa/Freetown' ) selected @endif>(GMT) Africa, Freetown</option>
                                <option value="Africa/Lome" @if( $row->time_zone == 'Africa/Lome' ) selected @endif>(GMT) Africa, Lome</option>
                                <option value="Africa/Monrovia" @if( $row->time_zone == 'Africa/Monrovia' ) selected @endif>(GMT) Africa, Monrovia</option>
                                <option value="Africa/Nouakchott" @if( $row->time_zone == 'Africa/Nouakchott' ) selected @endif>(GMT) Africa, Nouakchott</option>
                                <option value="Africa/Ouagadougou" @if( $row->time_zone == 'Africa/Ouagadougou' ) selected @endif>(GMT) Africa, Ouagadougou</option>
                                <option value="Africa/Sao_Tome" @if( $row->time_zone == 'Africa/Sao_Tome' ) selected @endif>(GMT) Africa, Sao Tome</option>
                                <option value="America/Danmarkshavn" @if( $row->time_zone == 'America/Danmarkshavn' ) selected @endif>(GMT) America, Danmarkshavn</option>
                                <option value="America/Scoresbysund" @if( $row->time_zone == 'America/Scoresbysund' ) selected @endif>(GMT) America, Scoresbysund</option>
                                <option value="Atlantic/Azores" @if( $row->time_zone == 'Atlantic/Azores' ) selected @endif>(GMT) Atlantic, Azores</option>
                                <option value="Atlantic/Reykjavik" @if( $row->time_zone == 'Atlantic/Reykjavik' ) selected @endif>(GMT) Atlantic, Reykjavik</option>
                                <option value="Atlantic/St_Helena" @if( $row->time_zone == 'Atlantic/St_Helena' ) selected @endif>(GMT) Atlantic, St. Helena</option>
                                <option value="UTC" @if( $row->time_zone == 'UTC' ) selected @endif>(GMT) UTC</option>
                                <option value="Africa/Algiers" @if( $row->time_zone == 'Africa/Algiers' ) selected @endif>(GMT+01:00) Africa, Algiers</option>
                                <option value="Africa/Bangui" @if( $row->time_zone == 'Africa/Bangui' ) selected @endif>(GMT+01:00) Africa, Bangui</option>
                                <option value="Africa/Brazzaville" @if( $row->time_zone == 'Africa/Brazzaville' ) selected @endif>(GMT+01:00) Africa, Brazzaville</option>
                                <option value="Africa/Casablanca" @if( $row->time_zone == 'Africa/Casablanca' ) selected @endif>(GMT+01:00) Africa, Casablanca</option>
                                <option value="Africa/Douala" @if( $row->time_zone == 'Africa/Douala' ) selected @endif>(GMT+01:00) Africa, Douala</option>
                                <option value="Africa/El_Aaiun" @if( $row->time_zone == 'Africa/El_Aaiun' ) selected @endif>(GMT+01:00) Africa, El Aaiun</option>
                                <option value="Africa/Kinshasa" @if( $row->time_zone == 'Africa/Kinshasa' ) selected @endif>(GMT+01:00) Africa, Kinshasa</option>
                                <option value="Africa/Lagos" @if( $row->time_zone == 'Africa/Lagos' ) selected @endif>(GMT+01:00) Africa, Lagos</option>
                                <option value="Africa/Libreville" @if( $row->time_zone == 'Africa/Libreville' ) selected @endif>(GMT+01:00) Africa, Libreville</option>
                                <option value="Africa/Luanda" @if( $row->time_zone == 'Africa/Luanda' ) selected @endif>(GMT+01:00) Africa, Luanda</option>
                                <option value="Africa/Malabo" @if( $row->time_zone == 'Africa/Malabo' ) selected @endif>(GMT+01:00) Africa, Malabo</option>
                                <option value="Africa/Ndjamena" @if( $row->time_zone == 'Africa/Ndjamena' ) selected @endif>(GMT+01:00) Africa, Ndjamena</option>
                                <option value="Africa/Niamey" @if( $row->time_zone == 'Africa/Niamey' ) selected @endif>(GMT+01:00) Africa, Niamey</option>
                                <option value="Africa/Porto-Novo" @if( $row->time_zone == 'Africa/Porto-Novo' ) selected @endif>(GMT+01:00) Africa, Porto-Novo</option>
                                <option value="Africa/Tunis" @if( $row->time_zone == 'Africa/Tunis' ) selected @endif>(GMT+01:00) Africa, Tunis</option>
                                <option value="Atlantic/Canary" @if( $row->time_zone == 'Atlantic/Canary' ) selected @endif>(GMT+01:00) Atlantic, Canary</option>
                                <option value="Atlantic/Faroe" @if( $row->time_zone == 'Atlantic/Faroe' ) selected @endif>(GMT+01:00) Atlantic, Faroe</option>
                                <option value="Atlantic/Madeira" @if( $row->time_zone == 'Atlantic/Madeira' ) selected @endif>(GMT+01:00) Atlantic, Madeira</option>
                                <option value="Europe/Dublin" @if( $row->time_zone == 'Europe/Dublin' ) selected @endif>(GMT+01:00) Europe, Dublin</option>
                                <option value="Europe/Guernsey" @if( $row->time_zone == 'Europe/Guernsey' ) selected @endif>(GMT+01:00) Europe, Guernsey</option>
                                <option value="Europe/Isle_of_Man" @if( $row->time_zone == 'Europe/Isle_of_Man' ) selected @endif>(GMT+01:00) Europe, Isle of Man</option>
                                <option value="Europe/Jersey" @if( $row->time_zone == 'Europe/Jersey' ) selected @endif>(GMT+01:00) Europe, Jersey</option>
                                <option value="Europe/Lisbon" @if( $row->time_zone == 'Europe/Lisbon' ) selected @endif>(GMT+01:00) Europe, Lisbon</option>
                                <option value="Europe/London" @if( $row->time_zone == 'Europe/London' ) selected @endif>(GMT+01:00) Europe, London</option>
                                <option value="Africa/Blantyre" @if( $row->time_zone == 'Africa/Blantyre' ) selected @endif>(GMT+02:00) Africa, Blantyre</option>
                                <option value="Africa/Bujumbura" @if( $row->time_zone == 'Africa/Bujumbura' ) selected @endif>(GMT+02:00) Africa, Bujumbura</option>
                                <option value="Africa/Cairo" @if( $row->time_zone == 'Africa/Cairo' ) selected @endif>(GMT+02:00) Africa, Cairo</option>
                                <option value="Africa/Ceuta" @if( $row->time_zone == 'Africa/Ceuta' ) selected @endif>(GMT+02:00) Africa, Ceuta</option>
                                <option value="Africa/Gaborone" @if( $row->time_zone == 'Africa/Gaborone' ) selected @endif>(GMT+02:00) Africa, Gaborone</option>
                                <option value="Africa/Harare" @if( $row->time_zone == 'Africa/Harare' ) selected @endif>(GMT+02:00) Africa, Harare</option>
                                <option value="Africa/Johannesburg" @if( $row->time_zone == 'Africa/Johannesburg' ) selected @endif>(GMT+02:00) Africa, Johannesburg</option>
                                <option value="Africa/Khartoum" @if( $row->time_zone == 'Africa/Khartoum' ) selected @endif>(GMT+02:00) Africa, Khartoum</option>
                                <option value="Africa/Kigali" @if( $row->time_zone == 'Africa/Kigali' ) selected @endif>(GMT+02:00) Africa, Kigali</option>
                                <option value="Africa/Lubumbashi" @if( $row->time_zone == 'Africa/Lubumbashi' ) selected @endif>(GMT+02:00) Africa, Lubumbashi</option>
                                <option value="Africa/Lusaka" @if( $row->time_zone == 'Africa/Lusaka' ) selected @endif>(GMT+02:00) Africa, Lusaka</option>
                                <option value="Africa/Maputo" @if( $row->time_zone == 'Africa/Maputo' ) selected @endif>(GMT+02:00) Africa, Maputo</option>
                                <option value="Africa/Maseru" @if( $row->time_zone == 'Africa/Maseru' ) selected @endif>(GMT+02:00) Africa, Maseru</option>
                                <option value="Africa/Mbabane" @if( $row->time_zone == 'Africa/Mbabane' ) selected @endif>(GMT+02:00) Africa, Mbabane</option>
                                <option value="Africa/Tripoli" @if( $row->time_zone == 'Africa/Tripoli' ) selected @endif>(GMT+02:00) Africa, Tripoli</option>
                                <option value="Africa/Windhoek" @if( $row->time_zone == 'Africa/Windhoek' ) selected @endif>(GMT+02:00) Africa, Windhoek</option>
                                <option value="Antarctica/Troll" @if( $row->time_zone == 'Antarctica/Troll' ) selected @endif>(GMT+02:00) Antarctica, Troll</option>
                                <option value="Arctic/Longyearbyen" @if( $row->time_zone == 'Arctic/Longyearbyen' ) selected @endif>(GMT+02:00) Arctic, Longyearbyen</option>
                                <option value="Europe/Amsterdam" @if( $row->time_zone == 'Europe/Amsterdam' ) selected @endif>(GMT+02:00) Europe, Amsterdam</option>
                                <option value="Europe/Andorra" @if( $row->time_zone == 'Europe/Andorra' ) selected @endif>(GMT+02:00) Europe, Andorra</option>
                                <option value="Europe/Belgrade" @if( $row->time_zone == 'Europe/Belgrade' ) selected @endif>(GMT+02:00) Europe, Belgrade</option>
                                <option value="Europe/Berlin" @if( $row->time_zone == 'Europe/Berlin' ) selected @endif>(GMT+02:00) Europe, Berlin</option>
                                <option value="Europe/Bratislava" @if( $row->time_zone == 'Europe/Bratislava' ) selected @endif>(GMT+02:00) Europe, Bratislava</option>
                                <option value="Europe/Brussels" @if( $row->time_zone == 'Europe/Brussels' ) selected @endif>(GMT+02:00) Europe, Brussels</option>
                                <option value="Europe/Budapest" @if( $row->time_zone == 'Europe/Budapest' ) selected @endif>(GMT+02:00) Europe, Budapest</option>
                                <option value="Europe/Busingen" @if( $row->time_zone == 'Europe/Busingen' ) selected @endif>(GMT+02:00) Europe, Busingen</option>
                                <option value="Europe/Copenhagen" @if( $row->time_zone == 'Europe/Copenhagen' ) selected @endif>(GMT+02:00) Europe, Copenhagen</option>
                                <option value="Europe/Gibraltar" @if( $row->time_zone == 'Europe/Gibraltar' ) selected @endif>(GMT+02:00) Europe, Gibraltar</option>
                                <option value="Europe/Kaliningrad" @if( $row->time_zone == 'Europe/Kaliningrad' ) selected @endif>(GMT+02:00) Europe, Kaliningrad</option>
                                <option value="Europe/Ljubljana" @if( $row->time_zone == 'Europe/Ljubljana' ) selected @endif>(GMT+02:00) Europe, Ljubljana</option>
                                <option value="Europe/Luxembourg" @if( $row->time_zone == 'Europe/Luxembourg' ) selected @endif>(GMT+02:00) Europe, Luxembourg</option>
                                <option value="Europe/Madrid" @if( $row->time_zone == 'Europe/Madrid' ) selected @endif>(GMT+02:00) Europe, Madrid</option>
                                <option value="Europe/Malta" @if( $row->time_zone == 'Europe/Malta' ) selected @endif>(GMT+02:00) Europe, Malta</option>
                                <option value="Europe/Monaco" @if( $row->time_zone == 'Europe/Monaco' ) selected @endif>(GMT+02:00) Europe, Monaco</option>
                                <option value="Europe/Oslo" @if( $row->time_zone == 'Europe/Oslo' ) selected @endif>(GMT+02:00) Europe, Oslo</option>
                                <option value="Europe/Paris" @if( $row->time_zone == 'Europe/Paris' ) selected @endif>(GMT+02:00) Europe, Paris</option>
                                <option value="Europe/Podgorica" @if( $row->time_zone == 'Europe/Podgorica' ) selected @endif>(GMT+02:00) Europe, Podgorica</option>
                                <option value="Europe/Prague" @if( $row->time_zone == 'Europe/Prague' ) selected @endif>(GMT+02:00) Europe, Prague</option>
                                <option value="Europe/Rome" @if( $row->time_zone == 'Europe/Rome' ) selected @endif>(GMT+02:00) Europe, Rome</option>
                                <option value="Europe/San_Marino" @if( $row->time_zone == 'Europe/San_Marino' ) selected @endif>(GMT+02:00) Europe, San Marino</option>
                                <option value="Europe/Sarajevo" @if( $row->time_zone == 'Europe/Sarajevo' ) selected @endif>(GMT+02:00) Europe, Sarajevo</option>
                                <option value="Europe/Skopje" @if( $row->time_zone == 'Europe/Skopje' ) selected @endif>(GMT+02:00) Europe, Skopje</option>
                                <option value="Europe/Stockholm" @if( $row->time_zone == 'Europe/Stockholm' ) selected @endif>(GMT+02:00) Europe, Stockholm</option>
                                <option value="Europe/Tirane" @if( $row->time_zone == 'Europe/Tirane' ) selected @endif>(GMT+02:00) Europe, Tirane</option>
                                <option value="Europe/Vaduz" @if( $row->time_zone == 'Europe/Vaduz' ) selected @endif>(GMT+02:00) Europe, Vaduz</option>
                                <option value="Europe/Vatican" @if( $row->time_zone == 'Europe/Vatican' ) selected @endif>(GMT+02:00) Europe, Vatican</option>
                                <option value="Europe/Vienna" @if( $row->time_zone == 'Europe/Vienna' ) selected @endif>(GMT+02:00) Europe, Vienna</option>
                                <option value="Europe/Warsaw" @if( $row->time_zone == 'Europe/Warsaw' ) selected @endif>(GMT+02:00) Europe, Warsaw</option>
                                <option value="Europe/Zagreb" @if( $row->time_zone == 'Europe/Zagreb' ) selected @endif>(GMT+02:00) Europe, Zagreb</option>
                                <option value="Europe/Zurich" @if( $row->time_zone == 'Europe/Zurich' ) selected @endif>(GMT+02:00) Europe, Zurich</option>
                                <option value="Africa/Addis_Ababa" @if( $row->time_zone == 'Africa/Addis_Ababa' ) selected @endif>(GMT+03:00) Africa, Addis Ababa</option>
                                <option value="Africa/Asmara" @if( $row->time_zone == 'Africa/Asmara' ) selected @endif>(GMT+03:00) Africa, Asmara</option>
                                <option value="Africa/Dar_es_Salaam" @if( $row->time_zone == 'Africa/Dar_es_Salaam' ) selected @endif>(GMT+03:00) Africa, Dar es Salaam</option>
                                <option value="Africa/Djibouti" @if( $row->time_zone == 'Africa/Djibouti' ) selected @endif>(GMT+03:00) Africa, Djibouti</option>
                                <option value="Africa/Juba" @if( $row->time_zone == 'Africa/Juba' ) selected @endif>(GMT+03:00) Africa, Juba</option>
                                <option value="Africa/Kampala" @if( $row->time_zone == 'Africa/Kampala' ) selected @endif>(GMT+03:00) Africa, Kampala</option>
                                <option value="Africa/Mogadishu" @if( $row->time_zone == 'Africa/Mogadishu' ) selected @endif>(GMT+03:00) Africa, Mogadishu</option>
                                <option value="Africa/Nairobi" @if( $row->time_zone == 'Africa/Nairobi' ) selected @endif>(GMT+03:00) Africa, Nairobi</option>
                                <option value="Antarctica/Syowa" @if( $row->time_zone == 'Antarctica/Syowa' ) selected @endif>(GMT+03:00) Antarctica, Syowa</option>
                                <option value="Asia/Aden" @if( $row->time_zone == 'Asia/Aden' ) selected @endif>(GMT+03:00) Asia, Aden</option>
                                <option value="Asia/Amman" @if( $row->time_zone == 'Asia/Amman' ) selected @endif>(GMT+03:00) Asia, Amman</option>
                                <option value="Asia/Baghdad" @if( $row->time_zone == 'Asia/Baghdad' ) selected @endif>(GMT+03:00) Asia, Baghdad</option>
                                <option value="Asia/Bahrain" @if( $row->time_zone == 'Asia/Bahrain' ) selected @endif>(GMT+03:00) Asia, Bahrain</option>
                                <option value="Asia/Beirut" @if( $row->time_zone == 'Asia/Beirut' ) selected @endif>(GMT+03:00) Asia, Beirut</option>
                                <option value="Asia/Damascus" @if( $row->time_zone == 'Asia/Damascus' ) selected @endif>(GMT+03:00) Asia, Damascus</option>
                                <option value="Asia/Famagusta" @if( $row->time_zone == 'Asia/Famagusta' ) selected @endif>(GMT+03:00) Asia, Famagusta</option>
                                <option value="Asia/Gaza" @if( $row->time_zone == 'Asia/Gaza' ) selected @endif>(GMT+03:00) Asia, Gaza</option>
                                <option value="Asia/Hebron" @if( $row->time_zone == 'Asia/Hebron' ) selected @endif>(GMT+03:00) Asia, Hebron</option>
                                <option value="Asia/Jerusalem" @if( $row->time_zone == 'Asia/Jerusalem' ) selected @endif>(GMT+03:00) Asia, Jerusalem</option>
                                <option value="Asia/Kuwait" @if( $row->time_zone == 'Asia/Kuwait' ) selected @endif>(GMT+03:00) Asia, Kuwait</option>
                                <option value="Asia/Nicosia" @if( $row->time_zone == 'Asia/Nicosia' ) selected @endif>(GMT+03:00) Asia, Nicosia</option>
                                <option value="Asia/Qatar" @if( $row->time_zone == 'Asia/Qatar' ) selected @endif>(GMT+03:00) Asia, Qatar</option>
                                <option value="Asia/Riyadh" @if( $row->time_zone == 'Asia/Riyadh' ) selected @endif>(GMT+03:00) Asia, Riyadh</option>
                                <option value="Europe/Athens" @if( $row->time_zone == 'Europe/Athens' ) selected @endif>(GMT+03:00) Europe, Athens</option>
                                <option value="Europe/Bucharest" @if( $row->time_zone == 'Europe/Bucharest' ) selected @endif>(GMT+03:00) Europe, Bucharest</option>
                                <option value="Europe/Chisinau" @if( $row->time_zone == 'Europe/Chisinau' ) selected @endif>(GMT+03:00) Europe, Chisinau</option>
                                <option value="Europe/Helsinki" @if( $row->time_zone == 'Europe/Helsinki' ) selected @endif>(GMT+03:00) Europe, Helsinki</option>
                                <option value="Europe/Istanbul" @if( $row->time_zone == 'Europe/Istanbul' ) selected @endif>(GMT+03:00) Europe, Istanbul</option>
                                <option value="Europe/Kiev" @if( $row->time_zone == 'Europe/Kiev' ) selected @endif>(GMT+03:00) Europe, Kiev</option>
                                <option value="Europe/Kirov" @if( $row->time_zone == 'Europe/Kirov' ) selected @endif>(GMT+03:00) Europe, Kirov</option>
                                <option value="Europe/Mariehamn" @if( $row->time_zone == 'Europe/Mariehamn' ) selected @endif>(GMT+03:00) Europe, Mariehamn</option>
                                <option value="Europe/Minsk" @if( $row->time_zone == 'Europe/Minsk' ) selected @endif>(GMT+03:00) Europe, Minsk</option>
                                <option value="Europe/Moscow" @if( $row->time_zone == 'Europe/Moscow' ) selected @endif>(GMT+03:00) Europe, Moscow</option>
                                <option value="Europe/Riga" @if( $row->time_zone == 'Europe/Riga' ) selected @endif>(GMT+03:00) Europe, Riga</option>
                                <option value="Europe/Simferopol" @if( $row->time_zone == 'Europe/Simferopol' ) selected @endif>(GMT+03:00) Europe, Simferopol</option>
                                <option value="Europe/Sofia" @if( $row->time_zone == 'Europe/Sofia' ) selected @endif>(GMT+03:00) Europe, Sofia</option>
                                <option value="Europe/Tallinn" @if( $row->time_zone == 'Europe/Tallinn' ) selected @endif>(GMT+03:00) Europe, Tallinn</option>
                                <option value="Europe/Uzhgorod" @if( $row->time_zone == 'Europe/Uzhgorod' ) selected @endif>(GMT+03:00) Europe, Uzhgorod</option>
                                <option value="Europe/Vilnius" @if( $row->time_zone == 'Europe/Vilnius' ) selected @endif>(GMT+03:00) Europe, Vilnius</option>
                                <option value="Europe/Zaporozhye" @if( $row->time_zone == 'Europe/Zaporozhye' ) selected @endif>(GMT+03:00) Europe, Zaporozhye</option>
                                <option value="Indian/Antananarivo" @if( $row->time_zone == 'Indian/Antananarivo' ) selected @endif>(GMT+03:00) Indian, Antananarivo</option>
                                <option value="Indian/Comoro" @if( $row->time_zone == 'Indian/Comoro' ) selected @endif>(GMT+03:00) Indian, Comoro</option>
                                <option value="Indian/Mayotte" @if( $row->time_zone == 'Indian/Mayotte' ) selected @endif>(GMT+03:00) Indian, Mayotte</option>
                                <option value="Asia/Baku" @if( $row->time_zone == 'Asia/Baku' ) selected @endif>(GMT+04:00) Asia, Baku</option>
                                <option value="Asia/Dubai" @if( $row->time_zone == 'Asia/Dubai' ) selected @endif>(GMT+04:00) Asia, Dubai</option>
                                <option value="Asia/Muscat" @if( $row->time_zone == 'Asia/Muscat' ) selected @endif>(GMT+04:00) Asia, Muscat</option>
                                <option value="Asia/Tbilisi" @if( $row->time_zone == 'Asia/Tbilisi' ) selected @endif>(GMT+04:00) Asia, Tbilisi</option>
                                <option value="Asia/Yerevan" @if( $row->time_zone == 'Asia/Yerevan' ) selected @endif>(GMT+04:00) Asia, Yerevan</option>
                                <option value="Europe/Astrakhan" @if( $row->time_zone == 'Europe/Astrakhan' ) selected @endif>(GMT+04:00) Europe, Astrakhan</option>
                                <option value="Europe/Samara" @if( $row->time_zone == 'Europe/Samara' ) selected @endif>(GMT+04:00) Europe, Samara</option>
                                <option value="Europe/Saratov" @if( $row->time_zone == 'Europe/Saratov' ) selected @endif>(GMT+04:00) Europe, Saratov</option>
                                <option value="Europe/Ulyanovsk" @if( $row->time_zone == 'Europe/Ulyanovsk' ) selected @endif>(GMT+04:00) Europe, Ulyanovsk</option>
                                <option value="Europe/Volgograd" @if( $row->time_zone == 'Europe/Volgograd' ) selected @endif>(GMT+04:00) Europe, Volgograd</option>
                                <option value="Indian/Mahe" @if( $row->time_zone == 'Indian/Mahe' ) selected @endif>(GMT+04:00) Indian, Mahe</option>
                                <option value="Indian/Mauritius" @if( $row->time_zone == 'Indian/Mauritius' ) selected @endif>(GMT+04:00) Indian, Mauritius</option>
                                <option value="Indian/Reunion" @if( $row->time_zone == 'Indian/Reunion' ) selected @endif>(GMT+04:00) Indian, Reunion</option>
                                <option value="Asia/Kabul" @if( $row->time_zone == 'Asia/Kabul' ) selected @endif>(GMT+04:30) Asia, Kabul</option>
                                <option value="Asia/Tehran" @if( $row->time_zone == 'Asia/Tehran' ) selected @endif>(GMT+04:30) Asia, Tehran</option>
                                <option value="Antarctica/Mawson" @if( $row->time_zone == 'Antarctica/Mawson' ) selected @endif>(GMT+05:00) Antarctica, Mawson</option>
                                <option value="Asia/Aqtau" @if( $row->time_zone == 'Asia/Aqtau' ) selected @endif>(GMT+05:00) Asia, Aqtau</option>
                                <option value="Asia/Aqtobe" @if( $row->time_zone == 'Asia/Aqtobe' ) selected @endif>(GMT+05:00) Asia, Aqtobe</option>
                                <option value="Asia/Ashgabat" @if( $row->time_zone == 'Asia/Ashgabat' ) selected @endif>(GMT+05:00) Asia, Ashgabat</option>
                                <option value="Asia/Atyrau" @if( $row->time_zone == 'Asia/Atyrau' ) selected @endif>(GMT+05:00) Asia, Atyrau</option>
                                <option value="Asia/Dushanbe" @if( $row->time_zone == 'Asia/Dushanbe' ) selected @endif>(GMT+05:00) Asia, Dushanbe</option>
                                <option value="Asia/Karachi" @if( $row->time_zone == 'Asia/Karachi' ) selected @endif>(GMT+05:00) Asia, Karachi</option>
                                <option value="Asia/Oral" @if( $row->time_zone == 'Asia/Oral' ) selected @endif>(GMT+05:00) Asia, Oral</option>
                                <option value="Asia/Qyzylorda" @if( $row->time_zone == 'Asia/Qyzylorda' ) selected @endif>(GMT+05:00) Asia, Qyzylorda</option>
                                <option value="Asia/Samarkand" @if( $row->time_zone == 'Asia/Samarkand' ) selected @endif>(GMT+05:00) Asia, Samarkand</option>
                                <option value="Asia/Tashkent" @if( $row->time_zone == 'Asia/Tashkent' ) selected @endif>(GMT+05:00) Asia, Tashkent</option>
                                <option value="Asia/Yekaterinburg" @if( $row->time_zone == 'Asia/Yekaterinburg' ) selected @endif>(GMT+05:00) Asia, Yekaterinburg</option>
                                <option value="Indian/Kerguelen" @if( $row->time_zone == 'Indian/Kerguelen' ) selected @endif>(GMT+05:00) Indian, Kerguelen</option>
                                <option value="Indian/Maldives" @if( $row->time_zone == 'Indian/Maldives' ) selected @endif>(GMT+05:00) Indian, Maldives</option>
                                <option value="Asia/Colombo" @if( $row->time_zone == 'Asia/Colombo' ) selected @endif>(GMT+05:30) Asia, Colombo</option>
                                <option value="Asia/Kolkata" @if( $row->time_zone == 'Asia/Kolkata' ) selected @endif>(GMT+05:30) Asia, Kolkata</option>
                                <option value="Asia/Kathmandu" @if( $row->time_zone == 'Asia/Kathmandu' ) selected @endif>(GMT+05:45) Asia, Kathmandu</option>
                                <option value="Antarctica/Vostok" @if( $row->time_zone == 'Antarctica/Vostok' ) selected @endif>(GMT+06:00) Antarctica, Vostok</option>
                                <option value="Asia/Almaty" @if( $row->time_zone == 'Asia/Almaty' ) selected @endif>(GMT+06:00) Asia, Almaty</option>
                                <option value="Asia/Bishkek" @if( $row->time_zone == 'Asia/Bishkek' ) selected @endif>(GMT+06:00) Asia, Bishkek</option>
                                <option value="Asia/Dhaka" @if( $row->time_zone == 'Asia/Dhaka' ) selected @endif>(GMT+06:00) Asia, Dhaka</option>
                                <option value="Asia/Omsk" @if( $row->time_zone == 'Asia/Omsk' ) selected @endif>(GMT+06:00) Asia, Omsk</option>
                                <option value="Asia/Qostanay" @if( $row->time_zone == 'Asia/Qostanay' ) selected @endif>(GMT+06:00) Asia, Qostanay</option>
                                <option value="Asia/Thimphu" @if( $row->time_zone == 'Asia/Thimphu' ) selected @endif>(GMT+06:00) Asia, Thimphu</option>
                                <option value="Asia/Urumqi" @if( $row->time_zone == 'Asia/Urumqi' ) selected @endif>(GMT+06:00) Asia, Urumqi</option>
                                <option value="Indian/Chagos" @if( $row->time_zone == 'Indian/Chagos' ) selected @endif>(GMT+06:00) Indian, Chagos</option>
                                <option value="Asia/Yangon" @if( $row->time_zone == 'Asia/Yangon' ) selected @endif>(GMT+06:30) Asia, Yangon</option>
                                <option value="Indian/Cocos" @if( $row->time_zone == 'Indian/Cocos' ) selected @endif>(GMT+06:30) Indian, Cocos</option>
                                <option value="Antarctica/Davis" @if( $row->time_zone == 'Antarctica/Davis' ) selected @endif>(GMT+07:00) Antarctica, Davis</option>
                                <option value="Asia/Bangkok" @if( $row->time_zone == 'Asia/Bangkok' ) selected @endif>(GMT+07:00) Asia, Bangkok</option>
                                <option value="Asia/Barnaul" @if( $row->time_zone == 'Asia/Barnaul' ) selected @endif>(GMT+07:00) Asia, Barnaul</option>
                                <option value="Asia/Ho_Chi_Minh" @if( $row->time_zone == 'Asia/Ho_Chi_Minh' ) selected @endif>(GMT+07:00) Asia, Ho Chi Minh</option>
                                <option value="Asia/Hovd" @if( $row->time_zone == 'Asia/Hovd' ) selected @endif>(GMT+07:00) Asia, Hovd</option>
                                <option value="Asia/Jakarta" @if( $row->time_zone == 'Asia/Jakarta' ) selected @endif>(GMT+07:00) Asia, Jakarta</option>
                                <option value="Asia/Krasnoyarsk" @if( $row->time_zone == 'Asia/Krasnoyarsk' ) selected @endif>(GMT+07:00) Asia, Krasnoyarsk</option>
                                <option value="Asia/Novokuznetsk" @if( $row->time_zone == 'Asia/Novokuznetsk' ) selected @endif>(GMT+07:00) Asia, Novokuznetsk</option>
                                <option value="Asia/Novosibirsk" @if( $row->time_zone == 'Asia/Novosibirsk' ) selected @endif>(GMT+07:00) Asia, Novosibirsk</option>
                                <option value="Asia/Phnom_Penh" @if( $row->time_zone == 'Asia/Phnom_Penh' ) selected @endif>(GMT+07:00) Asia, Phnom Penh</option>
                                <option value="Asia/Pontianak" @if( $row->time_zone == 'Asia/Pontianak' ) selected @endif>(GMT+07:00) Asia, Pontianak</option>
                                <option value="Asia/Tomsk" @if( $row->time_zone == 'Asia/Tomsk' ) selected @endif>(GMT+07:00) Asia, Tomsk</option>
                                <option value="Asia/Vientiane" @if( $row->time_zone == 'Asia/Vientiane' ) selected @endif>(GMT+07:00) Asia, Vientiane</option>
                                <option value="Indian/Christmas" @if( $row->time_zone == 'Indian/Christmas' ) selected @endif>(GMT+07:00) Indian, Christmas</option>
                                <option value="Antarctica/Casey" @if( $row->time_zone == 'Antarctica/Casey' ) selected @endif>(GMT+08:00) Antarctica, Casey</option>
                                <option value="Asia/Brunei" @if( $row->time_zone == 'Asia/Brunei' ) selected @endif>(GMT+08:00) Asia, Brunei</option>
                                <option value="Asia/Choibalsan" @if( $row->time_zone == 'Asia/Choibalsan' ) selected @endif>(GMT+08:00) Asia, Choibalsan</option>
                                <option value="Asia/Hong_Kong" @if( $row->time_zone == 'Asia/Hong_Kong' ) selected @endif>(GMT+08:00) Asia, Hong Kong</option>
                                <option value="Asia/Irkutsk" @if( $row->time_zone == 'Asia/Irkutsk' ) selected @endif>(GMT+08:00) Asia, Irkutsk</option>
                                <option value="Asia/Kuala_Lumpur" @if( $row->time_zone == 'Asia/Kuala_Lumpur' ) selected @endif>(GMT+08:00) Asia, Kuala Lumpur</option>
                                <option value="Asia/Kuching" @if( $row->time_zone == 'Asia/Kuching' ) selected @endif>(GMT+08:00) Asia, Kuching</option>
                                <option value="Asia/Macau" @if( $row->time_zone == 'Asia/Macau' ) selected @endif>(GMT+08:00) Asia, Macau</option>
                                <option value="Asia/Makassar" @if( $row->time_zone == 'Asia/Makassar' ) selected @endif>(GMT+08:00) Asia, Makassar</option>
                                <option value="Asia/Manila" @if( $row->time_zone == 'Asia/Manila' ) selected @endif>(GMT+08:00) Asia, Manila</option>
                                <option value="Asia/Shanghai" @if( $row->time_zone == 'Asia/Shanghai' ) selected @endif>(GMT+08:00) Asia, Shanghai</option>
                                <option value="Asia/Singapore" @if( $row->time_zone == 'Asia/Singapore' ) selected @endif>(GMT+08:00) Asia, Singapore</option>
                                <option value="Asia/Taipei" @if( $row->time_zone == 'Asia/Taipei' ) selected @endif>(GMT+08:00) Asia, Taipei</option>
                                <option value="Asia/Ulaanbaatar" @if( $row->time_zone == 'Asia/Ulaanbaatar' ) selected @endif>(GMT+08:00) Asia, Ulaanbaatar</option>
                                <option value="Australia/Perth" @if( $row->time_zone == 'Australia/Perth' ) selected @endif>(GMT+08:00) Australia, Perth</option>
                                <option value="Australia/Eucla" @if( $row->time_zone == 'Australia/Eucla' ) selected @endif>(GMT+08:45) Australia, Eucla</option>
                                <option value="Asia/Chita" @if( $row->time_zone == 'Asia/Chita' ) selected @endif>(GMT+09:00) Asia, Chita</option>
                                <option value="Asia/Dili" @if( $row->time_zone == 'Asia/Dili' ) selected @endif>(GMT+09:00) Asia, Dili</option>
                                <option value="Asia/Jayapura" @if( $row->time_zone == 'Asia/Jayapura' ) selected @endif>(GMT+09:00) Asia, Jayapura</option>
                                <option value="Asia/Khandyga" @if( $row->time_zone == 'Asia/Khandyga' ) selected @endif>(GMT+09:00) Asia, Khandyga</option>
                                <option value="Asia/Pyongyang" @if( $row->time_zone == 'Asia/Pyongyang' ) selected @endif>(GMT+09:00) Asia, Pyongyang</option>
                                <option value="Asia/Seoul" @if( $row->time_zone == 'Asia/Seoul' ) selected @endif>(GMT+09:00) Asia, Seoul</option>
                                <option value="Asia/Tokyo" @if( $row->time_zone == 'Asia/Tokyo' ) selected @endif>(GMT+09:00) Asia, Tokyo</option>
                                <option value="Asia/Yakutsk" @if( $row->time_zone == 'Asia/Yakutsk' ) selected @endif>(GMT+09:00) Asia, Yakutsk</option>
                                <option value="Pacific/Palau" @if( $row->time_zone == 'Pacific/Palau' ) selected @endif>(GMT+09:00) Pacific, Palau</option>
                                <option value="Australia/Adelaide" @if( $row->time_zone == 'Australia/Adelaide' ) selected @endif>(GMT+09:30) Australia, Adelaide</option>
                                <option value="Australia/Broken_Hill" @if( $row->time_zone == 'Australia/Broken_Hill' ) selected @endif>(GMT+09:30) Australia, Broken Hill</option>
                                <option value="Australia/Darwin" @if( $row->time_zone == 'Australia/Darwin' ) selected @endif>(GMT+09:30) Australia, Darwin</option>
                                <option value="Antarctica/DumontDUrville" @if( $row->time_zone == 'Antarctica/DumontDUrville' ) selected @endif>(GMT+10:00) Antarctica, DumontDUrville</option>
                                <option value="Asia/Ust-Nera" @if( $row->time_zone == 'Asia/Ust-Nera' ) selected @endif>(GMT+10:00) Asia, Ust-Nera</option>
                                <option value="Asia/Vladivostok" @if( $row->time_zone == 'Asia/Vladivostok' ) selected @endif>(GMT+10:00) Asia, Vladivostok</option>
                                <option value="Australia/Brisbane" @if( $row->time_zone == 'Australia/Brisbane' ) selected @endif>(GMT+10:00) Australia, Brisbane</option>
                                <option value="Australia/Currie" @if( $row->time_zone == 'Australia/Currie' ) selected @endif>(GMT+10:00) Australia, Currie</option>
                                <option value="Australia/Hobart" @if( $row->time_zone == 'Australia/Hobart' ) selected @endif>(GMT+10:00) Australia, Hobart</option>
                                <option value="Australia/Lindeman" @if( $row->time_zone == 'Australia/Lindeman' ) selected @endif>(GMT+10:00) Australia, Lindeman</option>
                                <option value="Australia/Melbourne" @if( $row->time_zone == 'Australia/Melbourne' ) selected @endif>(GMT+10:00) Australia, Melbourne</option>
                                <option value="Australia/Sydney" @if( $row->time_zone == 'Australia/Sydney' ) selected @endif>(GMT+10:00) Australia, Sydney</option>
                                <option value="Pacific/Chuuk" @if( $row->time_zone == 'Pacific/Chuuk' ) selected @endif>(GMT+10:00) Pacific, Chuuk</option>
                                <option value="Pacific/Guam" @if( $row->time_zone == 'Pacific/Guam' ) selected @endif>(GMT+10:00) Pacific, Guam</option>
                                <option value="Pacific/Port_Moresby" @if( $row->time_zone == 'Pacific/Port_Moresby' ) selected @endif>(GMT+10:00) Pacific, Port Moresby</option>
                                <option value="Pacific/Saipan" @if( $row->time_zone == 'Pacific/Saipan' ) selected @endif>(GMT+10:00) Pacific, Saipan</option>
                                <option value="Australia/Lord_Howe" @if( $row->time_zone == 'Australia/Lord_Howe' ) selected @endif>(GMT+10:30) Australia, Lord Howe</option>
                                <option value="Antarctica/Macquarie" @if( $row->time_zone == 'Antarctica/Macquarie' ) selected @endif>(GMT+11:00) Antarctica, Macquarie</option>
                                <option value="Asia/Magadan" @if( $row->time_zone == 'Asia/Magadan' ) selected @endif>(GMT+11:00) Asia, Magadan</option>
                                <option value="Asia/Sakhalin" @if( $row->time_zone == 'Asia/Sakhalin' ) selected @endif>(GMT+11:00) Asia, Sakhalin</option>
                                <option value="Asia/Srednekolymsk" @if( $row->time_zone == 'Asia/Srednekolymsk' ) selected @endif>(GMT+11:00) Asia, Srednekolymsk</option>
                                <option value="Pacific/Bougainville" @if( $row->time_zone == 'Pacific/Bougainville' ) selected @endif>(GMT+11:00) Pacific, Bougainville</option>
                                <option value="Pacific/Efate" @if( $row->time_zone == 'Pacific/Efate' ) selected @endif>(GMT+11:00) Pacific, Efate</option>
                                <option value="Pacific/Guadalcanal" @if( $row->time_zone == 'Pacific/Guadalcanal' ) selected @endif>(GMT+11:00) Pacific, Guadalcanal</option>
                                <option value="Pacific/Kosrae" @if( $row->time_zone == 'Pacific/Kosrae' ) selected @endif>(GMT+11:00) Pacific, Kosrae</option>
                                <option value="Pacific/Norfolk" @if( $row->time_zone == 'Pacific/Norfolk' ) selected @endif>(GMT+11:00) Pacific, Norfolk</option>
                                <option value="Pacific/Noumea" @if( $row->time_zone == 'Pacific/Noumea' ) selected @endif>(GMT+11:00) Pacific, Noumea</option>
                                <option value="Pacific/Pohnpei" @if( $row->time_zone == 'Pacific/Pohnpei' ) selected @endif>(GMT+11:00) Pacific, Pohnpei</option>
                                <option value="Antarctica/McMurdo" @if( $row->time_zone == 'Antarctica/McMurdo' ) selected @endif>(GMT+12:00) Antarctica, McMurdo</option>
                                <option value="Asia/Anadyr" @if( $row->time_zone == 'Asia/Anadyr' ) selected @endif>(GMT+12:00) Asia, Anadyr</option>
                                <option value="Asia/Kamchatka" @if( $row->time_zone == 'Asia/Kamchatka' ) selected @endif>(GMT+12:00) Asia, Kamchatka</option>
                                <option value="Pacific/Auckland" @if( $row->time_zone == 'Pacific/Auckland' ) selected @endif>(GMT+12:00) Pacific, Auckland</option>
                                <option value="Pacific/Fiji" @if( $row->time_zone == 'Pacific/Fiji' ) selected @endif>(GMT+12:00) Pacific, Fiji</option>
                                <option value="Pacific/Funafuti" @if( $row->time_zone == 'Pacific/Funafuti' ) selected @endif>(GMT+12:00) Pacific, Funafuti</option>
                                <option value="Pacific/Kwajalein" @if( $row->time_zone == 'Pacific/Kwajalein' ) selected @endif>(GMT+12:00) Pacific, Kwajalein</option>
                                <option value="Pacific/Majuro" @if( $row->time_zone == 'Pacific/Majuro' ) selected @endif>(GMT+12:00) Pacific, Majuro</option>
                                <option value="Pacific/Nauru" @if( $row->time_zone == 'Pacific/Nauru' ) selected @endif>(GMT+12:00) Pacific, Nauru</option>
                                <option value="Pacific/Tarawa" @if( $row->time_zone == 'Pacific/Tarawa' ) selected @endif>(GMT+12:00) Pacific, Tarawa</option>
                                <option value="Pacific/Wake" @if( $row->time_zone == 'Pacific/Wake' ) selected @endif>(GMT+12:00) Pacific, Wake</option>
                                <option value="Pacific/Wallis" @if( $row->time_zone == 'Pacific/Wallis' ) selected @endif>(GMT+12:00) Pacific, Wallis</option>
                                <option value="Pacific/Chatham" @if( $row->time_zone == 'Pacific/Chatham' ) selected @endif>(GMT+12:45) Pacific, Chatham</option>
                                <option value="Pacific/Apia" @if( $row->time_zone == 'Pacific/Apia' ) selected @endif>(GMT+13:00) Pacific, Apia</option>
                                <option value="Pacific/Enderbury" @if( $row->time_zone == 'Pacific/Enderbury' ) selected @endif>(GMT+13:00) Pacific, Enderbury</option>
                                <option value="Pacific/Fakaofo" @if( $row->time_zone == 'Pacific/Fakaofo' ) selected @endif>(GMT+13:00) Pacific, Fakaofo</option>
                                <option value="Pacific/Tongatapu" @if( $row->time_zone == 'Pacific/Tongatapu' ) selected @endif>(GMT+13:00) Pacific, Tongatapu</option>
                                <option value="Pacific/Kiritimati" @if( $row->time_zone == 'Pacific/Kiritimati' ) selected @endif>(GMT+14:00) Pacific, Kiritimati</option>
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_time_zone') }}
                            </div>
                        </div>
                        @endif

                        <hr/>

                        <div class="form-group col-md-4">
                            <label for="currency">{{ __('field_currency') }} <span>*</span></label>
                            <input type="text" class="form-control" name="currency" id="currency" value="{{ isset($row->currency)?$row->currency:'' }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_currency') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="currency_symbol">{{ __('field_currency_symbol') }} <span>*</span></label>
                            <input type="text" class="form-control" name="currency_symbol" id="currency_symbol" value="{{ isset($row->currency_symbol)?$row->currency_symbol:'' }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_currency_symbol') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="decimal_place">{{ __('field_decimal_place') }} <span>*</span></label>
                            <select class="form-control" name="decimal_place" id="decimal_place" required>
                                <option value="">{{ __('select') }}</option>
                                <option value="0" @if( $row->decimal_place == '0' ) selected @endif>Zero / Null</option>
                                <option value="2" @if( $row->decimal_place == '2' ) selected @endif>2 Decimal Point</option>
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_decimal_place') }}
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="copyright_text">{{ __('field_copyright_text') }}</label>
                            <textarea class="form-control texteditor" name="copyright_text" id="copyright_text">{{ isset($row->copyright_text)?$row->copyright_text:'' }}</textarea>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_copyright_text') }}
                            </div>
                        </div>
                        <!-- Form End -->

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> {{ __('btn_update') }}</button>
                    </div>

                </div>
                </form>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection
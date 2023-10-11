@extends('admin.layouts.master')
@section('title', $title)

@section('page_css')
    <!-- Full calendar css -->
    {{-- <link rel="stylesheet" href="{{ asset('dashboard/plugins/fullcalendar/css/fullcalendar.min.css') }}"> --}}
    <link rel='stylesheet' href="https://rawgit.com/monkbroc/fullcalendar/year-view-demo/dist/fullcalendar.css" />
@endsection

@section('content')

    <!-- Start Content-->
    <div class="main-body">
        <div class="page-wrapper">
            <!-- [ Main Content ] start -->
            {{-- <form action="event.calendarfilter" method="POST">
                <label for="">Filtra una fecha:</label>
                <input type="date" class="form-control date" name="filtro" id="filtro" value="{{ old('filtro') }}" required>
                <input type="submit" value="Buscar">
            </form> --}}

            <div class="row">
                <div class="col-xl-8 col-md-8 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ $title }}</h5>
                            <form action="{{ url('/admin/communicate/event-calendar-filter') }}" method="POST">
                                @csrf
                                <label for="">Filtra una fecha:</label>
                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="date" class="form-control date" name="filtro" id="filtro" value="{{ old('filtro') }}" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="submit" value="Buscar" class="btn btn-info">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-block">

                            <!-- [ Calendar ] start -->
                            <div id='calendar' class='calendar'></div>
                            <!-- [ Calendar ] end -->

                        </div>
                    </div>
                </div>
                <!-- [Event List] start -->
                <div class="col-xl-4 col-md-4 col-sm-12">
                    <div class="card statistial-visit">
                        <div class="card-header">
                            <h5>{{ __('upcoming') }} {{ trans_choice('module_event', 1) }}</h5>
                        </div>
                        <div class="card-block">
                            @foreach ($latest_events as $key => $latest_event)
                                @if ($key <= 9)
                                    <p>
                                        <mark style="color: {{ $latest_event->color }}">
                                            <i class="fas fa-calendar-check"></i> {{ $latest_event->title }}
                                        </mark>
                                        <br>
                                        <small>
                                            @if (isset($setting->date_format))
                                                {{ date($setting->date_format, strtotime($latest_event->start_date)) }}
                                            @else
                                                {{ date('Y-m-d', strtotime($latest_event->start_date)) }}
                                            @endif

                                            @if ($latest_event->start_date != $latest_event->end_date)
                                                <i class="fas fa-exchange-alt"></i>
                                                @if (isset($setting->date_format))
                                                    {{ date($setting->date_format, strtotime($latest_event->end_date)) }}
                                                @else
                                                    {{ date('Y-m-d', strtotime($latest_event->end_date)) }}
                                                @endif
                                            @endif
                                        </small>
                                    </p>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- [Event List] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- End Content-->

@endsection

@section('page_js')
    <!-- Full calendar js -->
    <script src="{{ asset('dashboard/plugins/fullcalendar/js/lib/moment.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/fullcalendar/js/lib/jquery-ui.min.js') }}"></script>
    <script src="https://rawgit.com/monkbroc/fullcalendar/year-view-demo/dist/fullcalendar.js"></script>
    {{-- <script src="{{ asset('dashboard/plugins/fullcalendar/js/fullcalendar.min.js') }}"></script> --}}


    <script type="text/javascript">
        // Full calendar
        $(window).on('load', function() {
            "use strict";
            $('#calendar').fullCalendar({
                dayNames: ['DOMINGO', 'LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO'],
                dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sáb'],
                monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct',
                    'Nov', 'Dic'
                ],
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto',
                    'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                ],
                buttonText: {
                    today: 'Hoy',
                    year:'Año',
                    month: 'Mes',
                    week: 'Semana',
                    day: 'Día',
                    list: 'Lista'
                },
                header: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'year,month,basicWeek,basicDay'
                },
                defaultDate: "@php if($dia_filtro == 0){echo date('Y-m-d');}else{echo date($dia_filtro);}  @endphp",
                editable: false,
                droppable: false,
                defaultView: 
                    @php 
                        if($filtro){
                            echo "'month'";
                        }else{
                            echo "'year'";
                        }   
                    @endphp ,
                // defaultView: ''
                locales: 'es',
                events: [

                    @php
                        foreach ($rows as $key => $row) {
                            echo "{
                                title: '" .
                                $row->title .
                                "',
                                start: '" .
                                $row->start_date .
                                "',
                                end: '" .
                                $row->end_date .
                                "',
                                borderColor: '" .
                                $row->color .
                                "',
                                backgroundColor: '" .
                                $row->color .
                                "',
                                textColor: '#fff'
                            }, ";
                        }
                    @endphp

                ],
            });
        });
    </script>
@endsection

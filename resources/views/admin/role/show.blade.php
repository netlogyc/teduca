@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ Card ] start -->
            <div class="col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('modal_view') }} {{ $title }}</h5>
                    </div>
                    <div class="card-block">
                        <a href="{{ route($route.'.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> {{ __('btn_back') }}</a>

                        <a href="{{ route($route.'.show', $role->id) }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>
                    </div>

                    <div class="card-block">
                        
                        <!-- Details View Start -->
                        <h4><mark class="text-primary">{{ __('field_title') }}:</mark> {{ $role->name }}</h4>
                        <hr/>
                                        
                        @if(!empty($rolePermissions))
                            @php
                                $separation = '0';
                            @endphp
                                  
                            @foreach($rolePermissions as $value) 

                            @if($separation != $value->group)
                                <hr/>
                                <h6 class="mt-4 text-primary">{{ $value->group }}</h6>
                            @endif
                                <span class="badge badge-secondary">
                                    {{ $value->title }}
                                </span> 
                            @php
                                $separation = $value->group;
                            @endphp

                            @endforeach
                        @endif
                        <!-- Details View End -->

                    </div>
                </div>
            </div>
            <!-- [ Card ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection
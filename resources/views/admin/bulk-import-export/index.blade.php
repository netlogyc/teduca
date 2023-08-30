@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $title }}</h5>
                    </div>
                    <div class="card-block">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table class="display table nowrap table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ __('DB Table Name') }}</th>
                                        <th>{{ __('btn_import') }}</th>
                                        <th>{{ __('btn_export') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ trans_choice('module_staff', 2) }}</td>
                                        <td>
                                        <form class="needs-validation" novalidate action="{{ route('admin.bulk.import', ['table' => 'users']) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-6">
                                            <input type="file" name="import" class="form-control" required>
                                            </div>

                                            <div class="col-md-6">
                                            <button type="submit" class="btn btn-success"><i class="fas fa-upload"></i> {{ __('btn_import') }}</button>
                                            </div>
                                        </div>
                                        </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.bulk.export', ['table' => 'users']) }}" class="btn btn-info"><i class="fas fa-download"></i> {{ __('btn_export') }}</a>
                                        </td>
                                    </tr>

                                    {{-- <tr>
                                        <td>{{ trans_choice('module_student', 2) }}</td>
                                        <td>
                                        <form class="needs-validation" novalidate action="{{ route('admin.bulk.import', ['table' => 'students']) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-6">
                                            <input type="file" name="import" class="form-control" required>
                                            </div>

                                            <div class="col-md-6">
                                            <button type="submit" class="btn btn-success"><i class="fas fa-upload"></i> {{ __('btn_import') }}</button>
                                            </div>
                                        </div>
                                        </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.bulk.export', ['table' => 'students']) }}" class="btn btn-info"><i class="fas fa-download"></i> {{ __('btn_export') }}</a>
                                        </td>
                                    </tr> --}}

                                    <tr>
                                        <td>{{ trans_choice('module_application', 2) }}</td>
                                        <td>
                                        <form class="needs-validation" novalidate action="{{ route('admin.bulk.import', ['table' => 'applications']) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-6">
                                            <input type="file" name="import" class="form-control" required>
                                            </div>

                                            <div class="col-md-6">
                                            <button type="submit" class="btn btn-success"><i class="fas fa-upload"></i> {{ __('btn_import') }}</button>
                                            </div>
                                        </div>
                                        </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.bulk.export', ['table' => 'applications']) }}" class="btn btn-info"><i class="fas fa-download"></i> {{ __('btn_export') }}</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>{{ trans_choice('module_subject', 2) }}</td>
                                        <td>
                                        <form class="needs-validation" novalidate action="{{ route('admin.bulk.import', ['table' => 'subjects']) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-6">
                                            <input type="file" name="import" class="form-control" required>
                                            </div>

                                            <div class="col-md-6">
                                            <button type="submit" class="btn btn-success"><i class="fas fa-upload"></i> {{ __('btn_import') }}</button>
                                            </div>
                                        </div>
                                        </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.bulk.export', ['table' => 'subjects']) }}" class="btn btn-info"><i class="fas fa-download"></i> {{ __('btn_export') }}</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>{{ trans_choice('module_book', 2) }}</td>
                                        <td>
                                        <form class="needs-validation" novalidate action="{{ route('admin.bulk.import', ['table' => 'books']) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-6">
                                            <input type="file" name="import" class="form-control" required>
                                            </div>

                                            <div class="col-md-6">
                                            <button type="submit" class="btn btn-success"><i class="fas fa-upload"></i> {{ __('btn_import') }}</button>
                                            </div>
                                        </div>
                                        </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.bulk.export', ['table' => 'books']) }}" class="btn btn-info"><i class="fas fa-download"></i> {{ __('btn_export') }}</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- [ Data table ] end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection
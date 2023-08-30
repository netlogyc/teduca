@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ Card ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('modal_edit') }} {{ $title }}</h5>
                    </div>
                    <div class="card-block">
                        <a href="{{ route($route.'.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> {{ __('btn_back') }}</a>

                        <a href="{{ route($route.'.edit', $row->id) }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>
                    </div>

                    <form class="needs-validation" novalidate action="{{ route($route.'.update', [$row->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-block">
                      <div class="row">
                        <!-- Form Start -->
                        <div class="form-group col-md-4">
                            <label for="item">{{ __('field_item') }} <span>*</span></label>
                            <select class="form-control select2" name="item" id="item" required>
                                <option value="">{{ __('select') }}</option>
                                @foreach( $items as $item )
                                <option value="{{ $item->id }}" @if($row->item_id == $item->id) selected @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_item') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="supplier">{{ __('field_supplier') }} <span>*</span></label>
                            <select class="form-control" name="supplier" id="supplier" required>
                                <option value="">{{ __('select') }}</option>
                                @foreach( $suppliers as $supplier )
                                <option value="{{ $supplier->id }}" @if($row->supplier_id == $supplier->id) selected @endif>{{ $supplier->title }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_supplier') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="store">{{ __('field_store') }} <span>*</span></label>
                            <select class="form-control" name="store" id="store" required>
                                <option value="">{{ __('select') }}</option>
                                @foreach( $stores as $store )
                                <option value="{{ $store->id }}" @if($row->store_id == $store->id) selected @endif>{{ $store->title }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_store') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="quantity">{{ __('field_quantity') }} <span>*</span></label>
                            <input type="number" class="form-control" name="quantity" id="quantity" value="{{ $row->quantity }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_quantity') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="price">{{ __('field_price') }} ({!! $setting->currency_symbol !!}) <span>*</span></label>
                            <input type="text" class="form-control autonumber" name="price" id="price" value="{{ round($row->price) }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_price') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="date">{{ __('field_date') }} <span>*</span></label>
                            <input type="date" class="form-control date" name="date" id="date" value="{{ $row->date }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_date') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="attach">{{ __('field_attach') }}</label>
                            <input type="file" class="form-control" name="attach" id="attach" value="{{ old('attach') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_attach') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="payment_method" class="form-label">{{ __('field_payment_method') }} <span>*</span></label>
                            <select class="form-control" name="payment_method" id="payment_method" required>
                                <option value="">{{ __('select') }}</option>
                                <option value="1" @if( $row->payment_method == 1 ) selected @endif>{{ __('payment_method_card') }}</option>
                                <option value="2" @if( $row->payment_method == 2 ) selected @endif>{{ __('payment_method_cash') }}</option>
                                <option value="3" @if( $row->payment_method == 3 ) selected @endif>{{ __('payment_method_cheque') }}</option>
                                <option value="4" @if( $row->payment_method == 4 ) selected @endif>{{ __('payment_method_bank') }}</option>
                                <option value="5" @if( $row->payment_method == 5 ) selected @endif>{{ __('payment_method_e_wallet') }}</option>
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_payment_method') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="status" class="form-label">{{ __('select_status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1" @if( $row->status == 1 ) selected @endif>{{ __('status_received') }}</option>
                                <option value="0" @if( $row->status == 0 ) selected @endif>{{ __('status_returned') }}</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="description">{{ __('field_description') }}</label>
                            <textarea class="form-control" name="description" id="description">{{ $row->description }}</textarea>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_description') }}
                            </div>
                        </div>
                        <!-- Form End -->
                      </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> {{ __('btn_update') }}</button>
                    </div>
                    </form>
                </div>
            </div>
            <!-- [ Card ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection
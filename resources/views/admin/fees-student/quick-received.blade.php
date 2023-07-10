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
                        <h5>{{ $title }}</h5>
                    </div>
                    <form class="needs-validation" novalidate action="{{ route($route.'.quick.received.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-block">
                      <div class="row">
                        <!-- Form Start -->
                        <div class="form-group col-md-6">
                            <label for="student">{{ __('field_student_id') }} <span>*</span></label>
                            <select class="form-control select2" name="student" id="student" required>
                                <option value="">{{ __('select') }}</option>
                                @foreach( $students as $student )
                                <option value="{{ $student->id }}" @if(old('student') == $student->id) selected @endif>{{ $student->student->student_id ?? '' }} - {{ $student->student->first_name ?? '' }} {{ $student->student->last_name ?? '' }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_student_id') }}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="category">{{ __('field_fees_type') }} <span>*</span></label>
                            <select class="form-control" name="category" id="category" required>
                                <option value="">{{ __('select') }}</option>
                                @foreach( $categories as $category )
                                <option value="{{ $category->id }}" @if(old('category') == $category->id) selected @endif>{{ $category->title }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_fees_type') }}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="due_date" class="form-label">{{ __('field_due_date') }} <span>*</span></label>
                            <input type="date" class="form-control date" name="due_date" id="due_date" value="{{ date('Y-m-d') }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_due_date') }}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="pay_date" class="form-label">{{ __('field_pay_date') }} <span>*</span></label>
                            <input type="date" class="form-control date" name="pay_date" id="pay_date" value="{{ date('Y-m-d') }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_pay_date') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="fee_amount" class="form-label">{{ __('field_fee') }} ({!! $setting->currency_symbol !!}) <span>*</span></label>
                            <input type="text" class="form-control autonumber" name="fee_amount" id="fee_amount" value="{{ old('fee_amount') ?? 0 }}" onkeyup="feesCalculator()" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_fee') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="discount_amount" class="form-label">{{ __('field_discount') }} ({!! $setting->currency_symbol !!}) <span>*</span></label>
                            <input type="text" class="form-control autonumber" name="discount_amount" id="discount_amount" value="{{ old('discount_amount') ?? 0 }}" onkeyup="feesCalculator()" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_discount') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="fine_amount" class="form-label">{{ __('field_fine_amount') }} ({!! $setting->currency_symbol !!}) <span>*</span></label>
                            <input type="text" class="form-control autonumber" name="fine_amount" id="fine_amount" value="{{ old('fine_amount') ?? 0 }}" onkeyup="feesCalculator()" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_fine_amount') }}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="paid_amount" class="form-label">{{ __('field_net_amount') }} ({!! $setting->currency_symbol !!}) <span>*</span></label>
                            <input type="text" class="form-control autonumber" name="paid_amount" id="paid_amount" value="{{ old('paid_amount') ?? 0 }}" onkeyup="feesCalculator()" readonly required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_net_amount') }}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="payment_method" class="form-label">{{ __('field_payment_method') }} <span>*</span></label>
                            <select class="form-control" name="payment_method" id="payment_method" required>
                                <option value="">{{ __('select') }}</option>
                                <option value="1" @if( old('payment_method') == 1 ) selected @endif>{{ __('payment_method_card') }}</option>
                                <option value="2" @if( old('payment_method') == 2 ) selected @endif>{{ __('payment_method_cash') }}</option>
                                <option value="3" @if( old('payment_method') == 3 ) selected @endif>{{ __('payment_method_cheque') }}</option>
                                <option value="4" @if( old('payment_method') == 4 ) selected @endif>{{ __('payment_method_bank') }}</option>
                                <option value="5" @if( old('payment_method') == 5 ) selected @endif>{{ __('payment_method_e_wallet') }}</option>
                            </select>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_payment_method') }}
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="note" class="form-label">{{ __('field_note') }}</label>
                            <textarea class="form-control" name="note" id="note">{!! old('note') !!}</textarea>
                        </div>
                        <!-- Form End -->
                      </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> {{ __('btn_save') }}</button>
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

@section('page_js')
    <script type="text/javascript">
        "use strict";
        function feesCalculator() {
          var fee_amount = $("input[name='fee_amount']").val();
          var fine_amount = $("input[name='fine_amount']").val();
          var discount_amount = $("input[name='discount_amount']").val();
          var paid_amount = $("input[name='paid_amount']").val();
          
          //
          if (isNaN(parseFloat(fee_amount))) fee_amount = 0;
          if (isNaN(parseFloat(fine_amount))) fine_amount = 0;
          if (isNaN(parseFloat(discount_amount))) discount_amount = 0;
          $("input[name='fee_amount']").val(fee_amount);
          $("input[name='fine_amount']").val(fine_amount);
          $("input[name='discount_amount']").val(discount_amount);

          // Set Value
          var net_total = (parseFloat(fee_amount) - parseFloat(discount_amount)) + parseFloat(fine_amount);
          $("input[name='paid_amount']").val(net_total);
        }
    </script>
@endsection
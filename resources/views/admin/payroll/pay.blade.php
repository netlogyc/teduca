    <!-- Edit modal content -->
    <div id="payModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <form class="needs-validation" novalidate action="{{ route($route.'.pay', $payroll_data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">{{ __('btn_pay') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <!-- View Start -->
                    <div class="">
                        <div class="row">
                            <div class="col-md-6">
                                <p><mark class="text-primary">{{ __('field_staff_id') }}:</mark> #{{ $row->staff_id }}</p><hr/>

                                <p><mark class="text-primary">{{ __('field_contract_type') }}:</mark> 
                                    @if( $row->contract_type == 1 )
                                    {{ __('contract_type_full_time') }}
                                    @elseif( $row->contract_type == 2 )
                                    {{ __('contract_type_part_time') }}
                                    @endif
                                </p><hr/>
                            </div>
                            <div class="col-md-6">
                                <p><mark class="text-primary">{{ __('field_name') }}:</mark> {{ $row->first_name }} {{ $row->last_name }}</p><hr/>

                                <p><mark class="text-primary">{{ __('field_basic_salary') }}: </mark>{{ round($row->basic_salary, $setting->decimal_place ?? 2) }} {!! $setting->currency_symbol !!} 
                                    / 
                                    @if( $row->salary_type == 1 )
                                    {{ __('salary_type_fixed') }}
                                    @elseif( $row->salary_type == 2 )
                                    {{ __('salary_type_hourly') }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <!-- View End -->

                    <!-- Form Start -->
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="net_salary" class="form-label">{{ __('field_net_salary') }} ({!! $setting->currency_symbol !!}) <span>*</span></label>
                            <input type="text" class="form-control" name="net_salary" id="net_salary" value="{{ round($payroll_data->net_salary, 0) }}" required readonly>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_net_salary') }}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="salary_month" class="form-label">{{ __('field_salary_month') }} <span>*</span></label>
                            <input type="text" class="form-control" name="salary_month" id="salary_month" value="{{ date("F Y", strtotime($payroll_data->salary_month)) }}" required readonly>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_salary_month') }}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="pay_date" class="form-label">{{ __('field_pay_date') }} <span>*</span></label>
                            <input type="date" class="form-control date" name="pay_date" id="pay_date" value="{{ date('Y-m-d') }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_pay_date') }}
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
                            <label for="note">{{ __('field_note') }}</label>
                            <input type="text" class="form-control" name="note" id="note" value="{{ old('note') }}">

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_note') }}
                            </div>
                        </div>
                    </div>
                    <!-- Form End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> {{ __('btn_close') }}</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-money-check"></i> {{ __('btn_pay') }}</button>
                </div>
              </form>
            </div>
        </div>
    </div>
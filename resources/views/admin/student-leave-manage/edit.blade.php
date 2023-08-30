    <!-- Show modal content -->
    <div id="editModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <form class="needs-validation" novalidate action="{{ route($route.'.update', $row->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">{{ __('modal_view') }} {{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <!-- Details View Start -->
                    <h4><mark class="text-primary">{{ __('field_name') }}:</mark> {{ $row->student->first_name ?? '' }} {{ $row->student->last_name ?? '' }}</h4>
                    <hr/>
                    <div class="">
                        <div class="row">
                            <div class="col-md-6">
                                <p><mark class="text-primary">{{ __('field_program') }}:</mark> {{ $row->student->program->title ?? '' }}</p><hr/>

                                <p><mark class="text-primary">{{ __('field_batch') }}:</mark> {{ $row->student->batch->title ?? '' }}</p><hr/>

                                <p><mark class="text-primary">{{ __('field_apply_date') }}:</mark> 
                                @if(isset($setting->date_format))
                                    {{ date($setting->date_format, strtotime($row->apply_date)) }}
                                @else
                                    {{ date("Y-m-d", strtotime($row->apply_date)) }}
                                @endif</p><hr/>

                                <p><mark class="text-primary">{{ __('field_review_by') }}:</mark> #{{ $row->reviewBy->staff_id ?? '' }} - {{ $row->reviewBy->first_name ?? '' }} {{ $row->reviewBy->last_name ?? '' }}</p><hr/>

                                <p><mark class="text-primary">{{ __('field_leave_subject') }}:</mark> {{ $row->subject }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_reason') }}:</mark> {{ $row->reason }}</p><hr/>
                                <br/><br/>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="from_date">{{ __('field_start_date') }} <span>*</span></label>
                                    <input type="date" class="form-control date" name="from_date" id="from_date" value="{{ $row->from_date }}" required>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_start_date') }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="to_date">{{ __('field_end_date') }} <span>*</span></label>
                                    <input type="date" class="form-control date" name="to_date" id="to_date" value="{{ $row->to_date }}" required>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_end_date') }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="note">{{ __('field_note') }}</label>
                                    <textarea class="form-control" name="note" id="note">{{ $row->note }}</textarea>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_note') }}
                                    </div>
                                </div>

                                <div class="form-group d-inline">
                                    <label for="status">{{ __('field_status') }}</label> 
                                    <span>*</span> 

                                    <div class="radio radio-primary d-inline">
                                        <input type="radio" name="status" value="0" id="pending-{{ $row->id }}" @if($row->status == 0) checked @endif required>
                                        <label for="pending-{{ $row->id }}" class="cr">{{ __('status_pending') }}</label>
                                    </div>

                                    <div class="radio radio-success d-inline">
                                        <input type="radio" name="status" value="1" id="approved-{{ $row->id }}" @if($row->status == 1) checked @endif required>
                                        <label for="approved-{{ $row->id }}" class="cr">{{ __('status_approved') }}</label>
                                    </div>

                                    <div class="radio radio-danger d-inline">
                                        <input type="radio" name="status" value="2" id="rejected-{{ $row->id }}" @if($row->status == 2) checked @endif required>
                                        <label for="rejected-{{ $row->id }}" class="cr">{{ __('status_rejected') }}</label>
                                    </div>

                                    <div class="invalid-feedback">
                                      {{ __('required_field') }} {{ __('field_status') }}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Details View End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> {{ __('btn_close') }}</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> {{ __('btn_update') }}</button>
                </div>

              </form>
            </div>
        </div>
    </div>
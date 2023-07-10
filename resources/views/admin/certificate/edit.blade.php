    <!-- Edit modal content -->
    <div id="editModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <form class="needs-validation" novalidate action="{{ route($route.'.update', $certificate->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">{{ __('modal_edit') }} {{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <!-- View Start -->
                    <div class="">
                        <div class="row">
                            <div class="col-md-6">
                                <p><mark class="text-primary">{{ __('field_student_id') }}:</mark> #{{ $row->student_id }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_name') }}:</mark> {{ $row->first_name }} {{ $row->last_name }}</p><hr/>
                            </div>
                            <div class="col-md-6">
                                <p><mark class="text-primary">{{ __('field_program') }}:</mark> {{ $row->program->title ?? '' }}</p><hr/>
                                <p><mark class="text-primary">{{ __('field_batch') }}:</mark> {{ $row->batch->title ?? '' }}</p><hr/>
                            </div>
                        </div>
                    </div>
                    <!-- View End -->

                    <br/>
                    
                    <input type="hidden" name="student_id" value="{{ $row->id }}">

                    <!-- Form Start -->
                    @php
                        $total_credits = 0;
                        $total_cgpa = 0;
                        $starting_year = '0000';
                        $ending_year = '0000';
                    @endphp

                    {{-- CGPA and Credit Cal --}}
                    @foreach( $row->studentEnrolls as $key => $item )

                        {{-- Year Selection --}}
                        @if($loop->first)
                        @php
                            $starting_year = $item->session->start_date;
                        @endphp
                        @endif

                        @if($loop->last)
                        @php
                            $ending_year = $item->session->end_date;
                        @endphp
                        @endif

                        @if(isset($item->subjectMarks))
                        @foreach($item->subjectMarks as $mark)

                            @php
                            $marks_per = round($mark->total_marks);
                            @endphp

                            @foreach($grades as $grade)
                            @if($marks_per >= $grade->min_mark && $marks_per <= $grade->max_mark)
                            @php
                            if($grade->point > 0){
                            $total_cgpa = $total_cgpa + ($grade->point * $mark->subject->credit_hour);
                            $total_credits = $total_credits + $mark->subject->credit_hour;
                            }
                            @endphp
                            @break
                            @endif
                            @endforeach

                        @endforeach
                        @endif

                    @endforeach

                    
                    <div class="">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="date">{{ __('field_date') }} <span>*</span></label>
                            <input type="date" class="form-control date" name="date" id="date" value="{{ $certificate->date }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_date') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="starting_year">{{ __('field_starting_year') }} <span>*</span></label>
                            <input type="number" class="form-control" name="starting_year" id="starting_year" value="{{ date('Y',strtotime($starting_year)) }}" required readonly>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_starting_year') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="ending_year">{{ __('field_ending_year') }} <span>*</span></label>
                            <input type="number" class="form-control" name="ending_year" id="ending_year" value="{{ date('Y',strtotime($ending_year)) }}" required readonly>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_ending_year') }}
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="credits">{{ __('field_total_credit_hour') }} <span>*</span></label>
                            <input type="text" class="form-control autonumber" name="credits" id="credits" value="{{ round($total_credits, 2) }}" required readonly>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_total_credit_hour') }}
                            </div>
                        </div>

                        @php
                            if($total_credits <= 0){
                                $total_credits = 1;
                            }
                            $com_gpa = $total_cgpa / $total_credits;
                        @endphp
                        <div class="form-group col-md-4">
                            <label for="point">{{ __('field_cumulative_gpa') }} <span>*</span></label>
                            <input type="text" class="form-control autonumber" name="point" id="point" value="{{ number_format((float)$com_gpa, 2, '.', '') }}" required readonly>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('field_cumulative_gpa') }}
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- Form End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> {{ __('btn_close') }}</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> {{ __('btn_update') }}</button>
                </div>
              </form>
            </div>
        </div>
    </div>
<div class="form-group col-md-3">
      <label for="subject">{{ __('field_subject') }} <span>*</span></label>
      <select class="form-control select2" name="subject" id="subject" required>
            <option value="">{{ __('select') }}</option>
            @foreach( $subjects as $subject )
            <option value="{{ $subject->id }}" @if(old('subject') == $subject->id) selected @endif>{{ $subject->code }} - {{ $subject->title }}</option>
            @endforeach
      </select>

      <div class="invalid-feedback">
      {{ __('required_field') }} {{ __('field_subject') }}
      </div>
</div>
<div class="form-group col-md-3">
      <label for="teachers">{{ __('field_teacher') }} <span>*</span></label>
      <select class="form-control select2" name="teachers[]" id="teachers" multiple required>
            @foreach( $teachers as $teacher )
            <option value="{{ $teacher->id }}" @if(old('teacher') == $teacher->id) selected @endif>{{ $teacher->staff_id }} - {{ $teacher->first_name }} {{ $teacher->last_name }}</option>
            @endforeach
      </select>

      <div class="invalid-feedback">
      {{ __('required_field') }} {{ __('field_teacher') }}
      </div>
</div>
<div class="form-group col-md-3">
      <label for="rooms">{{ __('field_room') }} {{ __('field_no') }} <span>*</span></label>
      <select class="form-control select2" name="rooms[]" id="rooms" multiple required>
            @foreach( $rooms as $room )
            <option value="{{ $room->id }}" @if(old('room') == $room->id) selected @endif>{{ $room->title }}</option>
            @endforeach
      </select>

      <div class="invalid-feedback">
      {{ __('required_field') }} {{ __('field_room') }} {{ __('field_no') }}
      </div>
</div>
<div class="form-group col-md-3">
      <label for="date">{{ __('field_date') }} <span>*</span></label>
      <input type="date" class="form-control date" name="date" id="date" required>

      <div class="invalid-feedback">
      {{ __('required_field') }} {{ __('field_date') }}
      </div>
</div>
<div class="form-group col-md-3">
      <label for="start_time">{{ __('field_time') }} {{ __('field_from') }} <span>*</span></label>
      <input type="time" class="form-control time" name="start_time" id="start_time" required>

      <div class="invalid-feedback">
      {{ __('required_field') }} {{ __('field_time') }} {{ __('field_from') }}
      </div>
</div>
<div class="form-group col-md-3">
      <label for="end_time">{{ __('field_time') }} {{ __('field_to') }} <span>*</span></label>
      <input type="time" class="form-control time" name="end_time" id="end_time" required>

      <div class="invalid-feedback">
      {{ __('required_field') }} {{ __('field_time') }} {{ __('field_to') }}
      </div>
</div>
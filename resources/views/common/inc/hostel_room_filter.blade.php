<div class="form-group">
    <label for="hostel-{{ $row->id }}">{{ __('field_hostel') }} <span>*</span></label>
    <select class="form-control" name="hostel" id="hostel-{{ $row->id }}" required>
        <option value="">{{ __('select') }}</option>
        @foreach( $hostels as $hostel )
        <option value="{{ $hostel->id }}" @if(old('hostel') == $hostel->id) selected @endif>{{ $hostel->name }}</option>
        @endforeach
    </select>

    <div class="invalid-feedback">
      {{ __('required_field') }} {{ __('field_hostel') }}
    </div>
</div>

<div class="form-group">
    <label for="hostel_room-{{ $row->id }}">{{ __('field_room') }} <span>*</span></label>
    <select class="form-control" name="hostel_room" id="hostel_room-{{ $row->id }}" required>
        <option value="">{{ __('select') }}</option>
        @isset($rooms)
        @foreach( $rooms as $room )
        <option value="{{ $room->id }}" @if(old('room') == $room->id) selected @endif>{{ $room->name }}</option>
        @endforeach
        @endisset
    </select>

    <div class="invalid-feedback">
      {{ __('required_field') }} {{ __('field_room') }}
    </div>
</div>


<script src="{{ asset('dashboard/plugins/jquery/js/jquery.min.js') }}"></script>

<script type="text/javascript">
"use strict";
$("#hostel-{{ $row->id }}").on('change',function(e){
    e.preventDefault();
    var hostelRoom=$("#hostel_room-{{ $row->id }}");
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type:'POST',
      url: "{{ route('filter-room') }}",
      data:{
        _token:$('input[name=_token]').val(),
        hostel:$(this).val()
      },
      success:function(response){
          // var jsonData=JSON.parse(response);
          $('option', hostelRoom).remove();
          $('#hostel_room-{{ $row->id }}').append('<option value="">{{ __("select") }}</option>');
          $.each(response, function(){
            $('<option/>', {
              'value': this.id,
              'text': this.name
            }).appendTo('#hostel_room-{{ $row->id }}');
          });
        }

    });
  });
</script>

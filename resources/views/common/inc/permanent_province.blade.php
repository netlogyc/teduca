<div class="form-group col-md-12">
  <label for="permanent_province">{{ __('field_province') }}</label>
  <select class="form-control" name="permanent_province" id="permanent_province">
    <option>{{ __('select') }}</option>
    @foreach( $provinces as $province )
    <option value="{{ $province->id }}" @isset($row) {{ $row->permanent_province == $province->id ? 'selected' : '' }} @endisset>{{ $province->title }}</option>
    @endforeach
  </select>

  <div class="invalid-feedback">
  {{ __('required_field') }} {{ __('field_province') }}
  </div>
</div>

<div class="form-group col-md-12">
  <label for="permanent_district">{{ __('field_district') }}</label>
  <select class="form-control" name="permanent_district" id="permanent_district">
    <option>{{ __('select') }}</option>
    @isset($row)
    @foreach($permanent_districts as $district)
    <option value="{{ $district->id }}" {{ $row->permanent_district == $district->id ? 'selected' : '' }}>{{ $district->title }}</option>
    @endforeach
  @endisset
  </select>

  <div class="invalid-feedback">
  {{ __('required_field') }} {{ __('field_district') }}
  </div>
</div>


<script type="text/javascript">
"use strict";
$("#permanent_province").on('change',function(e){
    e.preventDefault();
    var permanentDistrict=$("#permanent_district");
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type:'POST',
      url: "{{ route('filter-district') }}",
      data:{
        _token:$('input[name=_token]').val(),
        province:$(this).val()
      },
      success:function(response){
          // var jsonData=JSON.parse(response);
          $('option', permanentDistrict).remove();
          $('#permanent_district').append('<option value="">{{ __("select") }}</option>');
          $.each(response, function(){
            $('<option/>', {
              'value': this.id,
              'text': this.title
            }).appendTo('#permanent_district');
          });
        }

    });
  });
</script>
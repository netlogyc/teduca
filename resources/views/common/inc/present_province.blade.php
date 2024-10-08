<div class="form-group col-md-12">
  <label for="departamento">{{ __('Departamento') }}
      <span>*</span></label>
  <select class="form-control" name="present_province" id="departamento" required>
      <option value="">{{ __('select') }}</option>
  </select>

  <div class="invalid-feedback">
      {{ __('required_field') }} {{ __('permanent_district') }}
  </div>
</div>

{{-- 9.5 --}}
<div class="form-group col-md-12">
  <label for="city">{{ __('Ciudad o municipio') }}
      <span>*</span></label>
  <select class="form-control" name="present_district" id="citie" required>
      <option value="">{{ __('select') }}</option>
  </select>

  <div class="invalid-feedback">
      {{ __('required_field') }} {{ __('place_of_birth') }}
  </div>
</div>

{{-- 
<script type="text/javascript">
  $(document).ready(function() {
      $.ajax({
          url: '/api/getstates/Colombia',
          type: 'get',
          dataType: 'json',
          success: function(response) {
              var len = response.length;
              for (var i = 0; i < len; i++) {
                  var state_name = response[i]['state_name'];
                  $("#departamento").append("<option value='" + state_name + "'>" + state_name +
                      "</option>");
              }
          }
      });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {

      $("#departamento").change(function() {
          var deptid = $(this).val();

          $.ajax({
              url: '/api/getcities/'+deptid,
              type: 'get',
              dataType: 'json',
              error: function () {
                  $("#citie").empty();
              },
              success: function(response) {
                  var len = response.length;
                  $("#citie").empty();
                  for (var i = 0; i < len; i++) {
                      var city_name = response[i]['city_name'];

                      $("#citie").append("<option value='" + city_name + "'>" + city_name +
                          "</option>");

                  }
              }
          });
      });

  });

</script> --}}
<script type="text/javascript">
    "use strict";
    $("#present_province").on('change',function(e){
        e.preventDefault();
        var presentDistrict=$("#present_district");
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
              $('option', presentDistrict).remove();
              $('#present_district').append('<option value="">{{ __("select") }}</option>');
              $.each(response, function(){
                $('<option/>', {
                  'value': this.id,
                  'text': this.title
                }).appendTo('#present_district');
              });
            }
    
        });
      });
    </script>
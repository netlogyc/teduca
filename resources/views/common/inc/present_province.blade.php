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

</script>

<div class="form-group col-md-6">
    <label for="department">{{ __('field_department') }} <span>*</span></label>
    <select class="form-control department" name="department" id="department" required>
        <option value="">{{ __('select') }}</option>
        @foreach( $departments as $department )
        <option value="{{ $department->id }}" @if(old('department') == $department->id) selected @endif>{{ $department->title }}</option>
        @endforeach
    </select>

    <div class="invalid-feedback">
      {{ __('required_field') }} {{ __('field_department') }}
    </div>
</div>

<div class="form-group col-md-6">
    <label for="user">{{ __('field_staff') }} <span>*</span></label>
    <select class="form-control user select2" name="user" id="user" required>
        <option value="">{{ __('select') }}</option>
        @isset($users)
        @foreach( $users as $user )
        <option value="{{ $user->id }}" @if(old('user') == $user->id) selected @endif>{{ $user->staff_id ?? '' }} - {{ $user->first_name ?? '' }} {{ $user->last_name ?? '' }}</option>
        @endforeach
        @endisset
    </select>

    <div class="invalid-feedback">
      {{ __('required_field') }} {{ __('field_staff') }}
    </div>
</div>

<div class="form-group col-md-6">
    <label for="category">{{ __('field_category') }} <span>*</span></label>
    <select class="form-control category" name="category" id="category" required>
        <option value="">{{ __('select') }}</option>
        @foreach( $categories as $category )
        <option value="{{ $category->id }}" @if(old('category') == $category->id) selected @endif>{{ $category->title }}</option>
        @endforeach
    </select>

    <div class="invalid-feedback">
      {{ __('required_field') }} {{ __('field_category') }}
    </div>
</div>

<div class="form-group col-md-6">
    <label for="item">{{ __('field_item') }} <span>*</span></label>
    <select class="form-control item" name="item" id="item" required>
        <option value="">{{ __('select') }}</option>
        @isset($items)
        @foreach( $items as $item )
        <option value="{{ $item->id }}" @if(old('item') == $item->id) selected @endif>{{ $item->name }}</option>
        @endforeach
        @endisset
    </select>

    <div class="invalid-feedback">
      {{ __('required_field') }} {{ __('field_item') }}
    </div>
</div>

<div class="form-group col-md-6">
    <label for="quantity">{{ __('field_quantity') }} ({{ __('field_available') }} : <span class="available"></span>) <span>*</span></label>
    <input type="text" class="form-control quantity autonumber" name="quantity" id="quantity" value="{{ old('quantity') }}" data-v-min="1" required>

    <div class="invalid-feedback">
      {{ __('required_field') }} {{ __('field_quantity') }}
    </div>
</div>


<script src="{{ asset('dashboard/plugins/jquery/js/jquery.min.js') }}"></script>

<script type="text/javascript">
  "use strict";
  $(".department").on('change',function(e){
    e.preventDefault();
    var user=$(".user");
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type:'POST',
      url: "{{ route('filter-department') }}",
      data:{
        _token:$('input[name=_token]').val(),
        department:$(this).val()
      },
      success:function(response){
          // var jsonData=JSON.parse(response);
          $('option', user).remove();
          $('.user').append('<option value="">{{ __("select") }}</option>');
          $.each(response, function(){
            $('<option/>', {
              'value': this.id,
              'text': this.staff_id +' - '+ this.first_name +' '+ this.last_name
            }).appendTo('.user');
          });
        }

    });
  });

  $(".category").on('change',function(e){
    e.preventDefault();
    var item=$(".item");
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type:'POST',
      url: "{{ route('filter-item') }}",
      data:{
        _token:$('input[name=_token]').val(),
        category:$(this).val()
      },
      success:function(response){
          // var jsonData=JSON.parse(response);
          $('option', item).remove();
          $('.item').append('<option value="">{{ __("select") }}</option>');
          $.each(response, function(){
            $('<option/>', {
              'value': this.id,
              'text': this.name
            }).appendTo('.item');
          });
        }

    });
  });

  $(".item").on('change',function(e){
    e.preventDefault();
    var quantity=$(".quantity");
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type:'POST',
      url: "{{ route('filter-quantity') }}",
      data:{
        _token:$('input[name=_token]').val(),
        item:$(this).val()
      },
      success:function(response){
          // var jsonData=JSON.parse(response);
          quantity.attr('data-v-max',response);
          $('.available').text(response);
        }

    });
  });
</script>

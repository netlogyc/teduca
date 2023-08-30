@extends('admin.layouts.master')
{{-- @section('title', $title) --}}
<style>
    .iframe-responsive::-webkit-scrollbar{
        display: none;
    }
    .iframe-responsive{
        height: calc(100% - 150px);  
        border: 0;  
    }
    
   
</style>
@section('content')

<div class="conten">
    <iframe scrolling="no" class="iframe-responsive"  width="100%"  src="https://dev.teduca.co/preinscripcion/form-preinscripcion/">
    </iframe>
</div>


@endsection
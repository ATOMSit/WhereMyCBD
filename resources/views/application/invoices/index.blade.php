@extends('application.layouts.app')

@push('styles')

@endpush

@push('scripts')
    <script src="{{asset('application/js/pages/crud/metronic-datatable/base/data-local.js')}}" type="text/javascript"></script>
@endpush

@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">

        </div>
    </div>
@endsection
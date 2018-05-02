@push('css')
  {{-- <link href="/css/site/pages/shop.css" rel="stylesheet"> --}}
@endpush

@push('js')
  {{-- <script src="{{ mix('js/site/pages/partials.js') }}"></script> --}}
  <script src="{{ mix('js/site/pages/shop.js') }}"></script>
@endpush

@extends('layouts.site')

@section('content')

  {{-- <partials></partials> --}}

  <shop></shop>

@endsection

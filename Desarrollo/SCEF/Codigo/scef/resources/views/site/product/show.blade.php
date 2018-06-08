@push('css')
  {{-- <link href="/css/site/pages/product.css" rel="stylesheet"> --}}
@endpush

@push('js')
  <script src="{{ mix('js/site/pages/product.js') }}"></script>
@endpush

@extends('layouts.site')

@section('content')

  <product :prod="{{ $product }}"></product>

@endsection

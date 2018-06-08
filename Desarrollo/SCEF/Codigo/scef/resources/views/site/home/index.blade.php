@push('css')
  <link href="/css/site/pages/home.css" rel="stylesheet">
@endpush

@push('js')
  <script src="{{ mix('js/site/pages/home.js') }}"></script>
@endpush

@extends('layouts.site')

@section('content')

  <home></home>

@endsection

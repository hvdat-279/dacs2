@extends('layouts.home')

@section('content')

{{-- slider --}}
@include('partials.home.slider_home')
{{-- category --}}
@include('partials.home.category_home')
{{-- product --}}
@include('partials.home.products_home')

@endsection
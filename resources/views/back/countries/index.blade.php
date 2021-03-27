@extends('layouts.master')
@section('content')
  @include('partials.header')
  <div id="page_content" class="container mt-3">
    @include('partials.alerts')
    <div class="page-title mb-3">
      <h1>{{ __('Countries') }}</h1>
      <small>{{ __('List of countries provided from') }} <a href="https://restcountries.eu/" target="_blank">restcountries.eu</a></small>
    </div>
    @php
      $labels = [
        'favorite' => __('Favorite'),
        'search' => __('Search')
      ];
      $headers = [
        ['label' => __('Country Name')],
        ['label' => __('Region')],
        ['label' => __('Population')]
      ];
    @endphp
    <countries-table
      :favorite-countries='{{ json_encode($favorite_countries) }}'
      :countries='{{ json_encode($countries) }}'
      :labels='{{ json_encode($labels) }}'
      :headers='{{ json_encode($headers) }}'>
    </countries-table>
  </div>
@endsection

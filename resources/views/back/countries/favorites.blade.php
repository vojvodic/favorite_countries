@extends('layouts.master')
@section('title', __('Favorite countries'))
@section('content')
  @include('partials.header')
  <div id="page_content" class="container mt-3">
    @include('partials.alerts')
    <div class="page-title mb-3">
      <h1>{{ __('Favorite countries') }}</h1>
    </div>
    @php
      $labels = [
        'add'            => __('Add'),
        'remove'         => __('Remove'),
        'comment'        => __('Comment'),
        'comments'       => __('Comments'),
        'no_comments'    => __('No comments found'),
        'search'         => __('Search'),
        'confirm_remove' => __('Are you sure you want to remove this country from favorites?')
      ];
      $headers = [
        ['label' => __('Country Name')],
        ['label' => __('Region')],
        ['label' => __('Population')]
      ];
    @endphp
    <favorite-countries-table
      :inital-favorite-countries='{{ json_encode($favorite_countries) }}'
      :labels='{{ json_encode($labels) }}'
      :headers='{{ json_encode($headers) }}'>
    </favorite-countries-table>
  </div>
@endsection

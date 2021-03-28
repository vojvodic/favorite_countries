@extends('layouts.master')
@section('title', __('Settings'))
@section('content')
  @include('partials.header')
  <div class="container mt-3">
    @include('partials.alerts')
    <div class="page-title mb-3">
      <h1>{{ __('Settings') }}</h1>
    </div>
    <form action="{{ route('back.settings.update') }}" method="post">
      @csrf
      <div class="form-check mb-3">
        @if(old('cache_countries') == 'on' || $settings->cache_countries == 'on')
          <input class="form-check-input" type="checkbox" value="on" id="cache_countries" name="cache_countries" checked>
        @else
          <input class="form-check-input" type="checkbox" value="on" id="cache_countries" name="cache_countries">
        @endif
        <label class="form-check-label" for="cache_countries">
          {{ __('Cache countries retrieved from restcountries.eu') }}
        </label>
        <small class="text-muted d-block">
          {{ __('This will prevent application to send API requests each time main home page is visited.') }}
        </small>
      </div>
      <div class="text-end">
          <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
      </div>
    </form>
  </div>
@endsection

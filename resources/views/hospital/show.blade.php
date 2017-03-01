<!-- @extends('layouts.app') -->

@section('title', $hospital->hospitalid)

@php
  $link = '/hospital/'.$hospital->id
@endphp

@section('content')
  <div class="container">
    <h1 class="title is-1">{{ $hospital->hospitaldescription }}</h1>
    <h1 class="subtitle">
      {{ $hospital->hospitalid }}
      <span class="tag is-success">{{ $hospital->status }}</span>
    </h1>
    <div class="columns">
      <div class="column">
        <div class="box">
          <a href="{{ $link }}/patients">Patients</a>
        </div>
      </div>
      <div class="column">
        <div class="box">
          <a href="{{ $link }}/inventory">Inventory</a>
        </div>
      </div>
      <div class="column">
        <div class="box">
          <a href="{{ $link }}/payments">Payments</a>
        </div>
      </div>
      <div class="column">
        <div class="box">
          <a href="{{ $link }}/doctors">Doctors</a>
        </div>
      </div>
      <div class="column">
        <div class="box">
          <a href="{{ $link }}/nurses">Nurses</a>
        </div>
      </div>
    </div>
  </div>

@endsection

@push('scripts')
<script src="/js/patient-table.js"></script>
@endpush

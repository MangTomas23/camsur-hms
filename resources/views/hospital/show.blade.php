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
    <div class="columns hospital-menu">
      <div class="column">
        <div class="box has-text-centered">
          <img src="/img/patient-male.png" alt="">
          <a href="{{ $link }}/patients">Patients</a>
        </div>
      </div>
      <div class="column">
        <div class="box has-text-centered">
          <img src="/img/inventory.jpg" alt="">
          <a href="{{ $link }}/inventory">Inventory</a>
        </div>
      </div>
      <div class="column">
        <div class="box has-text-centered">
          <img src="/img/payment.png" alt="">
          <a href="{{ $link }}/payments">Payments</a>
        </div>
      </div>
      <div class="column">
        <div class="box has-text-centered">
          <img src="/img/doctor.png" alt="">
          <a href="{{ $link }}/doctors">Doctors</a>
        </div>
      </div>
      <div class="column">
        <div class="box has-text-centered">
          <img src="/img/nurse.png" alt="">
          <a href="{{ $link }}/nurses">Nurses</a>
        </div>
      </div>
    </div>
  </div>

@endsection

@push('scripts')
<script>
  $(document).ready( function() {
    $('.hospital-menu .box').on('click', function() {
      window.location.href = $(this).find('a').attr('href');
    });
  });
</script>
@endpush

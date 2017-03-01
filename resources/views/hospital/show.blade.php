<!-- @extends('layouts.app') -->

@section('title', $hospital->hospitalid)

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
          <a href="/hospital/{{ $hospital->id }}/patients">Patients</a>
        </div>
      </div>
      <div class="column">
        <div class="box">
          Inventory
        </div>
      </div>
      <div class="column">
        <div class="box">
          Payments
        </div>
      </div>
      <div class="column">
        <div class="box">
          Doctors
        </div>
      </div>
      <div class="column">
        <div class="box">
          Nurse
        </div>
      </div>
    </div>
  </div>

@endsection

@push('scripts')
<script src="/js/patient-table.js"></script>
@endpush

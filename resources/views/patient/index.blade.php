@extends('layouts.app')

@section('title', '')

@section('content')

<h1 class="title is-1">Patients</h1>

<table class="table is-striped">
  <thead>
    <tr>
      <th>Last Name</th>
      <th>First Name</th>
      <th>Middle Name</th>
      <th>Hospital</th>
    </tr>
  </thead>
  <tbody>
    @forelse($patients as $patient)
      <tr>
        <td>{{ $patient->lastname }}</td>
        <td>{{ $patient->firstname }}</td>
        <td>{{ $patient->middlename }}</td>
      </tr>
    @empty
      <tr>
        <td colspan="4">No data.</td>
      </tr>
    @endforelse
  </tbody>
</table>

@endsection

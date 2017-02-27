@extends('layouts.app')

@section('title', 'Search Results')

@section('content')

<h1 class="title is-1">Search results for "{{ $query }}"</h1>
<a href="#" class="button is-link">Back</a>

<table class="table is-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>First Name</th>
      <th>Middle Name</th>
      <th>Last Name</th>
      <th>Address</th>
    </tr>
  </thead>
  <tbody>
    @forelse($patients as $patient)
      <tr>
        <td>{{ $patient->id }}</td>
        <td>{{ $patient->firstname }}</td>
        <td>{{ $patient->middlename }}</td>
        <td>{{ $patient->lastname }}</td>
        <td>{{ $patient->address }}</td>
      </tr>
    @empty
      <tr>
        <td colspan="5">No results found.</td>
      </tr>
    @endforelse
  </tbody>
</table>
@endsection

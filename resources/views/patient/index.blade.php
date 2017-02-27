@extends('layouts.app')

@section('title', 'Patients')

@section('content')

<h1 class="title is-1">Patients</h1>

<table class="table is-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Last Name</th>
      <th>First Name</th>
      <th>Middle Name</th>
      <th>Hospital</th>
    </tr>
  </thead>
  <tbody>
    @forelse($patients as $patient)
      <tr>
        <td>
          <a href="/patient/{{ $patient->id }}">{{ $patient->id }}</a>
        </td>
        <td>{{ $patient->lastname }}</td>
        <td>{{ $patient->firstname }}</td>
        <td>{{ $patient->middlename }}</td>
        <td>{{ $patient->hospital->hospitalid }}</td>
      </tr>
    @empty
      <tr>
        <td colspan="4">No data.</td>
      </tr>
    @endforelse
  </tbody>
</table>

<nav class="pagination">
  <a href="{{ $patients->previousPageUrl() }}" class="pagination-previous">Previous</a>
  <a href="{{ $patients->nextPageUrl() }}" class="pagination-next">Next page</a>
  <ul class="pagination-list">
    <li>
      <a class="pagination-link" href="{{ $patients->url(1) }}">First</a>
    </li>
    <li>
      <span class="pagination-ellipsis">&hellip;</span>
    </li>
    <li>
      <a class="pagination-link" href="{{ $patients->url($patients->lastPage()) }}">Last</a>
    </li>
  </ul>
</nav>

@endsection

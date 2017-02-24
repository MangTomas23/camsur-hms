@extends('layouts.app')

@section('title', $hospital->hospitalid)

@section('content')

<section class="section">
  <div class="container">
    <h1 class="title is-1">{{ $hospital->hospitalid }}</h1>

    <h2 class="title is-2">Patients</h2>
    <table class="table is-striped">
      <thead>
        <tr>
          <th>Last Name</th>
          <th>First Name</th>
          <th>Middle Name</th>
          <th>Gender</th>
          <th>Age</th>
          <th>Address</th>
        </tr>
      </thead>
      <tbody>
        @forelse($patients as $patient)
          <tr>
            <td>{{ $patient->lastname }}</td>
            <td>{{ $patient->firstname }}</td>
            <td>{{ $patient->middlename }}</td>
            <td>{{ $patient->gender }}</td>
            <td>{{ $patient->age }}</td>
            <td>{{ $patient->address }}</td>
          </tr>
        @empty
          <div class="notification is-warning">
            Empty records!
          </div>
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
  </div>
</section>

@endsection
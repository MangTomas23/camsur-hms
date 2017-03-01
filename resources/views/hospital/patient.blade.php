@extends('layouts.app')

@section('title', $hospital->hospitalid)

@section('content')
  <div class="container">
      <h1 class="title is-1">{{ $hospital->hospitaldescription }}</h1>
      <h2 class="subtitle">{{ $hospital->hospitalid }}</h2>

      <section>
      <div class="columns">
        <div class="column">
          <h3 class="title is-3">Patients</h3>
        </div>
        <div class="column is-3 has-text-right">
          <form class="" action="/hospital/{{$hospital->id}}/patients/search" method="get">
            <div class="control has-addons">
                <input type="text" class="input" name="q" placeholder="Search" value="">
                <button type="submit" class="button is-info">
                  <i class="fa fa-search"></i>
                </button>
            </div>
          </form>
        </div>
      </div>
      <table class="table is-striped patient">
        <thead>
          <tr>
            <th>ID</th>
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
          <tr data-id="{{ $patient->id }}">
            <td>{{ $patient->id }}</td>
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
    </section>
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

<div class="modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Modal title</p>
      <button class="delete"></button>
    </header>
    <section class="modal-card-body">
      <!-- Content ... -->
    </section>
    <footer class="modal-card-foot">
      <a class="button is-success">Save changes</a>
      <a class="button">Cancel</a>
    </footer>
  </div>
</div>
@endsection

@push('scripts')
<script src="/js/patient-table.js"></script>
@endpush

@extends('layouts.app')

@section('title', 'Nurses')

@section('content')

<h3 class="title is-3">Nurses</h3>

<table class="table is-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>First Name</th>
      <th>Middle Name</th>
      <th>Last Name</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach($nurses as $nurse)
      <tr>
        <td>{{ $nurse->id }}</td>
        <td>{{ $nurse->firstname }}</td>
        <td>{{ $nurse->middlename }}</td>
        <td>{{ $nurse->lastname }}</td>
        <td>{{ $nurse->status }}</td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection

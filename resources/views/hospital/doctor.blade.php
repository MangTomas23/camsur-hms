@extends('layouts.app')

@section('title', 'Doctors')

@section('content')

<h3 class="title is-3">Doctors</h3>

<table class="table is-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>First Name</th>
      <th>Middle Name</th>
      <th>Last Name</th>
      <th>Rate</th>
      <th>Status</th>
      <th>Designation</th>
      <th>Department</th>
    </tr>
  </thead>
  <tbody>
    @foreach($doctors as $doctor)
      <tr>
        <td>{{ $doctor->id }}</td>
        <td>{{ $doctor->firstname }}</td>
        <td>{{ $doctor->middlename }}</td>
        <td>{{ $doctor->lastname }}</td>
        <td>{{ number_format($doctor->rate,2,'.',',') }}</td>
        <td>{{ $doctor->status }}</td>
        <td>{{ $doctor->designation }}</td>
        <td>{{ $doctor->department }}</td>
      </tr>
    @endforeach
  </tbody>

</table>

@endsection

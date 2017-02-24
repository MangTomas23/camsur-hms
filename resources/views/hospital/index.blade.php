@extends('layouts.app')

@section('title', 'Hospitals')

@section('content')

<h1 class="title is-1">Hospitals</h1>
<table class="table is-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Description</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>

    @foreach($hospitals as $hospital)
      <tr>
        <td>
          <a href="/hospital/{{ $hospital->id }}">
            {{ $hospital->hospitalid }}
          </a>
        </td>
        <td>{{ $hospital->hospitaldescription }}</td>
        <td>{{ $hospital->status }}</td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection

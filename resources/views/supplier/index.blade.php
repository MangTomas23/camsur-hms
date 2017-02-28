@extends('layouts.app')

@section('title', 'Suppliers')

@section('content')

<h1 class="title is-1">Suppliers</h1>

<table class="table is-striped">
  <thead>
    <tr>
      <th>Code</th>
      <th>Status</th>
      <th>Hospital ID</th>
      <th>Contact No.</th>
      <th>Contact Person</th>
    </tr>
  </thead>
  <tbody>
    @forelse($suppliers as $supplier)
      <tr>
        <td>{{ $supplier->suppliercode }}</td>
        <td>{{ $supplier->status }}</td>
        <td>
          <a href="/hospital/{{ $supplier->hospital->id }}">
            {{ $supplier->hospitalid }}
          </a>
        </td>
        <td>{{ $supplier->contactno }}</td>
        <td>{{ $supplier->contactperson }}</td>
      </tr>
    @empty
    @endforelse
  </tbody>
</table>

@endsection

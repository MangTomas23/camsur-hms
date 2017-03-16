@extends('layouts.app')

@section('title')

@section('content')

<h3 class="title is-3">Payments</h3>

<table class="table is-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Patient</th>
      <th>Date</th>
      <th>Total</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach($payments as $payment)
      <tr>
        <td>{{ $payment->id }}</td>
        <td>{{ $payment->patient }}</td>
        <td>{{ $payment->date }}</td>
        <td>{{ $payment->total }}</td>
        <td>{{ $payment->status }}</td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection

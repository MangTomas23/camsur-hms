@extends('layouts.app')

@section('content')
<!--
<section class="section">
  <div class="container">
    <div class="notification">
      You are logged in!
    </div>
  </div>
</section> -->

<section class="section">
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
</section>

@endsection

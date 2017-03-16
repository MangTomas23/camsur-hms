@extends('layouts.app')

@section('title', 'Users')

@section('content')

<h1 class="title is-1">Users</h1>
<a href="{{ route('user.create') }}" class="button is-primary">Add</a>

<section class="section">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</section>
@endsection

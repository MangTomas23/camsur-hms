@extends('layouts.app')

@section('title', 'Change Password')

@section('content')

<h1 class="title is-1">Change Password</h1>


<section class="section">
  <div class="container">
    <form class="" action="/change/password" method="post">
      {{ csrf_field() }}
      <div class="control">
        <label for="old_password">Password</label>
        <input type="password" class="input" name="old_password" value="">
      </div>
      <div class="control">
        <label for="new_password">New Password</label>
        <input type="password" class="input" name="new_password" value="">
      </div>
      <div class="control">
        <label for="new_password_confirmation">Confirm Password</label>
        <input type="password" class="input" name="new_password_confirmation" value="">
      </div>
      <div class="control">
        <button type="submit" class="button is-primary">Submit</button>
      </div>

      @if($errors)
        <div class="notification is-danger">
          <p>Error</p>
        </div>
      @endif
    </form>
  </div>
</section>
@endsection

@extends('layouts.app')

@section('content')

<section class="hero is-fullheight">
  <div class="hero-body has-text-center">
    <div class="container">
    <div class="column is-4 is-offset-4">
      <form method="post" action="{{ route('login') }}">
        {{ csrf_field() }}
        <label for="email" class="label">Email</label>
        <div class="control has-icon has-icon-right">
          <input type="text" class="input {{ $errors->has('email') ? 'is-danger':'' }}" name="email" value="">
          @if($errors->has('email'))
            <span class="icon is-small">
              <i class="fa fa-warning"></i>
            </span>
            <span class="help is-danger">{{ $errors->first('email') }}</span>
          @endif
        </div>
        <label for="password" class="label">Password</label>
        <div class="control">
          <input type="password" class="input" name="password" value="">
          @if($errors->has('password'))
            <span class="help is-danger">{{ $errors->first('password') }} ass</span>
          @endif
        </div>
        <div class="control">
          <button type="submit" class="button is-primary is-pulled-right" name="login">Login</button>
        </div>
      </form>
    </div>
  </div>
  </div>
</section>

@endsection

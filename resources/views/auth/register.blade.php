@extends('layouts.authentication')

@section('title', 'Register')

@section('content')

<div class="section full-height">
  <div class="container">
    <div class="column is-half is-offset-one-quarter">
      <form action="{{ route('register') }}" method="post">
      {{ csrf_field() }}
      <label for="name" class="label">Name</label>
      <div class="control has-icon has-icon-right">
        <input type="text" class="input {{ $errors->has('name') ? 'is-danger':'' }}" name="name" value="">
        @if($errors->has('name'))
          <span class="icon is-small">
            <i class="fa fa-warning"></i>
          </span>
          <span class="help is-danger">{{ $errors->first('name') }}</span>
        @endif
      </div>
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
      <div class="control has-icon has-icon-right">
        <input type="password" class="input {{ $errors->has('password') ? 'is-danger':'' }}" name="password" value="">
        @if($errors->has('password'))
          <span class="icon is-small">
            <i class="fa fa-warning"></i>
          </span>
          <span class="help is-danger">{{ $errors->first('password') }}</span>
        @endif
      </div>
      <label for="password_confirmation" class="label">Confirm Password</label>
      <div class="control">
        <input type="password" class="input" name="password_confirmation" value="">
      </div>
      <div class="control">
        <button type="submit" class="button is-primary is-pulled-right" name="button">
          Register
        </button>
      </div>
    </form>
    </div>
  </div>
</div>


<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection

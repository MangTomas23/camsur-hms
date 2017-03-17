@extends('layouts.app')

@section('title', 'Hospitals')

@section('content')

<p class="page-title">
  <strong>Hospitals</strong>
</p>

<section class="section hospital-list is-paddingless">
  @foreach($hospitals as $hospital)
    <a class="box" href="{{ route('hospital.show', $hospital->id) }}">
      <div class="columns">
        <div class="column">
          <strong>{{ $hospital->hospitaldescription }}</strong>
          <p>{{ $hospital->hospitalid }}</p>
        </div>
        <div class="column has-text-right">
          <span class="tag is-medium is-info">{{ $hospital->status }}</span>
        </div>
      </div>
    </a>
  @endforeach
</section>
@endsection

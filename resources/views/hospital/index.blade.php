@extends('layouts.app')

@section('title', 'Hospitals')

@section('content')

<h1 class="title is-1">Hospitals</h1>

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

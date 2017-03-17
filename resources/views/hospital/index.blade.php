@extends('layouts.app')

@section('title', 'Hospitals')

@section('content')

<p class="page-title">
  <strong>Hospitals</strong>
</p>

<section class="section hospital-list is-paddingless">
  @foreach($hospitals as $hospital)
    <a class="box" href="{{ route('hospital.show', $hospital->id) }}">
      <article class="media">
        <div class="media-left">
          <figure class="img is-64x64">
            <span class="icon is-large">
              <i class="fa fa-hospital-o"></i>
            </span>
          </figure>
        </div>
        <div class="media-content">
          <div class="columns">
        <div class="column">
          <strong>{{ $hospital->hospitaldescription }}</strong>
          <p>{{ $hospital->hospitalid }}</p>
        </div>
        <div class="column has-text-right">
          <span class="tag is-medium is-info">
            <span class="icon is-small">
              <i class="fa fa-dot-circle-o"></i>
            </span>
            <span>
              {{ $hospital->status }}
            </span>
          </span>
        </div>
      </div>
        </div>
      </article>
    </a>
  @endforeach
</section>
@endsection

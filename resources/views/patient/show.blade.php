@extends('layouts.app')

@section('title', 'Patient')

@section('content')

<h1 class="title is-1">Patient's Info</h1>

<div class="box">
  <article class="media">
  <figure class="media-left">
    <div class="image">
      <img src="http://localhost:4000/images/placeholders/128x128.png" alt="">
    </div>
  </figure>
  <div class="media-content">
    <div class="content patient-info">
      <div class="columns">
        <div class="column">
          <p><strong>Name: </strong>{{ $patient->fullname() }}</p>
          <p><strong>Address: </strong>{{ $patient->address }}</p>
          <p><strong>Age: </strong>{{ $patient->age }}</p>
          <p><strong>Gender: </strong>{{ $patient->gender }}</p>
          <p><strong>Contact No: </strong>{{ $patient->contact }}</p>
        </div>
        <div class="column">
          <p><strong>Height: </strong>{{ $patient->height }}</p>
          <p><strong>Weight: </strong>{{ $patient->weight }}</p>
          <p><strong>Blood Type: </strong>{{ $patient->bloodtype }}</p>
          <p><strong>Mother's Name: </strong>{{ $patient->mothername }}</p>
          <p><strong>Father's Name: </strong>{{ $patient->fathername }}</p>
        </div>
      </div>
    </div>
  </div>
</article>
</div>

@endsection

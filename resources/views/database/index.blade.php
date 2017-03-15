@extends('layouts.app')

@section('title', 'Database Settings')

@section('content')

<h1 class="title is-1">Database</h1>

<div class="box">
  <div class="columns">
    <div class="column has-text-centered">
      <button id="backup" type="button" class="button is-success" name="button">Backup Database</button>
    </div>
    <div class="column has-text-centered">
      <button type="button" class="button is-warning" name="button">Restore Database</button>
    </div>
    <div class="column has-text-centered">
      <button type="button" class="button is-danger" name="button">Reset Database</button>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  $(document).ready( function() {
    $('#backup').on('click', function() {
      $.ajax({
        url: '/database/backup'
      }).done( function(data){
        window.location = '/database/backup';
      });
    });
  });
</script>
@endpush

@extends('layouts.app')

@section('title', 'Memo')

@section('content')

<h1 class="title is-1">Bulletin</h1>

<button type="button" class="button is-info modal-button" data-target="#createModal" name="button">Create</button>

<table class="table is-striped">
  <thead>
    <tr>
      <th>Id</th>
      <th>Subject</th>
      <th>Description</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>

  </tbody>
</table>

<div id="createModal" class="modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Title</p>
    </header>
    <section class="modal-card-body">
      <form class="" action="index.html" method="post">
        <label class="label">Subject</label>
        <div class="control">
          <input type="text" class="input" name="" value="">
        </div>
        <label class="label">Description</label>
        <div class="control">
          <textarea name="name" class="textarea" rows="8" cols="80"></textarea>
        </div>
        <label class="label">Hospital</label>
        <div class="control">
          <div class="select is-fullwidth">
            <select name="">
              <option value="all">All</option>
              @foreach($hospitals as $hospital)
                <option value="{{ $hospital->id }}">{{ $hospital->hospitalid }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <label class="label">Attachments</label>
        <button type="button" class="button" name="button"></button>
      </form>
    </section>
    <footer class="modal-card-foot">
      <button type="button" class="button" name="button">Cancel</button>
      <button id="btnSave" type="button" class="button is-success" name="button">Save</button>
    </footer>
  </div>
</div>
@endsection
@push('scripts')
<script>
  $('#btnSave').on('click', function() {

    $.ajax({
      url: '/memo',
      method: 'post',
      data: {
        _token: Laravel.csrfToken
      }
    }).done( function(data) {
      console.log(data);
    });

  });
</script>
@endpush

@extends('layouts.app')

@section('title', 'Memo')

@section('content')

<h1 class="title is-1">Memos</h1>

<button type="button" class="button is-info modal-button" data-target="#createModal" name="button">Create</button>

<table class="table is-striped">
  <thead>
    <tr>
      <th>Memo Id</th>
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
        <label class="label">Description</label>
        <div class="control">
          <input type="text" name="" value="" class="input">
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
      </form>
    </section>
    <footer class="modal-card-foot">
      <button type="button" class="button" name="button">Cancel</button>
      <button type="button" class="button is-success" name="button">Save</button>
    </footer>
  </div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Bulletin')

@section('content')

<h1 class="title is-1">Bulletin</h1>

<button type="button" class="button is-info modal-button" data-target="#createModal" name="button">Create</button>

<table class="table is-striped bulletins">
  <thead>
    <tr>
      <th>Id</th>
      <th>Subject</th>
      <th>Description</th>
      <th>Date</th>
      <th>Category</th>
      <th>Attachments</th>
    </tr>
  </thead>
  <tbody>

  </tbody>
</table>

<div id="createModal" class="modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Create</p>
    </header>
    <section class="modal-card-body">
      <form class="" action="/bulletin" method="post" id="bulletinForm">
        {{ csrf_field() }}
        <label class="label">Subject</label>
        <div class="control">
          <input type="text" class="input" name="subject" value="">
        </div>
        <label class="label">Description</label>
        <div class="control">
          <textarea name="description" class="textarea" rows="8" cols="80"></textarea>
        </div>
        <div class="columns">
          <div class="column">
            <label class="label">Hospital</label>
            <div class="control">
              <div class="select is-fullwidth">
                <select name="hospital">
                  <option value="all">All</option>
                  @foreach($hospitals as $hospital)
                    <option value="{{ $hospital->id }}">{{ $hospital->hospitalid }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="column">
            <label class="label">Category</label>
            <div class="control">
              <div class="select is-fullwidth">
                <select class="select" name="bulletin_category">
                  @foreach($bulletin_categories as $bulletin_category)
                    <option value="{{ $bulletin_category->id }}">
                      {{ $bulletin_category->name }}
                    </option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
        <label class="label">Attachments</label>
        <div id="uploader"></div>
    </section>
    <footer class="modal-card-foot">
      <div class="column has-text-right is-paddingless">
        <button type="button" class="button cancel" name="button">Cancel</button>
        <button id="btnSave" type="submit" class="button is-success" name="button">
          <span class="icon is-small">
            <i class="fa fa-save"></i>
          </span>
          <span>Save</span>
        </button>
      </div>
    </form>
    </footer>
  </div>
</div>
<script type="text/template" id="qq-template">
    <div class="qq-uploader-selector qq-uploader qq-gallery" qq-drop-area-text="Drop files here">
        <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
            <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
        </div>
        <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
            <span class="qq-upload-drop-area-text-selector"></span>
        </div>
        <div class="buttons">
            <div class="qq-upload-button-selector button">
                <div>Select files</div>
            </div>
        </div>
        <span class="qq-drop-processing-selector qq-drop-processing">
            <span>Processing dropped files...</span>
            <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
        </span>
        <ul class="qq-upload-list-selector qq-upload-list" role="region" aria-live="polite" aria-relevant="additions removals">
            <li>
                <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
                <div class="qq-progress-bar-container-selector qq-progress-bar-container">
                    <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
                </div>
                <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                <div class="qq-thumbnail-wrapper">
                    <img class="qq-thumbnail-selector" qq-max-size="120" qq-server-scale>
                </div>
                <button type="button" class="qq-upload-cancel-selector qq-upload-cancel">X</button>
                <button type="button" class="qq-upload-retry-selector qq-upload-retry">
                    <span class="qq-btn qq-retry-icon" aria-label="Retry"></span>
                    Retry
                </button>

                <div class="qq-file-info">
                    <div class="qq-file-name">
                        <span class="qq-upload-file-selector qq-upload-file"></span>
                        <span class="qq-edit-filename-icon-selector qq-btn qq-edit-filename-icon" aria-label="Edit filename"></span>
                    </div>
                    <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
                    <span class="qq-upload-size-selector qq-upload-size"></span>
                    <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">
                        <span class="qq-btn qq-delete-icon" aria-label="Delete"></span>
                    </button>
                    <button type="button" class="qq-btn qq-upload-pause-selector qq-upload-pause">
                        <span class="qq-btn qq-pause-icon" aria-label="Pause"></span>
                    </button>
                    <button type="button" class="qq-btn qq-upload-continue-selector qq-upload-continue">
                        <span class="qq-btn qq-continue-icon" aria-label="Continue"></span>
                    </button>
                </div>
            </li>
        </ul>

        <dialog class="qq-alert-dialog-selector">
            <div class="qq-dialog-message-selector"></div>
            <div class="qq-dialog-buttons">
                <button type="button" class="qq-cancel-button-selector">Close</button>
            </div>
        </dialog>

        <dialog class="qq-confirm-dialog-selector">
            <div class="qq-dialog-message-selector"></div>
            <div class="qq-dialog-buttons">
                <button type="button" class="qq-cancel-button-selector">No</button>
                <button type="button" class="qq-ok-button-selector">Yes</button>
            </div>
        </dialog>

        <dialog class="qq-prompt-dialog-selector">
            <div class="qq-dialog-message-selector"></div>
            <input type="text">
            <div class="qq-dialog-buttons">
                <button type="button" class="qq-cancel-button-selector">Cancel</button>
                <button type="button" class="qq-ok-button-selector">Ok</button>
            </div>
        </dialog>
    </div>
</script>
<script id="bulletin-row-template" type="text/x-handlebars-template">
  <tr>
    <td>@{{ id }}</td>
    <td>@{{ subject }}</td>
    <td>@{{ description}}</td>
    <td>@{{ created_at }}</td>
    <td>@{{ category.name }}</td>
    <td>//</td>
  </tr>
</script>

@endsection
@push('scripts')
<script src="/fine_uploader/fine-uploader.core.js"></script>
<script src="/fine_uploader/jquery.fine-uploader.js"></script>
<script src="/bower_components/handlebars/handlebars.min.js"></script>
<script src="/js/bulletin.js"></script>
@endpush
@push('styles')
<link rel="stylesheet" href="/fine_uploader/fine-uploader.min.css">
<link rel="stylesheet" href="/fine_uploader/fine-uploader-gallery.css">
@endpush

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

<div id="createModal" class="modal is-active">
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
        <div id="uploader"></div>
      </form>
    </section>
    <footer class="modal-card-foot">
      <button type="button" class="button" name="button">Cancel</button>
      <button id="btnSave" type="button" class="button is-success" name="button">Save</button>
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
            <button type="button" id="uploadAttachments" class="button is-primary">
              <span class="icon is-small">
                <i class="fa fa-upload"></i>
              </span>
              <span>Upload</span>
            </button>
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

@endsection
@push('scripts')
<script src="/fine_uploader/fine-uploader.core.js"></script>
<script src="/fine_uploader/jquery.fine-uploader.js"></script>
<script>
  $(document).ready( function() {
    $('#uploader').fineUploader({
      template: 'qq-template',
      autoUpload: false,
      request: {
        endpoint: '/bulletin/upload'
      }
    });

    $('#uploadAttachments').on('click', function() {
      $('#uploader').fineUploader('uploadStoredFiles');
    });

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
  });
</script>
@endpush
@push('styles')
<link rel="stylesheet" href="/fine_uploader/fine-uploader.min.css">
<link rel="stylesheet" href="/fine_uploader/fine-uploader-gallery.css">
@endpush
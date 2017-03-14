$(document).ready( function() {
   var uploader = new qq.FineUploader({
    element: document.querySelector('#uploader'),
    template: 'qq-template',
    autoUpload: false,
    request: {
      endpoint: '/bulletin/attachment/upload',
      params: {
        _token: Laravel.csrfToken
      }
    },
    thumbnails: {
      placeholders: {
        notAvailablePath: '/fine_uploader/placeholders/not_available-generic.png',
        waitingPath: '/fine_uploader/placeholders/waiting-generic.png'
      }
    },
    callbacks: {
      onComplete: function(id, name, responseJSON, xhr) {
        console.log(responseJSON);
      },
      onAllComplete: function(succeeded, failed) {
        $('html').removeClass('is-clipped');
        $('.modal').removeClass('is-active');
      }
    }
  });

  $('#bulletinForm').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
      url: '/bulletin',
      method: 'post',
      data: $(this).serialize()
    }).done( function(data) {
      if(uploader.getUploads().length) {
        uploader.setParams({bulletin_id: data.bulletin_id, _token: Laravel.csrfToken});
        uploader.uploadStoredFiles();
      }
      loadBulletins();
    });
  });;

  function loadBulletins() {
    $.ajax({
      url: '/api/bulletin'
    }).done( function(data) {
      var template = Handlebars.compile($('#bulletin-row-template').html());
      var table = $('table.bulletins tbody');
      table.empty();
      $.each(data, function(i, bulletin) {
        var html = template(bulletin);
        table.append(html);
      });
    });
  }

  loadBulletins();
});

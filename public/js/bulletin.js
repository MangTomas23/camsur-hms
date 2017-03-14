$(document).ready( function() {
  $('#uploader').fineUploader({
    template: 'qq-template',
    autoUpload: false,
    request: {
      endpoint: '/bulletin/upload',
      params: {
        _token: Laravel.csrfToken
      }
    },
    callbacks: {
      onComplete: function(id, name, responseJSON, xhr) {
        console.log(responseJSON);
      }
    }
  });

  $('#uploadAttachments').on('click', function() {
    $('#uploader').fineUploader('uploadStoredFiles');
  });

  $('#bulletinForm').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
      url: '/bulletin/attachment/upload',
      method: 'post',
      data: $(this).serialize()
    }).done( function(data) {
      console.log(data);
      // $('#uploader').fineUploader('uploadStoredFiles');
    });
  });;

  function loadBulletins() {
    $.ajax({
      url: '/api/bulletin'
    }).done( function(data) {
      console.log(data  );
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

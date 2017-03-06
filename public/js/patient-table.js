$(document).ready( function() {
  $('.table.patient tbody tr').on('click', function() {
    var id = $(this).data('id');
    if(id !== undefined) {
      window.location.href = `/patient/${id}`;
    }
  });
});

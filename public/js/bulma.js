$(document).ready( function() {
  $('.modal-button').click(function() {
    var target = $(this).data('target');
    $('html').addClass('is-clipped');
    $(target).addClass('is-active');
  });

  $('.modal-background, .modal-close').click(function() {
    $('html').removeClass('is-clipped');
    $(this).parent().removeClass('is-active');
  });

  $('.modal-card-head .delete, .modal-card-foot .button').click(function() {
    $('html').removeClass('is-clipped');
    $('#modal-ter').removeClass('is-active');
  });
});

tbl_bill

id
hospitalid
patient_no
user_code


tbl_bill_items
bill_id
description
amount
date
status
sync
hospitalid

tbl_payment
bill_idamount
dataesync
hospitalid

tbl_bill_djustment
bill_id
amount
description
amount
sync
hospitalid


tbl_refund
bill_item_id
date
sync
usercode
sync
hospitalid



// Doctors

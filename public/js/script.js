
$(function () {
    if($('#example').length){
      $('#example').DataTable();
    }
});
  


$('.btn_links').click(function () {
  $('#admin_id').empty().text($(this).data('id'));
  $('#admin_name').empty().text($(this).data('name'));
  $('#admin_last_name').empty().text($(this).data('last_name'));
  $('#admin_first_name').empty().text($(this).data('first_name'));
  $('#admin_email').empty().text($(this).data('email'));
  $('#admin_cin').empty().text($(this).data('cin'));
  $('#admin_adress').empty().text($(this).data('adress'));
  $('#admin_phone').empty().text($(this).data('phone'));
  $('#admin_infos').modal('show');
})
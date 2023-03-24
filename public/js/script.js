// Vérifier s'il ya une table avec l'id #datatable dans la page overte, si oui l'initier
$(function () {
    if($('#datatable').length){
      $('#datatable').DataTable();
    }
});
  
// Afficher les informations des ustilisateur dans le modal
$('.btn_info').click(function () {
  $('#admin_id').empty().text($(this).data('id'));
  $('#admin_name').empty().text($(this).data('name'));
  $('#admin_last_name').empty().text($(this).data('last_name'));
  $('#admin_first_name').empty().text($(this).data('first_name'));
  $('#admin_email').empty().text($(this).data('email'));
  $('#admin_cin').empty().text($(this).data('cin'));
  $('#admin_adress').empty().text($(this).data('adress'));
  $('#admin_phone').empty().text($(this).data('phone'));
  $('#admin_infos').modal('show');
});

// Vérifier s'il faut modifier les mot de passe "Dans le cas de modification des informations des utilisateurs"
$('#update_password').change(function () {
  $(this).is(':checked') ? $('.for_update').prop('disabled', false) : $('.for_update').prop('disabled', true);
});


// Vérifcation lors de la suppession d'un enregistrement
$("#delete-user-btn").click(function(e){

  let $form = $(this).closest('form');
     
  if (confirm("Êtes-vous sûr de vouloir continuer?") == true) {
    $form.submit();
  } 
});

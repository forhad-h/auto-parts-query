!(function($) {
  $('#APQAddFieldsGroupAddBtn').on("click", function() {
    $('#APQFieldsGroupBase').clone().removeAttr('id style').appendTo($('#APQFieldsGroupContainer'));
  })
  $('#APQFieldsGroupContainer').on('click', '.apq__fields_group_remove_btn', function() {
    $(this).parents('.apq__fields_group').remove();
  })
})(jQuery)
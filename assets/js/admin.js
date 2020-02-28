!(function($) {
  /* Add Fields Group*/
  $('#APQAddFieldsGroupAddBtn').on("click", function() {
    $('#APQFieldsGroupBase').clone().removeAttr('id style').appendTo($('#APQFieldsGroupContainer'));
  })

  /*Remove Fields Group*/
  $('#APQFieldsGroupContainer').on('click', '.apq__fields_group_remove_btn', function() {
    $(this).parents('.apq__fields_group').remove();
  })

  /* Save query data */
  $('#APQFieldsGroupContainer').on('submit', '.apq__fields_group form', function(e) {

    e.preventDefault()

    var year = $(this).find('input[name=year]').val()
    var make = $(this).find('input[name=make]').val()
    var model = $(this).find('input[name=model]').val()
    var product_url = $(this).find('input[name=product_url]').val()


    $.ajax({
      method: 'POST',
      url: apqAjax.url + "?action=save_query_info",
      data: {
        year: year,
        make: make,
        model: model,
        product_url: product_url
      }
    }).done(function(data) {
      console.log("Data", data)
    })

  })

})(jQuery)
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

    var _this = $(this)
    var year = $(this).find('input[name=year]')
    var make = $(this).find('input[name=make]')
    var model = $(this).find('input[name=model]')
    var product_url = $(this).find('input[name=product_url]')


    $.ajax({
      method: 'POST',
      url: apqAjax.url + "?action=save_query_info",
      data: {
        year: year.val(),
        make: make.val(),
        model: model.val(),
        product_url: product_url.val()
      }
    }).done(function(data) {
      var dataObj = JSON.parse(data)[0]
      _this.attr('data-rid', dataObj.id)

    })

  })

})(jQuery)
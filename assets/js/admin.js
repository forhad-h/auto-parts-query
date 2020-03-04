!(function($) {
  /* Add Fields Group*/
  $('#APQAddFieldsGroupAddBtn').on("click", function() {
    $('#APQFieldsGroupBase').clone().removeAttr('id style').appendTo($('#APQFieldsGroupContainer'));
  })

  /*Remove Fields Group*/
  $('#APQFieldsGroupContainer').on('click', '.apq__fields_group_remove_btn', function() {
    $(this).parents('.apq__fields_group').remove();
  })

  /* Insert or update query data */
  $('#APQFieldsGroupContainer').on('submit', '.apq__fields_group form', function(e) {

    e.preventDefault()
    var _thisElm = $(this)
    _thisElm.find('.apq_loading').css('display', 'block')

    var _this = $(this)

    var year = $(this).find('input[name=year]')
    var make = $(this).find('input[name=make]')
    var model = $(this).find('input[name=model]')
    var product_url = $(this).find('input[name=product_url]')


    $.ajax({
      method: 'POST',
      url: apqAjax.url + "?action=save_query_info",
      data: {
        row_id: _thisElm.attr('data-rid'),
        year: year.val(),
        make: make.val(),
        model: model.val(),
        product_url: product_url.val()
      },
      success: function(data) {
        var dataObj = JSON.parse(data)[0]

        _thisElm.attr('data-rid', dataObj.id)

        _thisElm.find('.apq_loading').css('display', 'none')
      }
    })

  })

  /* Delete query data */
  $('#APQFieldsGroupContainer').on('click', '.apq__fields_group_remove_btn', function() {
    var rowId = $(this).parents('form').attr('data-rid')

    $.ajax({
      method: 'POST',
      url: apqAjax.url + "?action=delete_query_data",
      data: {
        row_id: rowId
      },
      success: function(data) {
        console.log("Delete", data)
        if (data) {
          console.log('works')
        }
      }
    })

  })

})(jQuery)
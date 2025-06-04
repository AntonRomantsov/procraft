$(function() {
  $('#cart > button').removeAttr('data-toggle').attr('onclick', 'call_cp(false,\'' + 'load' + '\');');
});

function cpInit() {
  $.ajax({
    type: 'get',
    url:  'index.php?route=extension/module/cart_popup/initcart',
    dataType: 'json',
    cache: false,
    success: function(json) {
      if (json['error']) {
        $('#cp-modal-body > .modal-footer > input.go-button-bottom, #cp-modal-body > .modal-footer > input.save-button-bottom, #cp-ajax-products').remove();
        $('#cp-modal-data').html('<div id="cp-modal-data-empty">' + json['error'] + '</div>');
      }
      if (json['cart_products']) {
        $.each(json['cart_products'], function(i, value) {
          $('[onclick="call_cp(\'' + value + '\',\'' + 'add' + '\');"]')
          .html('<i class="fa fa-shopping-cart" style="color: #ed6e00;"></i> ')
          .attr('onclick', 'call_cp(\'' + value + '\',\'' + 'load' + '\');');
          $('[onclick="call_cp(\'' + value + '\',\'' + 'add_option' + '\');"]')
          .html(json['text_in_cart'])
          .attr('onclick', 'call_cp(\'' + value + '\',\'' + 'load_option' + '\');');
        });
      }
      if (json['cart_products_vs_options']) {
        $.each(json['cart_products_vs_options'], function(i, value) {
          $('[onclick="call_cp(\'' + value + '\',\'' + 'add' + '\');"]')
          .html('<i class="fa fa-shopping-cart" style="color: #ed6e00;"></i> ');
          $('[onclick="call_cp(\'' + value + '\',\'' + 'add_option' + '\');"]')
          .html(json['text_in_cart_vs_options']);
        });
      }
      $('#cart-total').html(json['total']);
    }
  });
}

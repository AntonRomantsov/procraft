$(document).ready(function () {
  var page_form_id = $('.core-formid').text();

  /* Add File */
  Dropzone.autoDiscover = false;
  $('#pageform .dropzone').each(function() {
    var node = $(this);
    var node_this = this;
    var thisid = '#'+ node.attr('id');
    var myDropzone = new Dropzone(thisid, {
      url: 'index.php?route=page/form/upload&page_form_id='+ page_form_id,
      maxFiles: 1,
      init: function() {
        this.on("maxfilesexceeded", function(file) {
            myDropzone.removeAllFiles();
            myDropzone.addFile(file);
        });
      },
      success: function(file, json) {
        $(node_this).parent().find('.text-message').remove();

        if (json['warning']) {
          $(node_this).after('<div class="text-message alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['warning'] + '</div>');
        }

        if (json['success']) {
          $(node_this).after('<div class="text-message alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + '</div>');

          $(node_this).find('.dz-preview').append('<i class="fa fa fa-trash-o delete-file" onclick="deleteZoneFile(this);"></i>');

          $(node_this).parent().find('input').val(json['code']);
        }
      }
    });
  });

$('#button-formreset').on('click', function() {
  $('#pageform input[type=\'text\'], #pageform input[type=\'password\'], #pageform select, #pageform textarea').val('');

  $('#pageform input[type=\'radio\']:checked, #pageform input[type=\'checkbox\']:checked').prop('checked', false);
  $('#pageform .upload-wise input[type=\'hidden\']').val('');

});

$(document).delegate('#button-popup-formreset', 'click', function() {
  $('#FormModal input[type=\'text\'], #FormModal input[type=\'password\'], #FormModal select, #FormModal textarea').val('');

  $('#FormModal input[type=\'radio\']:checked, #FormModal input[type=\'checkbox\']:checked').prop('checked', false);
  $('#FormModal .upload-wise input[type=\'hidden\']').val('');

});

/* Datetime Picker */
$('.date').datetimepicker({
  pickTime: false
});

$('.datetime').datetimepicker({
  pickDate: true,
  pickTime: true
});

$('.time').datetimepicker({
  pickDate: false
});

/* Color Picker */
var element = null;
$('.color-picker').ColorPicker({
  curr : '',
  onShow: function (colpkr) {
    $(colpkr).fadeIn(500);
    return false;
  },
  onHide: function (colpkr) {
    $(colpkr).fadeOut(500);
  return false;
  },
  onSubmit: function(hsb, hex, rgb, el) {
    $(el).val('#'+hex);
    $(el).ColorPickerHide();
  },
  onBeforeShow: function () {
    $(this).ColorPickerSetColor(this.value);
  },
  onChange: function (hsb, hex, rgb) {
    element.curr.parent().next().find('.preview').css('background', '#' + hex);
    element.curr.val('#'+hex);
  }
}).bind('keyup', function(){
  $(this).ColorPickerSetColor(this.value);
}).click(function(){
  element = this;
  element.curr = $(this);
});

$.each($('.color-picker'),function(key,value) {
  $(this).parent().next().find('.preview').css({'background': $(this).val()});
});

/* Open Popup */
$('.mainformbuilder-button').on('click', function() {
  var node = this;

  var data = 'form_id='+ $(this).attr('data-form-id');

  if(data && $(this).attr('data-product-id')) {
    data += '&product_id='+ $(this).attr('data-product-id');
  }

  $.ajax({
    url: 'index.php?route=page/form_popup',
    data: data,
    type: 'post',
    dataType: 'json',
    beforeSend: function() {
      $(node).addClass('disableClick');
      $(node).button('loading');
    },
    complete: function() {
      $(node).removeClass('disableClick');
      $(node).button('reset');
    },
    success: function(json) {
      if(json['redirect']) {
        location = json['redirect'];
      } else if(json['html']) {
        $('body').prepend(json['html']);

        $('#FormModal').modal('show');
      }
    }
  });
});

/* Country Popup */
$(document).delegate('#FormModal .country_id', 'change', function() {
  var text_select = $('#FormModal .text_select').text();
  var text_none = $('#FormModal .text_none').text();

  $.ajax({
    url: 'index.php?route=page/form/country&country_id=' + this.value,
    dataType: 'json',
    beforeSend: function() {
      $('#FormModal .country_id').after(' <i class="fa fa-circle-o-notch fa-spin"></i>');
    },
    complete: function() {
      $('.fa-spin').remove();
    },
    success: function(json) {
      html = '<option value="">'+ text_select +'</option>';

      if (json['zone'] && json['zone'] != '') {
        for (i = 0; i < json['zone'].length; i++) {
          html += '<option value="' + json['zone'][i]['zone_id'] + '"';
          html += '>' + json['zone'][i]['name'] + '</option>';
        }
      } else {
        html += '<option value="0" selected="selected">'+ text_none +'</option>';
      }

      $('#FormModal .zone_id').html(html);
    }
  });
});

$('#FormModal .country_id').trigger('change');
});

/* Send Form Popup */
var FORMBUILDER = {
  'add': function(form_id) {

    var text_processing = $('#FormModal .text_processing').text();

    var data = $('#mainpageform input[type=\'text\'], #mainpageform input[type=\'tel\'], #mainpageform input[type=\'hidden\'], #mainpageform input[type=\'password\'], #mainpageform input[type=\'radio\']:checked, #mainpageform input[type=\'checkbox\']:checked, #mainpageform select, #mainpageform textarea').serialize();

    if( data ) {
      data += '&';
    }

    data += 'page_form_id='+ form_id;

    if($('#button-submit-formpopup').attr('data-product-id')) {
      data += '&product_id='+ $('#button-submit-formpopup').attr('data-product-id');
    }

    $.ajax({
      url: 'index.php?route=page/form/add',
      type: 'post',
      data: data,
      dataType: 'json',
      beforeSend: function() {
        $('#button-submit-formpopup').button('loading');

        $('#FormModal .alert, #FormModal .text-danger').remove();
        $('#FormModal .form-group').removeClass('has-error');

        $('#FormModal .modal-body').prepend('<div class="alert alert-info information"><i class="fa fa-circle-o-notch fa-spin"></i> ' + text_processing + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
      },
      complete: function() {
        $('#button-submit-formpopup').button('reset');
      },
      success: function(json) {
        $('#FormModal .alert, #FormModal .text-danger').remove();
        $('#FormModal .form-group').removeClass('has-error');
        $('#FormModal .form-group').find('.has-error').removeClass('has-error');

        if (json['error']) {
          if (json['error']['field']) {
            for (i in json['error']['field']) {
              var element = $('#FormModal #input-field' + i.replace('_', '-'));
              if (element.parent().hasClass('input-group')) {
                element.parent().after('<div class="text-danger">' + json['error']['field'][i] + '</div>');
              } else {
                element.after('<div class="text-danger">' + json['error']['field'][i] + '</div>');
              }
            }
          }

          if(json['captcha']) {
            $('#FormModal .cicaptcha').html(json['captcha']);
          }

          if (json['error']['warning']) {
            $('#FormModal .modal-body').prepend('<div class="alert alert-danger warning"><i class="fa fa-exclamation-circle"></i> ' + json['error']['warning'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');

            // $('html, body').animate({ scrollTop: 0 }, 'slow');
          }

          // Highlight any found errors
          $('#FormModal .text-danger').parent().addClass('has-error');
        }

        if (json['success']) {
          $('#FormModal .modal-title').html(json['success_title']);

          $('#FormModal .modal-body').html(json['success_message'] + '<div class="buttons clearfix"><div class="pull-right"><button class="btn btn-primary button" data-dismiss="modal">'+ json['success_button_continue'] +'</button></div></div>');
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
          alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      }
    });
  }
}

/* Open Popup By function */
function OpenFormBuilderPopup(form_id) {
  var data = 'form_id='+ form_id;

  if(data && $('#product input[name=\'product_id\']').val()) {
    data += '&product_id='+ $('#product input[name=\'product_id\']').val();
  }

  // if(data && product_id) {
  //   data += '&product_id='+ product_id;
  // }

  $.ajax({
    url: 'index.php?route=page/form_popup',
    data: data,
    type: 'post',
    dataType: 'json',
    beforeSend: function() {
    },
    complete: function() {
    },
    success: function(json) {
      console.log(json);
      if(json['redirect']) {
        location = json['redirect'];
      } else if(json['html']) {
        $('body').prepend(json['html']);

        $('#FormModal').modal('show');
      }
    }
  });
}

/* Remove File */
function deleteZoneFile(mynode) {
  $(mynode).parent().parent().removeClass('dz-started');

  $(mynode).parent().parent().parent().find('.text-message').remove();

  $(mynode).parent().parent().parent().find('input').val('');

  $(mynode).parent().remove();
}
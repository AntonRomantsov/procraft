<div id="FormModal" class="modal fade" role="dialog">
  <div class="modal-dialog <?php echo $popup_size; ?>">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo $heading_title; ?></h4>
      </div>
      <div class="modal-body">
        <?php echo trim($description); ?>
        <div class="form-horizontal">
          <fieldset id="mainpageform" class="pageform">
            <?php if($fieldset_title) { ?>
            <legend><?php echo $fieldset_title; ?></legend>
            <?php } ?>

            <div class="hide" style="display: none">
              <span class="text_processing"><?php echo $text_processing; ?></span>
              <span class="text_select"><?php echo $text_select; ?></span>
              <span class="text_none"><?php echo $text_none; ?></span>
            </div>

            <div class="row">
              <?php include($include_fields_file); ?>
            </div>

            <div class="cicaptcha">
              <?php echo $captcha; ?>
            </div>

            <div class="buttons">
              <div class="pull-right">
                <?php if($reset_button) { ?>
                <button type="button" class="btn btn-default button" id="button-popup-formreset"><i class="fa fa-refresh"></i> <?php echo $button_reset; ?></button>
                <?php } ?>
                <button type="button" class="btn btn-primary button" id="button-submit-formpopup" onclick="FORMBUILDER.add('<?php echo $page_form_id; ?>');" <?php echo $product_id ? 'data-product-id='. $product_id : ''; ?>><?php echo $button_continue; ?></button>
              </div>
            </div>
          </fieldset>
        </div>
        <?php echo trim($bottom_description); ?>
      </div>
    </div>
  </div>
<script type="text/javascript">
$('#FormModal .date').datetimepicker({
  pickTime: false
});

$('#FormModal .datetime').datetimepicker({
  pickDate: true,
  pickTime: true
});

$('#FormModal .time').datetimepicker({
  pickDate: false
});

$('#FormModal').on('hidden.bs.modal', function() {
  $(this).remove();
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


$(document).ready(function () {
  var page_form_id = $('.core-formid').text();

  /* Add File */
  Dropzone.autoDiscover = false;
  $('#FormModal .dropzone').each(function() {
    var node = $(this);
    var node_this = this;
    var thisid = '#'+ node.attr('id');
    var myDropzone = new Dropzone(thisid, {
      url: 'index.php?route=page/form/upload&page_form_id=<?php echo $page_form_id; ?>',
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
});
</script>
<style type="text/css">
<?php echo $css; ?>
</style>
</div>
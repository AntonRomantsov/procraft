<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right"><a href="<?php echo $add; ?>" data-toggle="tooltip" title="<?php echo $button_add; ?>" class="btn btn-primary"><i class="fa fa-plus"></i> <?php echo $button_add; ?></a>
        <button type="submit" form="form-page-form" formaction="<?php echo $copy; ?>" data-toggle="tooltip" title="<?php echo $button_copy; ?>" class="btn btn-default"><i class="fa fa-copy"></i> <?php echo $button_copy; ?></button>
        <button type="button" data-toggle="tooltip" title="<?php echo $button_delete; ?>" class="btn btn-danger" onclick="confirm('<?php echo $text_confirm; ?>') ? $('#form-page-form').submit() : false;"><i class="fa fa-trash-o"></i></button>
      </div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <?php if ($error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <?php if ($success) { ?>
    <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $success; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i> <?php echo $text_list; ?></h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form-page-form">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                  <td class="text-left"><?php if ($sort == 'p.page_form_id') { ?>
                    <a href="<?php echo $sort_id; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_id; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_id; ?>"><?php echo $column_id; ?></a>
                    <?php } ?></td>
                  <td class="text-left"><?php if ($sort == 'pd.title') { ?>
                    <a href="<?php echo $sort_title; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_title; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_title; ?>"><?php echo $column_title; ?></a>
                    <?php } ?></td>
                  <td class="text-right"><?php if ($sort == 'p.status') { ?>
                    <a href="<?php echo $sort_status; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_status; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_status; ?>"><?php echo $column_status; ?></a>
                    <?php } ?></td>
                  <td class="text-right"><?php if ($sort == 'o.sort_order') { ?>
                    <a href="<?php echo $sort_sort_order; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_sort_order; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_sort_order; ?>"><?php echo $column_sort_order; ?></a>
                    <?php } ?></td>
                  <td class="text-right"><?php echo $column_action; ?></td>
                </tr>
              </thead>
              <tbody>
                <?php if ($page_forms) { ?>
                <?php foreach ($page_forms as $page_form) { ?>
                <tr>
                  <td class="text-center"><?php if (in_array($page_form['page_form_id'], $selected)) { ?>
                    <input type="checkbox" name="selected[]" value="<?php echo $page_form['page_form_id']; ?>" checked="checked" />
                    <?php } else { ?>
                    <input type="checkbox" name="selected[]" value="<?php echo $page_form['page_form_id']; ?>" />
                    <?php } ?></td>
                  <td class="text-left">#<?php echo $page_form['page_form_id']; ?></td>
                  <td class="text-left"><?php echo $page_form['title']; ?></td>
                  <td class="text-right">
                    <?php if ($page_form['status']) { ?>
                      <span class="label label-success"><?php echo $page_form['status']; ?></span>
                    <?php } else { ?>
                      <span class="label label-danger"><?php echo $page_form['status']; ?></span>
                    <?php } ?>
                  </td>
                  <td class="text-right"><?php echo $page_form['sort_order']; ?></td>
                  <td class="text-right">
                    <a target="_blank" href="<?php echo $page_form['link']; ?>" class="btn btn-warning" data-toggle="tooltip" title="<?php echo $button_view_form; ?>"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-warning show-code" rel="<?php echo $page_form['page_form_id']; ?>" data-toggle="tooltip" title="<?php echo $button_code; ?>"><i class="fa fa-code"></i></a>
                    <a href="<?php echo $page_form['edit']; ?>" data-toggle="tooltip" title="<?php echo $button_edit; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                  </td>
                </tr>
                <tr>
                  <td colspan="6">
                    <div style="display: none;" class="html-code<?php echo $page_form['page_form_id']; ?>">
                      <div class="alert alert-info"><i class="fa fa-info-circle"></i> <?php echo $alert_event; ?> <br><br><b>onclick="javascript:OpenFormBuilderPopup(<?php echo $page_form['page_form_id']; ?>);"</b>
                      </div>
                      <div class="alert alert-warning"><i class="fa fa-link"></i> Hyperlink: <b>javascript:OpenFormBuilderPopup(<?php echo $page_form['page_form_id']; ?>);</b>
                      </div>
                      <textarea class="form-control pickfrom"><a class="btn btn-primary" href="javascript:OpenFormBuilderPopup(<?php echo $page_form['page_form_id']; ?>);"><?php echo $page_form['title']; ?></a></textarea>
                    </div>
                  </td>
                </tr>
                <?php } ?>
                <?php } else { ?>
                <tr>
                  <td class="text-center" colspan="6"><?php echo $text_no_results; ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </form>
        <div class="row">
          <div class="col-sm-6 text-left"><?php echo $pagination; ?></div>
          <div class="col-sm-6 text-right"><?php echo $results; ?></div>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
$('.show-code').click(function() {
  var rel = $(this).attr('rel');
  $('.html-code'+ rel).slideToggle();
});
</script>
</div>
<?php echo $footer; ?>
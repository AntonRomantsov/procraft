<?php echo $header; ?><?php echo $column_left;?>
<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button type="submit" form="form-module" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
                <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
			<h1><?php echo $heading_title; ?></h1>
			<ul class="breadcrumb">
				<?php foreach ($breadcrumbs as $breadcrumb) { ?>
					<li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
				<?php } ?>
			</ul>
        </div>
    </div>
    <div class="container-fluid">
        <?php if (isset($error_warning_keycrm)) : ?>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <i class="fa fa-exclamation-circle"></i> <?php echo $error_warning_keycrm; ?>
            </div>
         <?php endif; ?>
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-module" class="form-horizontal">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab-general" data-toggle="tab"><?php echo $general_tab_text; ?></a></li>
						 <?php if (!empty($saved_settings['api_key'])): ?>
							 <li><a href="#tab-order-statuses" data-toggle="tab"><?php echo $order_statuses_tab_text; ?></a></li>
							 <li><a href="#tab-payments" data-toggle="tab"><?php echo $payments_tab_text; ?></a></li>
							 <li><a href="#tab-shipping" data-toggle="tab"><?php echo $shipping_tab_text; ?></a></li>
							 <li><a href="#tab-export" data-toggle="tab"><?php echo $export_tab_text; ?></a></li>
                            <li><a href="#tab-logs" data-toggle="tab"><?php echo $logs_tab_text; ?></a></li>
                         <?php endif; ?>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-general">
                            <fieldset>
	                            <div class="form-group">
		                            <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status;?></label>
		                            <div class="col-lg-4 col-md-6 col-sm-10 input-group">
			                            <select name="<?php echo $module_title; ?>_status" id="input-status" class="form-control">
				                            <?php if (!empty($saved_settings['status'])){ ?>
					                            <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
					                            <option value="0"><?php echo $text_disabled; ?></option>
				                            <?php } else { ?>
					                            <option value="1"><?php echo $text_enabled; ?></option>
					                            <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
				                            <?php } ?>
			                            </select>
		                            </div>
	                            </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="url"><?php echo $keycrm_url; ?></label>
                                    <div class="col-lg-4 col-md-6 col-sm-10 input-group">
                                        <input
                                                class="form-control"
                                                id="url"
                                                type="text"
                                                name="<?=$module_title?>_url"
                                                value="<?php if (!empty($saved_settings['url'])): echo $saved_settings['url']; endif; ?>" />
                                        <span class="input-group-addon">.keycrm.app</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="api_key"><?php echo $keycrm_api_key; ?></label>
                                    <div class="col-lg-4 col-md-6 col-sm-10 input-group">
                                        <textarea class="form-control" id="api_key" name="<?=$module_title?>_api_key"><?php if (!empty($saved_settings['api_key'])): echo $saved_settings['api_key']; endif;?></textarea>
                                        <small><?php echo $set_apikey_and_save; ?></small>
                                    </div>

                                </div>

								<?php if (isset($sources)) : ?>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?php echo $keycrm_stores; ?></label>

                                    <div class="col-lg-6 col-md-8 col-sm-10">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th><?php echo $stores_table_store; ?></th>
                                                    <th><?php echo $stores_table_source; ?></th>
                                                    <th><?php echo $stores_table_enabled; ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
												<?php foreach ($stores as $idx => $store): ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $store['name']; ?>
                                                        <input
                                                                type="hidden"
                                                                name="<?=$module_title?>_stores[<?php echo $idx; ?>][store_id]"
                                                                value="<?php echo $store['store_id']; ?>">
                                                    </td>
                                                    <td>
                                                        <select name="<?=$module_title?>_stores[<?php echo $idx; ?>][source_id]">
															<option selected></option>

															<?php foreach($sources as $source) { ?>
                                                                <option
																		<?php if(isset($saved_settings['stores'][$idx]['source_id']) && $saved_settings['stores'][$idx]['source_id'] == $source->id) echo 'selected'; ?>
                                                                        value="<?php echo $source->id; ?>">
																	<?php echo $source->label; ?>
                                                                </option>
															<?php } ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="<?=$module_title?>_stores[<?php echo $idx; ?>][enabled]"
														  <?php if(isset($saved_settings['stores'][$idx]['enabled']) && $saved_settings['stores'][$idx]['enabled'] == 'on'): echo 'checked'; endif;?>/>
                                                    </td>
                                                </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>

                                        <small><?php echo $select_source_and_save; ?></small>
                                    </div>
                                </div>

								<div class="well text-center">
									<button type="button" id="open-status-settings" class="btn btn-success">
										<i class="fa fa-check-square-o"></i> <?php echo $button_status_settings; ?>
									</button>
								</div>

								<?php endif; ?>
                            </fieldset>
                        </div>
	                    <?php if (!empty($saved_settings['api_key'])): ?>
		                    <div class="tab-pane" id="tab-order-statuses">
			                    <fieldset>
				                    <legend><?php echo $text_heading_order_statuses_settings; ?></legend>

				                    <div class="order-status-settings-wrapper">
					                    <?php foreach ($order_statuses as $order_status) { ?>
						                    <div class="form-group ios8-wrapper">
							                    <input type='checkbox' class='ios8-switch' id='order_status_<?php echo $order_status['order_status_id']; ?>' name="<?=$module_title?>_order_statuses[<?php echo $order_status['order_status_id'] ?>]" <?php echo !empty($saved_settings['order_statuses'][$order_status['order_status_id']]) ? 'checked' : (empty($saved_settings['order_statuses']) ? 'checked' : '');?> value="<?php echo $order_status['order_status_id']; ?>" />
							                    <label for='order_status_<?php echo $order_status['order_status_id']; ?>'>
								                    <?php echo $order_status['name']; ?>
							                    </label>
						                    </div>
					                    <?php } ?>
					                    <div class="form-group ios8-wrapper">
						                    <input type='checkbox' class='ios8-switch' id='order_status_abandoned_cart' name="<?=$module_title?>_order_statuses[abandoned_cart]" <?php echo !empty($saved_settings['order_statuses']['abandoned_cart']) ? 'checked' : (empty($saved_settings['order_statuses']) ? 'checked' : '');?> value="abandoned_cart" />
						                    <label for='order_status_abandoned_cart'>
							                    <?php echo $text_abandoned_cart; ?>
						                    </label>
					                    </div>
				                    </div>
			                    </fieldset>
		                    </div>
	                        <div class="tab-pane" id="tab-payments">
	                            <fieldset>
									<?php if(isset($oc_payment_methods)):?>
	                                    <div class="form-group">
	                                        <div class="col-lg-4 col-md-6 col-sm-10 col-sm-offset-2">
	                                            <label>
	                                                <input type="checkbox"
	                                                       name="<?=$module_title?>_create_payments"
														  <?php if(!empty($saved_settings['create_payments'])) : echo 'checked'; endif;?>/>

													<?php echo $create_payments_text; ?>
	                                            </label>
	                                        </div>
	                                    </div>

	                                    <div class="form-group">
	                                        <label class="col-sm-2 control-label"><?php echo $keycrm_payment_methods; ?></label>

	                                        <div class="col-lg-6 col-md-8 col-sm-10">
	                                            <table class="table">
	                                                <thead>
	                                                <tr>
	                                                    <th><?php echo $payment_methods_table_oc_method; ?></th>
	                                                    <th><?php echo $payment_methods_table_kc_method; ?></th>
	                                                </tr>
	                                                </thead>
	                                                <tbody>
													<?php foreach($oc_payment_methods as $code => $name) :?>
	                                                    <tr>
	                                                        <td>
	                                                            <?php echo $name ?>
	                                                        </td>
	                                                        <td>
	                                                            <select name="<?=$module_title?>_payment_methods[<?php echo $code ?>]">
	                                                                <option selected></option>
																	<?php if(isset($payment_methods)) :?>
																		<?php foreach($payment_methods as $method) :?>
																			<option
																					<?php if(!empty($saved_settings['payment_methods']) && $saved_settings['payment_methods'][$code] == $method->id): echo 'selected'; endif;?>
																					value="<?php echo $method->id ?>">
																				<?php echo $method->name ?>
																			</option>
																		<?php endforeach; ?>
																	<?php endif; ?>
	                                                            </select>
	                                                        </td>
	                                                    </tr>
	                                                <?php endforeach; ?>
	                                                </tbody>
	                                            </table>
	                                        </div>
	                                    </div>
									<?php endif; ?>
	                            </fieldset>
	                        </div>
	                        <div class="tab-pane" id="tab-shipping">
	                            <fieldset>
	                                <div class="form-group">
	                                    <div class="col-lg-4 col-md-6 col-sm-10 col-sm-offset-2">
	                                        <label>
	                                            <input type="checkbox"
	                                                   name="<?=$module_title?>_create_shippings"
													  <?php echo !empty($saved_settings['create_shippings']) ? 'checked' : ''?>/>

												<?php echo $create_shippings_text; ?>
	                                        </label>
	                                    </div>
	                                </div>

	                                <div class="form-group">
	                                    <label class="col-sm-2 control-label"><?php echo $keycrm_shipping_methods; ?></label>

	                                    <div class="col-lg-6 col-md-8 col-sm-10">
	                                        <table class="table">
	                                            <thead>
	                                            <tr>
	                                                <th><?php echo $shipping_methods_table_oc_method; ?></th>
	                                                <th><?php echo $shipping_methods_table_kc_method; ?></th>
	                                            </tr>
	                                            </thead>
	                                            <tbody id="shipping_methods_wrapper"></tbody>
	                                        </table>
	                                    </div>
	                                </div>
	                            </fieldset>
	                        </div>
	                        <div class="tab-pane" id="tab-export">
	                            <fieldset>
	                                <?php echo $text_export_help ?><br /><br />
	                                <?php echo $text_export_help2 ?><br /><br />
	                                <button type="button" id="export" class="btn btn-success">
										<?php echo $text_button_export ?>
	                                    <i class="fa fa-download"></i>
	                                </button>

	                                <div class="row">
	                                    <div id="export-progress-wrap" class="col-lg-4 col-md-6 col-sm-10">
	                                       &nbsp
	                                    </div>
	                                </div>

	                                <hr />

	                                <?php echo $text_export_one ?><br /><br />

									<div class="input-group">
										<input type="text" class="form-control" id="export-one-order-id" placeholder="<?php echo $text_placeholder_export_one ?>">
										<span class="input-group-btn">
											<button class="btn btn-default" id="export-one" type="button"><?php echo $text_button_export_one ?> <i class="fa fa-download"></i></button>
										</span>
									</div><!-- /input-group -->

	                                <div class="row">
	                                    <div id="export-one-progress-wrap" class="col-lg-4 col-md-6 col-sm-10">
	                                       &nbsp
	                                    </div>
	                                </div>
	                            </fieldset>
	                        </div>
	                        <div class="tab-pane" id="tab-logs">
	                            <fieldset>
	                                <legend>KeyCRM API error log</legend>
	                                <div class="text-right" style="margin-bottom: 15px;">
	                                    <a id="clear-log" data-toggle="tooltip" title="<?php echo $text_button_clear ?>" class="btn btn-danger">
	                                        <i class="fa fa-eraser"></i> <span class="hidden-xs"><?php echo $button_clear; ?></span>
	                                    </a>
	                                </div>

									<?php if(isset($logs['keycrm_log'])) : ?>
	                                    <div class="row">
	                                        <div class="col-sm-12">
	                                            <textarea id="keycrm-log" wrap="off" rows="15" readonly class="form-control"><?php echo $logs['keycrm_log'] ?></textarea>
	                                        </div>
	                                    </div>
									<?php endif; ?>
	                            </fieldset>
	                        </div>
	                    <?php endif; ?>
                    </div>
                    <br /><br /><br />KeyCRM Module Version: 1.0.25
                </form>
            </div>
        </div>
    </div>
</div>
<?php echo $footer ?>

<script type="text/javascript">
    var token = '<?php echo $user_token ?>';

    let $progress = $('#export-progress-wrap')
    let updateProgress = function () {
        $.ajax({
            url: 'index.php?route=extension/module/keycrm/exportProgress&token=' + token,
            success: function(response) {
                $progress.html(response)
            }
        })
    }

    let $progress_one = $('#export-one-progress-wrap')
    let updateProgressOne = function () {
        $.ajax({
            url: 'index.php?route=extension/module/keycrm/exportProgress&token=' + token,
            success: function(response) {
	            $progress_one.html(response)
            }
        })
    }

    $('#export').on('click', function() {
	    $('#export-progress').remove();
        let intervalHandler = setInterval(updateProgress, 5000)

        $.ajax({
            url: 'index.php?route=extension/module/keycrm/exportOrders&token=' + token,
            beforeSend: function() {
                $('#export').button('loading');
            },
            complete: function() {
                $('.alert-success').remove();
                $('#content > .container-fluid').prepend('<div class="alert alert-success"><i class="fa fa-exclamation-circle"></i> <?php echo $text_success_export ?></div>');
                $('#export').button('reset');
                $('#export-progress').css({widht: '100%'})
                clearInterval(intervalHandler)
            },
            error: function(){
                alert('error');
                clearInterval(intervalHandler)
            }
        });
    });

    $('#export-one').on('click', function() {
	    $('#export-progress').remove();
        let intervalHandler = setInterval(updateProgressOne, 5000)
	    let order_id = $('#export-one-order-id').val();

        $.ajax({
            url: 'index.php?route=extension/module/keycrm/exportOrders&order_id=' + order_id + '&token=' + token,
            beforeSend: function() {
                $('#export-one').button('loading');
            },
            complete: function() {
                $('.alert-success').remove();
                $('#content > .container-fluid').prepend('<div class="alert alert-success"><i class="fa fa-exclamation-circle"></i> <?php echo $text_success_export ?></div>');
                $('#export-one').button('reset');
                $('#export-progress').css({widht: '100%'})
                clearInterval(intervalHandler)
            },
            error: function(){
                alert('error');
                clearInterval(intervalHandler)
            }
        });
    });

    $('#clear-log').on('click', function () {
        var r = confirm("Are you sure that you want to clear the log?");
        if (! r) {
            return
        }

        $.ajax({
            url: '<?php echo $catalog ?>' + 'admin/index.php?route=extension/module/keycrm/clearKeyCrmLog&token=' + token,
            async: true,
            success: function() {
                $('#keycrm-log').text('')
            }
        })
    })

	// Settings Order Statuses
	if ($('#open-status-settings').length) {
		$('#open-status-settings').on('click', function () {
			$('a[href="#tab-order-statuses"]').trigger('click');
		})
	}

    // Get Shipping methods
	getMethod('<?php echo $api_key; ?>');

	let shipping_methods = <?=json_encode(!empty($shipping_methods) ? $shipping_methods : [])?>;
	let shipping_methods_saved = <?=json_encode(!empty($saved_settings['shipping_methods']) ? $saved_settings['shipping_methods'] : [])?>;

	// Shipping Methods
	function getMethod(tokenApi) {
		$.ajax({
			url: '<?php echo $catalog; ?>index.php?route=api/keycrm/shipping/methods&token=' + tokenApi,
			dataType: 'json',
			beforeSend: function() {
				$('#button-shipping-address').button('loading');
			},
			complete: function() {
				$('#button-shipping-address').button('reset');
			},
			success: function(json) {
				if (json['error']) {
					$('#content > .container-fluid').prepend('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				} else {
					// Shipping Methods
					let html = '';
					if (json['shipping_methods']) {
						for (i in json['shipping_methods']) {
							if (!json['shipping_methods'][i]['error']) {
								for (j in json['shipping_methods'][i]['quote']) {
									html += '<tr>';
										html += "<td>";
											html += '(' + json['shipping_methods'][i]['title'] + '): ' + json['shipping_methods'][i]['quote'][j]['title'] + ' - ' + json['shipping_methods'][i]['quote'][j]['text'];
										html += "</td>";
										html += "<td>";
											html += '<select name="<?=$module_title?>_shipping_methods[' + json['shipping_methods'][i]['quote'][j]['code'] + ']">';
												html += '<option></option>';
												for (let shipping_i = 0; shipping_i < shipping_methods.length; shipping_i++) {
													if (shipping_methods_saved[json['shipping_methods'][i]['quote'][j]['code']] == shipping_methods[shipping_i]['id']) {
														html += '<option selected value="' + shipping_methods[shipping_i]['id'] + '">' + shipping_methods[shipping_i]['name'] + '</option>';
													} else {
														html += '<option value="' + shipping_methods[shipping_i]['id'] + '">' + shipping_methods[shipping_i]['name'] + '</option>';
													}
												}
											html += '</select>';
										html += "</td>";
									html += '</tr>';
								}
							} else {
								html += '<div class="alert alert-danger">' + json['shipping_method'][i]['error'] + '</div>';
							}
						}
					}

					if (html) {
						$('#shipping_methods_wrapper').html(html);
					} else {
						$('#shipping_methods_wrapper').html('<div class="alert alert-danger"><?=$shipping_methods_not_found?></div>');
					}
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		})
	}
</script>

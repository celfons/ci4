<?php
//$this->set_css($this->default_theme_path.'/bootstrap/css/bootstrap/bootstrap.css');
// $this->set_css($this->default_theme_path.'/bootstrap/css/font-awesome/css/font-awesome.min.css');
// $this->set_css($this->default_theme_path.'/bootstrap/css/common.css');
$this->set_css($this->default_theme_path . '/bootstrap/css/general.css');
$this->set_css($this->default_theme_path . '/bootstrap/css/add-edit-form.css');


if ($this->config->environment == 'production') {
    $this->set_js_lib($this->default_javascript_path .'/jquery_plugins/jquery.form.min.js');
    $this->set_js_lib($this->default_theme_path . '/bootstrap/build/js/global-libs.min.js');
    $this->set_js_config($this->default_theme_path . '/bootstrap/js/form/edit.min.js');
} else {
    $this->set_js_lib($this->default_javascript_path .'/jquery_plugins/jquery.form.min.js');
    $this->set_js_lib($this->default_theme_path . '/bootstrap/js/jquery-plugins/jquery.form.min.js');
    $this->set_js_lib($this->default_theme_path . '/bootstrap/js/common/common.min.js');
    $this->set_js_config($this->default_theme_path . '/bootstrap/js/form/edit.js');
}

$this->set_js_lib($this->default_theme_path . '/bootstrap/js/jquery-plugins/jquery.noty.js');
$this->set_js_lib($this->default_theme_path . '/bootstrap/js/jquery-plugins/config/jquery.noty.config.js');
?>
<div class="crud-form" data-unique-hash="<?php echo $unique_hash; ?>">

    <div class="row">
        <div class="col-md-12">

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title"><?php echo $this->l('form_edit'); ?> <?php echo $subject ?></span>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div id='report-error' class='report-div error bg-danger' style="display:none"></div>
                        <div id='report-success' class='report-div success bg-success' style="display:none"></div>
                    </div>

                    <div class="form-group" id="FormLoading" style="display: none">
                        <div class="progress mt10 mbn">
                            <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                        </div>
                    </div>

                    <?php echo form_open($update_url, 'method="post" id="crudForm"  enctype="multipart/form-data" class="form-horizontal"'); ?>

                    <?php
                    $fields_grouped = [];
                    $break = false;
                    $field_before = null;
                    $total = count($fields);

                    $count = 1;

                    foreach ($fields as $key => $field) {

                        $max_length = property_exists($input_fields[$field->field_name], 'db_max_length') ? $input_fields[$field->field_name]->db_max_length : 200;
                        if($total == $count) { ?>
                            
                            <?php if ($max_length > 80 || $input_fields[$field->field_name]->crud_type == 'text') { ?>

                                    <?php if($field_before) { ?>
                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label">
                                                <?php echo $input_fields[$field_before->field_name]->display_as; ?><?php echo ($input_fields[$field_before->field_name]->required) ? "<span class='required'>*</span> " : ""; ?>
                                            </label>
                                            <div class="col-sm-4">
                                                <?php echo $input_fields[$field_before->field_name]->input; ?>
                                            </div>
                                        
                                        </div>
                                    <?php } ?>

                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">
                                            <?php echo $input_fields[$field->field_name]->display_as; ?><?php echo ($input_fields[$field->field_name]->required) ? "<span class='required'>*</span> " : ""; ?>
                                        </label>
                                        <div class="col-sm-10">
                                            <?php echo $input_fields[$field->field_name]->input; ?>
                                        </div>
                                    </div>
                                <?php } else { ?>

                                    <div class="form-group row">
                                        <?php if($field_before) { ?>
                                            <label class="col-sm-2 control-label">
                                                <?php echo $input_fields[$field_before->field_name]->display_as; ?><?php echo ($input_fields[$field_before->field_name]->required) ? "<span class='required'>*</span> " : ""; ?>
                                            </label>
                                            <div class="col-sm-4">
                                                <?php echo $input_fields[$field_before->field_name]->input; ?>
                                            </div>
                                        <?php } ?>
                                        <label class="col-sm-2 control-label">
                                            <?php echo $input_fields[$field->field_name]->display_as; ?><?php echo ($input_fields[$field->field_name]->required) ? "<span class='required'>*</span> " : ""; ?>
                                        </label>
                                        <div class="col-sm-4">
                                            <?php echo $input_fields[$field->field_name]->input; ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            
                        <?php continue; } 

                        if ($max_length > 80 || $input_fields[$field->field_name]->crud_type == 'text') { ?>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">
                                    <?php echo $input_fields[$field->field_name]->display_as; ?><?php echo ($input_fields[$field->field_name]->required) ? "<span class='required'>*</span> " : ""; ?>
                                </label>
                                <div class="col-sm-10">
                                    <?php echo $input_fields[$field->field_name]->input; ?>
                                </div>
                            </div>

                        <?php 
                            $count += 1;
                            continue;
                        } 
                        
                        if ($break) { ?>

                            <div class="row form-group">
                                <label class="col-sm-2 control-label">
                                    <?php echo $input_fields[$field_before->field_name]->display_as; ?><?php echo ($input_fields[$field_before->field_name]->required) ? "<span class='required'>*</span> " : ""; ?>
                                </label>
                                <div class="col-sm-4">
                                    <?php echo $input_fields[$field_before->field_name]->input; ?>
                                </div>

                                <label class="col-sm-2 control-label">
                                    <?php echo $input_fields[$field->field_name]->display_as; ?><?php echo ($input_fields[$field->field_name]->required) ? "<span class='required'>*</span> " : ""; ?>
                                </label>
                                <div class="col-sm-4">
                                    <?php echo $input_fields[$field->field_name]->input;  ?>
                                </div>
                            </div>

                        <?php 
                            $break = false;
                            $count += 1;
                            $field_before = null;
                            continue;
                        } 
                        else { 
                            $field_before = $field;
                            $break = true;
                            $count += 1;
                        } ?>

                    <?php  } ?>

                    <?php if (!empty($hidden_fields)) { ?>
                        <!-- Start of hidden inputs -->
                        <?php
                        foreach ($hidden_fields as $hidden_field) {
                            echo $hidden_field->input;
                        }
                        ?>
                        <!-- End of hidden inputs -->
                    <?php } ?>
                    <?php if ($is_ajax) { ?><input type="hidden" name="is_ajax" value="true" /><?php } ?>

                    <div class="form-group">
                        <hr style="margin: 1em">
                        <div class="col-sm-offset-3 col-sm-2">
                            <button class="btn btn-default text-center btn-success b10 col-sm-12 col-xs-12 mt5" type="submit" id="form-button-save">
                                <i class="fa fa-check"></i>
                                <?php echo $this->l('form_update_changes'); ?>
                            </button>
                        </div>
                        <div class="col-sm-3">
                            <?php if (!$this->unset_back_to_list) { ?>
                                <button class="btn btn-info text-center b10 col-sm-12 col-xs-12 mt5" type="button" id="save-and-go-back-button">
                                    <i class="fa fa-rotate-left"></i>
                                    <?php echo $this->l('form_update_and_go_back'); ?>
                                </button>
                            <?php } ?>
                        </div>
                        <div class="col-sm-2">
                            <?php if (!$this->unset_back_to_list) { ?>
                                <button class="btn btn-default text-center cancel-button b10 col-sm-12 col-xs-12 mt5" type="button" id="cancel-button">
                                    <i class="fa fa-warning"></i>
                                    <?php echo $this->l('form_cancel'); ?>
                                </button>
                            <?php } ?>
                        </div>
                    </div>

                    <?php echo form_close(); ?>

                </div>
            </div>


        </div>
    </div>

</div>
<script>
    var validation_url = '<?php echo $validation_url ?>';
    var list_url = '<?php echo $list_url ?>';

    var message_alert_edit_form = "<?php echo $this->l('alert_edit_form') ?>";
    var message_update_error = "<?php echo $this->l('update_error') ?>";
</script>
<?php
    //$this->set_css($this->default_theme_path.'/bootstrap/css/bootstrap/bootstrap.min.css');
    // $this->set_css($this->default_theme_path.'/bootstrap/css/font-awesome/css/font-awesome.min.css');    
    // $this->set_css($this->default_theme_path.'/bootstrap/css/common.css');    
    $this->set_css($this->default_theme_path.'/bootstrap/css/list.css');
    $this->set_css($this->default_theme_path.'/bootstrap/css/general.css');
    $this->set_css($this->default_theme_path.'/bootstrap/css/plugins/animate.min.css');


    if ($this->config->environment == 'production') {
        $this->set_js_lib($this->default_javascript_path .'/jquery_plugins/jquery.form.min.js');
        $this->set_js_lib($this->default_theme_path.'/bootstrap/build/js/global-libs.min.js');
    } else {
        $this->set_js_lib($this->default_javascript_path .'/jquery_plugins/jquery.form.min.js');
        $this->set_js_lib($this->default_theme_path. '/bootstrap/js/jquery-ui/jquery-ui.custom.js');
        $this->set_js_lib($this->default_theme_path.'/bootstrap/js/jquery-plugins/jquery.form.js');
        $this->set_js_lib($this->default_theme_path.'/bootstrap/js/common/common.js');
    }

    //section libs
    //$this->set_js_lib($this->default_theme_path.'/bootstrap/js/bootstrap/dropdown.min.js');
    //$this->set_js_lib($this->default_theme_path.'/bootstrap/js/bootstrap/modal.min.js');
    //$this->set_js_lib($this->default_theme_path.'/bootstrap/js/jquery-plugins/bootstrap-growl.min.js');
    $this->set_js_lib($this->default_theme_path.'/bootstrap/js/jquery-plugins/jquery.print-this.js');


    //page js
    $this->set_js_lib($this->default_theme_path.'/bootstrap/js/datagrid/gcrud.datagrid.js');
    $this->set_js_lib($this->default_theme_path.'/bootstrap/js/datagrid/list.js');

    $colspans = (count($columns) + 2);

    $list_displaying = str_replace(
        array(
            '{start}',
            '{end}',
            '{results}'
        ),
        array(
            '<span class="paging-starts">1</span>',
            '<span class="paging-ends">10</span>',
            '<span class="current-total-results">'. $this->get_total_results() . '</span>'
        ),
        $this->l('list_displaying'));
?>
<script type='text/javascript'>
    var base_url = '<?php echo base_url();?>';

    var subject = '<?php echo $subject?>';
    var ajax_list_info_url = '<?php echo $ajax_list_info_url; ?>';
    var ajax_list_url = '<?php echo $ajax_list_url;?>';
    var unique_hash = '<?php echo $unique_hash; ?>';

    var message_alert_delete = "<?php echo $this->l('alert_delete'); ?>";

</script>
    <br/>
    <div class="gc-container">
        <div class="success-message hidden"><?php
        if($success_message !== null){?>
           <?php echo $success_message; ?> &nbsp; &nbsp;
        <?php }
        ?></div>

 		<div class="row">
        	<div class="col-md-12 table-section">
                        
                <div class="panel">
                  <div class="panel-body">

                        <div class="well well-sm">
                            <div class="row">
                                <?php if(!$unset_add){?>
                                    <div class="col-sm-3 col-xs-12 mt5">
                                        <a class="btn btn-success col-sm-12 col-xs-12" href="<?php echo $add_url?>"><i class="fa fa-plus"></i> &nbsp; <?php echo $this->l('list_add'); ?> <?php echo $subject?></a>
                                    </div>
                                <?php } ?>
                                
                                

                                <?php if(!$unset_print) { ?>
                                    <div class=" col-sm-2 col-xs-12 mt5 pull-right">
                                        <a class="btn btn-info gc-print col-sm-12 col-xs-12" data-url="<?php echo $print_url; ?>">
                                            <i class="fa fa-print t3"></i>
                                            <span class="l5">
                                                <?php echo $this->l('list_print');?>
                                            </span>
                                            <div class="clear"></div>
                                        </a>
                                    </div>
                                <?php }?>
                                <?php if(!$unset_export) { ?>
                                    <div class="col-sm-2 col-xs-12 mt5 pull-right">
                                        <a class="btn btn-dark gc-export col-sm-12 col-xs-12 ml5" data-url="<?php echo $export_url; ?>">
                                            <i class="fa fa-cloud-download t3"></i>
                                            <span class="hidden-xs l5">
                                                <?php echo $this->l('list_export');?>
                                            </span>
                                            <div class="clear"></div>
                                        </a>
                                    </div>
                                <?php } ?>

                                <div class="col-sm-2 col-xs-12 mt5 pull-right">
                                    <a class=" btn btn-primary search-button col-sm-12 col-xs-12">
                                        <i class="fa fa-search"></i>
                                        <input type="text" name="search" class="search-input" />
                                    </a>
                                </div>
                                    
                                <div class="clear"></div>
                            </div>
                        </div>
               
                    <?php echo form_open("", 'method="post" autocomplete="off" id="gcrud-search-form"'); ?>
                        
        			    <table class="table table-bordered grocery-crud-table table-hover">
        					<thead>
        						<tr>
        							<th colspan="2">
                                        <?php echo $this->l('list_actions'); ?>
                                    </th>
                                    <?php foreach($columns as $column){?>
                                        <th class="column-with-ordering" data-order-by="<?php echo $column->field_name; ?>"><?php echo $column->display_as; ?></th>
                                    <?php }?>
        						</tr>
        						
        						<tr class="filter-row gc-search-row">
        							<td style="border-right: none;">
                                        <?php if (!$unset_delete) { ?>
            							     <div class="floatL t5">
            							         <input type="checkbox" class="select-all-none" />
            							     </div>
                                         <?php } ?>
        							 </td>
        							<td style="border-left: none;">
                                        <div class="floatL mr5">
                                            <a href="javascript:void(0);" title="<?php echo $this->l('list_delete')?>"
                                               class="hidden btn btn-sm btn-danger delete-selected-button">
                                                <i class="fa fa-trash-o"></i>
                                                <span class=""><?php echo $this->l('list_delete')?></span>
                                            </a>
                                            <?php if($this->get_table()=='faturas'):?>
                                                <a href="javascript:void(0);" title="<?php echo $this->l('list_print')?>"
                                                class="hidden btn btn-sm btn-info print-selected-button">
                                                    <i class="fa fa-print"></i>
                                                    <span class=""><?php echo $this->l('list_print')?></span>
                                                </a>
                                            <?php endif ?>
                                        </div>
                                        <div class="">
                                            <a href="javascript:void(0);" class="btn btn-sm btn-default gc-refresh">
                                                <i class="fa fa-refresh"></i>
                                            </a>
                                        </div>
                                        <div class="clear"></div>
                                    </td>
                                    <?php foreach($columns as $column){?>
                                        <td>
                                            <input type="text" class="form-control searchable-input floatL" placeholder="Pesquisar <?php echo $column->display_as; ?>" name="<?php echo $column->field_name; ?>" />
                                        </td>
                                    <?php }?>
        						</tr>

        					</thead>
        					<tbody>
                                <?php include(__DIR__."/list_tbody.php"); ?>
        					</tbody>

                            <!-- Table Footer -->
        					<tfoot>
                                <tr>
                                    <td colspan="<?php echo $colspans; ?>">

                                            <!-- "Show 10/25/50/100 entries" (dropdown per-page) -->
                                            <div class="floatL t20 l5">
                                                <div class="floatL t10">
                                                    <?php list($show_lang_string, $entries_lang_string) = explode('{paging}', $this->l('list_show_entries')); ?>
                                                    <?php echo $show_lang_string; ?>
                                                </div>
                                                <div class="floatL r5 l5 t3">
                                                    <select name="per_page" class="per_page input-sm form-control">
                                                        <?php foreach($paging_options as $option){?>
                                                            <option value="<?php echo $option; ?>"
                                                                    <?php if($option == $default_per_page){?>selected="selected"<?php }?>>
                                                                        <?php echo $option; ?>&nbsp;&nbsp;
                                                            </option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <div class="floatL t10">
                                                    <?php echo $entries_lang_string; ?>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            <!-- End of "Show 10/25/50/100 entries" (dropdown per-page) -->

                                            <!-- Buttons - First,Previous,Next,Last Page -->
                                            <div class="floatR r5">

                                                <ul class="pagination">
                                                    <li class="disabled paging-first"><a href="#"><i class="fa fa-step-backward"></i></a></li>
                                                    <li class="prev disabled paging-previous"><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                                                    <li>
                                                        <span class="page-number-input-container">
                                                            <input type="number" value="1" class="form-control page-number-input" />
                                                        </span>
                                                    </li>
                                                    <li class="next paging-next"><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                                                    <li class="paging-last"><a href="#"><i class="fa fa-step-forward"></i></a></li>
                                                </ul>

                                                <input type="hidden" name="page_number" class="page-number-hidden" value="1" />

                                            </div>
                                            <!-- End of Buttons - First,Previous,Next,Last Page -->

                                            <!-- "Displaying 1 to 10 of 116 items" -->
                                            <div class="floatR r10 t30">
                                                <?php echo $list_displaying; ?>
                                                <span class="full-total-container hidden">
                                                    <?php echo str_replace(
                                                                "{total_results}",
                                                                "<span class='full-total'>" . $this->get_total_results() . "</span>",
                                                                $this->l('list_filtered_from'));
                                                    ?>
                                                </span>
                                            </div>
                                            <!-- End of "Displaying 1 to 10 of 116 items" -->

                                            <div class="clear"></div>
                                    </td>
                                </tr>
        					</tfoot>
                            <!-- End of: Table Footer -->
        			    </table>
                    <?php echo form_close(); ?>
               
        	</div>

            <!-- Delete confirmation dialog -->
            <div class="delete-confirmation modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><?php echo $this->l('list_delete'); ?></h4>
                        </div>
                        <div class="modal-body">
                            <h3 class="text-center"><?php echo $this->l('alert_delete'); ?></h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->l('form_cancel'); ?></button>
                            <button type="button" class="btn btn-danger delete-confirmation-button"><?php echo $this->l('list_delete'); ?></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Delete confirmation dialog -->

            <!-- Delete Multiple confirmation dialog -->
            <div class="delete-multiple-confirmation modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><?php echo $this->l('list_delete'); ?></h4>
                        </div>
                        <div class="modal-body">
                            <h3 class="text-center"><?php echo $this->l('alert_delete'); ?></h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                <?php echo $this->l('form_cancel'); ?>
                            </button>
                            <button type="button" class="btn btn-danger delete-multiple-confirmation-button"
                                    data-target="<?php echo $delete_multiple_url; ?>">
                                <?php echo $this->l('list_delete'); ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Delete Multiple confirmation dialog -->
            
                </div>
            </div>

            </div>
        </div>




        
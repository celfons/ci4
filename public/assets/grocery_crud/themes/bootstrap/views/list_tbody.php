<?php foreach ($list as $num_row => $row) { ?>
    <tr>
        <td <?php if ($unset_delete) { ?> style="border-right: none;" <?php } else { ?> data-title="Selecionar" <?php } ?>>
            <?php if (!$unset_delete) { ?>
                <input type="checkbox" class="select-row" data-id="<?php echo $row->primary_key_value; ?>" />
            <?php } ?>
        </td>
        <td <?php if ($unset_delete) { ?> style="border-left: none;" <?php } ?>>
            <div class="only-desktops" style="white-space: nowrap">
                <?php if (!$unset_edit) { ?>
                    <a class="btn btn-info" href="<?php echo $row->edit_url ?>" title="<?php echo $this->l('list_edit'); ?>"><i class="fa fa-pencil"></i></a>
                <?php } ?>
                <?php if (!empty($row->action_urls) || !$unset_read || !$unset_delete) { ?>
                    <div class="btn-group dropdown">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            Opções
                            <span class="caret"></span>
                        </button>

                        <ul class="dropdown-menu">
                            <?php
                            if (!empty($row->action_urls)) {
                                foreach ($row->action_urls as $action_unique_id => $action_url) {
                                    $action = $actions[$action_unique_id];
                            ?>
                                    <li>
                                        <a href="<?php echo $action_url; ?>">
                                            <i class="fa <?php echo $action->css_class; ?>"></i> <?php echo $action->label ?>
                                        </a>
                                    </li>
                            <?php }
                            }
                            ?>
                            <?php if (!$unset_read) { ?>
                                <li>
                                    <a href="<?php echo $row->read_url ?>"><i class="fa fa-eye"></i> <?php echo $this->l('list_view') ?></a>
                                </li>
                            <?php } ?>
                            <?php if (!$unset_delete) { ?>
                                <li>
                                    <a data-target="<?php echo $row->delete_url ?>" href="javascript:void(0)" title="<?php echo $this->l('list_delete') ?>" class="delete-row">
                                        <i class="fa fa-trash-o text-danger"></i>
                                        <span class="text-danger"><?php echo $this->l('list_delete') ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
            </div>
            <div class="only-mobiles">
                <?php if (!$unset_edit || !empty($row->action_urls) || !$unset_read || !$unset_delete) { ?>
                    <div class="btn-group dropdown">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <?php echo $this->l('list_actions'); ?>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <?php if (!$unset_edit) { ?>
                                <li>
                                    <a href="<?php echo $row->edit_url ?>">
                                        <i class="fa fa-pencil"></i> <?php echo $this->l('list_edit'); ?>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php
                            if (!empty($row->action_urls)) {
                                foreach ($row->action_urls as $action_unique_id => $action_url) {
                                    $action = $actions[$action_unique_id];
                            ?>
                                    <li>
                                        <a href="<?php echo $action_url; ?>">
                                            <i class="fa <?php echo $action->css_class; ?>"></i> <?php echo $action->label ?>
                                        </a>
                                    </li>
                            <?php }
                            }
                            ?>
                            <?php if (!$unset_read) { ?>
                                <li>
                                    <a href="<?php echo $row->read_url ?>"><i class="fa fa-eye"></i> <?php echo $this->l('list_view') ?></a>
                                </li>
                            <?php } ?>
                            <?php if (!$unset_delete) { ?>
                                <li>
                                    <a data-target="<?php echo $row->delete_url ?>" href="javascript:void(0)" title="<?php echo $this->l('list_delete') ?>" class="delete-row">
                                        <i class="fa fa-trash-o text-danger"></i> <span class="text-danger"><?php echo $this->l('list_delete') ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </td>
        <?php foreach ($columns as $column) { ?>
            <td data-title="<?php echo $column->display_as; ?>" style="word-wrap: break-word;">
                <?php echo $row->{$column->field_name} != '' ? $row->{$column->field_name} : '&nbsp;'; ?>
            </td>
        <?php } ?>
    </tr>
<?php } ?>

<?php if (!$list) {

    echo '<tr class="text-center fs15"><td colspan="20" style="padding-left: 5% !important; text-align: center !important"> <i class="fa fa-meh-o fa-5x"></i> <br>Nenhum registro encontrado. </td></tr>';
} ?>
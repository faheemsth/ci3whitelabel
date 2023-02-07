<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fa fa-certificate"></i> <?=$this->lang->line('panel_title')?></h3>


        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a> / </li>
            <li class="active mx-2"><?=$this->lang->line('panel_title')?></li>
        </ol>
    </div><!-- /.card-header -->
    <!-- form start -->
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">

                <?php
                   if(permissionChecker('certificate_template_add')) {
                ?>
                <h5 class="page-header">
                    <a href="<?php echo base_url('certificate_template/add') ?>">
                        <i class="fa fa-plus"></i>
                        <?=$this->lang->line('add_title')?>
                    </a>
                </h5>
              <?php } ?>
                <div id="hide-table">
                    <table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                        <thead>
                            <tr class="fw-bold fs-6 text-gray-800 px-7">
                                <th class="col-sm-2"><?=$this->lang->line('slno')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('certificate_template_name')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('certificate_template_theme')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('certificate_template_main_middle_text')?></th>
                                
                              <?php if(permissionChecker('certificate_template_edit') || permissionChecker('certificate_template_delete') || permissionChecker('certificate_template_view')) { ?>
                                    <th class="col-sm-2"><?=$this->lang->line('action')?></th>
                              <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(customCompute($certificate_templates)) {$i = 1; foreach($certificate_templates as $certificate_template) { ?>
                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('certificate_template_name')?>">
                                        <?=namesorting($certificate_template->name, 25)?>
                                    </td>

                                    <td data-title="<?=$this->lang->line('certificate_template_theme')?>">
                                        <?php
                                            echo isset($buildinThemes[$certificate_template->theme]) ? $buildinThemes[$certificate_template->theme] : '';
                                        ?>
                                    </td>

                                    <td data-title="<?=$this->lang->line('certificate_template_main_middle_text')?>">
                                        <?=namesorting($certificate_template->main_middle_text, 25)?>
                                    </td>

                                    <td data-title="<?=$this->lang->line('certificate_template_template')?>">
                                        <?=namesorting($certificate_template->template, 20)?>
                                    </td>

                                  <?php if(permissionChecker('certificate_template_edit') || permissionChecker('certificate_template_delete') || permissionChecker('certificate_template_view')) { ?>

                                        <td data-title="<?=$this->lang->line('action')?>">
                                            <?php echo btn_view('certificate_template/view/'.$certificate_template->certificate_templateID, $this->lang->line('view')) ?>
                                            <?php echo btn_edit('certificate_template/edit/'.$certificate_template->certificate_templateID, $this->lang->line('edit')) ?>
                                            <?php echo btn_delete('certificate_template/delete/'.$certificate_template->certificate_templateID, $this->lang->line('delete')) ?>
                                        </td>
                                  <?php } ?>
                                </tr>
                            <?php $i++; }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
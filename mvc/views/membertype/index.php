<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fa fa-calendar mx-2"></i> <?=$this->lang->line('panel_title')?></h3>


        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active mx-2"><?=$this->lang->line('panel_title')?></li>
        </ol>
    </div><!-- /.card-header -->
    <!-- form start -->
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <?php if(permissionChecker('regtype_add')) { ?>
                    <h5 class="page-header mb-3">
                        <a href="<?php echo base_url('membertype/add') ?>">
                            <i class="fa fa-plus"></i>
                            <?=$this->lang->line('add_title')?>
                        </a>
                    </h5>
                <?php } ?>
                <div id="hide-table">
                  <table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                        <thead>
                            <tr>
                                <th class="col-sm-2"><?=$this->lang->line('slno')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('regtype_title')?></th>
                                <th class="col-sm-2">Amount</th> 
                                <?php if(permissionChecker('regtype_edit') || permissionChecker('regtype_delete') || permissionChecker('regtype_view')) { ?>
                                    <th class="col-sm-2"><?=$this->lang->line('action')?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($membertypes)) {$i = 1; foreach($membertypes as $membertype) { ?>
                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('membertype_title')?>">
                                        <?=$membertype->membertype;?>
                                    </td>
                                    
                                    <td data-title="Amount">
                                        <?=$membertype->amount;?>
                                    </td>
                                     <?php if(permissionChecker('regtype_edit') || permissionChecker('regtype_delete') || permissionChecker('regtype_view')) { ?>

                                        <td data-title="<?=$this->lang->line('action')?>">
                                            <?php echo btn_view('membertype/view/', $this->lang->line('view')) ?>
                                            <?php echo btn_edit('membertype/edit/'.$membertype->membertypeID, $this->lang->line('edit')) ?>
                                            <?php echo btn_delete('membertype/delete/'.$membertype->membertypeID, $this->lang->line('delete')) ?>
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
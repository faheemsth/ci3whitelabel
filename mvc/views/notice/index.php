
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fa fa-calendar mx-2"></i> <?=$this->lang->line('panel_title')?></h3>

       
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a> / </li>
            <li class="active mx-2"><?=$this->lang->line('menu_notice')?></li>
        </ol>
    </div><!-- /.card-header -->
    <!-- form start -->
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                
                <div id="hide-table">
                     <table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                        <thead>
                            <tr class="fw-bold fs-6 text-gray-800 px-7">
                                <th class="col-sm-1"><?=$this->lang->line('slno')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('notice_title')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('notice_date')?></th>
                                <th class="col-sm-5">Description</th>
                                <?php if(permissionChecker('notice_edit') || permissionChecker('notice_delete') || permissionChecker('notice_view')) { ?>
                                    <th class="col-sm-2"><?=$this->lang->line('action')?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(customCompute($notices)) {$i = 1; foreach($notices as $notice) { ?>
                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('notice_title')?>">
                                        <?php 
                                            if(strlen($notice->title) > 25)
                                                echo strip_tags(substr($notice->title, 0, 25)."...");
                                            else 
                                                echo strip_tags(substr($notice->title, 0, 25));
                                        ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('notice_date')?>">
                                        <?php echo date("d M Y", strtotime($notice->date)); ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('notice_notice')?>">
                                        <?php 
                                            if(strlen($notice->notice) > 80)
                                                echo strip_tags(substr($notice->notice, 0, 80)."...");
                                            else 
                                                echo strip_tags(substr($notice->notice, 0, 80));
                                        ?>
                                    </td>
                                    <?php if(permissionChecker('notice_edit') || permissionChecker('notice_delete') || permissionChecker('notice_view')) { ?>

                                        <td data-title="<?=$this->lang->line('action')?>">
                                            <?php echo btn_view('notice/view/'.$notice->noticeID, $this->lang->line('view')) ?>
                                             <?php if(($siteinfos->school_year == $this->session->userdata('defaultschoolyearID')) || ($this->session->userdata('usertypeID') == 1)) { ?>
                                                
                                                <?php echo btn_delete('notice/delete/'.$notice->noticeID, $this->lang->line('delete')) ?>
                                             <?php } ?>
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
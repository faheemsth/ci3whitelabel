<!--begin::Form-->
<div class="card">
	<div class="card-header">
        <h3 class="card-title"><i class="fa fa-users mx-2"></i> Manage Documents</h3>
        <ol class="breadcrumb">
           <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a> / </li>
               
                <li class="active mx-2">Documents / View</li>
        </ol>
    </div>
    <div class="card-body">
        <h5 class="page-header mb-3">
                        <a href="<?php echo base_url('user/edit_documents') ?>" class="btn btn-warning btn-sm mrg">
                            <i class="fa fa-plus"></i>
                           Edit Documents
                        </a>
                    </h5>
        <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-gray-800 px-7">
                                            <th><?=$this->lang->line('slno')?></th>
                                            <th><?=$this->lang->line('user_title')?></th>
                                            <th>Passing Year</th>
                                            <th><?=$this->lang->line('user_date')?></th>
                                            <th><?=$this->lang->line('action')?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(customCompute($documents)) { $i = 1; foreach ($documents as $document) {  ?>
                                            <tr>
                                                <td data-title="<?=$this->lang->line('slno')?>">
                                                    <?php echo $i; ?>
                                                </td>

                                                <td data-title="<?=$this->lang->line('user_title')?>">
                                                    <?=$document->title?>
                                                </td>
                                                <td data-title="<?=$this->lang->line('user_title')?>">
                                                    <?=$document->passing_year?>
                                                </td>

                                                <td data-title="<?=$this->lang->line('user_date')?>">
                                                    <?=date('d M Y', strtotime($document->create_date))?>
                                                </td>

                                                <td data-title="<?=$this->lang->line('action')?>">
                                                    <?php 
                                                         echo btn_download('user/download_document/'.$document->documentID.'/'.$profile->userID.'/'.$profile->usertypeID, $this->lang->line('download'));
                                                        ?>
                                                        
                                                </td>
                                            </tr>
                                        <?php $i++; } } ?>
                                    </tbody>
                                </table>
    </div>
</div>

<!--end::Form-->
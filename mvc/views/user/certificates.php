<!--begin::Form-->
<div class="card">
	<div class="card-header">
        <h3 class="card-title"><i class="fa fa-users mx-2"></i> Certificates</h3>
        <ol class="breadcrumb">
           <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a> / </li>
               
                <li class="active mx-2">Certificates / View</li>
        </ol>
    </div>
    <div class="card-body">
        
        <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-gray-800 px-7">
                                            <th><?=$this->lang->line('slno')?></th>
                                            <th>Cetificate Type</th>
                                            
                                            <th><?=$this->lang->line('action')?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(customCompute($certificatelogs)) { $i = 1; foreach ($certificatelogs as $certificatelog) {  ?>
                                            <tr>
                                                <td data-title="<?=$this->lang->line('slno')?>">
                                                    <?php echo $i; ?>
                                                </td>

                                                <td data-title="<?=$this->lang->line('user_title')?>">
                                                    <?=$templatnamepluck[$certificatelog->templateID]?>
                                                </td>

                                                <td data-title="<?=$this->lang->line('action')?>">
                                                    <a href="<?php echo base_url('uploads/report/').$certificatelog->filename ?>" class="btn btn-success btn-sm mrg">
                                                        <i class="fa fa-eye"></i>
                                                        View Certificate
                                                    </a>
                                                  
                                                        
                                                        
                                                </td>
                                            </tr>
                                        <?php $i++; } } ?>
                                    </tbody>
                                </table>
    </div>
</div>

<!--end::Form-->
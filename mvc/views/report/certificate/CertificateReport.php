<div id="printablediv">
    <div class="box">
        <div class="box-header bg-gray">
            <h3 class="box-title text-navy"><i class="fa fa-clipboard"></i> 
            <?=$this->lang->line('certificatereport_report_for');?> <?=$this->lang->line('certificatereport_report');?> - For Members </h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <h5 class="pull-left">
                                <!-- <?php 
                                    echo $this->lang->line('certificatereport_class')." : ";
                                    echo isset($classes[$classesID]) ? $classes[$classesID] : $this->lang->line('balancefeesreport_all_class');
                                ?> -->
                            </h5>                         
                                                  
                        </div>
                    </div>
                    <?php if(customCompute($users)) { ?>
                        <div id="hide-table">
                            <table  id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                                <thead>
                                    <tr class="fw-bold fs-6 text-gray-800 px-7">
                                        <th class="col-sm-1">#</th>
                                        <th class="col-sm-1"><?=$this->lang->line('certificatereport_photo')?></th>
                                        <th class="col-sm-2"><?=$this->lang->line('certificatereport_name')?></th>
                                        <th class="col-sm-2">Email</th>
                                        <th class="col-sm-1">status</th>
                                        <th class="col-sm-1">Member Type</th>
                                        <th class="col-sm-1"><?=$this->lang->line('certificatereport_action')?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  $i = 1; foreach($users as $user) { ?>
                                        <tr>
                                            <td data-title="#">
                                                <?=$i?>
                                            </td>

                                            <td data-title="<?=$this->lang->line('certificatereport_photo')?>">
                                                <?=profileimage($user->photo)?>
                                            </td>
                                            <td data-title="<?=$this->lang->line('certificatereport_name')?>">
                                                <?=$user->name; ?>
                                            </td>
                                            <td data-title="<?=$this->lang->line('certificatereport_class')?>"><?=$user->email; ?></td>
                                            <td data-title="<?=$this->lang->line('certificatereport_section')?>"><?php 
                                           $status= get_status_type();
                                            echo $status[$user->status]; 
                                          ?></td>
                                           
                                            <td data-title="<?=$this->lang->line('certificatereport_roll')?>">
                                                <?=$regtype->regtype;
                                                ?>
                                            </td>

                                            <td data-title="<?=$this->lang->line('certificatereport_action')?>">
                                                <a class="btn btn-success btn-sm" target="_blank" href="<?=base_url('certificatereport/generate_certificate/'.$user->userID .'/'.$templateID)?>"><?=$this->lang->line('certificatereport_generate_certificate')?></a>
                                            </td>
                                       </tr>
                                    <?php $i++; } ?> 
                                </tbody>
                            </table>
                        </div>
                    <?php } else { ?>
                        <div class="callout callout-danger">
                            <p><b class="text-info"><?=$this->lang->line('certificatereport_student_not_found')?></b></p>
                        </div>
                    <?php } ?>
                </div>
            </div><!-- row -->
        </div><!-- Body -->
    </div>
</div>

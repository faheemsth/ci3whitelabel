<div class="card ">
    <div class="card-header">
        <h3 class="card-title"><i class="fa fa-users mx-2"></i> <?=$this->lang->line('panel_title')?></h3>
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active mx-2"> / <?=$this->lang->line('menu_user')?></li>
        </ol>
    </div><!-- /.card-header -->
    <!-- form start -->
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
            <?php if(permissionChecker('invoice_add')) { ?>
                <form type="get" action="">
                <div class="row">
                    <div class="col-sm-3">
                    <div class="form-group mb-7" >
                        <label for="title" class="col-sm-2   fs-6 fw-semibold mb-2">Name
                        </label>
                            <input type="text" class="form-control bg-transparent" id="name" name="name"  value="<?php echo set_value('name',$name);?>">
                        </div>
                    </div>
                     <div class="col-sm-3">
                    <div class="form-group mb-7" >
                        <label for="title" class="col-sm-2   fs-6 fw-semibold mb-2">Email
                        </label>
                            <input type="text" class="form-control bg-transparent" id="email" name="email" value="<?php echo set_value('email',$email);?>">
                        </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="form-group mb-7" >
                        <label for="title" class="col-sm-2   fs-6 fw-semibold mb-2">City
                        </label>
                            <input type="text" class="form-control bg-transparent" id="city" name="city" value="<?php echo set_value('city',$city);?>">
                        </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="form-group mb-7" >
                        <label for="title" class="col-sm-2   fs-6 fw-semibold mb-2">Member Status
                        </label>

                            <?php 
                                $bloodArray =  get_status_type();
                                echo form_dropdown("status", $bloodArray, set_value("status",$status), " id='status' class='form-control bg-transparent' data-control='select2'  "); 
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="form-group mb-7" >
                        <label for="title" class="col-sm-2   fs-6 fw-semibold mb-2">Login Status
                        </label>
                            <?php 
                                $loginArray =  get_status_login();
                                echo form_dropdown("active", $loginArray, set_value("active",$active), " id='active' class='form-control bg-transparent ' data-control='select2'  "); 
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="form-group mb-7" >
                        <label for="title" class="col-sm-2   fs-6 fw-semibold mb-2">Member Type
                        </label>
                            <select id="membertype" class="form-control form-select"   name="membertype" data-control="select2" data-placeholder="Select Member Type" >
                            <option>Please Select member type</option>
                            <?php 
                            foreach ($regtype as $r) {
                                $tenure12= get_tenure();?>
                            <option value="<?php echo $r->regtypeID;?>" <?php if ($membertype==$r->regtypeID) {
                                        echo "selected";
                                    }?>>
                                <?php echo $r->regtype.'-'.$tenure12[$r->tenure].'-'.$r->amount;?></option>
                            <?php }?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <button type="submit" class="btn btn-success" >Search</button>
                    <a href="<?php echo base_url('user/');?>" class="btn btn-danger" >Reset</a>
                </div>

            
                </div>
            </form> 
             <?php } ?> 

                <div id="hide-table">
                   <table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                        <thead>
                            <tr class="fw-bold fs-6 text-gray-800 px-7">
                                <th class="col-lg-1"><?=$this->lang->line('slno')?></th>
                                <th class="col-lg-2"><?=$this->lang->line('user_photo')?></th>
                                <th class="col-lg-2"><?=$this->lang->line('user_name')?></th>
                                <th class="col-lg-2"><?=$this->lang->line('user_email')?></th>
                                <th class="col-lg-2"><?=$this->lang->line('user_status')?></th>
                                <?php if(permissionChecker('user_edit')) { ?>
                                <th class="col-lg-1">Active</th>
                                <?php } ?>
                                <?php if(permissionChecker('user_edit') || permissionChecker('user_delete') || permissionChecker('user_view')) { ?>
                                <th class="col-lg-2"><?=$this->lang->line('action')?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <?php if(customCompute($users)) {$i = 1; foreach($users as $user) { ?>
                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('user_photo')?>">
                                        <?=profileimage($user->photo)?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('user_name')?>">
                                        <?php echo $user->name; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('user_email')?>">
                                        <?php echo $user->email; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('user_usertype')?>">
                                        <?php 
                                           $status= get_status_type();
                                            echo $status[$user->status]; 
                                          ?>
                                    </td>
                                    <?php if(permissionChecker('user_edit')) { ?>
                                    <td data-title="<?=$this->lang->line('user_status')?>">
                                      <div class="onoffswitch-small" id="<?=$user->userID?>">
                                          <input type="checkbox" id="myonoffswitch<?=$user->userID?>" class="form-check-input onoffswitch-small-checkbox" name="paypal_demo" <?php if($user->active === '1') echo "checked='checked'"; ?>>
                                          <label for="myonoffswitch<?=$user->userID?>" class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                              <span class="onoffswitch-small-inner"></span>
                                              <span class="form-check-label"></span>
                                          </label>
                                      </div>           
                                    </td>
                                    <?php } ?>
                                    <?php if(permissionChecker('user_edit') || permissionChecker('user_delete') || permissionChecker('user_view')) { ?>
                                    <td data-title="<?=$this->lang->line('action')?>">
                                        <?php echo btn_view('user/view/'.$user->userID, $this->lang->line('view')) ?>
                                        <?php echo btn_edit('user/edit/'.$user->userID, $this->lang->line('edit')) ?>
                                        <?php echo btn_delete('user/delete/'.$user->userID, $this->lang->line('delete')); ?>&nbsp;<?php echo btn_status_show('user/update_status/'.$user->userID, 'Update User Status'); ?>
                                    </td>
                                    <?php } ?>
                                </tr>
                            <?php $i++; }} ?>
                        </tbody>
                    </table>
                </div>


            </div> <!-- col-sm-12 -->
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.card -->
<style>
    label{
        display: inline;
        width: 100%;
    }
</style>
<script>
  var status = '';
  var id = 0;
  $('.onoffswitch-small-checkbox').click(function() {
      if($(this).prop('checked')) {
          status = 'chacked';
          id = $(this).parent().attr("id");
      } else {
          status = 'unchacked';
          id = $(this).parent().attr("id");
      }

      if((status != '' || status != null) && (id !='')) {
          $.ajax({
              type: 'POST',
              url: "<?=base_url('user/active')?>",
              data: "id=" + id + "&status=" + status,
              dataType: "html",
              success: function(data) {
                  if(data == 'Success') {
                      toastr["success"]("Success")
                      toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "500",
                        "hideDuration": "500",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                      }
                  } else {
                      toastr["error"]("Error")
                      toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "500",
                        "hideDuration": "500",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                      }
                  }
              }
          });
      }
  }); 
</script>

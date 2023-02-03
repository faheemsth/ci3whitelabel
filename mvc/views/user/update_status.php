
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fa fa-users mx-2"></i> <?=$this->lang->line('panel_title')?></h3>
        <ol class="breadcrumb">
           <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a> / </li>
                <li class="mx-2"><a href="<?=base_url("user/index")?>"><?=$this->lang->line('menu_user')?></a> / </li>
                <li class="active mx-2">Update Status</li>
        </ol>
    </div><!-- /.card-header -->
    <!-- form start -->
    <div class="card-body">
        <div class="row">
            <div class="col-sm-10">

                <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                   
                   
                    </div>

                    

                    <?php 
                        if(form_error('active')) 
                            echo "<div class='form-group mb-7 has-error' >";
                        else     
                            echo "<div class='form-group mb-7' >";
                    ?>
                        <label for="bloodgroup" class="col-sm-2 control-label">
                            Status <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <?php 
                                $bloodArray =  get_status_type();
                                echo form_dropdown("active", $bloodArray, set_value("active",$user->status), " id='active' class='form-control bg-transparent'  "); 
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('active'); ?>
                        </span>
                    </div>
                     <?php 
                        if(form_error('reason')) 
                            echo "<div id= 'reasondiv' class='form-group mb-7 has-error' >";
                        else     
                            echo "<div class='form-group mb-7' id= 'reasondiv' >";
                    ?>
                        <label for="name_id" class="col-sm-2 control-label">
                            Reason <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control bg-transparent" id="reason" name="reason" value="<?=set_value('reason', '')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('reason'); ?>
                        </span>
                    </div>
                    <?php 
                    
                        if(form_error('membertype')) 
                            echo "<div id='membertypediv' class='form-group mb-7 has-error' >";
                        else     
                            echo "<div  id='membertypediv'  class='form-group mb-7' >";
                    ?>
                        <label for="bloodgroup" class="col-sm-2 control-label">
                            Member Type <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select id="membertype" class="form-control form-select"   name="membertype" data-control="select2" data-placeholder="Select Member Type" >
                            <option>Please Select member type</option>
                            <?php 
                            foreach ($regtype as $r) {
                                $tenure12= get_tenure();?>
                            <option value="<?php echo $r->regtypeID;?>"><?php echo $r->regtype.'-'.$tenure12[$r->tenure].'-'.$r->amount;?></option>
                            <?php }?>
                            </select>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('membertype'); ?>
                        </span>
                    </div>
                    
                    <div class="form-group mb-7 mt-3">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="Update Status" >
                        </div>
                    </div>

                </form>

            </div> <!-- col-sm-8 -->
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.card -->

<script type="text/javascript">



    $(document).on('change', "#active", function() {
         
        var active = $(this).val();
         
        if(active == '1'){
            $("#membertypediv").show('slow'); 
            $("#reasondiv").hide('slow'); 
        } else {
            $("#membertypediv").hide('slow'); 
            $("#reasondiv").show('slow'); 
        }

         
    });
    $(document).ready(function(){
    var active = $('#active').val();
         
         
        if(active == '1'){
            $("#membertypediv").show('slow'); 
            $("#reasondiv").hide('slow'); 
        } else {
            $("#membertypediv").hide(500); 
            $("#reasondiv").show(500); 
        }
});
</script>

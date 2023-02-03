
<div class=" card">
    <div class=" card-header">
        <h3 class="card-title"><i class="fa fa-calendar mx-2"></i> <?=$this->lang->line('panel_title')?></h3>
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a> / </li>
            <li class="mx-2"><a href="<?=base_url("regtype/index")?>">Member Type</a> / </li>
            <li class="active mx-2"><?=$this->lang->line('menu_edit')?> <?=$this->lang->line('menu_regtype')?></li>
        </ol>
    </div><!-- /. card-header -->
    <!-- form start -->
    <div class=" card-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="form-horizontal" role="form" method="post">
                    <div class="form-group mb-7 <?=form_error('title') ? 'has-error' : '' ?>" >
                        <label for="title" class="col-sm-2 control-label">
                            <?=$this->lang->line("regtype_title")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control bg-transparent" id="title" name="regtype" value="<?= $regtype->regtype ?>">
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('title'); ?>
                        </span>
                    </div>
                    <div class="form-group mb-7 <?=form_error('title') ? 'has-error' : '' ?>" >
                                            <label for="title" class="col-sm-2 control-label">
                                                Amount <span class="text-red">*</span>
                                            </label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control bg-transparent" id="amount" name="amount" value="<?= $regtype->amount ?>">
                                            </div>
                                            <span class="col-sm-4 control-label">
                                                <?php echo form_error('amount'); ?>
                                            </span>
                                        </div>
                         <div class="form-group mb-7 <?=form_error('title') ? 'has-error' : '' ?>" >
                        <label for="title" class="col-sm-2 control-label">
                            Amount <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                           <?php 

                                $bloodArray =  get_tenure();
                                echo form_dropdown("tenure", $bloodArray, set_value("tenure",$regtype->tenure), "id='tenure' class='form-control bg-transparent' data-control='select2'"); 
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('amount'); ?>
                        </span>
                    </div>


                    <div class="form-group mb-7">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="<?=$this->lang->line("update_regtype")?>" >
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

</script>

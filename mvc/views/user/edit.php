
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fa fa-users"></i> <?=$this->lang->line('panel_title')?></h3>


        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a> / </li>
            <li class="mx-2"><a href="<?=base_url("user/index")?>"><?=$this->lang->line('menu_user')?></a> / </li>
            <li class="active mx-2"><?=$this->lang->line('menu_edit')?>  <?=$this->lang->line('menu_user')?></li>
        </ol>
    </div><!-- /.card-header -->
    <!-- form start -->
    <div class="card-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">

                    <?php
                        if(form_error('name'))
                            echo "<div class='form-group mb-7 has-error' >";
                        else
                            echo "<div class='form-group mb-7' >";
                    ?>
                        <label for="user_name" class="col-sm-2 control-label">
                            <?=$this->lang->line("user_name")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control bg-transparent" id="name" name="name" value="<?=set_value('name', $user->name)?>" >

                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('name'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('dob'))
                            echo "<div class='form-group mb-7 has-error' >";
                        else
                            echo "<div class='form-group mb-7' >";
                    ?>
                        <label for="dob" class="col-sm-2 control-label">
                            <?=$this->lang->line("user_dob")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control bg-transparent" id="dob" name="dob" value="<?=set_value('dob', date("d-m-Y", strtotime($user->dob)))?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('dob'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('sex'))
                            echo "<div class='form-group mb-7 has-error' >";
                        else
                            echo "<div class='form-group mb-7' >";
                    ?>
                        <label for="sex" class="col-sm-2 control-label">
                            <?=$this->lang->line("user_sex")?>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                echo form_dropdown("sex", array($this->lang->line("user_sex_male") => $this->lang->line("user_sex_male"), $this->lang->line("user_sex_female") => $this->lang->line("user_sex_female")), set_value("sex", $user->sex), "id='sex' class='form-control bg-transparent'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('sex'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('religion'))
                            echo "<div class='form-group mb-7 has-error' >";
                        else
                            echo "<div class='form-group mb-7' >";
                    ?>
                        <label for="religion" class="col-sm-2 control-label">
                            <?=$this->lang->line("user_religion")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control bg-transparent" id="religion" name="religion" value="<?=set_value('religion', $user->religion)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('religion'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('email'))
                            echo "<div class='form-group mb-7 has-error' >";
                        else
                            echo "<div class='form-group mb-7' >";
                    ?>
                        <label for="email" class="col-sm-2 control-label">
                            <?=$this->lang->line("user_email")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control bg-transparent" id="email" name="email" value="<?=set_value('email', $user->email)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('email'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('phone'))
                            echo "<div class='form-group mb-7 has-error' >";
                        else
                            echo "<div class='form-group mb-7' >";
                    ?>
                        <label for="phone" class="col-sm-2 control-label">
                            <?=$this->lang->line("user_phone")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control bg-transparent" id="phone" name="phone" value="<?=set_value('phone', $user->phone)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('phone'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('address'))
                            echo "<div class='form-group mb-7 has-error' >";
                        else
                            echo "<div class='form-group mb-7' >";
                    ?>
                        <label for="address" class="col-sm-2 control-label">
                            <?=$this->lang->line("user_address")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control bg-transparent" id="address" name="address" value="<?=set_value('address', $user->address)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('address'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('jod'))
                            echo "<div class='form-group mb-7 has-error' >";
                        else
                            echo "<div class='form-group mb-7' >";
                    ?>
                        <label for="jod" class="col-sm-2 control-label">
                            <?=$this->lang->line("user_jod")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control bg-transparent" id="jod" name="jod" value="<?=set_value('jod', date("d-m-Y", strtotime($user->jod)))?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('jod'); ?>
                        </span>
                    </div>

                    
                    <?php
                        if(form_error('usertypeID'))
                            echo "<div class='form-group mb-7 has-error' >";
                        else
                            echo "<div class='form-group mb-7' >";
                    ?>
                        <label for="usertypeID" class="col-sm-2 control-label">
                            <?=$this->lang->line("user_usertype")?> <span class="text-red">*</span>
                        </label>
                        
                        <div class="col-sm-6">
                            <?php
                                $array[0] = $this->lang->line('user_select_usertype');
                                $blockuser = array(1, 2, 3, 4);
                                if(customCompute($usertypes)) {
                                    foreach ($usertypes as $key => $usertype) {
                                        if(!in_array($usertype->usertypeID, $blockuser)) {
                                            $array[$usertype->usertypeID] = $usertype->usertype;
                                        }
                                    }
                                }
                                echo form_dropdown("usertypeID", $array, 
                                    set_value("usertypeID", $user->usertypeID), "id='usertypeID' class='form-control bg-transparent'"
                                );
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('usertypeID'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('username'))
                            echo "<div class='form-group mb-7 has-error' >";
                        else
                            echo "<div class='form-group mb-7' >";
                    ?>
                        <label for="username" class="col-sm-2 control-label">
                            <?=$this->lang->line("user_username")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control bg-transparent" id="username" name="username" value="<?=set_value('username', $user->username)?>" >
                        </div>
                         <span class="col-sm-4 control-label">
                            <?php echo form_error('username'); ?>
                        </span>
                    </div>

                    <div class="form-group mb-7">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="<?=$this->lang->line("update_user")?>" >
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$('#username').keyup(function() {
    $(this).val($(this).val().replace(/\s/g, ''));
});

$('#dob').datepicker({ startView: 2 });
$('#jod').datepicker({ dateFormat : 'dd-mm-yyyy' });

$(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
           $('.content').css('padding-bottom', '100px');
        }, 
         function () {
           $('.image-preview').popover('hide');
           $('.content').css('padding-bottom', '20px');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("<?=$this->lang->line('user_file_browse')?>"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200,
            overflow:'hidden'
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("<?=$this->lang->line('user_file_browse')?>");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
            $('.content').css('padding-bottom', '100px');
        }        
        reader.readAsDataURL(file);
    });  
});


</script>
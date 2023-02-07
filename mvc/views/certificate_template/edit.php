
<div class="card" style="margin-bottom:40px;">
    <div class="card-header">
        <h3 class="card-title"><i class="fa fa-certificate"></i> <?=$this->lang->line('panel_title')?></h3>
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a> / </li>
            <li><a href="<?=base_url("certificate_template/index")?>"><?=$this->lang->line('menu_certificate_template')?></a> / </li>
            <li class="active"><?=$this->lang->line('menu_edit')?> <?=$this->lang->line('menu_certificate_template')?></li>
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
                        <label for="name" class="col-sm-2 control-label">
                            <?=$this->lang->line("certificate_template_name")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control bg-transparent" id="name" name="name" value="<?=set_value('name', $certificate_template->name)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('name'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('theme'))
                            echo "<div class='form-group mb-7 has-error' >";
                        else
                            echo "<div class='form-group mb-7' >";
                    ?>
                        <label for="theme" class="col-sm-2 control-label">
                            <?=$this->lang->line("certificate_template_theme")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                echo form_dropdown("theme", $buildinThemes, set_value("theme", $certificate_template->theme), "id='theme' class='form-control bg-transparent'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('theme'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('main_middle_text'))
                            echo "<div class='form-group mb-7 has-error' >";
                        else
                            echo "<div class='form-group mb-7' >";
                    ?>
                        <label for="main_middle_text" class="col-sm-2 control-label">
                            <?=$this->lang->line("certificate_template_main_middle_text")?> <span class="text-red">*</span> 
                        </label>
                        <div class="col-sm-10">
                            <textarea class="form-control bg-transparent txtDropTarget" id="main_middle_text" name="main_middle_text" style="height: 20px;"><?=set_value('main_middle_text', $certificate_template->main_middle_text)?></textarea>
                        </div>
                        <span class="col-sm-10 col-sm-offset-2 control-label">
                            <?php echo form_error('main_middle_text'); ?>
                        </span>
                    </div>


                    <?php
                        if(form_error('top_heading_title'))
                            echo "<div class='form-group mb-7 has-error' >";
                        else
                            echo "<div class='form-group mb-7' >";
                    ?>
                        <label for="top_heading_title" class="col-sm-2 control-label">
                            <?=$this->lang->line("certificate_template_top_heading_title")?>
                        </label>
                        <div class="col-sm-10">
                            <textarea class="form-control bg-transparent txtDropTarget" id="top_heading_title" name="top_heading_title" style="height: 20px;"><?=set_value('top_heading_title', $certificate_template->top_heading_title)?></textarea>
                        </div>
                        <span class="col-sm-10 col-sm-offset-2 control-label">
                            <?php echo form_error('top_heading_title'); ?>
                        </span>
                    </div>


                    <?php
                        if(form_error('top_heading_left'))
                            echo "<div class='form-group mb-7 has-error' >";
                        else
                            echo "<div class='form-group mb-7' >";
                    ?>
                        <label for="top_heading_left" class="col-sm-2 control-label">
                            <?=$this->lang->line("certificate_template_top_heading_left")?>
                        </label>
                        <div class="col-sm-10">
                            <textarea class="form-control bg-transparent txtDropTarget" id="top_heading_left" name="top_heading_left" style="height: 20px;"><?=set_value('top_heading_left', $certificate_template->top_heading_left)?></textarea>
                        </div>
                        <span class="col-sm-10 col-sm-offset-2 control-label">
                            <?php echo form_error('top_heading_left'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('top_heading_middle'))
                            echo "<div class='form-group mb-7 has-error' >";
                        else
                            echo "<div class='form-group mb-7' >";
                    ?>
                        <label for="top_heading_middle" class="col-sm-2 control-label">
                            <?=$this->lang->line("certificate_template_top_heading_middle")?>
                        </label>
                        <div class="col-sm-10">
                            <textarea class="form-control bg-transparent txtDropTarget" id="top_heading_middle" name="  top_heading_middle" style="height: 20px;"><?=set_value('top_heading_middle', $certificate_template->top_heading_middle)?></textarea>
                        </div>
                        <span class="col-sm-10 col-sm-offset-2 control-label">
                            <?php echo form_error('top_heading_middle'); ?>
                        </span>
                    </div>


                    <?php
                        if(form_error('top_heading_right'))
                            echo "<div class='form-group mb-7 has-error' >";
                        else
                            echo "<div class='form-group mb-7' >";
                    ?>
                        <label for="top_heading_right" class="col-sm-2 control-label">
                            <?=$this->lang->line("certificate_template_top_heading_right")?>
                        </label>
                        <div class="col-sm-10">
                            <textarea class="form-control bg-transparent txtDropTarget" id="top_heading_right" name="  top_heading_right" style="height: 20px;"><?=set_value('top_heading_right', $certificate_template->top_heading_right)?></textarea>
                        </div>
                        <span class="col-sm-10 col-sm-offset-2 control-label">
                            <?php echo form_error('top_heading_right'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('template'))
                            echo "<div class='form-group mb-7 has-error' >";
                        else
                            echo "<div class='form-group mb-7' >";
                    ?>
                        <label for="template" class="col-sm-2 control-label">
                            <?=$this->lang->line("certificate_template_template")?> <span class="text-red">*</span>
                        </label>
                        
                        <div class="col-sm-10">
                            <textarea class="form-control bg-transparent" id="template" name="template" ><?=set_value('template', $certificate_template->template)?></textarea>
                        </div>
                        <span class="col-sm-10 col-sm-offset-2 control-label">
                            <?php echo form_error('template'); ?>
                        </span>
                    </div>


                    <?php
                        if(form_error('footer_left_text'))
                            echo "<div class='form-group mb-7 has-error' >";
                        else
                            echo "<div class='form-group mb-7' >";
                    ?>
                        <label for="footer_left_text" class="col-sm-2 control-label">
                            <?=$this->lang->line("certificate_template_footer_left_text")?>
                        </label>
                        <div class="col-sm-10">
                            <textarea class="form-control bg-transparent txtDropTarget" id="footer_left_text" name="footer_left_text" ><?=set_value('footer_left_text', $certificate_template->footer_left_text)?></textarea>
                        </div>
                        <span class="col-sm-10 col-sm-offset-2 control-label">
                            <?php echo form_error('footer_left_text'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('footer_middle_text'))
                            echo "<div class='form-group mb-7 has-error' >";
                        else
                            echo "<div class='form-group mb-7' >";
                    ?>
                        <label for="footer_middle_text" class="col-sm-2 control-label">
                            <?=$this->lang->line("certificate_template_footer_middle_text")?>
                        </label>
                        <div class="col-sm-10">
                            <textarea class="form-control bg-transparent txtDropTarget" id="footer_middle_text" name="footer_middle_text" ><?=set_value('footer_middle_text', $certificate_template->footer_middle_text)?></textarea>
                        </div>
                        <span class="col-sm-10 col-sm-offset-2 control-label">
                            <?php echo form_error('footer_middle_text'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('footer_right_text'))
                            echo "<div class='form-group mb-7 has-error' >";
                        else
                            echo "<div class='form-group mb-7' >";
                    ?>
                        <label for="footer_right_text" class="col-sm-2 control-label">
                            <?=$this->lang->line("certificate_template_footer_right_text")?>
                        </label>
                        <div class="col-sm-10">
                            <textarea class="form-control bg-transparent txtDropTarget" id="footer_right_text" name="footer_right_text" ><?=set_value('footer_right_text', $certificate_template->footer_right_text)?></textarea>
                        </div>
                        <span class="col-sm-10 col-sm-offset-2 control-label">
                            <?php echo form_error('footer_right_text'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('background_image'))
                            echo "<div class='form-group mb-7 has-error' >";
                        else
                            echo "<div class='form-group mb-7' >";
                    ?>
                        <label for="background_image" class="col-sm-2 control-label">
                            <?=$this->lang->line("certificate_template_background_image")?>
                        </label>
                        <div class="col-sm-6">
                           <input type="file" accept="image/png, image/jpeg, image/gif" name="background_image" class="form-control bg-transparent" />
                        </div>

                        <span class="col-sm-4">
                            <?php echo form_error('photo'); ?>
                        </span>
                    </div>


                    <div class="form-group mb-7">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="<?=$this->lang->line("update_certificate_template")?>" >
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-2">
                <div class="fixedDivAndScrollRelative">
                    <div class="form-group mb-7 fixedDivAndScroll">
                        <label for="email" class="col-sm-12 control-label">
                            <?=$this->lang->line("certificate_template_tags")?> (<?=$this->lang->line('certificate_template_draganddrop')?>)
                        </label>
                        <div class="col-sm-12" >
                            <div id="tags">
                                <?=$tag?>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
 
<script type="text/javascript">

   // $('.txtDropTarget').jqte();
    CKEDITOR.replace( 'main_middle_text' );
    CKEDITOR.replace( 'top_heading_title' );
    CKEDITOR.replace( 'top_heading_left' );
    CKEDITOR.replace( 'top_heading_middle' );
    CKEDITOR.replace( 'top_heading_right' );
    CKEDITOR.replace( 'template' );
    CKEDITOR.replace( 'footer_left_text' );
    CKEDITOR.replace( 'footer_middle_text' );
    CKEDITOR.replace( 'footer_right_text' );


    $(".sms_alltag").draggable({
        helper : 'clone'
    });

    $(".jqte_editor").droppable({
        drop : function(event, ui) {
            var dragValue = $(ui.draggable).attr('id');
            var parsentDropValue = $(this).html();
            $(this).html(parsentDropValue + dragValue);
        }
    });

    $('.jqte_editor').css('min-height', '100px');



    $(document).on('click', '#close-preview', function(){
        $('.image-preview').popover('hide');
        // Hover befor close the preview
        $('.image-preview').hover(
            function () {
               $('.image-preview').popover('show');
               $('.content').css('padding-bottom', '200px');
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
            $(".image-preview-input-title").text("<?=$this->lang->line('certificate_template_file_browse')?>");
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
                $(".image-preview-input-title").text("<?=$this->lang->line('certificate_template_file_browse')?>");
                $(".image-preview-clear").show();
                $(".image-preview-filename").val(file.name);
                img.attr('src', e.target.result);
                $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
                $('.content').css('padding-bottom', '200px');
            }
            reader.readAsDataURL(file);
        });
    });
</script>

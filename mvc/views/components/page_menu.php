<!--begin::Wrapper-->
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
<!--begin::sidebar-->
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
<!--begin::Logo-->
<div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
<!--begin::Logo image-->
<a href="<?php echo base_url() ?>dashboard ">
    <img alt="Logo" src="<?php echo base_url('assets/frontend/media/logos/supwhiteonly.png')?>" class="h-50px app-sidebar-logo-default" />
    <img alt="Logo" src="<?php echo base_url('assets/frontend/media/logos/supwhiteonly.png')?>" class="h-20px app-sidebar-logo-minimize" />
</a>
<!--end::Logo image-->

</div>
<!--end::Logo-->
<!--begin::sidebar menu-->
<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
<!--begin::Menu wrapper-->
<div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true" style="height: 214px;">
    <!--begin::Menu-->
     <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
        <!--begin:Menu item-->
       
           <?php
                        if(customCompute($dbMenus)) {
                            $menuDesign = '';
                            display_menu($dbMenus, $menuDesign);
                            echo $menuDesign;
                        }
                    ?>
       
        <!--end:Menu item-->
        <!--begin:Menu item-->
         <?php if($this->session->userdata("usertypeID")=='18') { ?>
          <div class="menu-item "><a href="<?php echo base_url('user/edit_profile'); ?>" class="menu-link"><i class="fa fa fa-user"></i><span class="menu-link">Edit Profile</span> </a></div>
          <div class="menu-item "><a href="<?php echo base_url('user/manage_documents');?>" class="menu-link"><i class="fa fa fa-file"></i><span class="menu-link">Manage Documents</span> </a></div>
          <div class="menu-item "><a href="<?php echo base_url('user/certificates');?>" class="menu-link"><i class="fa fa fa-certificate"></i><span class="menu-link">Certificates</span> </a></div>
         <?php }
         ?>
        <!--end:Menu item-->
        
    </div>
    <!--end::Menu-->
</div>
<!--end::Menu wrapper-->
</div>
<!--end::sidebar menu-->

</div>
<!--end::sidebar-->
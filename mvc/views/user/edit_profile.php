<!--begin::Form-->
<div class="card">
	<div class="card-header">
        <h3 class="card-title"><i class="fa fa-users mx-2"></i> Manage Profile</h3>
        <ol class="breadcrumb">
           <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a> / </li>
               
                <li class="active mx-2">Update Profile</li>
        </ol>
    </div>
    <div class="card-body">
    	<form class="form w-100" novalidate="novalidate" method="post" id=""  action="">
   <div class="row">
   	   
       <div class="col-md-6">
        <div class="fv-row mb-8">
        <!--begin::Name-->
        <label for="bloodgroup" class="col-sm-2 control-label">Full Name <span class="text-red">*</span></label>
        <input type="text" placeholder="Enter Your Full Name" name="name" autocomplete="off" class="form-control bg-transparent" value="<?= $userdetails->name ?>" />
        <!--end::Name-->
    </div>
       </div>
        
       <div class="col-md-6">
           <!--begin::Input group=-->
    <div class="fv-row mb-8">
        <!--begin::Gender-->
        <label for="bloodgroup" class="col-sm-2 control-label">Gender <span class="text-red">*</span></label>
        <select class="form-select" data-control="select2" name="sex" data-placeholder="Select Gender" value="<?= $userdetails->sex ?>">
            <option value="<?= $userdetails->sex ?>"><?=  $userdetails->sex  ?></option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
            
        </select>
        <!--end::Gender-->
    </div>
    <!--end::Input Group-->
       </div>
   </div>
   <div class="row">
       <div class="col-md-6">
             <!--begin::Input group=-->
    <div class="fv-row mb-8">
        <!--begin::Phone-->
        <label for="bloodgroup" class="col-sm-2 control-label">Phone <span class="text-red">*</span></label>
        <input type="text" placeholder="Enter Your Phone" value="<?= $userdetails->phone ?>" name="phone" autocomplete="off" class="form-control bg-transparent" />
        <!--end::Phone-->
    </div>
       </div>
       <div class="col-md-6">
             <!--begin::Input group=-->
    <div class="fv-row mb-8">
        <!--begin::Email-->
        <label for="bloodgroup" class="col-sm-2 control-label">Email<span class="text-red">*</span></label>
        <input type="text" placeholder="Enter Your Email" value="<?= $userdetails->email ?>" name="email" autocomplete="off" class="form-control bg-transparent" />
        <!--end::Email-->
    </div>
    <!--begin::Input group-->
       </div>
   </div>
   <div class="row">
       <div class="col-md-6">
             <!--begin::Input group=-->
    <div class="fv-row mb-8">
        <!--begin::Gender-->
        <label for="bloodgroup" class="control-label">Job Title <span class="text-red">*</span></label>
         <input type="text" placeholder="Enter Job Title" value="<?= $userdetails->current_job ?>" name="current_job" autocomplete="off" class="form-control bg-transparent" />
        <!--end::Gender-->
    </div>
       </div>
       <div class="col-md-6">
             <!--begin::Input group=-->
    <div class="fv-row mb-8">
        <!--begin::Email-->
        <label for="bloodgroup" class="control-label">Country <span class="text-red">*</span></label>
        <select class="form-select" data-control="select2" name="country" data-placeholder="Select Country">
        	<?php $listco =  getCountrys();
        	?>
             <option value="<?=  $userdetails->country  ?>"><?= $listco[$userdetails->country]   ?></option>
            <?php foreach (getCountrys() as $key=>$value) { ?>

             <option value="<?php echo $key ?>"><?php echo $value ?></option>
              <?php }
              ?>
        </select>
        <!--end::Email-->
    </div>
    <!--begin::Input group-->
       </div>
   </div>
    <div class="row">
       <div class="col-md-6">
             <!--begin::Input group=-->
     <div class="fv-row mb-8">
        <!--begin::Email-->
         <!--begin::Gender-->
         <label for="bloodgroup" class="control-label">Province <span class="text-red">*</span></label>
        <input type="text" placeholder="Enter Province Name" value="<?= $userdetails->province ?>" name="province" autocomplete="off" class="form-control bg-transparent" />
        <!--end::Gender-->
    </div>
       </div>
       <div class="col-md-6">
             <!--begin::Input group=-->
    <div class="fv-row mb-8">
        <!--begin::Email-->
        <label for="bloodgroup" class="control-label">City <span class="text-red">*</span></label>
        <input type="text" placeholder="Enter City Name" value="<?= $userdetails->city ?>" name="city" autocomplete="off" class="form-control bg-transparent" />
        <!--end::Email-->
    </div>
    <!--begin::Input group-->
       </div>
   </div>
   <div class="fv-row mb-8">
        <!--begin::Email-->
        <label for="bloodgroup" class="control-label">Personal Address <span class="text-red">*</span></label>
        <input type="text" placeholder="Enter Personal Address" value="<?= $userdetails->address ?>" name="address" autocomplete="off" class="form-control bg-transparent" />
        <!--end::Email-->
    </div>
    <div class="fv-row mb-8">
        <!--begin::Email-->
        <label for="bloodgroup" class="control-label">Clinic Address <span class="text-red">*</span></label>
        <input type="text" placeholder="Enter Clinic Address" value="<?= $userdetails->clinic_address ?>" name="clinic_address" autocomplete="off" class="form-control bg-transparent" />
        <!--end::Email-->
    </div>

    <!--begin::Submit button-->
    <div class="d-grid mb-10">
        <button type="submit" value="edit_profile"  class="btn btn-primary">
            <!--begin::Indicator label-->
            <span class="indicator-label">Update Profile</span>
            <!--end::Indicator label-->
            <!--begin::Indicator progress-->
            <span class="indicator-progress">Please wait... 
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            <!--end::Indicator progress-->
        </button>
    </div>
    <!--end::Submit button-->
   
</form>
    </div>
</div>

<!--end::Form-->
<style type="text/css">
	label{
		display: block;
	}
</style>
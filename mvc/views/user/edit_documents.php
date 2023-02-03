<!--begin::Form-->
<div class="card">
	<div class="card-header">
        <h3 class="card-title"><i class="fa fa-users mx-2"></i> Manage Documents</h3>
        <ol class="breadcrumb">
           <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a> / </li>
            <li class="active mx-2">Edit Documents</li>
        </ol>
    </div>
    <div class="card-body">
       
    	<form class="form w-100" novalidate="novalidate" method="post" id=""  enctype="multipart/form-data"  action="">

          <div class="row">
       <div class="col-md-6">
            <div class="fv-row mb-8">
        <!--begin::Name-->

        <input type="text" placeholder="Matric" name="id_front" value="ID Card Front Side" readonly autocomplete="off"  class="form-control bg-transparent" />
        <!--end::Name-->
    </div>
       </div>
       <div class="col-md-6">
           <!--begin::Input group=-->
    <div class="fv-row mb-8">
        <!--begin::Gender-->
       <input type="file" placeholder="Add Payment Receipt" name="id_front_file" autocomplete="off"   id="file" class="form-control bg-transparent" />
      
        <!--end::Gender-->
    </div>
    <!--end::Input Group-->
       </div>
   </div>
          <div class="row">
       <div class="col-md-6">
            <div class="fv-row mb-8">
        <!--begin::Name-->
        <input type="text" placeholder="Matric" name="id_back" value="ID Card Back Side" readonly autocomplete="off" class="form-control bg-transparent" />

        <!--end::Name-->
    </div>
       </div>
       <div class="col-md-6">
           <!--begin::Input group=-->
    <div class="fv-row mb-8">
        <!--begin::Gender-->
       <input type="file" placeholder="Add Payment Receipt" name="id_back_file" autocomplete="off" id="file" class="form-control bg-transparent" />
      
        <!--end::Gender-->
    </div>
    <!--end::Input Group-->
       </div>
   </div>
   <div class="row">
       <div class="col-md-3">
            <div class="fv-row mb-8">
        <!--begin::Name-->
        <input type="text" placeholder="Matric" name="matric" value="Matric" readonly autocomplete="off" class="form-control bg-transparent" />
        <!--end::Name-->
    </div>
       </div>
       <div class="col-md-3">
            <div class="fv-row mb-8">
        <!--begin::Name-->
        <input type="text" placeholder="Passing Year" name="passing_year_matric" autocomplete="off" class="form-control bg-transparent" />
        <!--end::Name-->
    </div>
       </div>
       <div class="col-md-6">
           <!--begin::Input group=-->
    <div class="fv-row mb-8">
        <!--begin::Gender-->
       <input type="file" placeholder="Add Payment Receipt" name="matric_file" autocomplete="off" id="file" class="form-control bg-transparent" />
        <!--end::Gender-->
    </div>
    <!--end::Input Group-->
       </div>
   </div>
      <div class="row">
       <div class="col-md-3">
            <div class="fv-row mb-8">
        <!--begin::Name-->
        <input type="text" placeholder="Matric" name="inter" value="Intermediate" readonly autocomplete="off" class="form-control bg-transparent" />
        <!--end::Name-->
    </div>
       </div>
       <div class="col-md-3">
            <div class="fv-row mb-8">
        <!--begin::Name-->
        <input type="text" placeholder="Passing Year" name="passing_year_inter" autocomplete="off" class="form-control bg-transparent" />
        <!--end::Name-->
    </div>
       </div>
       <div class="col-md-6">
           <!--begin::Input group=-->
    <div class="fv-row mb-8">
        <!--begin::Gender-->
       <input type="file" placeholder="Add Payment Receipt" name="inter_file" autocomplete="off" id="file" class="form-control bg-transparent" />
        <!--end::Gender-->
    </div>
    <!--end::Input Group-->
       </div>
   </div>
      <div class="row">
       <div class="col-md-3">
            <div class="fv-row mb-8">
        <!--begin::Name-->
        <input type="text" placeholder="Matric" name="undergraduate" value="Undergraduate" readonly autocomplete="off" class="form-control bg-transparent" />
        <!--end::Name-->
    </div>
       </div>
       <div class="col-md-3">
            <div class="fv-row mb-8">
        <!--begin::Name-->
        <input type="text" placeholder="Passing Year" name="passing_year_undergraduate" autocomplete="off" class="form-control bg-transparent" />
        <!--end::Name-->
    </div>
       </div>
       <div class="col-md-6">
           <!--begin::Input group=-->
    <div class="fv-row mb-8">
        <!--begin::Gender-->
       <input type="file" placeholder="Add Payment Receipt" name="undergraduate_file" autocomplete="off" id="file" class="form-control bg-transparent" />
        <!--end::Gender-->
    </div>
    <!--end::Input Group-->
       </div>
   </div>
    <div class="row">
       <div class="col-md-3">
            <div class="fv-row mb-8">
        <!--begin::Name-->
        <input type="text" placeholder="Matric" name="postgraduate" value="PG/Certificate" readonly autocomplete="off" class="form-control bg-transparent" />
        <!--end::Name-->
    </div>
       </div>
       <div class="col-md-3">
            <div class="fv-row mb-8">
        <!--begin::Name-->
        <input type="text" placeholder="Passing Year" name="passing_year_postgraduate" autocomplete="off" class="form-control bg-transparent" />
        <!--end::Name-->
    </div>
       </div>
       <div class="col-md-6">
           <!--begin::Input group=-->
    <div class="fv-row mb-8">
        <!--begin::Gender-->
       <input type="file" placeholder="Add Payment Receipt" name="postgraduate_file" autocomplete="off" id="file" class="form-control bg-transparent" />
        <!--end::Gender-->
    </div>
    <!--end::Input Group-->
       </div>
   </div>
       <div class="row">
       <div class="col-md-3">
            <div class="fv-row mb-8">
        <!--begin::Name-->
        <input type="text" placeholder="Matric" name="pmdc" value="PMDC" readonly autocomplete="off" class="form-control bg-transparent" />
        <!--end::Name-->
    </div>
       </div>
       <div class="col-md-3">
            <div class="fv-row mb-8">
        <!--begin::Name-->
        <input type="text" placeholder="Passing Year" name="passing_year_pmdc" autocomplete="off" class="form-control bg-transparent" />
        <!--end::Name-->
    </div>
       </div>
       <div class="col-md-6">
           <!--begin::Input group=-->
    <div class="fv-row mb-8">
        <!--begin::Gender-->
       <input type="file" placeholder="Add Payment Receipt" name="pmdc_file" autocomplete="off" id="file" class="form-control bg-transparent" />
        <!--end::Gender-->
    </div>
    <!--end::Input Group-->
       </div>
   </div>
    <!--begin::Submit button-->
    <div class="d-grid mb-10">
        <button type="submit" value="edit_profile"  class="btn btn-primary">
            <!--begin::Indicator label-->
            <span class="indicator-label">Update Documents</span>
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
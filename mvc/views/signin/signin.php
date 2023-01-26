<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form"  action="">
<!--begin::Heading-->
	<div class="text-center mb-11">
		<!--begin::Title-->
		<h1 class="text-dark fw-bolder mb-3">Sign In</h1>
		<!--end::Title-->
		<!--begin::Subtitle-->
		<div class="text-gray-500 fw-semibold fs-6">Society of Ultrasound in Pakistan</div>
		<!--end::Subtitle=-->
	</div>
	<div class="fv-row mb-8">
		<!--begin::Email-->
		<input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent">
		<!--end::Email-->
	</div>
	<!--end::Input group=-->
	<div class="fv-row mb-3"  data-kt-password-meter="true">
		<!--begin::Password-->
		<input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent">
		<!--end::Password-->
		    <!--begin::Visibility toggle-->
            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                data-kt-password-meter-control="visibility">
                <i class="fa fa-eye-slash fs-2"></i>

                <i class="fa fa-eye fs-2 d-none"></i>
            </span>
            <!--end::Visibility toggle-->
	</div>
	<!--end::Input group=-->
	<!--begin::Wrapper-->
	<div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
		<div></div>
		<!--begin::Link-->
		<a href="<?php echo base_url('signin/forget_password') ?>" class="link-primary">Forgot Password ?</a>
		<!--end::Link-->
	</div>
	<!--end::Wrapper-->
	<!--begin::Submit button-->
	<div class="d-grid mb-10">
		<button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
			<!--begin::Indicator label-->
			<span class="indicator-label">Sign In</span>
			<!--end::Indicator label-->
			<!--begin::Indicator progress-->
			<span class="indicator-progress">Please wait... 
			<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
			<!--end::Indicator progress-->
		</button>
	</div>
	<!--end::Submit button-->
	<!--begin::Sign up-->
	<div class="text-gray-500 text-center fw-semibold fs-6">Not a Member yet? 
	<a href="<?php echo base_url('user/register') ?>" class="link-primary">Sign up</a></div>
	<!--end::Sign up-->
	</form>

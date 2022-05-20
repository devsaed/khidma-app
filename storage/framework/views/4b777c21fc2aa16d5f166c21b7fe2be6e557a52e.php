<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 11 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
	
	<meta charset="utf-8" />
	<title> Login | Smart Store</title>
	<meta name="description" content="Login page example" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Page Custom Styles(used by this page)-->
	<link href="<?php echo e(asset('cms/assets/css/pages/login/classic/login-4.css')); ?>" rel="stylesheet" type="text/css" />
	<!--end::Page Custom Styles-->
	<!--begin::Global Theme Styles(used by all pages)-->
	<link href="<?php echo e(asset('cms/assets/plugins/global/plugins.bundle.css')); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo e(asset('cms/assets/plugins/custom/prismjs/prismjs.bundle.css')); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo e(asset('cms/assets/css/style.bundle.css')); ?>" rel="stylesheet" type="text/css" />
	<!--end::Global Theme Styles-->
	<!--begin::Layout Themes(used by all pages)-->
	<link href="<?php echo e(asset('cms/assets/css/themes/layout/header/base/light.css')); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo e(asset('cms/assets/css/themes/layout/header/menu/light.css')); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo e(asset('cms/assets/css/themes/layout/brand/dark.css')); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo e(asset('cms/assets/css/themes/layout/aside/dark.css')); ?>" rel="stylesheet" type="text/css" />
	<!--end::Layout Themes-->
	<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
	class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
	<!--begin::Main-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Login-->
		<div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
			<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat"
				style="background-image: url(<?php echo e(asset('cms/assets/media/bg/bg-3.jpg')); ?>);">
				<div class="login-form text-center p-7 position-relative overflow-hidden">
					<!--begin::Login Header-->
					<div class="d-flex flex-center mb-15">
						<a href="#">
							<img src="<?php echo e(asset('assets/media/logos/logo-letter-13.png')); ?>" class="max-h-75px" alt="" />
						</a>
					</div>

					<div>
						<div class="mb-20">
							<h3>Verfiy Account</h3>
							<div class="text-muted font-weight-bold">You are only one step a way from your account activation, activate your account now.</div>
						</div>
						<form class="form">
							<button class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4"
								onclick="performSendEmailVerification()">Verfiy</button>
						</form>
					</div>

				</div>
			</div>
		</div>
		<!--end::Login-->
	</div>
	
	<script>
		var KTAppSettings = { " breakpoints": { "sm" : 576, "md" : 768, "lg" : 992, "xl" : 1200, "xxl" : 1400 }, "colors" :
								{ "theme" : { "base" : { "white" : "#ffffff" , "primary" : "#3699FF" , "secondary"
								: "#E5EAEE" , "success" : "#1BC5BD" , "info" : "#8950FC" , "warning" : "#FFA800"
								, "danger" : "#F64E60" , "light" : "#E4E6EF" , "dark" : "#181C32" }, "light" : { "white"
								: "#ffffff" , "primary" : "#E1F0FF" , "secondary" : "#EBEDF3" , "success" : "#C9F7F5"
								, "info" : "#EEE5FF" , "warning" : "#FFF4DE" , "danger" : "#FFE2E5" , "light"
								: "#F3F6F9" , "dark" : "#D6D6E0" }, "inverse" : { "white" : "#ffffff" , "primary"
								: "#ffffff" , "secondary" : "#3F4254" , "success" : "#ffffff" , "info" : "#ffffff"
								, "warning" : "#ffffff" , "danger" : "#ffffff" , "light" : "#464E5F" , "dark"
								: "#ffffff" } }, "gray" : { "gray-100" : "#F3F6F9" , "gray-200" : "#EBEDF3" , "gray-300"
								: "#E4E6EF" , "gray-400" : "#D1D3E0" , "gray-500" : "#B5B5C3" , "gray-600" : "#7E8299"
								, "gray-700" : "#5E6278" , "gray-800" : "#3F4254" , "gray-900" : "#181C32" }
								}, "font-family" : "Poppins" }; 
	</script>
	<!--end::Global Config-->
	<!--begin::Global Theme Bundle(used by all pages)-->
	<script src="<?php echo e(asset('cms/assets/plugins/global/plugins.bundle.js')); ?>"></script>
	<script src="<?php echo e(asset('cms/assets/plugins/custom/prismjs/prismjs.bundle.js')); ?>"></script>
	<script src="<?php echo e(asset('cms/assets/js/scripts.bundle.js')); ?>"></script>
	<!--end::Global Theme Bundle-->
	<!--begin::Page Scripts(used by this page)-->
	<script src="<?php echo e(asset('cms/assets/js/pages/custom/login/login-general.js?n=1')); ?>"></script>
	<!--end::Page Scripts-->

	<script src="<?php echo e(asset('cms/assets/js/pages/features/miscellaneous/toastr.js')); ?>">
	</script>
	<script src="<?php echo e(asset('js/axios.js')); ?>"></script>

  <script>
    function performSendEmailVerification() {
          axios.get('/cms/admin/send-verification')
          .then(function (response) {
              console.log(response);
              toastr.success(response.data.message);
          })
          .catch(function (error) {
              console.log(error.response);
              toastr.error(error.response.data.message);
          });      
      }
  </script>

</body>
<!--end::Body-->

</html><?php /**PATH C:\wamp64\www\khidma-app\resources\views/cms/auth/verify-email.blade.php ENDPATH**/ ?>
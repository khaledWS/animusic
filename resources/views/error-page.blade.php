
<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head>
		<title>Error</title>
		<meta charset="utf-8" />

		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="{{asset('assets/media/mine/icon-music.ico')}}" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{asset('assets/plugins/global/plugins.dark.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/style.dark.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<!--Begin::Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&amp;l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-5FS8GGP');</script>
		<!--End::Google Tag Manager -->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="dark-mode auth-bg app-blank">
		<!--Begin::Google Tag Manager (noscript) -->
		<noscript>
			<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
		</noscript>
		<!--End::Google Tag Manager (noscript) -->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_page">
			<!--begin::Authentication - Error 500 -->
			<div class="d-flex flex-column flex-column-fluid">
				<!--begin::Content-->
				<div class="d-flex flex-column flex-column-fluid text-center p-10 py-lg-15">
					{{-- <!--begin::Logo-->
					<a href="/metronic8/demo22/../demo22/dark/index.html" class="mb-10 pt-lg-10">
						<img alt="Logo" src="/metronic8/demo22/assets/media/logos/logo-1-dark.svg" class="h-40px mb-5" />
					</a>
					<!--end::Logo--> --}}
					<!--begin::Wrapper-->
					<div class="pt-lg-10 mb-10">
						<!--begin::Logo-->
						<h1 class="fw-bolder fs-2qx text-gray-800 mb-10">System Error</h1>
						<!--end::Logo-->
						<!--begin::Message-->
						<div class="fw-bold fs-3 text-muted mb-15">Something went wrong!
						<br />Please try again later.</div>
                        {{-- <div class="fw-bold fs-3 text-muted mb-15">{{session('error')}}</div> --}}
						<!--end::Message-->
						<!--begin::Action-->
						<div class="text-center">
							<a href="/" class="btn btn-lg btn-primary fw-bolder">Go to homepage</a>
						</div>
						<!--end::Action-->
					</div>
					<!--end::Wrapper-->
					<!--begin::Illustration-->
					<div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url(/metronic8/demo22/assets/media/illustrations/sketchy-1/17-dark.png"></div>
					<!--end::Illustration-->
				</div>
				<!--end::Content-->
				<!--begin::Footer-->
				<div class="d-flex flex-center flex-column-auto p-10">
					<!--begin::Links-->
					<div class="d-flex align-items-center fw-bold fs-6">
						<a class="text-muted text-hover-primary px-2">DODE2K#5711</a>
					</div>
					<!--end::Links-->
				</div>
				<!--end::Footer-->
			</div>
			<!--end::Authentication - Error 500-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->
		{{-- <!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="/metronic8/demo22/assets/plugins/global/plugins.bundle.js"></script>
		<script src="/metronic8/demo22/assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle--> --}}
		<!--end::Javascript-->
        <script>
            console.log('error: '+"{{session('error')}}")
        </script>
	</body>
	<!--end::Body-->
</html>

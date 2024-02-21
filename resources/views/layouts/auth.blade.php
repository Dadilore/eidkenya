
<!DOCTYPE html>
<html lang="en">
	<head>
		<title> @yield('pagetitle') | eIDKenya</title>
		<meta charset="utf-8" />
		<meta name="description" content="Your Seamless Gateway to a Smarter National ID Application Experience." />
		<meta name="keywords" content="national, id, kenya, online, identity" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="eIDKenya" />
		<meta property="og:url" content="" />
		<meta property="og:site_name" content="eIDKenya" />
		<link rel="canonical" href="" />
		<link rel="shortcut icon" href="{{ asset ('user/assets/images/logo/logo.png') }}" />
        
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
        
		<link href="{{ asset ('user/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset ('user/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
	</head>

	<body id="kt_body" class="app-blank">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
            
            @yield('content')


		</div>
		<script>var hostUrl = "assets/";</script>
		<script src="{{ asset ('user/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset ('user/js/scripts.bundle.js') }}"></script>
        
		<script src="{{ asset ('user/js/custom/authentication/sign-up/general.js') }}"></script>
	</body>
</html>
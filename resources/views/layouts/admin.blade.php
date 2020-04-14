<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="http://demo.themekita.com/azzara/livepreview/assets/img/icon.ico" type="image/x-icon"/>

    @section('css')
	<!-- Fonts and icons -->
	<script src="{{asset('admin-asset')}}/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['{{asset("admin-asset")}}/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('admin-asset')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('admin-asset')}}/css/azzara.min.css">
    @show
</head>
@auth('admin')
<body>
	<div class="wrapper">
        @include('include.admin.nav')

        @yield('content')
@else
<body class="login">
	<div class="wrapper wrapper-login">
        @yield('content')
@endauth
<!--   End AUTH   -->
	</div>
@section('js')
<!--   Core JS Files   -->
<script src="{{asset('admin-asset')}}/js/core/jquery.3.2.1.min.js"></script>
<script src="{{asset('admin-asset')}}/js/core/popper.min.js"></script>
<script src="{{asset('admin-asset')}}/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="{{asset('admin-asset')}}/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="{{asset('admin-asset')}}/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<!-- jQuery Scrollbar -->
<script src="{{asset('admin-asset')}}/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<!-- Moment JS -->
<script src="{{asset('admin-asset')}}/js/plugin/moment/moment.min.js"></script>

<!-- Chart JS -->
<script src="{{asset('admin-asset')}}/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="{{asset('admin-asset')}}/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="{{asset('admin-asset')}}/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="{{asset('admin-asset')}}/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="{{asset('admin-asset')}}/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- Bootstrap Toggle -->
<script src="{{asset('admin-asset')}}/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="{{asset('admin-asset')}}/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('admin-asset')}}/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Google Maps Plugin -->
<script src="{{asset('admin-asset')}}/js/plugin/gmaps/gmaps.js"></script>

<!-- Dropzone -->
<script src="{{asset('admin-asset')}}/js/plugin/dropzone/dropzone.min.js"></script>

<!-- Fullcalendar -->
<script src="{{asset('admin-asset')}}/js/plugin/fullcalendar/fullcalendar.min.js"></script>

<!-- DateTimePicker -->
<script src="{{asset('admin-asset')}}/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>

<!-- Bootstrap Tagsinput -->
<script src="{{asset('admin-asset')}}/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

<!-- Bootstrap Wizard -->
<script src="{{asset('admin-asset')}}/js/plugin/bootstrap-wizard/bootstrapwizard.js"></script>

<!-- jQuery Validation -->
<script src="{{asset('admin-asset')}}/js/plugin/jquery.validate/jquery.validate.min.js"></script>

<!-- Summernote -->
<script src="{{asset('admin-asset')}}/js/plugin/summernote/summernote-bs4.min.js"></script>

<!-- Select2 -->
<script src="{{asset('admin-asset')}}/js/plugin/select2/select2.full.min.js"></script>

<!-- Sweet Alert -->
<script src="{{asset('admin-asset')}}/js/plugin/sweetalert/sweetalert.min.js"></script>
@show
<!-- Azzara JS -->
<script src="{{asset('admin-asset')}}/js/ready.min.js"></script>
</body>
</html>
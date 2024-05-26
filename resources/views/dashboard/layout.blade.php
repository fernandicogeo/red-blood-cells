<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title') - Dashboard Hemoglo</title>
  <link rel="apple-touch-icon" href="{{ asset('/style/images/logo.png') }}">
  <link rel="stylesheet" href="/css/admin/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/css/admin/plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="/css/admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <link rel="stylesheet" href="/css/admin/dist/css/adminlte.min.css?v=3.2.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: grey"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt" style="color: grey"></i>
        </a>
      </li>
      <li class="nav-item">
        <form action="{{ route('logout') }}" method="post">
          @csrf
          <button type="submit" class="nav-link btn btn-default">
            <i class="nav-icon fas fa-sign-out-alt" style="color: grey"></i>
          </button>
        </form>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4 justify-content-center" style="background-color: #2D2A70">
    <a href="{{ route('dashboard') }}" class="brand-link logo-switch" style="text-align: center; text-decoration:none;background-color: #fff; display: block;">
    </a>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="color: white">
          @auth
              <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                  <i class="bi bi-house-fill"></i>
                  <p>
                    Bahan Penukar
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('form.recall') }}" class="nav-link">
                  <i class="bi bi-archive-fill"></i>
                  <p>
                    Form Recall Makanan
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                  <i class="bi bi-archive-fill"></i>
                  <p>
                    Data Dokter
                  </p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                  <i class="bi bi-archive-fill"></i>
                  <p>
                    Data User
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                  <i class="bi bi-archive-fill"></i>
                  <p>
                    Appointment
                  </p>
                </a>
              </li>
          @endauth
        </ul>
      </nav>
    </div>
  </aside>
  @yield('content')
</div>
<script src="/css/admin/plugins/jquery/jquery.min.js"></script>
<script src="/css/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="/css/admin/plugins/select2/js/select2.full.min.js"></script>
<script src="/css/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/css/admin/plugins/chart.js/Chart.min.js"></script>
<script src="/css/admin/plugins/sparklines/sparkline.js"></script>
<script src="/css/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/css/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="/css/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="/css/admin/plugins/moment/moment.min.js"></script>
<script src="/css/admin/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/css/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="/css/admin/plugins/summernote/summernote-bs4.min.js"></script>
<script src="/css/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="/css/admin/dist/js/adminlte.js"></script>
<script src="/css/admin/dist/js/pages/dashboard.js"></script>
<script src="/css/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/css/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/css/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/css/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/css/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/css/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/css/admin/plugins/jszip/jszip.min.js"></script>
<script src="/css/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/css/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/css/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/css/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/css/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="/css/admin/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="/css/admin/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="/css/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="/css/admin/plugins/chart.js/Chart.min.js"></script>
<script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
<script src="/css/admin/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="/css/admin/plugins/raphael/raphael.min.js"></script>
<script src="/css/admin/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="/css/admin/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<script src="/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="/vendor/bootstrap/js/popper.js"></script>
	<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="/vendor/select2/select2.min.js"></script>
	<script src="/vendor/tilt/tilt.jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script>
		$(function () {
			$('input[type="file"]').change(function () {
				if ($(this).val() != "") {
						$(this).css('color', '#999999');
				}else{
						$(this).css('color', '#999999');
				}
			});
		})
	</script>
	<script src="/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@if (session()->has('success'))
    <script>
        toastr.success("{{ session('success') }}");
    </script>
@elseif (session()->has('error'))
    <script>
        toastr.error("{{ session('error') }}");
    </script>
@elseif (session()->has('info'))
    <script>
        toastr.warning("{{ session('info') }}");
    </script>
@endif

<script>
  $(function () {
    bsCustomFileInput.init();
  });
  </script>
  <script>document.foo.submit();</script>
  <script>
    $(document).ready(function () {
  var url = window.location;
  $('ul.nav-sidebar a.nav-link').filter(function () {
    return this.href == url;
  }).addClass('active');
});
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="/assetsTimeLine/js/main.js"></script>
</body>
</html>

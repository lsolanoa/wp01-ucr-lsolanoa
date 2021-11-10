<?php session_start(); ?>
<?php
if (isset($_SESSION['admin'])):
include 'php/conn.php';
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$lastKey = key(array_slice($components, -1, 1, true));
$url = $components[$lastKey];
date_default_timezone_set('America/Costa_Rica');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DCLTMM - Página de Administrador</title>

  <!-- STYLESHEETS -->
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="plugins/raphael/raphael.min.js"></script>
  <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- bs-custom-file-input -->
  <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- Select2 -->
  <script src="plugins/select2/js/select2.full.min.js"></script>
</head>
<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="admin_page.php" class="nav-link">Principal</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="admin_cont.php" class="nav-link">Contacto</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="php/logout.php" role="button">
          <i class="fas fa-power-off"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../images/logo_main_white.png" alt="Admin-Logo" class="brand-image">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Administrador</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
             <a href="admin_page.php" class="nav-link <?php if ($url==="admin_page.php") {echo "active";} ?>">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Entradas
              </p>
            </a>
          </li>
          <li class="nav-item">
              <a href="admin_nav.php" class="nav-link <?php if ($url==="admin_nav.php") {echo "active";} ?>">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Navegador
              </p>
            </a>
          </li>
          <li class="nav-item">
              <a href="admin_show.php" class="nav-link <?php if ($url==="admin_show.php") {echo "active";} ?>">
              <i class="nav-icon fab fa-slideshare"></i>
              <p>
                Slideshow
              </p>
            </a>
          </li>
          <li class="nav-item">
              <a href="admin_section.php" class="nav-link <?php if ($url==="admin_section.php") {echo "active";} ?>">
              <i class="nav-icon fas fa-exclamation-circle"></i>
              <p>
                Importantes
              </p>
            </a>
          </li>
          <li class="nav-item">
              <a href="admin_timeline.php" class="nav-link <?php if ($url==="admin_timeline.php") {echo "active";} ?>">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Time Line
              </p>
            </a>
          </li>
          <li class="nav-item">
              <a href="admin_links.php" class="nav-link <?php if ($url==="admin_links.php") {echo "active";} ?>">
              <i class="nav-icon fas fa-link"></i>
              <p>
                Enlances Importantes
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<?php else:
header('Location: ../php/logout.php');
exit();
?>
<?php endif; ?>

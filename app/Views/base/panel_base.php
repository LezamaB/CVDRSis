<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Control de eventos | <?=$nombre_pagina?></title>

    <link rel="stylesheet" href=<?= base_url(PLUGINS.'fontawesome-free/css/all.min.css')?>>
    
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href=<?= base_url(PLUGINS_DASHBOARD.'fontawesome-free/css/all.min.css')?>>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href=<?= base_url(PLUGINS_DASHBOARD.'tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>>
  <!-- iCheck -->
  <link rel="stylesheet" href=<?= base_url(PLUGINS_DASHBOARD.'icheck-bootstrap/icheck-bootstrap.min.css')?>>
  <!-- JQVMap -->
  <link rel="stylesheet" href=<?= base_url(PLUGINS_DASHBOARD.'jqvmap/jqvmap.min.css')?>>
  <!-- Theme style -->
  <link rel="stylesheet" href=<?= base_url(DIST_DASHBOARD.'css/adminlte.min.css')?>>
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href=<?= base_url(PLUGINS_DASHBOARD.'overlayScrollbars/css/OverlayScrollbars.min.css')?>>
   <!-- summernote -->
  <link rel="stylesheet" href=<?= base_url(PLUGINS_DASHBOARD.'summernote/summernote-bs4.min.css')?>>

    <!--******************************************* */
        CSS
    ******************************************* * -->
    <?= $this->renderSection("css")?>
    </head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src=<?= base_url(DIST_DASHBOARD.'img/logo.png')?> alt="CVDR" height="100" width="120">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
</li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <!-- Perfil -->
      <li class="nav-item">
        <a class="nav-link" href="<?=route_to('perfil')?>" role="button" data-toggle="tooltip" data-placement="top" title="Mi perfil">
          <i class="fa fa-user"></i>
      </a>
      </li>
      <!-- Logout -->
      <li class="nav-item">
          <a class="nav-link" href="<?=route_to('cerrar');?>" role="button" data-toggle="tooltip" data-placement="top" title="Cerrar sesión">
           <i class="fa fa-lock    "></i>
      </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=route_to('dashboard');?>" class="brand-link">
      <img src=<?= base_url(DIST_DASHBOARD.'img/logo.png')?> alt="CVDR" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">Control de eventos</span><BR>
      <center><span class="brand-text font-weight-light">CVDR</span></center>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <!--  IMPRIMIR VARIABLE PHP MENU-->
      <nav class="mt-2">
        <?=$menu?>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <!-- IMPRIMIR VARIABLE PHP BREADCRUMB -->
      <div class="container-fluid">
        <?= $breadcrumb?>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        
   <!--******************************************* */
                        CONTENIDO PRINCIPAL
       ******************************************* * -->
       <?= $this->renderSection("contenido") ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src=<?= base_url(PLUGINS_DASHBOARD.'jquery/jquery.min.js')?>></script>
<!-- jQuery UI 1.11.4 -->
<script src=<?= base_url(PLUGINS_DASHBOARD.'jquery-ui/jquery-ui.min.js')?>></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src=<?= base_url(PLUGINS_DASHBOARD.'bootstrap/js/bootstrap.bundle.min.js')?>></script>
<!-- ChartJS -->
<script src=<?= base_url(PLUGINS_DASHBOARD.'chart.js/Chart.min.js')?>></script>
<!-- Sparkline -->
<script src=<?= base_url(PLUGINS_DASHBOARD.'sparklines/sparkline.js')?>></script>
<!-- JQVMap -->
<script src=<?= base_url(PLUGINS_DASHBOARD.'jqvmap/jquery.vmap.min.js')?>></script>
<script src=<?= base_url(PLUGINS_DASHBOARD.'jqvmap/maps/jquery.vmap.usa.js')?>></script>
<!-- jQuery Knob Chart -->
<script src=<?= base_url(PLUGINS_DASHBOARD.'jquery-knob/jquery.knob.min.js')?>></script>
<!-- daterangepicker -->
<script src=<?= base_url(PLUGINS_DASHBOARD.'/moment/moment.min.js')?>></script>
<script src=<?= base_url(PLUGINS_DASHBOARD.'daterangepicker/daterangepicker.js')?>></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src=<?= base_url(PLUGINS_DASHBOARD.'tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')?>></script>
<!-- Summernote -->
<script src=<?= base_url(PLUGINS_DASHBOARD.'summernote/summernote-bs4.min.js')?>></script>
<!-- overlayScrollbars -->
<script src=<?= base_url(PLUGINS_DASHBOARD.'overlayScrollbars/js/jquery.overlayScrollbars.min.js')?>></script>
<!-- AdminLTE App -->
<script src=<?= base_url(DIST_DASHBOARD.'js/adminlte.js')?>></script>
<!-- AdminLTE for demo purposes -->
<script src=<?= base_url(DIST_DASHBOARD.'js/demo.js')?>></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src=<?= base_url(DIST_DASHBOARD.'js/pages/dashboard.js')?>></script>



<!--******************************************* */
        JS
    ******************************************* * -->
    <?= $this->renderSection("js")?>















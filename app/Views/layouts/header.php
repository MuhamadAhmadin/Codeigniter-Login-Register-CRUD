<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UTS Muhamad Ahmadin | CRUD & LOGIN CI4 </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/ionicons/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet"
    href="<?= base_url('assets') ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/summernote/summernote-bs4.min.css">

  <?= $this->renderSection('css') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?= base_url('assets') ?>/dist/img/AdminLTELogo.png" alt="AdminLTELogo"
        height="60" width="60">
    </div>


    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="<?= base_url('assets') ?>/#" role="button"><i
              class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= base_url('assets') ?>/index3.html" class="brand-link">
        <img src="<?= base_url('assets') ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
          class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">190511024</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url('assets') ?>/dist/img/profile.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="<?= base_url('assets') ?>/#" class="d-block"><?= session()->get('user_name') ?></a>
          </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?= base_url('/dashboard') ?>" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('/dashboard/company') ?>" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Companies
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('/dashboard/skill') ?>" class="nav-link">
                <i class="fas fa-circle nav-icon"></i>
                <p>
                  Skill
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('/dashboard/freelancer') ?>" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Freelancer
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('/dashboard/loker') ?>" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  Loker
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('/dashboard/event') ?>" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Event
                </p>
              </a>
            </li>
            <li>
            <li class="nav-item">
              <a href="<?= base_url('/dashboard/user') ?>" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  User List
                </p>
              </a>
            </li>
            <li>
              <hr style="border: 2px solid gray;">
            </li>
            <li class="nav-item">
              <a href="<?= base_url('/logout') ?>" onclick="return confirm('Apakah anda yakin logout?')" class="nav-link btn btn-danger">
                Logout
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
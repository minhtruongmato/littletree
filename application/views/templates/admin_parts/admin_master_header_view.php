<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Mato Creative | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>fontAwesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>dist/css/skins/skin-black-light.css">

    <!-- Google Font -->
    <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,900&amp;subset=latin-ext" rel="stylesheet">

    <!-- STYLE -->
    <link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>dataTable/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo site_url('assets/') ?>sass/admin/datatable.css">


    <!-- Library JS called-->
    <!-- jQuery 3 -->
    <script src="<?php echo site_url('assets/lib/') ?>jquery/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo site_url('assets/lib/') ?>bootstrap/js/bootstrap.min.js"></script>
    <!-- fastClick -->
    <script src="<?php echo site_url('assets/lib/') ?>fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo site_url('assets/lib/') ?>dist/js/adminlte.min.js"></script>

    <script type="text/javascript" src="<?php echo site_url('tinymce/tinymce.min.js'); ?>"></script>
    <!-- SCRIPT -->
    <script src="<?php echo site_url('assets/lib/') ?>dataTable/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo site_url('assets/lib/') ?>dataTable/js/dataTables.bootstrap.min.js"></script>
</head>

<body class="hold-transition skin-black-light sidebar-mini">
<div class="wrapper">
    <?php if($this->ion_auth->logged_in()): ?>
    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url('admin/dashboard') ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>C</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>Controller</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->

                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo site_url('assets/lib/dist/img/user2-160x160.jpg') ?>"
                                 class="user-image" alt="User Image">
                            <span class="hidden-xs">Alexander Pierce</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo site_url('assets/lib/dist/img/user2-160x160.jpg') ?>"
                                     class="img-circle" alt="User Image">

                                <p>
                                    Alexander Pierce - Web Developer
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <!--
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>

                            </li>-->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <!--
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                -->
                                <div class="pull-right">
                                    <a href="javascript:void(0);" class="btn btn-default btn-flat" onclick="logout();">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <?php endif; ?>


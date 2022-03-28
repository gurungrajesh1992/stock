<!DOCTYPE html>
<html lang="en">
<?php
$site_settings = $this->session->userdata('site_settings');
?>
<?php $this->load->view('layouts/admin/partials/head'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?php echo $site_settings->fav; ?>" alt="AdminLTELogo" height="60" width="60">
    </div>
    <!-- Navbar -->
    <?php $this->load->view('layouts/admin/partials/nav'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php $this->load->view('layouts/admin/partials/aside'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?php echo $title; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
                <li class="breadcrumb-item active"><?php echo $title; ?></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
          <?php if ($this->session->flashdata('success')) { ?>
            <div class="row mb-2">
              <div class="col-sm-12">
                <div class="success_message">
                  <a class="clse">X</a>
                  <h4><?php echo $this->session->flashdata('success'); ?></h4>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($this->session->flashdata('error')) { ?>
            <div class="row mb-2">
              <div class="col-sm-12">
                <div class="error_message">
                  <a class="clse">X</a>
                  <h4><?php echo $this->session->flashdata('error'); ?></h4>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if (validation_errors()) { ?>
            <div class="row mb-2">
              <div class="col-sm-12">
                <div class="error_message">
                  <a class="clse">X</a>
                  <h4><?php echo validation_errors(); ?></h4>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <?php $this->load->view($page); ?>
    </div>

    <?php $this->load->view('layouts/admin/partials/footer'); ?>


    <aside class="control-sidebar control-sidebar-dark">

    </aside>

  </div>


  <?php echo $this->load->view('layouts/admin/partials/script'); ?>
</body>

</html>
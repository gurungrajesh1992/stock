<?php
$site_settings = $this->session->userdata('site_settings');
$current_user = $this->session->userdata('current_user');
?>
<style>
  .user-panel img {
    object-fit: cover;
    width: 40px !important;
    height: 40px !important;
  }
</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?php echo $site_settings->fav ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><?php echo $site_settings->site_name ?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo (isset($current_user->profile_image) && $current_user->profile_image != '') ? $current_user->profile_image : $site_settings->fav; ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $current_user->full_name ?></a>
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
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?php echo base_url('dashboard'); ?>" class="nav-link active">
            <i class="nav-icon fas fa-home fa-spin"></i>
            <p>
              Dashboard
              <span class="right badge badge-danger">Home</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Supplier
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('supplier/admin/all'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('supplier/admin/form'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Clients
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('client/admin/all'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('client/admin/form'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Content
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('content/admin/all'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('content/admin/form'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('content/admin/menu'); ?>" class="nav-link">
            <i class="nav-icon fas fa-bars fa-spin"></i>
            <p>
              Menu
              <span class="right badge badge-danger">Menu</span>
            </p>
          </a>
        </li>
        <li class="nav-header">Product</li>
        <li class="nav-item">
          <a href="#" class="nav-link ">
            <i class="nav-icon fa fa-list-alt"></i>
            <p>
              Item Category
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('categories/admin/all'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('categories/admin/form'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link ">
            <i class="nav-icon fa fa-list-alt"></i>
            <p>
              Item
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('items/admin/all'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('items/admin/form'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link ">
            <i class="nav-icon fa fa-list-alt"></i>
            <p>
              Item Accessories
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('item_accessories/admin/all'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('item_accessories/admin/form'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link ">
            <i class="nav-icon fa fa-list-alt"></i>
            <p>
              Item AMC
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('item_amc/admin/all'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('item_amc/admin/form'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link ">
            <i class="nav-icon fa fa-list-alt"></i>
            <p>
              Item Insurance
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('item_insurance/admin/all'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('item_insurance/admin/form'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">Organization</li>
        <li class="nav-item">
          <a href="#" class="nav-link ">
            <i class="nav-icon fa fa-calendar"></i>
            <p>
              Fiscal Year
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('fiscal_year/admin/all'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('fiscal_year/admin/form'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link ">
            <i class="nav-icon fa fa-map-marker"></i>
            <p>
              Location
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('location/admin/all'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('location/admin/form'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link ">
            <i class="nav-icon fa fa-flag"></i>
            <p>
              Country
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('country/admin/all'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('country/admin/form'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-address-card"></i>
            <p>
              Designation
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('designation/admin/all'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('designation/admin/form'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-building"></i>
            <p>
              Department
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('department/admin/all'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('department/admin/form'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">Operation</li>
        <li class="nav-item">
          <a href="#" class="nav-link ">
            <i class="nav-icon fa fa-square"></i>
            <p>
              Opening Form
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('opening_master/admin/all'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('opening_master/admin/form'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link ">
            <i class="nav-icon fa fa-paper-plane"></i>
            <p>
              Requisition
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('requisition/admin/all'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('requisition/admin/form'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link ">
            <i class="nav-icon fa fa-paper-plane"></i>
            <p>
              Issue Slip
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('issue/admin/all'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('issue/admin/form'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link ">
            <i class="nav-icon fa fa-paper-plane"></i>
            <p>
              Issue Return
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('issue_return/admin/all'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('issue_return/admin/form'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link ">
            <i class="nav-icon fa fa-paper-plane"></i>
            <p>
              MRN
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('mrn/admin/all'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('mrn/admin/form'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link ">
            <i class="nav-icon fa fa-paper-plane"></i>
            <p>
              Purchase Request
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('purchase_request/admin/all'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('purchase_request/admin/form'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link ">
            <i class="nav-icon fa fa-paper-plane"></i>
            <p>
              Purchase Order
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('purchase_order/admin/all'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('purchase_order/admin/form'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link ">
            <i class="nav-icon fa-solid fa fa-file-invoice-dollar"></i>
            <p>
              Invoice
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('invoice/admin/all'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('invoice/admin/form'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">User Management</li>
        <li class="nav-item">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-address-card"></i>
            <p>
              Role
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('user_role/admin/all'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('user_role/admin/form'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-user"></i>
            <p>
              User
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('user/admin/all'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('user/admin/form'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Staff
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('staff/admin/all'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('staff/admin/form'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('staff_dep_deg/admin/all'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Staff Desig/depart</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">Settings</li>
        <li class="nav-item">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              Site Settings
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('site_settings/admin'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Site Settings Form</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
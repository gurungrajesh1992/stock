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
        <?php
        $check_supplier = $this->crud_model->get_module_for_role('supplier');
        if ($check_supplier == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Supplier
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_supplier_all = $this->crud_model->get_module_function_for_role('supplier', 'all');
              if ($check_supplier_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('supplier/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_supplier_form = $this->crud_model->get_module_function_for_role('supplier', 'form');
              if ($check_supplier_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('supplier/admin/form'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>

        <?php
        $check_client = $this->crud_model->get_module_for_role('client');
        if ($check_client == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Client
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_client_all = $this->crud_model->get_module_function_for_role('client', 'all');
              if ($check_client_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('client/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_client_form = $this->crud_model->get_module_function_for_role('client', 'form');
              if ($check_client_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('client/admin/form'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>

        <?php
        $check_content = $this->crud_model->get_module_for_role('content');
        if ($check_content == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Content
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_content_all = $this->crud_model->get_module_function_for_role('content', 'all');
              if ($check_content_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('content/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_content_form = $this->crud_model->get_module_function_for_role('content', 'form');
              if ($check_content_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('content/admin/form'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>

        <?php
        $check_content_menu = $this->crud_model->get_module_function_for_role('content', 'menu');
        if ($check_content_menu == true) {
        ?>
          <li class="nav-item">
            <a href="<?php echo base_url('content/admin/menu'); ?>" class="nav-link">
              <i class="nav-icon fas fa-bars fa-spin"></i>
              <p>
                Menu
                <span class="right badge badge-danger">Menu</span>
              </p>
            </a>
          </li>
        <?php } ?>
        <li class="nav-header">Product</li>
        <?php
        $check_depreciation_para = $this->crud_model->get_module_for_role('depreciation_para');
        if ($check_depreciation_para == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-list-alt"></i>
              <p>
                Depreciation Rate
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_depreciation_para_all = $this->crud_model->get_module_function_for_role('depreciation_para', 'all');
              if ($check_depreciation_para_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('depreciation_para/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_depreciation_para_form = $this->crud_model->get_module_function_for_role('depreciation_para', 'fprm');
              if ($check_depreciation_para_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('depreciation_para/admin/form'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>

        <?php
        $check_categories = $this->crud_model->get_module_for_role('categories');
        if ($check_categories == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-list-alt"></i>
              <p>
                Item Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_categories_all = $this->crud_model->get_module_function_for_role('categories', 'all');
              if ($check_categories_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('categories/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_categories_form = $this->crud_model->get_module_function_for_role('categories', 'form');
              if ($check_categories_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('categories/admin/form'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php  } ?>
            </ul>
          </li>
        <?php } ?>

        <?php
        $check_items = $this->crud_model->get_module_for_role('items');
        if ($check_items == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-list-alt"></i>
              <p>
                Item
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_items_all = $this->crud_model->get_module_function_for_role('items', 'all');
              if ($check_items_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('items/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_items_form = $this->crud_model->get_module_function_for_role('items', 'form');
              if ($check_items_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('items/admin/form'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>

        <?php
        $check_item_accessories = $this->crud_model->get_module_for_role('item_accessories');
        if ($check_item_accessories == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-list-alt"></i>
              <p>
                Item Accessories
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_item_accessories_all = $this->crud_model->get_module_function_for_role('item_accessories', 'all');
              if ($check_item_accessories_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('item_accessories/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_item_accessories_form = $this->crud_model->get_module_function_for_role('item_accessories', 'form');
              if ($check_item_accessories_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('item_accessories/admin/form'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>

        <?php
        $check_item_amc = $this->crud_model->get_module_for_role('item_amc');
        if ($check_item_amc == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-list-alt"></i>
              <p>
                Item AMC
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_item_amc_all = $this->crud_model->get_module_function_for_role('item_amc', 'all');
              if ($check_item_amc_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('item_amc/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_item_amc_form = $this->crud_model->get_module_function_for_role('item_amc', 'form');
              if ($check_item_amc_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('item_amc/admin/form'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>

        <?php
        $check_item_insurance = $this->crud_model->get_module_for_role('item_insurance');
        if ($check_item_insurance == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-list-alt"></i>
              <p>
                Item Insurance
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_item_insurance_all = $this->crud_model->get_module_function_for_role('item_insurance', 'all');
              if ($check_item_insurance_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('item_insurance/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_item_insurance_form = $this->crud_model->get_module_function_for_role('item_insurance', 'form');
              if ($check_item_insurance_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('item_insurance/admin/form'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>
        <li class="nav-header">Organization</li>
        <?php
        $check_fiscal_year = $this->crud_model->get_module_for_role('fiscal_year');
        if ($check_fiscal_year == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-calendar"></i>
              <p>
                Fiscal Year
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_fiscal_year_all = $this->crud_model->get_module_function_for_role('fiscal_year', 'all');
              if ($check_fiscal_year_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('fiscal_year/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_fiscal_year_form = $this->crud_model->get_module_function_for_role('fiscal_year', 'form');
              if ($check_fiscal_year_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('fiscal_year/admin/form'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>
        <?php
        $check_location = $this->crud_model->get_module_for_role('location');
        if ($check_location == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-map-marker"></i>
              <p>
                Location
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_location_all = $this->crud_model->get_module_function_for_role('location', 'all');
              if ($check_location_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('location/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_location_form = $this->crud_model->get_module_function_for_role('location', 'form');
              if ($check_location_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('location/admin/form'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>

        <?php
        $check_country = $this->crud_model->get_module_for_role('country');
        if ($check_country == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-flag"></i>
              <p>
                Country
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_country_all = $this->crud_model->get_module_function_for_role('country', 'all');
              if ($check_country_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('country/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_country_form = $this->crud_model->get_module_function_for_role('country', 'form');
              if ($check_country_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('country/admin/form'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>

        <?php
        $check_designation = $this->crud_model->get_module_for_role('designation');
        if ($check_designation == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Designation
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_designation_all = $this->crud_model->get_module_function_for_role('designation', 'all');
              if ($check_designation_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('designation/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_designation_form = $this->crud_model->get_module_function_for_role('designation', 'form');
              if ($check_designation_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('designation/admin/form'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>

        <?php
        $check_department = $this->crud_model->get_module_for_role('department');
        if ($check_department == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Department
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_department_all = $this->crud_model->get_module_function_for_role('department', 'all');
              if ($check_department_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('department/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_department_form = $this->crud_model->get_module_function_for_role('department', 'form');
              if ($check_department_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('department/admin/form'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>
        <li class="nav-header">Operation</li>
        <?php
        $check_opening_master = $this->crud_model->get_module_for_role('opening_master');
        if ($check_opening_master == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-square"></i>
              <p>
                Opening Form
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_opening_master_all = $this->crud_model->get_module_function_for_role('opening_master', 'all');
              if ($check_opening_master_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('opening_master/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_opening_master_form = $this->crud_model->get_module_function_for_role('opening_master', 'form');
              if ($check_opening_master_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('opening_master/admin/form'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>

        <?php
        $check_requisition = $this->crud_model->get_module_for_role('requisition');
        if ($check_requisition == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-paper-plane"></i>
              <p>
                Requisition
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_requisition_all = $this->crud_model->get_module_function_for_role('requisition', 'all');
              if ($check_requisition_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('requisition/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_requisition_form = $this->crud_model->get_module_function_for_role('requisition', 'form');
              if ($check_requisition_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('requisition/admin/form'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>

        <?php
        $check_issue = $this->crud_model->get_module_for_role('issue');
        if ($check_issue == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-paper-plane"></i>
              <p>
                Issue Slip
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_issue_all = $this->crud_model->get_module_function_for_role('issue', 'all');
              if ($check_issue_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('issue/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_issue_form = $this->crud_model->get_module_function_for_role('issue', 'form');
              if ($check_issue_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('issue/admin/form'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>

        <?php
        $check_issue_return = $this->crud_model->get_module_for_role('issue_return');
        if ($check_issue_return == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-paper-plane"></i>
              <p>
                Issue Return
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_issue_return_all = $this->crud_model->get_module_function_for_role('issue_return', 'all');
              if ($check_issue_return_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('issue_return/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_issue_return_form = $this->crud_model->get_module_function_for_role('issue_return', 'form');
              if ($check_issue_return_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('issue_return/admin/form'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>

        <?php
        $check_mrn = $this->crud_model->get_module_for_role('mrn');
        if ($check_mrn == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-paper-plane"></i>
              <p>
                MRN
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_mrn_all = $this->crud_model->get_module_function_for_role('mrn', 'all');
              if ($check_mrn_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('mrn/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_mrn_form = $this->crud_model->get_module_function_for_role('mrn', 'form');
              if ($check_mrn_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('mrn/admin/form'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>

        <?php
        $check_purchase_request = $this->crud_model->get_module_for_role('purchase_request');
        if ($check_purchase_request == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-paper-plane"></i>
              <p>
                Purchase Request
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_purchase_request_all = $this->crud_model->get_module_function_for_role('purchase_request', 'all');
              if ($check_purchase_request_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('purchase_request/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_purchase_request_form = $this->crud_model->get_module_function_for_role('purchase_request', 'form');
              if ($check_purchase_request_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('purchase_request/admin/form'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>

        <?php
        $check_purchase_order = $this->crud_model->get_module_for_role('purchase_order');
        if ($check_purchase_order == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-paper-plane"></i>
              <p>
                Purchase Order
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_purchase_order_all = $this->crud_model->get_module_function_for_role('purchase_order', 'all');
              if ($check_purchase_order_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('purchase_order/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_purchase_order_form = $this->crud_model->get_module_function_for_role('purchase_order', 'form');
              if ($check_purchase_order_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('purchase_order/admin/form'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>

        <?php
        $check_invoice = $this->crud_model->get_module_for_role('invoice');
        if ($check_invoice == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa-solid fa fa-file-invoice-dollar"></i>
              <p>
                Invoice
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_invoice_all = $this->crud_model->get_module_function_for_role('invoice', 'all');
              if ($check_invoice_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('invoice/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_invoice_form = $this->crud_model->get_module_function_for_role('invoice', 'form');
              if ($check_invoice_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('invoice/admin/form'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>
        <?php
        $check_grn = $this->crud_model->get_module_for_role('grn');
        if ($check_grn == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa-solid fa fa-file-invoice-dollar"></i>
              <p>
                GRN
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_charge_parameter = $this->crud_model->get_module_function_for_role('charge_parameter', 'all');
              if ($check_charge_parameter == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('charge_parameter/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Charge Parameters</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_grn_all = $this->crud_model->get_module_function_for_role('grn', 'all');
              if ($check_grn_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('grn/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_grn_form = $this->crud_model->get_module_function_for_role('grn', 'form');
              if ($check_grn_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('grn/admin/direct_add'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>

        <?php
        $check_grn_return = $this->crud_model->get_module_for_role('grn_return');
        if ($check_grn_return == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa-solid fa fa-file-invoice-dollar"></i>
              <p>
                GRN Return
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_grn_return_all = $this->crud_model->get_module_function_for_role('grn_return', 'all');
              if ($check_grn_return_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('grn_return/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_grn_return_form = $this->crud_model->get_module_function_for_role('grn_return', 'form');
              if ($check_grn_return_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('grn_return/admin/form'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>

        <?php
        $check_sales = $this->crud_model->get_module_for_role('sales');
        if ($check_sales == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa-solid fa fa-file-invoice-dollar"></i>
              <p>
                Sales
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_sales_all = $this->crud_model->get_module_function_for_role('sales', 'all');
              if ($check_sales_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('sales/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_sales_form = $this->crud_model->get_module_function_for_role('sales', 'form');
              if ($check_sales_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('sales/admin/add'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_gate_pass_all = $this->crud_model->get_module_function_for_role('gate_pass', 'all');
              if ($check_gate_pass_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('gate_pass/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Gate Pass</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>

        <?php
        $check_sales_return = $this->crud_model->get_module_for_role('sales_return');
        if ($check_sales_return == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa-solid fa fa-file-invoice-dollar"></i>
              <p>
                Sales Return
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_sales_return_all = $this->crud_model->get_module_function_for_role('sales_return', 'all');
              if ($check_sales_return_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('sales_return/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_sales_return_form = $this->crud_model->get_module_function_for_role('sales_return', 'form');
              if ($check_sales_return_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('sales_return/admin/add'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>

        <?php
        $check_scrap = $this->crud_model->get_module_for_role('scrap');
        if ($check_scrap == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa-solid fa fa-file-invoice-dollar"></i>
              <p>
                Item Scarp
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_scrap_all = $this->crud_model->get_module_function_for_role('scrap', 'all');
              if ($check_scrap_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('scrap/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_scrap_form = $this->crud_model->get_module_function_for_role('scrap', 'form');
              if ($check_scrap_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('scrap/admin/add'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>

        <?php
        $check_location_transfer = $this->crud_model->get_module_for_role('location_transfer');
        if ($check_location_transfer == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa-solid fa fa-map-pin"></i>
              <p>
                Location Transfer
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_location_transfer_all = $this->crud_model->get_module_function_for_role('location_transfer', 'all');
              if ($check_location_transfer_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('location_transfer/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_location_transfer_form = $this->crud_model->get_module_function_for_role('location_transfer', 'form');
              if ($check_location_transfer_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('location_transfer/admin/form'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>
        <?php
        $check_year_end = $this->crud_model->get_module_for_role('year_end');
        if ($check_year_end == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-calendar"></i>
              <p>
                Year End
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_year_end_all = $this->crud_model->get_module_function_for_role('year_end', 'all');
              if ($check_year_end_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('year_end/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Generate</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_year_end_view = $this->crud_model->get_module_function_for_role('year_end', 'view');
              if ($check_year_end_view == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('year_end/admin/view'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Current Value</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>
        <li class="nav-header">User Management</li>
        <?php
        $check_user_role = $this->crud_model->get_module_for_role('user_role');
        if ($check_user_role == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Role
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_user_role_all = $this->crud_model->get_module_function_for_role('user_role', 'all');
              if ($check_user_role_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('user_role/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_user_role_form = $this->crud_model->get_module_function_for_role('user_role', 'form');
              if ($check_user_role_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('user_role/admin/form'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>

        <?php
        $check_module = $this->crud_model->get_module_for_role('module');
        if ($check_module == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Permission
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_module_all = $this->crud_model->get_module_function_for_role('module', 'all');
              if ($check_module_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('module/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Modules</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_module_form = $this->crud_model->get_module_function_for_role('module', 'form');
              if ($check_module_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('module/admin/form'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Module</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_module_role_function = $this->crud_model->get_module_function_for_role('module', 'role_function');
              if ($check_module_role_function == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('module/admin/role_function'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Role Permission</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>

        <?php
        $check_user = $this->crud_model->get_module_for_role('user');
        if ($check_user == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_user_all = $this->crud_model->get_module_function_for_role('user', 'all');
              if ($check_user_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('user/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_user_form = $this->crud_model->get_module_function_for_role('user', 'form');
              if ($check_user_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('user/admin/form'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>

        <?php
        $check_staff = $this->crud_model->get_module_for_role('staff');
        if ($check_staff == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Staff
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_staff_all = $this->crud_model->get_module_function_for_role('staff', 'all');
              if ($check_staff_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('staff/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_staff_form = $this->crud_model->get_module_function_for_role('staff', 'form');
              if ($check_staff_form == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('staff/admin/form'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
              <?php } ?>
              <?php
              $check_staff_dep_deg_all = $this->crud_model->get_module_function_for_role('staff_dep_deg', 'all');
              if ($check_staff_dep_deg_all == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('staff_dep_deg/admin/all'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Staff Desig/depart</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>
        <li class="nav-header">Settings</li>
        <?php
        $check_site_settings = $this->crud_model->get_module_for_role('site_settings');
        if ($check_site_settings == true) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Site Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              $check_site_settings_index = $this->crud_model->get_module_function_for_role('site_settings', 'index');
              if ($check_site_settings_index == true) {
              ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('site_settings/admin'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Site Settings Form</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<?php include('search.php');?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <?php
              $check_location_transfer_form = $this->crud_model->get_module_function_for_role('location_transfer', 'form');
              if ($check_location_transfer_form == true) {
              ?>
                <a href="<?php echo base_url($redirect . '/admin/form'); ?>" class="btn btn-sm btn-primary">Add New</a>
              <?php } ?>
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Transfer Code</th>
                  <th>From Location</th>
                  <th>To Location</th>
                  <th>Is Cancelled</th>
                  <th>Is Approved</th>
                  <th>Is Posted</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                <?php
                if ($items) {
                  foreach ($items as $key => $value) {

                    $from_loc = $this->crud_model->get_where_single_order_by('location_para', array('id' => $value->from_loc), 'id', 'DECS');
                    $to_loc = $this->crud_model->get_where_single_order_by('location_para', array('id' => $value->to_loc), 'id', 'DECS');
                    if ($value->status == '1') {
                      $status = 'Active';
                    } else {
                      $status = 'Inactive';
                    }

                    if ($value->cancel_tag == '1') {
                      $cancel_tag = 'Cancelled';
                    } else {
                      $cancel_tag = 'Not Cancelled';
                    }

                    if ($value->posted_tag == '1') {
                      $posted_tag = 'Posted';
                    } else {
                      $posted_tag = 'Not Posted';
                    }
                ?>
                    <tr>
                      <td><?php echo $key + 1; ?></td>
                      <td><?php echo $value->transfer_code; ?></td>
                      <td><?php echo isset($from_loc->store_name) ? $from_loc->store_name : ''; ?></td>
                      <td><?php echo isset($to_loc->store_name) ? $to_loc->store_name : ''; ?></td>

                      <td><?php echo $cancel_tag; ?></td>
                      <td><?php echo (isset($value->approved_by) && $value->approved_by != '') ? 'Approved' : 'Not Approved'; ?></td>
                      <td><?php echo $posted_tag; ?></td>
                      <td><?php echo $status; ?></td>
                      <td>
                        <?php
                        $check_location_transfer_form = $this->crud_model->get_module_function_for_role('location_transfer', 'form');
                        if ($check_location_transfer_form == true) {
                        ?>
                          <?php echo (isset($value->approved_by) && $value->approved_by != '') ? '' : '<a href="' . base_url($redirect . '/admin/form/' . $value->id) . '" class="btn btn-sm btn-primary" style="margin: 5px;">Edit</a>'; ?>
                        <?php } ?>
                        <?php
                        $check_location_transfer_view = $this->crud_model->get_module_function_for_role('location_transfer', 'view');
                        if ($check_location_transfer_view == true) {
                        ?>
                          <a href="<?php echo base_url($redirect . '/admin/view/' . $value->id); ?>" class="btn btn-sm btn-info" style="margin: 5px;">View</a>
                        <?php } ?>
                        <?php
                        $check_location_transfer_soft_delete = $this->crud_model->get_module_function_for_role('location_transfer', 'soft_delete');
                        if ($check_location_transfer_soft_delete == true) {
                        ?>
                          <?php echo (isset($value->approved_by) && $value->approved_by != '') ? '' : '<a href="' . base_url($redirect . '/admin/soft_delete/' . $value->id) . '" class="btn btn-sm btn-danger" style="margin: 5px;">Delete</a>'; ?>
                        <?php } ?>
                      </td>
                    </tr>
                  <?php }
                } else { ?>

                  <tr>
                    <td colspan="9" style="text-align:center;">No Records Found</td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <!-- /.card-body -->
            <?php if ($items) { ?>
              <div class="card-footer clearfix">
                <!-- <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul> -->
                <?php echo $pagination; ?>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include('search.php'); ?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <?php
              $check_sales_add = $this->crud_model->get_module_function_for_role('sales', 'add');
              if ($check_sales_add == true) {
              ?>
                <a href="<?php echo base_url($redirect . '/admin/add'); ?>" class="btn btn-sm btn-primary">Add New</a>
              <?php } ?>
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Sales No</th>
                  <th>Sales Code</th>
                  <th>Client Name</th>
                  <th>Payment Type</th>
                  <th>Bank Name</th>
                  <th>Total Amt</th>
                  <th>Advance Amt</th>
                  <th>Cancelled</th>
                  <th>Approved</th>
                  <th>Posted</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                <?php
                if ($items) {
                  foreach ($items as $key => $value) {

                    $client_detaile = $this->crud_model->get_where_single_order_by('client_infos', array('id' => $value->client_id), 'id', 'DECS');

                    if ($value->status == '1') {
                      $status = 'Active';
                    } else {
                      $status = 'Inactive';
                    }

                    if ($value->cancel_tag == '1') {
                      $cancel_tag = 'Yes';
                    } else {
                      $cancel_tag = 'No';
                    }

                    if ($value->posted_tag == '1') {
                      $posted_tag = 'Yes';
                    } else {
                      $posted_tag = 'No';
                    }

                    if ($value->payment_type == 'CH') {
                      $payment_type = 'Cash';
                    } else if ($value->payment_type == 'CQ') {
                      $payment_type = 'Cheque';
                    } else {
                      $payment_type = 'Credit';
                    }


                ?>
                    <tr>
                      <td><?php echo $key + 1; ?></td>
                      <td><?php echo $value->sale_no; ?></td>
                      <td><?php echo $value->sales_code; ?></td>
                      <td><?php echo isset($client_detaile->client_name) ? $client_detaile->client_name : ''; ?></td>
                      <td><?php echo $payment_type; ?></td>

                      <td><?php echo $value->bank_name; ?></td>
                      <td><?php echo $value->total; ?></td>
                      <td><?php echo $value->advance_amt; ?></td>

                      <td><?php echo $cancel_tag; ?></td>
                      <td><?php echo (isset($value->approved_by) && $value->approved_by != '') ? 'Yes' : 'No'; ?></td>
                      <td><?php echo $posted_tag; ?></td>
                      <td>
                        <?php if ($value->sale_no == NULL) { ?>
                          <?php
                          $check_sales_direct_add = $this->crud_model->get_module_function_for_role('sales', 'direct_add');
                          if ($check_sales_direct_add == true) {
                          ?>
                            <?php echo (isset($value->approved_by) && $value->approved_by != '') ? '' : '<a href="' . base_url($redirect . '/admin/direct_add/' . $value->id) . '" class="btn btn-sm btn-primary" style="margin: 5px;">Edit</a>'; ?>
                          <?php }
                        } else { ?>
                          <?php
                          $check_sales_edit = $this->crud_model->get_module_function_for_role('sales', 'edit');
                          if ($check_sales_edit == true) {
                          ?>
                            <?php echo (isset($value->approved_by) && $value->approved_by != '') ? '' : '<a href="' . base_url($redirect . '/admin/edit/' . $value->id) . '" class="btn btn-sm btn-primary" style="margin: 5px;">Edit</a>'; ?>
                        <?php }
                        } ?>

                        <?php
                        $check_sales_view = $this->crud_model->get_module_function_for_role('sales', 'view');
                        if ($check_sales_view == true) {
                        ?>
                          <?php echo (isset($value->approved_by) && $value->approved_by != '') ? '<a href="' . base_url($redirect . '/admin/view/' . $value->id) . '" class="btn btn-sm btn-info" style="margin: 5px;">View</a>' : '<a href="' . base_url($redirect . '/admin/view/' . $value->id) . '" class="btn btn-sm btn-info" style="margin: 5px;">View</a>'; ?>
                        <?php } ?>

                        <?php
                        $check_sales_soft_delete = $this->crud_model->get_module_function_for_role('sales', 'soft_delete');
                        if ($check_sales_soft_delete == true) {
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
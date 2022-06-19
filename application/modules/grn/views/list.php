<?php include('search.php'); ?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <?php
              $check_grn_direct_add = $this->crud_model->get_module_function_for_role('grn', 'direct_add');
              if ($check_grn_direct_add == true) {
              ?>
                <a href="<?php echo base_url($redirect . '/admin/direct_add'); ?>" class="btn btn-sm btn-primary">Add New</a>
              <?php } ?>
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <th>#</th>
                  <th>GRN No</th>
                  <th>Date</th>
                  <th>Supplier</th>
                  <th>Type</th>
                  <th>Transaction No</th>
                  <th>Payment Type</th>
                  <th>Bank</th>
                  <th>Advanced</th>
                  <th>Total</th>
                  <th>discount</th>
                  <th>Sub Total</th>
                  <th>Vat</th>
                  <th>Grand Total</th>
                  <th>Extra charge</th>
                  <th>Is Cancelled</th>
                  <th>Is Approved</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                <?php
                if ($items) {
                  foreach ($items as $key => $value) {

                    $supplier_detail = $this->crud_model->get_where_single_order_by('supplier_infos', array('id' => $value->supplier_id), 'id', 'DECS');
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
                ?>
                    <tr>
                      <td><?php echo $key + 1; ?></td>
                      <td><?php echo $value->grn_no; ?></td>
                      <td><?php echo $value->grn_date; ?></td>
                      <td><?php echo isset($supplier_detail->supplier_name) ? $supplier_detail->supplier_name : ''; ?></td>
                      <td><?php echo $value->type; ?></td>
                      <td><?php echo $value->type_no; ?></td>
                      <td><?php echo $value->payment_type; ?></td>
                      <td><?php echo $value->bank_name; ?></td>
                      <td><?php echo $value->advance_paid; ?></td>
                      <td><?php echo $value->total; ?></td>
                      <td><?php echo $value->discount_amt . '( ' . $value->discount_per . ' % )'; ?></td>
                      <td><?php echo $value->sub_total; ?></td>
                      <td><?php echo $value->vat_amount . '( ' . $value->vat_percent . ' % )'; ?></td>
                      <td><?php echo $value->grand_total; ?></td>
                      <td><?php echo $value->total_charge; ?></td>
                      <td><?php echo $cancel_tag; ?></td>
                      <td><?php echo (isset($value->approved_by) && $value->approved_by != '') ? 'Yes' : 'No'; ?></td>
                      <td>
                        <?php if ($value->type == 'DR') { ?>
                          <?php
                          if ($check_grn_direct_add == true) {
                          ?>
                            <?php echo (isset($value->approved_by) && $value->approved_by != '') ? '' : '<a href="' . base_url($redirect . '/admin/direct_add/' . $value->id) . '" class="btn btn-sm btn-primary" style="margin: 5px;">Edit</a>'; ?>
                          <?php }
                        } else { ?>
                          <?php
                          $check_grn_edit = $this->crud_model->get_module_function_for_role('grn', 'edit');
                          if ($check_grn_edit == true) {
                          ?>
                            <?php echo (isset($value->approved_by) && $value->approved_by != '') ? '' : '<a href="' . base_url($redirect . '/admin/edit/' . $value->id) . '" class="btn btn-sm btn-primary" style="margin: 5px;">Edit</a>'; ?>
                        <?php }
                        } ?>

                        <?php
                        $check_grn_view = $this->crud_model->get_module_function_for_role('grn', 'view');
                        if ($check_grn_view == true) {
                        ?>
                          <a href="<?php echo base_url($redirect . '/admin/view/' . $value->id) ?>" class="btn btn-sm btn-info" style="margin: 5px;">View</a>
                        <?php } ?>
                        <?php
                        $check_grn_soft_delete = $this->crud_model->get_module_function_for_role('grn', 'soft_delete');
                        if ($check_grn_soft_delete == true) {
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
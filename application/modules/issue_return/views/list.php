<?php include('search.php'); ?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <?php
              $check_issue_return_form = $this->crud_model->get_module_function_for_role('issue_return', 'form');
              if ($check_issue_return_form == true) {
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
                  <th>Issue Return No</th>
                  <th>Issue No</th>
                  <th>Return Date</th>
                  <th>Department</th>
                  <th>Staff </th>
                  <th>Issued By</th>
                  <th>Issued On</th>
                  <th>Is Approved</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                <?php
                if ($items) {
                  foreach ($items as $key => $value) {

                    $depart_detail = $this->crud_model->get_where_single_order_by('department_para', array('id' => $value->department_id), 'id', 'DECS');
                    $staff_detail = $this->crud_model->get_where_single_order_by('staff_infos', array('id' => $value->staff_id), 'id', 'DECS');
                    // $user_detail = $this->crud_model->joinDataSingle('users', 'staff_infos', array('users.status' => '1', 'staff_infos.status' => '1', 'users.id' => $value->requested_by), 'staff_id', 'id', 'full_name');
                    if ($value->status == '1') {
                      $status = 'Active';
                    } else {
                      $status = 'Inactive';
                    }

                    // if ($value->cancel_tag == '1') {
                    //   $cancel_tag = 'Yes';
                    // } else {
                    //   $cancel_tag = 'No';
                    // }
                ?>
                    <tr>
                      <td><?php echo $key + 1; ?></td>
                      <td><?php echo $value->issue_return_no; ?></td>
                      <td><?php echo $value->issue_no; ?></td>
                      <td><?php echo $value->return_date; ?></td>
                      <td><?php echo isset($depart_detail->department_name) ? $depart_detail->department_name : ''; ?></td>
                      <td><?php echo isset($staff_detail->full_name) ? $staff_detail->full_name : ''; ?></td>
                      <td><?php echo $value->prepared_by; ?></td>
                      <td><?php echo $value->prepared_date; ?></td>
                      <td><?php echo (isset($value->approved_by) && $value->approved_by != '') ? 'Yes' : 'No'; ?></td>
                      <td>
                        <?php if ($value->issue_return_no == NULL) { ?>
                          <?php
                          $check_issue_return_direct_add = $this->crud_model->get_module_function_for_role('issue_return', 'direct_add');
                          if ($check_issue_return_direct_add == true) {
                          ?>
                            <?php echo (isset($value->approved_by) && $value->approved_by != '') ? '' : '<a href="' . base_url($redirect . '/admin/direct_add/' . $value->id) . '" class="btn btn-sm btn-primary" style="margin: 5px;">Edit</a>'; ?>
                          <?php } ?>
                        <?php } else { ?>
                          <?php
                          $check_issue_return_edit = $this->crud_model->get_module_function_for_role('issue_return', 'edit');
                          if ($check_issue_return_edit == true) {
                          ?>
                            <?php echo (isset($value->approved_by) && $value->approved_by != '') ? '' : '<a href="' . base_url($redirect . '/admin/edit/' . $value->id) . '" class="btn btn-sm btn-primary" style="margin: 5px;">Edit</a>'; ?>
                        <?php }
                        } ?>

                        <?php if ($value->issue_return_no == NULL) { ?>
                          <?php
                          $check_issue_return_direct_view = $this->crud_model->get_module_function_for_role('issue_return', 'direct_view');
                          if ($check_issue_return_direct_view == true) {
                          ?>
                            <?php echo (isset($value->approved_by) && $value->approved_by != '') ? '<a href="' . base_url($redirect . '/admin/direct_view/' . $value->id) . '" class="btn btn-sm btn-info" style="margin: 5px;">View</a>' : '<a href="' . base_url($redirect . '/admin/direct_view/' . $value->id) . '" class="btn btn-sm btn-info" style="margin: 5px;">View</a>'; ?>
                          <?php }
                        } else { ?>
                          <?php
                          $check_issue_return_view = $this->crud_model->get_module_function_for_role('issue_return', 'view');
                          if ($check_issue_return_view == true) {
                          ?>
                            <?php echo (isset($value->approved_by) && $value->approved_by != '') ? '<a href="' . base_url($redirect . '/admin/view/' . $value->id) . '" class="btn btn-sm btn-info" style="margin: 5px;">View</a>' : '<a href="' . base_url($redirect . '/admin/view/' . $value->id) . '" class="btn btn-sm btn-info" style="margin: 5px;">View</a>'; ?>
                        <?php }
                        } ?>


                        <?php
                        $check_issue_return_soft_delete = $this->crud_model->get_module_function_for_role('issue_return', 'soft_delete');
                        if ($check_issue_return_soft_delete == true) {
                        ?>
                          <a href="<?php echo base_url($redirect . '/admin/soft_delete/' . $value->id); ?>" class="btn btn-sm btn-danger" style="margin: 5px;">Delete</a>
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
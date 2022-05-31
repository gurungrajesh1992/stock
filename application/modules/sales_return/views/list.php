<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><a href="<?php echo base_url($redirect . '/admin/form'); ?>" class="btn btn-sm btn-primary">Add New</a></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Sales Return No</th>
                  <th>Sales No</th>
                  <th>Return Date</th>
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
                ?>
                    <tr>
                      <td><?php echo $key + 1; ?></td>
                      <td><?php echo $value->s_return_no; ?></td>
                      <td><?php echo $value->sale_no; ?></td>
                      <td><?php echo $value->sales_rtn_date; ?></td>
                      <td><?php echo $cancel_tag; ?></td>
                      <td><?php echo (isset($value->approved_by) && $value->approved_by != '') ? 'Yes' : 'No'; ?></td>
                      <td><?php echo $posted_tag; ?></td>
                      <td>
                        <?php if ($value->s_return_no == NULL) { ?>
                          <?php echo (isset($value->approved_by) && $value->approved_by != '') ? '' : '<a href="' . base_url($redirect . '/admin/direct_add/' . $value->id) . '" class="btn btn-sm btn-primary" style="margin: 5px;">Edit</a>'; ?>
                        <?php } else { ?>
                          <?php echo (isset($value->approved_by) && $value->approved_by != '') ? '' : '<a href="' . base_url($redirect . '/admin/edit/' . $value->id) . '" class="btn btn-sm btn-primary" style="margin: 5px;">Edit</a>'; ?>
                        <?php } ?>

                        <?php if ($value->s_return_no == NULL) { ?>
                          <?php echo (isset($value->approved_by) && $value->approved_by != '') ? '<a href="' . base_url($redirect . '/admin/direct_view/' . $value->id) . '" class="btn btn-sm btn-info" style="margin: 5px;">View</a>' : '<a href="' . base_url($redirect . '/admin/direct_view/' . $value->id) . '" class="btn btn-sm btn-info" style="margin: 5px;">View</a>'; ?>
                        <?php } else { ?>
                          <?php echo (isset($value->approved_by) && $value->approved_by != '') ? '<a href="' . base_url($redirect . '/admin/view/' . $value->id) . '" class="btn btn-sm btn-info" style="margin: 5px;">View</a>' : '<a href="' . base_url($redirect . '/admin/view/' . $value->id) . '" class="btn btn-sm btn-info" style="margin: 5px;">View</a>'; ?>
                        <?php } ?>

                        <?php echo (isset($value->approved_by) && $value->approved_by != '') ? '' : '<a href="' . base_url($redirect . '/admin/soft_delete/' . $value->id) . '" class="btn btn-sm btn-danger" style="margin: 5px;">Delete</a>'; ?>
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

                <?php echo $pagination; ?>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
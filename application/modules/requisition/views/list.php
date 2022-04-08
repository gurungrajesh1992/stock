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
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Requisition No</th>
                  <th>Requisition Date</th>
                  <th>Remarks</th>
                  <th>Department</th>
                  <th>Requested By</th>
                  <th>Is Cancelled</th>
                  <th>Is Approved</th>
                  <th>Items</th>
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
                ?>
                    <tr>
                      <td><?php echo $key + 1; ?></td>
                      <td><?php echo $value->requisition_no; ?></td>
                      <td><?php echo $value->requisition_date; ?></td>
                      <td><?php echo $value->remarks; ?></td>
                      <td><?php echo $value->department_id; ?></td>
                      <td><?php echo $value->requested_by; ?></td>
                      <td><?php echo $value->cancel_tag; ?></td>
                      <td><?php echo $value->approved_by; ?></td>
                      <td>Items</td>
                      <td><a href="<?php echo base_url($redirect . '/admin/form/' . $value->id); ?>">Edit</a><br><a href="<?php echo base_url($redirect . '/admin/soft_delete/' . $value->id); ?>">Delete</a></td>
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
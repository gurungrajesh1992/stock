<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><a href="<?php echo base_url('staff/admin/form'); ?>" class="btn btn-sm btn-primary">Add New</a></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Full Name</th>
                  <th>Role</th>
                  <th>Perm Address</th>
                  <th>Temp Address</th>
                  <th>Contact</th>
                  <th>Email</th>
                  <th>Nationality</th>
                  <th>Designation</th>
                  <th>Depart</th>
                  <th>Appointed Date</th>
                  <th>status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($items) {
                  foreach ($items as $key => $value) {
                    if ($value->updated_by) {
                      $updated_by = $this->db->get_where('users', array('id' => $value->updated_by))->row()->user_name;
                    } else {
                      $updated_by = '';
                    }

                    if ($value->created_by) {
                      $created_by = $this->db->get_where('users', array('id' => $value->created_by))->row()->user_name;
                    } else {
                      $created_by = '';
                    }

                    if ($value->role_id) {
                      $role = $this->db->get_where('user_role', array('id' => $value->role_id))->row()->name;
                    } else {
                      $role = '';
                    }

                    if ($value->country_code) {
                      $nationality = $this->db->get_where('country_para', array('country_code' => $value->country_code))->row()->nationality;
                    } else {
                      $nationality = '';
                    }

                    if ($value->depart_id) {
                      $depart = $this->db->get_where('department_para', array('id' => $value->depart_id))->row()->department_name;
                    } else {
                      $depart = '';
                    }

                    if ($value->status == '1') {
                      $status = "Active";
                    } else {
                      $status = "Inactive";
                    }
                ?>
                    <tr>
                      <td><?php echo $key + 1 ?></td>
                      <td><?php echo $value->full_name ?></td>
                      <td><?php echo $role ?></td>
                      <td><?php echo $value->permanent_addres ?></td>
                      <td><?php echo $value->temp_address ?></td>
                      <td><?php echo $value->contact ?></td>
                      <td><?php echo $value->email ?></td>
                      <td><?php echo $nationality ?></td>
                      <td><?php echo $value->designation_code ?></td>
                      <td><?php echo $depart ?></td>
                      <td><?php echo $value->appointed_date; ?></td>
                      <td><?php echo $status ?></td>
                      <td>
                        <a href="<?php echo base_url('staff/admin/form/' . $value->id); ?>" class="btn btn-sm btn-primary">Edit</a>
                        <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $value->id; ?>">Delete</a>
                        <a class="btn btn-sm btn-primary">Password</a>

                        <div class="modal fade" id="exampleModal<?php echo $value->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Are You Sure To Delete?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <a href="<?php echo base_url('staff/admin/soft_delete/' . $value->id); ?>" class="btn btn-primary">Yes</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>

                <?php } else { ?>
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
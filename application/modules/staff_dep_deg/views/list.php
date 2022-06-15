<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <form class="all_form" method="post" action enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Select Staff</label>
                    <select name="staff_id" class="form-control selct2" id="staff_id">
                      <option value>Select Staff</option>
                      <?php foreach ($staffs as $key => $value) { ?>
                        <option value="<?php echo $value->id; ?>" <?php echo  set_select('staff_id', $value->id);  ?>><?php echo $value->full_name; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <input type="submit" name="submit" class="form-control btn btn-sm btn-primary" id="submit" value="search">
                  </div>
                </div>
              </div>
            </form>
            <h3 class="card-title">
              <?php
              $check_staff_dep_deg_form = $this->crud_model->get_module_function_for_role('staff_dep_deg', 'form');
              if ($check_staff_dep_deg_form == true) {
              ?>
                <a href="<?php echo base_url($redirect . 'form'); ?>" class="btn btn-sm btn-primary">Add New</a>
              <?php } ?>
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Full Name</th>
                  <th>Designation</th>
                  <th>Department</th>

                  <th>Address</th>
                  <th>Contact</th>
                  <!-- <th>Photo</th>     -->

                  <th>Created</th>
                  <!-- <th>Created By</th> -->
                  <th>Updated</th>
                  <!-- <th>Updated By</th> -->
                  <th>status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($items) {
                  foreach ($items as $key => $value) {
                    $dets = $this->db->get_where('staff_infos', array('id' => $value->staff_id))->row();

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

                    if ($value->status == '1') {
                      $status = "Active";
                    } else {
                      $status = "Inactive";
                    }
                ?>
                    <tr>
                      <td><?php echo $key + 1 ?></td>
                      <td><?php echo $dets->full_name ?></td>
                      <td><?php echo $value->designation_code ?></td>
                      <td><?php echo $value->department_code ?></td>
                      <td><?php echo $dets->temp_address ?></td>
                      <td><?php echo $dets->contact ?></td>
                      <!-- <td><?php if ($dets->featured_image) { ?><img src="<?php echo $dets->featured_image; ?>" class="img-fluid" style="max-height: 150px;object-fit: contain;"><?php } ?></td>  -->
                      <td><?php echo $value->from ?></td>
                      <!-- <td><?php echo $created_by ?></td> -->
                      <td><?php echo $value->to ?></td>
                      <!-- <td><?php echo $updated_by ?></td> -->
                      <td><?php echo $status ?></td>
                      <td>
                        <?php if (isset($input) && $input == 'ss') {
                        } else {
                        ?>
                          <?php
                          if ($check_staff_dep_deg_form == true) {
                          ?>
                            <a href="<?php echo base_url($redirect . 'form/' . $value->id); ?>" class="btn btn-sm btn-primary">Edit</a>
                          <?php } ?>
                          <?php
                          $check_staff_dep_deg_soft_delete = $this->crud_model->get_module_function_for_role('staff_dep_deg', 'soft_delete');
                          if ($check_staff_dep_deg_soft_delete == true) {
                          ?>
                            <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $value->id; ?>">Delete</a>

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
                                    <a href="<?php echo base_url($redirect . 'soft_delete/' . $value->id); ?>" class="btn btn-primary">Yes</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                        <?php
                          }
                        }
                        ?>
                      </td>
                    </tr>
                  <?php } ?>

                <?php } else { ?>
                  <tr>
                    <td colspan="10" style="text-align:center;">No Records Found</td>
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
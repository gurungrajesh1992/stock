<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <?php
              $check_country_form = $this->crud_model->get_module_function_for_role('country', 'form');
              if ($check_country_form == true) {
              ?>
                <a href="<?php echo base_url($redirect . '/admin/form'); ?>" class="btn btn-sm btn-primary">Add New</a>
              <?php } ?>
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Country Code</th>
                  <th>Country Name</th>
                  <th>Nationality</th>
                  <th>Status</th>
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
                      <td><?php echo $value->country_code; ?></td>
                      <td><?php echo $value->country_name; ?></td>
                      <td><?php echo $value->nationality; ?></td>
                      <td><?php echo $status; ?></td>
                      <td>
                        <?php
                        if ($check_country_form == true) {
                        ?>
                          <a href="<?php echo base_url($redirect . '/admin/form/' . $value->id); ?>" class="btn btn-sm btn-primary" style="margin: 5px;">Edit</a>
                        <?php } ?>
                        <?php
                        $check_country_soft_delete = $this->crud_model->get_module_function_for_role('country', 'soft_delete');
                        if ($check_country_soft_delete == true) {
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
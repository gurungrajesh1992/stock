<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <?php
          $check_gate_pass_form = $this->crud_model->get_module_function_for_role('gate_pass', 'form');
          if ($check_gate_pass_form == true) {
          ?>
            <form method="post" action="<?php echo base_url($redirect . '/admin/form/') ?>">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Select Sales number</label>
                      <select name="sale_no" class="form-control selct2">
                        <?php
                        foreach ($sales_master_details as $key => $value) { ?>
                          <option value="<?php echo $value->sale_no; ?>"><?php echo $value->sale_no; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <input type="submit" name="submit" class="form-control btn btn-sm btn-primary" id="submit" value="Generate">
                    </div>
                  </div>
                </div>
              </div>
            </form>
          <?php } ?>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Gate Pass No.</th>
                  <th>Sales No</th>
                  <th>Is Cancled</th>
                  <th>Is Approved</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($items) {
                  foreach ($items as $key => $value) {

                    $gate_pass_details = $this->crud_model->get_where_single_order_by('gate_pass_details', array('gate_pass_no' => $value->gate_pass_no), 'id', 'DECS');

                    if ($value->cancel_tag == '1') {
                      $cancel_tag = 'Yes';
                    } else {
                      $cancel_tag = 'No';
                    }

                ?>
                    <tr>
                      <td><?php echo $key + 1; ?></td>
                      <td><?php echo $value->gate_pass_no; ?></td>
                      <td><?php echo $value->sales_no; ?></td>
                      <td><?php echo $cancel_tag; ?></td>
                      <td><?php echo (isset($value->approved_by) && $value->approved_by != '') ? 'Yes' : 'No'; ?></td>
                      <td>
                        <?php
                        $check_gate_pass_view = $this->crud_model->get_module_function_for_role('gate_pass', 'view');
                        if ($check_gate_pass_view == true) {
                        ?>
                          <a href=<?php echo base_url($redirect . '/admin/view/' . $value->id) ?> class="btn btn-sm btn-info" style="margin: 5px;">View</a>
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
                <?php echo $pagination; ?>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
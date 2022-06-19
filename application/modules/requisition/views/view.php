<section class="content">
  <div class="container-fluid">
    <form class="all_form" method="post" action enctype="multipart/form-data">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title"><?php echo $title ?></h3>

          <div class="card-tools">
            <?php
            $check_requisition_change_status = $this->crud_model->get_module_function_for_role('requisition', 'change_status');
            if ($check_requisition_change_status == true) {
            ?>
              <a class="btn btn-sm btn-info" id="approve_requisition" table_id="requisition_master-<?php echo $detail->id; ?>"><?php echo (isset($detail->approved_by) && $detail->approved_by != '') ? 'Approved' : 'Approve' ?></a>
            <?php } ?>
            <?php
            $check_requisition_cancel_row = $this->crud_model->get_module_function_for_role('requisition', 'cancel_row');
            if ($check_requisition_cancel_row == true) {
            ?>
              <a class="btn btn-sm btn-danger" id="cancel_requisition" table_id="requisition_master-<?php echo $detail->id; ?>"><?php echo (isset($detail->cancel_tag) && $detail->cancel_tag == '1') ? 'Cancelled' : 'Cancel' ?></a>
            <?php } ?>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Requisition No. : </label>
                <?php echo set_value('requisition_no', (((isset($requisition_no)) && $requisition_no != '') ? $requisition_no : '')); ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Requisition Date : </label>
                <?php echo set_value('requisition_date', (((isset($detail->requisition_date)) && $detail->requisition_date != '') ? $detail->requisition_date : '')); ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Staff : </label>
                <?php
                if ((isset($detail->requested_by)) && $detail->requested_by != '') {
                  $staff = $this->crud_model->get_where_single('staff_infos', array('id' => $detail->staff_id));
                  echo $staff->full_name;
                }
                ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Department : </label>
                <?php
                if ((isset($detail->department_id)) && $detail->department_id != '') {
                  $department = $this->crud_model->get_where_single('department_para', array('id' => $detail->department_id));
                  echo $department->department_name;
                }
                ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Remarks : </label>
                <?php echo (((isset($detail->remarks)) && $detail->remarks != '') ? $detail->remarks : '') ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div style="border: 1px solid #ddd;margin-bottom: 10px;"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <div class="req_item" id="items">
                    <div class=" row">
                      <div class="col-md-1">
                        <label>
                          #
                        </label>
                      </div>
                      <div class="col-md-3">
                        <label>Product</label>
                      </div>
                      <div class="col-md-2">
                        <label>Quantity</label>
                      </div>
                      <div class="col-md-6">
                        <label>Remarks</label>
                      </div>
                    </div>
                    <?php
                    if (isset($detail->requisition_no)) {
                      $childs = $this->crud_model->get_where('requisition_details', array('requisition_no' => $detail->requisition_no));
                      if ($childs) {
                        foreach ($childs as $key => $value) {
                          $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                    ?>
                          <div class="row" style="margin-bottom: 15px;">
                            <div class="col-md-1">
                              <?php echo ($key + 1) . '.'; ?>
                            </div>
                            <div class="col-md-3">
                              <?php echo $item_detail->item_name; ?>
                            </div>
                            <div class="col-md-2">
                              <?php echo $value->quantity_requested; ?>
                            </div>
                            <div class="col-md-6">
                              <?php echo $value->remark; ?>
                            </div>

                          </div>
                    <?php }
                      }
                    } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </form>
  </div>
</section>
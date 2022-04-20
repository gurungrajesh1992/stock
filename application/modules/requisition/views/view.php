<section class="content">
  <div class="container-fluid">
    <form class="all_form" method="post" action enctype="multipart/form-data">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title"><?php echo $title ?></h3>

           <div class="card-tools"> 
            <a class="btn btn-sm btn-info" id="approve_open">Approve</a>
            
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Requisition Date <span class="req">*</span></label>
                <input type="text" name="requisition_date" class="form-control" id="requisition_date" placeholder="Country Name" value="<?php echo set_value('requisition_date', (((isset($detail->requisition_date)) && $detail->requisition_date != '') ? $detail->requisition_date : '')); ?>">
                
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Department</label>
                <?php
                if((isset($detail->department_id)) && $detail->department_id != '') {
                  $department=$this->crud_model->get_where_single('department_para', array('id' =>$detail->department_id));
                }
                ?>
                <input type="text" name="department_id" class="form-control" id="department_id"value="<?php echo $department->department_name; ?>">
                
               
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Staff</label>
                 <?php
                if((isset($detail->requested_by)) && $detail->requested_by != '') {
                  $staff=$this->crud_model->get_where_single('staff_infos', array('id' =>$detail->requested_by));
                }
                ?>
                <input type="text" name="requested_by" class="form-control" id="requested_by"value="<?php echo $staff->full_name; ?>">
                
               
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Requisition No. <span class="req">*</span></label>
                <input type="text" name="requisition_no" class="form-control" id="requisition_no" placeholder="Requisition" value="<?php echo set_value('requisition_no', (((isset($requisition_no)) && $requisition_no != '') ? $requisition_no : '')); ?>" readonly>
                <?php echo form_error('requisition_no', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>remarks</label>
                <textarea name="remarks" id="remarks" class="form-control" rows="5" cols="80" autocomplete="off"><?php echo (((isset($detail->remarks)) && $detail->remarks != '') ? $detail->remarks : '')
                                                                                                                  ?></textarea>
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
                              <input type="text" name="item_name[]" class="form-control" placeholder="Item Name" value="<?php echo $item_detail->item_name; ?>" readonly>
                              <input type="hidden" name="item_code[]" class="form-control" placeholder="Item Code" value="<?php echo $value->item_code; ?>">
                            </div>
                            <div class="col-md-2">
                              <input type="number" name="quantity_requested[]" class="form-control" placeholder="Requested Quantity" value="<?php echo $value->quantity_requested; ?>" required>
                            </div>
                            <div class="col-md-6">
                              <textarea name="remark[]" class="form-control" rows="1" cols="80" autocomplete="off" placeholder="Remarks"><?php echo $value->remark; ?></textarea>
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
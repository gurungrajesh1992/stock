<section class="content">
  <div class="container-fluid">
    <form class="all_form" method="post" action enctype="multipart/form-data">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title"><?php echo $title ?></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Requisition Date <span class="req">*</span></label>
                    <input type="date" name="requisition_date" class="form-control" id="requisition_date" placeholder="Country Name" value="<?php echo set_value('requisition_date', (((isset($detail->requisition_date)) && $detail->requisition_date != '') ? $detail->requisition_date : '')); ?>">
                    <?php echo form_error('requisition_date', '<div class="error_message">', '</div>'); ?>
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
            </div>
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Select Item To Proceed</label>
                    <select name="item" class="form-control selct2" id="item">
                      <option value>Select item</option>
                      <?php foreach ($items as $key => $value) { ?>
                        <option value="<?php echo $value->item_code; ?>"><?php echo $value->item_name; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="req_item" id="items">
                    <div class="row">
                      <div class="col-md-4">
                        <label>Product</label>
                      </div>
                      <div class="col-md-4">
                        <label>Quantity</label>
                      </div>
                      <div class="col-md-4">
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
                          <div class="row">
                            <div class="col-md-4">
                              <input type="text" name="item_name[]" class="form-control" placeholder="Item Name" value="<?php echo $item_detail->item_name; ?>" readonly>
                              <input type="hidden" name="item_code[]" class="form-control" placeholder="Item Code" value="<?php echo $value->item_code; ?>">
                            </div>
                            <div class="col-md-4">
                              <input type="number" name="quantity_requested[]" class="form-control" placeholder="Requested Quantity" value="<?php echo $value->quantity_requested; ?>">
                            </div>
                            <div class="col-md-4">
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
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <input type="submit" name="submit" class="form-control btn btn-sm btn-primary" id="submit" value="Save">
                <input type="hidden" name="id" class="form-control btn btn-sm btn-primary" id="submit" value="<?php echo (((isset($detail->id)) && $detail->id != '') ? $detail->id : '') ?>">
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
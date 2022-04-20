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
            <div class="col-md-3">
              <div class="form-group">
                <label>MRN Date <span class="req">*</span></label>
                <input type="date" name="mrn_date" class="form-control" id="mrn_date" placeholder="Country Name" value="<?php echo set_value('mrn_date', (((isset($detail->mrn_date)) && $detail->mrn_date != '') ? $detail->mrn_date : '')); ?>">
                <?php echo form_error('mrn_date', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>MRN No. <span class="req">*</span></label>
                <input type="text" name="mrn_no" class="form-control" id="mrn_no" value="<?php echo set_value('mrn_no', (((isset($mrn_no)) && $mrn_no != '') ? $mrn_no : '')); ?>" readonly>
                <?php echo form_error('mrn_no', '<div class="error_message">', '</div>'); ?>
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
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Select Item To Proceed</label>
                    <select name="item" class="form-control selct2" id="item_mrn">
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
                        <label>Ordered Quantity</label>
                      </div>
                      <div class="col-md-6">
                        <label>Remarks</label>
                      </div>
                    </div>
                    <?php
                    if (isset($detail->mrn_no)) {
                      $childs = $this->crud_model->get_where('mrn_details', array('mrn_no' => $detail->mrn_no));
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
                              <input type="number" name="ordered_qty[]" class="form-control" placeholder="Ordered Quantity" value="<?php echo $value->ordered_qty; ?>" required>
                            </div>
                            <div class="col-md-5">
                              <textarea name="remark[]" class="form-control" rows="1" cols="80" autocomplete="off" placeholder="Remarks"><?php echo $value->remark; ?></textarea>
                            </div>
                            <div class="col-md-1">
                              <div class="rmv">
                                <span class="rmv_itm">X</span>
                              </div>
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
            <div class=" col-md-4">
              <div class="form-group">
                <label>Remarks</label>
                <textarea name="remarks" id="remarks" class="form-control" rows="1" cols="8" autocomplete="off"><?php echo $detail->remarks; ?></textarea>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Prepared Date <span class="req">*</span></label>
                <input type="date" name="prepared_date" class="form-control" id="prepared_date" placeholder="Country Name" value="<?php echo set_value('prepared_date', (((isset($detail->prepared_date)) && $detail->prepared_date != '') ? $detail->prepared_date : '')); ?>">
                <?php echo form_error('prepared_date', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Prepared By <span class="req">*</span></label>
                <input type="text" name="prepared_by" class="form-control" id="prepared_by" placeholder="Issueed By" value="<?php echo set_value('prepared_by', (((isset($detail->prepared_by)) && $detail->prepared_by != '') ? $detail->prepared_by : '')); ?>">
                <?php echo form_error('prepared_by', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
          </div>

          <div class=" row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">

            </div>
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
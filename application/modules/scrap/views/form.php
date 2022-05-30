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
              <div class="form-group">
                <label>Scrap Code<span class="req">*</span></label>
                <input type="text" name="scrap_code" class="form-control" id="scrap_code" placeholder="Scrap Code" value="<?php echo set_value('scrap_code', (((isset($scrap_code)) && $scrap_code != '') ? $scrap_code : '')); ?>" readonly>
                <?php echo form_error('scrap_code', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
            <!-- <div class="col-md-4">
              <div class="form-group">
                <label>Select Item<span class="req">*</span></label>
                <select name="item_code" class="form-control selct2" id="item_code">
                  <?php
                  // foreach ($items_in_stock as $key => $value) {
                  //   $item_detail = $this->crud_model->get_where_single_order_by('item_infos', array('status' => '1', 'item_code' => $value->item_code), 'id', 'DESC');
                  ?>
                    <option value="<?php //echo $value->item_code; 
                                    ?>" <?php //echo  set_select('item_code', $value->item_code, (isset($detail->item_code) && $detail->item_code == $value->item_code) ? TRUE : ''); 
                                        ?>><?php //echo $item_detail->item_name; 
                                            ?></option>
                  <?php //} 
                  ?>
                </select>
              </div>
            </div>  -->
            <div class="col-md-4">
              <div class="form-group">
                <label>Remarks</label>
                <textarea name="remarks" id="remarks" class="form-control" rows="1" cols="80" autocomplete="off"><?php echo set_value('remarks', (((isset($detail->remarks)) && $detail->remarks != '') ? $detail->remarks : '')); ?></textarea>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control selct2" id="status">
                  <option value="1" <?php echo  set_select('status', '1', (isset($detail->status) && $detail->status == '1') ? TRUE : ''); ?>>Active</option>
                  <option value="0" <?php echo  set_select('status', '0', (isset($detail->status) && $detail->status == '0') ? TRUE : ''); ?>>Inactive</option>
                </select>
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
                    <select name="item" class="form-control selct2" id="item_scrap">
                      <option value>Select item</option>
                      <?php
                      foreach ($items as $key => $value) {
                        $item_detail = $this->crud_model->get_where_single_order_by('item_infos', array('status' => '1', 'item_code' => $value->item_code), 'id', 'DESC');
                      ?>
                        <option value="<?php echo $value->item_code . ',' . $value->unit_price; ?>"><?php echo $item_detail->item_name; ?></option>
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
                      <div class="col-md-2">
                        <label>Product</label>
                      </div>
                      <div class="col-md-2">
                        <label>Type</label>
                      </div>
                      <div class="col-md-1">
                        <label>Quantity</label>
                      </div>
                      <div class="col-md-5">
                        <label>Remarks</label>
                      </div>
                      <div class="col-md-1">

                      </div>
                    </div>
                    <?php
                    if (isset($detail->scrap_code)) {
                      $childs = $this->crud_model->get_where('item_scrap_detail', array('scrap_code' => $detail->scrap_code));
                      if ($childs) {
                        foreach ($childs as $key => $value) {
                          $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                    ?>
                          <div class="row" style="margin-bottom: 15px;">
                            <div class="col-md-1">
                              <?php echo ($key + 1) . '.'; ?>
                            </div>
                            <div class="col-md-2">
                              <input type="text" name="item_name[]" class="form-control" placeholder="Item Name" value="<?php echo $item_detail->item_name; ?>" readonly>
                              <input type="hidden" name="item_code[]" class="form-control" placeholder="Item Code" value="<?php echo $value->item_code; ?>">
                              <input type="hidden" name="unit_price[]" class="form-control" placeholder="Unit Price" value="<?php echo $value->unit_price; ?>">
                            </div>
                            <div class="col-md-2">
                              <select name="type[]" class="form-control" id="type" required>
                                <option value="Scrap" <?php echo (isset($value->type) && $value->type == 'Scrap') ? 'selected' : ''; ?>>Scrap</option>
                                <option value="Damage" <?php echo (isset($value->type) && $value->type == 'Damage') ? 'selected' : ''; ?>>Damage</option>
                                <option value="Lost" <?php echo (isset($value->type) && $value->type == 'Lost') ? 'selected' : ''; ?>>Lost</option>
                              </select>
                            </div>
                            <div class="col-md-1">
                              <input type="number" name="qty[]" class="form-control" placeholder="Scrap Quantity" value="<?php echo $value->qty; ?>" required>
                            </div>
                            <div class="col-md-5">
                              <textarea name="item_remark[]" class="form-control" rows="1" cols="80" autocomplete="off" placeholder="Item Remarks"><?php echo $value->remarks; ?></textarea>
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
            <div class="col-md-4">
              <div class="form-group">
                <input type="submit" name="submit" class="form-control btn btn-sm btn-primary" id="submit" value="Save">
                <input type="hidden" name="id" class="form-control btn btn-sm btn-primary" id="id" value="<?php echo (((isset($detail->id)) && $detail->id != '') ? $detail->id : '') ?>">
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
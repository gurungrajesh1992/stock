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
                <label>Location Transfer Code<span class="req">*</span></label>
                <input type="text" name="transfer_code" class="form-control" id="transfer_code" value="<?php echo set_value('transfer_code', (((isset($transfer_code)) && $transfer_code != '') ? $transfer_code : '')); ?>" readonly>
                <?php echo form_error('transfer_code', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>From Location / From Store</label>
                <select name="from_loc" class="form-control selct2" id="from_loc">
                  <option value>Select Store</option>
                  <?php
                  foreach ($location_para_details as $key => $value) {
                    // var_dump($items[0]->location_id); exit;
                  ?>
                    <option value="<?php echo $value->id; ?>" <?php echo  set_select('from_loc', $value->id, (isset($items[0]->location_id) && $items[0]->location_id  == $value->id) ? TRUE : ''); ?>><?php echo $value->store_name; ?></option>

                    <?    ?>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>To Location / To Store</label>
                <select name="to_loc" class="form-control selct2" id="to_loc" required>
                  <option value>Select Store</option>
                  <?php
                  foreach ($location_para_details as $key => $value) {
                    // var_dump($items[0]->location_id); exit;
                  ?>
                    <option value="<?php echo $value->id; ?>"><?php echo $value->store_name; ?></option>

                    <?    ?>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Entry Date </label>
                <input type="date" name="date" class="form-control" id="date" placeholder="Sales Date" value="<?php echo set_value('date', date('Y-m-d')); ?>" required>
                <?php echo form_error('date', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Location Transfer Date </label>
                <input type="date" name="transfered_on" class="form-control" id="transfered_on" placeholder="Sales transfered_on" value="<?php echo set_value('transfered_on', date('Y-m-d')); ?>" required>
                <?php echo form_error('transfered_on', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
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
                    <select name="item" class="form-control selct2" id="item_loc_transfer">
                      <option value="">Select Items</option>
                      <?php
                      $l[''] = 'Select Items';
                      $sel = '';
                      foreach ($items as $value) {
                        // var_dump($value);exit;
                        $item_detail = $this->crud_model->get_where_single_order_by('item_infos', array('status' => '1', 'item_code' => $value->item_code), 'id', 'DESC');
                        // var_dump($items[0]->item_code);exit;
                        if (isset($items[0]->item_code) && $items[0]->item_code == $value->item_code) {
                          $sel = ' selected="selected"';
                        } else {
                          $sel = '';
                        }
                      ?>
                        <option value="<?php echo $value->item_code; ?>" <?php echo $sel; ?>><?php echo $item_detail->item_name; ?></option>
                        <?php    ?>

                      <?php
                      }
                      ?>
                    </select>

                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="req_item" id="items">
                    <div class=" row">
                      <div class="col-md-2">
                        <label>Product</label>
                      </div>
                      <div class="col-md-1">
                        <label>Quantity</label>
                      </div>
                      <div class="col-md-2">
                        <label>Unit Price</label>
                      </div>
                      <div class="col-md-2">
                        <label>Actual Unit Price</label>
                      </div>
                      <div class="col-md-2">
                        <label>Total Price</label>
                      </div>
                      <div class="col-md-2">
                        <label>Actual Total Price</label>
                      </div>

                      <div class="col-md-1">

                      </div>
                    </div>
                    <?php
                    if (isset($detail->transfer_code)) {
                      $childs = $this->crud_model->get_where('location_transfer_detail', array('transfer_code' => $detail->transfer_code));
                      if ($childs) {
                        foreach ($childs as $key => $value) {
                          // var_dump($value);
                          // exit;
                          $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                          // var_dump($item_detail);
                          // exit;
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

                            <div class="col-md-1">
                              <input type="number" name="qty[]" min="1" class="form-control" placeholder="Quantity" value="<?php echo $value->qty; ?>" readonly>
                            </div>
                            <div class="col-md-2">
                              <input type="number" name="unit_price[]" min="1" class="form-control" placeholder="Quantity" value="<?php echo $value->qty; ?>" readonly>
                            </div>

                            <div class="col-md-2">
                              <input type="number" name="actual_unit_price[]" min="1" class="form-control" placeholder="Quantity" value="<?php echo $value->qty; ?>" readonly>
                            </div>

                            <div class="col-md-2">
                              <input type="number" name="total_price[]" min="1" class="form-control" placeholder="Quantity" value="<?php echo $value->qty; ?>" readonly>
                            </div>

                            <div class="col-md-2">
                              <input type="number" name="actual_total_price[]" min="1" class="form-control" placeholder="Quantity" value="<?php echo $value->qty; ?>" readonly>
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
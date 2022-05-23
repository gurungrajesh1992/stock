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
                <label>Select Fiscal Year<span class="req">*</span></label>
                <select name="fiscal_year" class="form-control selct2" id="fiscal_year">
                  <option value>Select Fiscal Year</option>
                  <?php foreach ($fiscals as $key => $value) { ?>
                    <option value="<?php echo $value->fiscal_year; ?>" <?php echo  set_select('fiscal_year', $value->fiscal_year, (isset($detail->fiscal_year) && $detail->fiscal_year == $value->fiscal_year) ? TRUE : ''); ?>><?php echo $value->fiscal_year; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>Opening Date<span class="req">*</span></label>
                <input type="date" name="opening_date" class="form-control" id="opening_date" placeholder="Opening Date" value="<?php echo set_value('opening_date', (((isset($detail->opening_date)) && $detail->opening_date != '') ? $detail->opening_date : '')); ?>">
                <?php echo form_error('opening_date', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>

          </div>


          <div class="row">
            <div class="col-md-8">
              <div class="form-group">
                <label>Remarks</label>
                <input type="text" name="remark" class="form-control" id="remarks" placeholder="Remarks" value="<?php echo set_value('remarks', (((isset($detail->remarks)) && $detail->remarks != '') ? $detail->remarks : '')); ?>">
                <?php echo form_error('remarks', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div style="border: 1px solid #ddd;">

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Select Item To Proceed</label>
                <select name="item" class="form-control selct2" id="item_opening">
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
              <div class="req_item" id="items_opening">
                <div class="row">
                  <div class="col-md-2">
                    <label>Product</label>
                  </div>
                  <div class="col-md-1">
                    <label>Quantity</label>
                  </div>
                  <div class="col-md-1">
                    <label>Unit Price</label>
                  </div>
                  <div class="col-md-1">
                    <label>Supplier</label>
                  </div>
                  <div class="col-md-2">
                    <label>Location</label>
                  </div>
                  <div class="col-md-2">
                    <label>Remarks</label>
                  </div>
                  <div class="col-md-1">

                  </div>
                </div>
                <?php
                if (isset($detail->id)) {
                  $childs = $this->crud_model->get_where('opening_detail', array('opening_master_id' => $detail->id));
                  if ($childs) {
                    foreach ($childs as $key => $value) {
                      $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                ?>
                      <div class="row" style="margin-bottom: 15px;">
                        <div class=" col-md-2">
                          <input type="text" name="item_name[]" class="form-control" placeholder="Item Name" value="<?php echo $item_detail->item_name; ?>" readonly>
                          <input type="hidden" name="item_code[]" class="form-control" placeholder="Item Code" value="<?php echo $value->item_code; ?>">
                        </div>
                        <div class="col-md-1">
                          <input type="number" name="qty[]" class="form-control" placeholder="Quantity" value="<?php echo $value->qty; ?>" required>
                        </div>
                        <div class="col-md-1">
                          <input type="number" name="unit_price[]" class="form-control" placeholder="Unit Price" value="<?php echo $value->unit_price; ?>" required>
                        </div>
                        <div class="col-md-1">
                          <select name="supplier_id[]" class="form-control" id="supplier_id" required>
                            <option value>Select Location</option>
                            <?php foreach ($suppliers as $key_s => $value_s) { ?>
                              <option value="<?php echo $value_s->id; ?>" <?php echo (isset($value->supplier_id) && $value->supplier_id == $value_s->id) ? 'selected' : ''; ?>><?php echo $value_s->supplier_name; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="col-md-2">
                          <select name="location_id[]" class="form-control" id="location_id" required>
                            <option value>Select Location</option>
                            <?php foreach ($locations as $key_l => $value_l) { ?>
                              <option value="<?php echo $value_l->id; ?>" <?php echo (isset($value->location_id) && $value->location_id == $value_l->id) ? 'selected' : ''; ?>><?php echo $value_l->store_name; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="col-md-2">
                          <textarea name="remarks[]" class="form-control" rows="1" cols="80" autocomplete="off" placeholder="Remarks"><?php echo $value->remarks; ?></textarea>
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
  </div>
  </form>



</section>
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
            <!-- <div class="col-md-4">
              <div class="form-group">
                <label>Category Name <span style="color:red;"> *</span></label>
                <select name="category_id" class="form-control" id="category_id">
                  <option value>Select Category Name</option>
                  <?php foreach ($categories as $key => $value) { ?>
                    <option value="<?php echo $value['id']; ?>" <?php echo  set_select('category_id', $value['id'], (isset($detail->category_id) && $detail->category_id == $value['id']) ? TRUE : ''); ?>><?php echo $value['category_name']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div> -->
            <?php
            // var_dump($detail);
            // exit;
            ?>
            <div class="col-md-4">
              <div class="form-group">
                <label>Category Name <span style="color:red;"> *</span></label>
                <select name="category_id" class="form-control" id="category_id">
                  <?php echo $html; ?>
                </select>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>Location Name <span style="color:red;"> *</span></label>
                <select name="location_id" class="form-control" id="location_id">
                  <option value>Select Location Name </option>
                  <?php foreach ($locations as $key => $value) {
                  ?>
                    <option value="<?php echo $value['id']; ?>" <?php echo  set_select('location_id', $value['id'], (isset($detail->location_id) && $detail->location_id == $value['id']) ? TRUE : ''); ?>><?php echo $value['address']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Itme Code<span style="color:red;"> *</span></label>
                <input type="text" name="item_code" class="form-control" id="item_code" value="<?php echo set_value('item_code', isset($detail->item_code) ? $detail->item_code : $item_code); ?>" readonly>
                <?php echo form_error('item_code', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Item Name <span style="color:red;"> *</span></label>
                <input type="text" name="item_name" class="form-control" id="item_name" placeholder="Enter Item Name" value="<?php echo set_value('item_name', (((isset($detail->item_name)) && $detail->item_name != '') ? $detail->item_name : '')); ?>">
                <?php echo form_error('item_name', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="item_type">Item Type <span style="color:red;"> *</span></label>
                <select name="item_type" class="form-control" id="item_type">
                  <option value>Select Item Type</option>
                  <option value="A" <?php echo (((isset($detail->item_type)) && $detail->item_type == 'A') ? 'selected' : '') ?>>Asset</option>
                  <option value="I" <?php echo (((isset($detail->item_type)) && $detail->item_type == 'I') ? 'selected' : '') ?>>Inventory</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Model Number<span style="color:red;"> *</span></label>
                <input type="text" name="model_no" class="form-control" id="model_no" placeholder="Enter Model Number" value="<?php echo set_value('model_no', (((isset($detail->model_no)) && $detail->model_no != '') ? $detail->model_no : '')); ?>">
                <?php echo form_error('model_no', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Minimum Quantity<span style="color:red;"> *</span></label>
                <input type="number" name="min_qty" min="0" class="form-control" id="min_qty" placeholder="Enter Minimum Quantity" value="<?php echo set_value('min_qty', (((isset($detail->min_qty)) && $detail->min_qty != '') ? $detail->min_qty : '')); ?>">
                <?php echo form_error('min_qty', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Maximum Quantity<span style="color:red;"> *</span></label>
                <input type="number" name="max_qty" min="0" class="form-control" id="max_qty" placeholder="Enter Maximum Quantity" value="<?php echo set_value('max_qty', (((isset($detail->max_qty)) && $detail->max_qty != '') ? $detail->max_qty : '')); ?>">
                <?php echo form_error('max_qty', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Reorder Level<span style="color:red;"> *</span></label>
                <input type="number" name="reorder_level" class="form-control" id="reorder_level" placeholder="Enter Reorder Level" value="<?php echo set_value('reorder_level', (((isset($detail->reorder_level)) && $detail->reorder_level != '') ? $detail->reorder_level : '')); ?>">
                <?php echo form_error('reorder_level', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Self Life Number<span style="color:red;"> *</span></label>
                <input type="number" name="shelf_life_no" min="0" class="form-control" id="shelf_life_no" placeholder="Enter shelf_life_no" value="<?php echo set_value('shelf_life_no', (((isset($detail->shelf_life_no)) && $detail->shelf_life_no != '') ? $detail->shelf_life_no : '')); ?>">
                <?php echo form_error('shelf_life_no', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Shelf Life Months/Years<span style="color:red;"> *</span></label>
                <select name="shelf_life_ym" class="form-control" id="shelf_life_ym">
                  <option value>Select Months/Years</option>
                  <option value="Y" <?php echo (((isset($detail->shelf_life_ym)) && $detail->shelf_life_ym == 'Y') ? 'selected' : '') ?>>Year</option>
                  <option value="M" <?php echo (((isset($detail->shelf_life_ym)) && $detail->shelf_life_ym == 'M') ? 'selected' : '') ?>>Month</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Depreciation Rate<span style="color:red;"> *</span></label>
                <input type="number" name="depreciation_rate" class="form-control" id="depreciation_rate" placeholder="Enter Depreciation Rate" value="<?php echo set_value('depreciation_rate', (((isset($detail->depreciation_rate)) && $detail->depreciation_rate != '') ? $detail->depreciation_rate : '')); ?>">
                <?php echo form_error('depreciation_rate', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>Item Image</label>
                <input type="text" name="item_image" class="form-control" id="item_image" placeholder="Item image" value="<?php echo (((isset($detail->item_image)) && $detail->item_image != '') ? $detail->item_image : '') ?>" readonly="readonly">
                <a class="btn btn-default item_image button_cls" type="button">Upload</a>
                <?php if ((isset($detail->item_image)) && $detail->item_image != '') { ?>
                  <img src="<?php echo $detail->item_image; ?>" class="img_cl" id="defff0">
                <?php } else { ?>
                  <img src="" class="img_cl" id="defff0" style="display:none">
                <?php } ?>
              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Specification</label>
                <textarea name="specification" id="specification" class="form-control" rows="5" cols="80" autocomplete="off"><?php echo (((isset($detail->specification)) && $detail->specification != '') ? $detail->specification : '') ?></textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" id="status">
                  <option value="1" <?php echo  set_select('status', '1', (isset($detail->status) && $detail->status == '1') ? TRUE : ''); ?>>Active</option>
                  <option value="0" <?php echo  set_select('status', '0', (isset($detail->status) && $detail->status == '0') ? TRUE : ''); ?>>Inactive</option>
                </select>
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

<script>
  function responsive_filemanager_callback(field_id) {
    var url = $('#' + field_id).val();
    // alert('yo'); 
    $('#' + field_id).next().next().attr('src', url);
    $('#' + field_id).next().next().show();
  }
</script>
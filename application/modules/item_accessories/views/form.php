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
                <label>Item Code<span style="color:red;"> *</span></label>
                <select name="item_code" class="form-control" id="item_code">
                  <option value>Select Item Code</option>
                  <?php foreach ($item_code as $key => $value) {
                  ?>
                    <option value="<?php echo $value['item_code']; ?>" <?php echo  set_select('item_code', $value['item_code'], (isset($detail->item_code) && $detail->item_code == $value['item_code']) ? TRUE : ''); ?>><?php echo $value['item_name']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Accessories Code<span style="color:red;"> *</span></label>
                <input type="text" name="accessories_code" class="form-control" id="accessories_code" value="<?php echo set_value('accessories_code', isset($detail->accessories_code) ? $detail->accessories_code : $accessories_code); ?>" readonly>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Accessories Name <span style="color:red;"> *</span></label>
                <input type="text" name="accessories_name" class="form-control" id="accessories_name" placeholder="Enter Accessories Name" value="<?php echo set_value('accessories_name', (((isset($detail->accessories_name)) && $detail->accessories_name != '') ? $detail->accessories_name : '')); ?>">
                <?php echo form_error('accessories_name', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Quantity<span style="color:red;"> *</span></label>
                <input type="number" name="qty" min="0" class="form-control" id="qty" placeholder="Enter Quantity" value="<?php echo set_value('qty', (((isset($detail->qty)) && $detail->qty != '') ? $detail->qty : '')); ?>">
                <?php echo form_error('qty', '<div class="error_message">', '</div>'); ?>
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
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
            <div class="col-md-4">
              <div class="form-group">
                <label>Select Item<span class="req">*</span></label>
                <select name="item_code" class="form-control selct2" id="item_code">
                  <?php
                  foreach ($items_in_stock as $key => $value) {
                    $item_detail = $this->crud_model->get_where_single_order_by('item_infos', array('status' => '1', 'item_code' => $value->item_code), 'id', 'DESC');
                  ?>
                    <option value="<?php echo $value->item_code; ?>" <?php echo  set_select('item_code', $value->item_code, (isset($detail->item_code) && $detail->item_code == $value->item_code) ? TRUE : ''); ?>><?php echo $item_detail->item_name; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Date</label>
                <input type="date" name="date" class="form-control" id="date" placeholder="D  ate" value="<?php echo set_value('date', (((isset($detail->date)) && $detail->date != '') ? $detail->date : date('Y-m-d'))); ?>">
                <?php echo form_error('date', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Select Type</label>
                <select name="type" class="form-control selct2" id="type">
                  <option value="Scrap" <?php echo  set_select('type', 'Scrap', (isset($detail->type) && $detail->type == 'Scrap') ? TRUE : ''); ?>>Scrap</option>
                  <option value="Damage" <?php echo  set_select('type', 'Damage', (isset($detail->type) && $detail->type == 'Damage') ? TRUE : ''); ?>>Damage</option>
                  <option value="Lost" <?php echo  set_select('type', 'Lost', (isset($detail->type) && $detail->type == 'Lost') ? TRUE : ''); ?>>Lost</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Quantity</label>
                <input type="number" name="qty" class="form-control" id="qty" placeholder="Quantity" value="<?php echo set_value('qty', (((isset($detail->qty)) && $detail->qty != '') ? $detail->qty : 0)); ?>">
                <?php echo form_error('qty', '<div class="error_message">', '</div>'); ?>
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
              <div class="form-group">
                <label>Remarks</label>
                <textarea name="remarks" id="description" class="form-control" rows="5" cols="80" autocomplete="off"><?php echo set_value('remarks', (((isset($detail->remarks)) && $detail->remarks != '') ? $detail->remarks : '')); ?></textarea>
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
<script>
  function responsive_filemanager_callback(field_id) {
    var url = $('#' + field_id).val();
    // alert('yo'); 
    $('#' + field_id).next().next().attr('src', url);
    $('#' + field_id).next().next().show();
  }
</script>
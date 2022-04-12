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
                  <?php foreach ($item_amc as $key => $value) {
                  ?>
                    <option value="<?php echo $value['item_code']; ?>" <?php echo  set_select('item_code', $value['item_code'], (isset($detail->item_code) && $detail->item_code == $value['item_code']) ? TRUE : ''); ?>><?php echo $value['item_code']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>AMC Code<span style="color:red;"> *</span></label>
                <input type="text" name="amc_code" class="form-control" id="amc_code" value="<?php echo set_value('amc_code', isset($detail->amc_code) ? $detail->amc_code : $amc_code); ?>" readonly>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Company Name <span style="color:red;"> *</span></label>
                <input type="text" name="company_name" class="form-control" id="company_name" placeholder="Enter Accessories Name" value="<?php echo set_value('company_name', (((isset($detail->company_name)) && $detail->company_name != '') ? $detail->company_name : '')); ?>">
                <?php echo form_error('company_name', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Amount<span style="color:red;"> *</span></label>
                <input type="number" name="amount" min="0" class="form-control" id="amount" placeholder="Enter Quantity" value="<?php echo set_value('amount', (((isset($detail->amount)) && $detail->amount != '') ? $detail->amount : '')); ?>">
                <?php echo form_error('amount', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Valid From <span style="color:red;"> *</span></label>
                <input type="date" name="valid_from" class="form-control" id="valid_from" value="<?php echo set_value('valid_from', (((isset($detail->valid_from)) && $detail->valid_from != '') ? $detail->valid_from : '')); ?>">
                <?php echo form_error('valid_from', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Valid To<span style="color:red;"> *</span></label>
                <input type="date" name="valid_to" class="form-control" id="valid_to" value="<?php echo set_value('valid_to', (((isset($detail->valid_to)) && $detail->valid_to != '') ? $detail->valid_to : '')); ?>">
                <?php echo form_error('valid_to', '<div class="error_message">', '</div>'); ?>
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
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
                <label>Item<span style="color:red;"> *</span></label>
                <select name="item_code" class="form-control" id="item_code">
                  <option value>Select Item</option>
                  <?php foreach ($item_insurance as $key => $value) {
                  ?>
                    <option value="<?php echo $value['item_code']; ?>" <?php echo  set_select('item_code', $value['item_code'], (isset($detail->item_code) && $detail->item_code == $value['item_code']) ? TRUE : ''); ?>><?php echo $value['item_name']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Insurance Company Name <span style="color:red;"> *</span></label>
                <input type="text" name="insurance_company" class="form-control" id="insurance_company" placeholder="Enter Insurance Company Name" value="<?php echo set_value('insurance_company', (((isset($detail->insurance_company)) && $detail->insurance_company != '') ? $detail->insurance_company : '')); ?>">
                <?php echo form_error('insurance_company', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Insurance Number <span style="color:red;"> *</span></label>
                <input type="text" name="insurance_no" class="form-control" id="insurance_no" placeholder="Enter Insurance Number" value="<?php echo set_value('insurance_no', (((isset($detail->insurance_no)) && $detail->insurance_no != '') ? $detail->insurance_no : '')); ?>">
                <?php echo form_error('insurance_no', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Tenure<span style="color:red;"> *</span></label>
                <input type="number" name="tenuer" min="0" class="form-control" id="tenuer" placeholder="Enter tenuer" value="<?php echo set_value('tenuer', (((isset($detail->tenuer)) && $detail->tenuer != '') ? $detail->tenuer : '')); ?>">
                <?php echo form_error('tenuer', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Tenure Months/Years<span style="color:red;"> *</span></label>
                <select name="tenure_ym" class="form-control" id="tenure_ym">
                  <option value>Select Months/Years</option>
                  <option value="Y" <?php echo (((isset($detail->tenure_ym)) && $detail->tenure_ym == 'Y') ? 'selected' : '') ?>>Year</option>
                  <option value="M" <?php echo (((isset($detail->tenure_ym)) && $detail->tenure_ym == 'M') ? 'selected' : '') ?>>Month</option>
                </select>
                <?php echo form_error('tenure_ym', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label>Premium Amount<span style="color:red;"> *</span></label>
                <input type="number" name="premium_amt" min="0" class="form-control" id="premium_amt" placeholder="Enter Quantity" value="<?php echo set_value('premium_amt', (((isset($detail->premium_amt)) && $detail->premium_amt != '') ? $detail->premium_amt : '')); ?>">
                <?php echo form_error('premium_amt', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Amount<span style="color:red;"> *</span></label>
                <input type="number" name="amount" min="0" class="form-control" id="amount" placeholder="Enter Quantity" value="<?php echo set_value('amount', (((isset($detail->amount)) && $detail->amount != '') ? $detail->amount : '')); ?>">
                <?php echo form_error('amount', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Start Date <span style="color:red;"> *</span></label>
                <input type="date" name="start_date" class="form-control" id="start_date" value="<?php echo set_value('start_date', (((isset($detail->start_date)) && $detail->start_date != '') ? $detail->start_date : '')); ?>">
                <?php echo form_error('start_date', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>End Date<span style="color:red;"> *</span></label>
                <input type="date" name="end_date" class="form-control" id="end_date" value="<?php echo set_value('end_date', (((isset($detail->end_date)) && $detail->end_date != '') ? $detail->end_date : '')); ?>">
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
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
                <label>Rate<span class="req">*</span></label>
                <input type="number" name="depreciation_rate" step="0.01" class="form-control" id="depreciation_rate" placeholder="Opening Date" value="<?php echo set_value('depreciation_rate', (((isset($detail->depreciation_rate)) && $detail->depreciation_rate != '') ? $detail->depreciation_rate : '')); ?>">
                <?php echo form_error('depreciation_rate', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>From<span class="req">*</span></label>
                <input type="date" name="from" class="form-control" id="from" placeholder="Opening Date" value="<?php echo set_value('from', (((isset($detail->from)) && $detail->from != '') ? $detail->from : '')); ?>">
                <?php echo form_error('from', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>To<span class="req">*</span></label>
                <input type="date" name="to" class="form-control" id="to" placeholder="Opening Date" value="<?php echo set_value('to', (((isset($detail->to)) && $detail->to != '') ? $detail->to : '')); ?>">
                <?php echo form_error('to', '<div class="error_message">', '</div>'); ?>
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
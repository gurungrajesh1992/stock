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
                <label>Fiscal Year<span class="req">*</span></label>
                <input type="text" name="fiscal_year" class="form-control" id="fiscal_year" placeholder="Fiscal Year" value="<?php echo set_value('fiscal_year', (((isset($detail->fiscal_year)) && $detail->fiscal_year != '') ? $detail->fiscal_year : '')); ?>">
                <?php echo form_error('fiscal_year', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Start Date<span class="req">*</span></label>
                <input type="date" name="start_date" class="form-control" id="start_date" placeholder="Start Date" value="<?php echo set_value('start_date', (((isset($detail->start_date)) && $detail->start_date != '') ? $detail->start_date : '')); ?>">
                <?php echo form_error('start_date', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>End Date<span class="req">*</span></label>
                <input type="date" name="end_date" class="form-control" id="end_date" placeholder="End Date" value="<?php echo set_value('end_date', (((isset($detail->end_date)) && $detail->end_date != '') ? $detail->end_date : '')); ?>">
                <?php echo form_error('end_date', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Current Tag</label>
                <select name="current_tag" class="form-control selct2" id="current_tag">
                  <option value="Y" <?php echo  set_select('current_tag', 'Y', (isset($detail->current_tag) && $detail->current_tag == 'Y') ? TRUE : ''); ?>>Yes</option>
                  <option value="N" <?php echo  set_select('current_tag', 'N', (isset($detail->current_tag) && $detail->current_tag == 'N') ? TRUE : ''); ?>>No</option>
                </select>
              </div>
            </div>
          </div>

          <!-- TODO: current tag   -->


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
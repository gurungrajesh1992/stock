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
                <label>Department Name <span class="req">*</span></label>
                <input type="text" name="department_name" class="form-control" id="department_name" placeholder="Department Name" value="<?php echo set_value('department_name', (((isset($detail->department_name)) && $detail->department_name != '')? $detail->department_name : '')); ?>">
                <?php echo form_error('department_name', '<div class="error_message">', '</div>'); ?>
              </div>
            </div> 
          </div>
           <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Department Code <span class="req">*</span></label>
                <input type="text" name="department_code" class="form-control" id="department_code" placeholder="Department Code" value="<?php echo set_value('department_code', (((isset($detail->department_code)) && $detail->department_code != '')? $detail->department_code : '')); ?>">
                <?php echo form_error('department_code', '<div class="error_message">', '</div>'); ?>
              </div>
            </div> 
          </div>
         
          <div class="row"> 
              <div class="col-md-4">
                <div class="form-group">
                  <label>Remarks</label>
                  <input type="text" name="remarks" class="form-control" id="remarks" placeholder="Remarks" value="<?php echo set_value('remarks', (((isset($detail->remarks)) && $detail->remarks != '')? $detail->remarks : '')); ?>">
                  <?php echo form_error('remarks', '<div class="error_message">', '</div>'); ?>
                </div>
              </div>
          </div>
          <div class="row">
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
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
                <label>Name<span class="req">*</span></label>
                <input type="text" name="supplier_name" class="form-control" id="supplier_name" placeholder="Supplier Name" value="<?php echo set_value('supplier_name', (((isset($detail->supplier_name)) && $detail->supplier_name != '') ? $detail->supplier_name : '')); ?>">
                <?php echo form_error('supplier_name', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" id="address" placeholder="Address" value="<?php echo set_value('address', (((isset($detail->address)) && $detail->address != '') ? $detail->address : '')); ?>">
                <?php echo form_error('address', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo set_value('email', (((isset($detail->email)) && $detail->email != '') ? $detail->email : '')); ?>">
                <?php echo form_error('email', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Select Country</label>
                <select name="country_code" class="form-control selct2" id="country_code">
                  <option value>Select Country</option>
                  <?php foreach ($countries as $key => $value) { ?>
                    <option value="<?php echo $value->country_code; ?>" <?php echo  set_select('country_code', $value->country_code, (isset($detail->country_code) && $detail->country_code == $value->country_code) ? TRUE : ''); ?>><?php echo $value->country_name; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Telephone</label>
                <input type="text" name="telephone" class="form-control" id="telephone" placeholder="Telephone" value="<?php echo set_value('telephone', (((isset($detail->telephone)) && $detail->telephone != '') ? $detail->telephone : '')); ?>">
                <?php echo form_error('telephone', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Profile Picture</label>
                <input type="text" name="docpath" class="form-control" id="featured_image" placeholder="Profile Picture" value="<?php echo set_value('docpath', (((isset($detail->docpath)) && $detail->docpath != '') ? $detail->docpath : '')); ?>" readonly="readonly">
                <a class="btn btn-default featured_image button_cls" type="button">Upload</a>
                <?php if ((isset($detail->docpath)) && $detail->docpath != '') { ?>
                  <img src="<?php echo $detail->docpath; ?>" class="img_cl" id="defff0">
                <?php } else { ?>
                  <img src="" class="img_cl" id="defff0" style="display:none">
                <?php } ?>
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
            <div class="col-md-6">
              <div class="form-group">
                <label>Contact Person</label>
                <input type="text" name="contact_person" class="form-control" id="contact_person" placeholder="contact_person" value="<?php echo set_value('contact_person', (((isset($detail->contact_person)) && $detail->contact_person != '') ? $detail->contact_person : '')); ?>">
                <?php echo form_error('contact_person', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>CP Mobile</label>
                <input type="text" name="cp_mobile" class="form-control" id="cp_mobile" placeholder="cp_mobile" value="<?php echo set_value('cp_mobile', (((isset($detail->cp_mobile)) && $detail->cp_mobile != '') ? $detail->cp_mobile : '')); ?>">
                <?php echo form_error('cp_mobile', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Meta Keyword</label>
                <input type="text" name="meta_keyword" class="form-control" id="meta_keyword" placeholder="meta_keyword" value="<?php echo set_value('meta_keyword', (((isset($detail->meta_keyword)) && $detail->meta_keyword != '') ? $detail->meta_keyword : '')); ?>">
                <?php echo form_error('meta_keyword', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Meta Description</label>
                <input type="text" name="meta_desc" class="form-control" id="meta_desc" placeholder="meta_desc" value="<?php echo set_value('meta_desc', (((isset($detail->meta_desc)) && $detail->meta_desc != '') ? $detail->meta_desc : '')); ?>">
                <?php echo form_error('meta_desc', '<div class="error_message">', '</div>'); ?>
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
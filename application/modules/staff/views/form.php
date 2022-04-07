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
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Full Name <span>*</span></label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Full Name" value="<?php echo set_value('name', (((isset($detail->name)) && $detail->name != '')? $detail->name : '')); ?>">
                      <?php echo form_error('name', '<div class="error_message">', '</div>'); ?>
                    </div> 
                  </div> 
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Temporary Address</label>
                      <input type="text" name="temp_address" class="form-control" id="temp_address" placeholder="Temporary Address" value="<?php echo set_value('temp_address', (((isset($detail->temp_address)) && $detail->temp_address != '')? $detail->temp_address : '')); ?>">
                      <?php echo form_error('temp_address', '<div class="error_message">', '</div>'); ?>
                    </div> 
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Permanent Address<span>*</span></label>
                      <input type="text" name="permanent_address" class="form-control" id="permanent_address" placeholder="Permanent Address" value="<?php echo set_value('permanent_address', (((isset($detail->permanent_address)) && $detail->permanent_address != '')? $detail->permanent_address : '')); ?>">
                      <?php echo form_error('permanent_address', '<div class="error_message">', '</div>'); ?>
                    </div> 
                  </div> 
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Contact</label>
                      <input type="text" name="contact" class="form-control" id="contact" placeholder="Contact" value="<?php echo set_value('contact', (((isset($detail->contact)) && $detail->contact != '')? $detail->contact : '')); ?>">
                      <?php echo form_error('contact', '<div class="error_message">', '</div>'); ?>     
                    </div> 
                  </div>
                  <div class="col-md-6"> 
                    <div class="form-group">
                      <label>Select Country</label>
                      <select name="country_code" class="form-control selct2" id="country_code">
                        <option value>Select Country</option>
                        <?php foreach ($countries as $key => $value) { ?>
                          <option value="<?php echo $value->country_code; ?>" <?php echo  set_select('country_code', $value->country_code, (isset($detail->country_code) && $detail->country_code == $value->country_code) ? TRUE : ''); ?>><?php echo $value->country_name; ?></option>
                        <?php } ?>
                         <?php echo form_error('country_code', '<div class="error_message">', '</div>'); ?>
                      </select>
                    </div>
                  </div> 
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo set_value('email', (((isset($detail->email)) && $detail->email != '')? $detail->email : '')); ?>">
                    
                    </div> 
                  </div> 
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Designation <span>*</span></label>
                      <select name="designation_code" id="designation_code" class="form-control">
                        <?php 
                          if(isset($data->designation_code)){
                            
                          }
                        ?>   
                        <option value="">Select Designation</option>                     
                        <?php
                          foreach($designations as $designation)
                          {
                          echo '<option value="'.$designation->designation_code.'">'.$designation->designation_name.'</option>';
                          }
                        ?>
                         
                     
                        
                      </select>
                      <?php echo form_error('designation', '<div class="error_message">', '</div>'); ?>
                    </div> 
                  </div> 
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Department <span>*</span></label>
                      <select name="department_code" id="department_code" class="form-control">
                        <?php 
                          if(isset($data->department_code)){
                            
                          }
                        ?>   
                        <option value="">Select Designation</option>                     
                        <?php
                          foreach($departments as $department)
                          {
                          echo '<option value="'.$department->department_code.'">'.$department->department_name.'</option>';
                          }
                        ?>
                        
                      </select>
                      <?php echo form_error('department_code', '<div class="error_message">', '</div>'); ?>
                    </div> 
                  </div> 
                  
                </div>  
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Appointed Date <span>*</span></label>
                      <input type="date" name="appointed_date" class="form-control" id="appointed_date" placeholder="Appointed Date" value="<?php echo set_value('appointed_date', (((isset($detail->appointed_date)) && $detail->appointed_date != '')? $detail->appointed_date : '')); ?>">
                      <?php echo form_error('appointed_date', '<div class="error_message">', '</div>'); ?>     
                    </div> 
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Featured Image</label> 
                      <input type="text" name="featured_image" class="form-control" id="featured_image" placeholder="featured_image" value="<?php echo set_value('featured_image', (((isset($detail->featured_image)) && $detail->featured_image != '')? $detail->featured_image : '')); ?>" readonly="readonly"> 
                      <a  class="btn btn-default featured_image button_cls" type="button">Upload</a>
                      <?php if((isset($detail->featured_image)) && $detail->featured_image != ''){ ?>
                        <img src="<?php echo $detail->featured_image; ?>" class="img_cl img-fluid" id="defff0" style="max-height: 675px;object-fit: contain;">
                      <?php }else{ ?>
                        <img src="" class="img_cl img-fluid" id="defff0" style="display:none;max-height: 675px;object-fit: contain;">
                      <?php }?>  
                      <?php echo form_error('featured_image', '<div class="error_message">', '</div>'); ?>
                    </div> 
                  </div> 
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Description</label> 
                      <textarea name="description" id="description" class="form-control" rows="5" cols="80" autocomplete="off"><?php echo set_value('description', (((isset($detail->description)) && $detail->description != '')? $detail->description : '')); ?></textarea>
                      <?php echo form_error('description', '<div class="error_message">', '</div>'); ?>
                    </div> 
                  </div> 
                </div>
                <div class="row">  
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Status</label>
                      <select name="status" class="form-control selct2" id="status">
                        <option value="1" <?php echo  set_select('status', '1', (isset($detail->status) && $detail->status == '1') ? TRUE : ''); ?>>Active</option>
                        <option value="0" <?php echo  set_select('status', '0', (isset($detail->status) && $detail->status == '0') ? TRUE : ''); ?>>Inactive</option>
                        <?php echo form_error('status', '<div class="error_message">', '</div>'); ?> 
                      </select>  
                    </div> 
                  </div>  
                </div> 
                <div class="row"> 
                  <div class="col-md-12">
                    <div class="form-group">  
                        <input type="submit" name="submit" class="form-control btn btn-sm btn-primary" id="submit" value="Save">  
                        <input type="hidden" name="id" class="form-control btn btn-sm btn-primary" id="submit" value="<?php echo (((isset($detail->id)) && $detail->id != '')? $detail->id : '') ?>">  
                    </div> 
                  </div> 
                </div> 
              </div> 
            </div>  
        </form>
      </div>
</section>
<script>
  function responsive_filemanager_callback(field_id){  
        var url=$('#'+field_id).val();
        // alert('yo'); 
        $('#'+field_id).next().next().attr('src',url);
        $('#'+field_id).next().next().show(); 
  } 
</script>
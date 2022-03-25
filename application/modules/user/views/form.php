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
                      <label>Full Name</label>
                      <input type="text" name="full_name" class="form-control" id="full_name" placeholder="Full Name" value="<?php echo (((isset($detail->full_name)) && $detail->full_name != '')? $detail->full_name : '') ?>">
                    </div> 
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Address</label>
                      <input type="text" name="address" class="form-control" id="address" placeholder="Address" value="<?php echo (((isset($detail->address)) && $detail->address != '')? $detail->address : '') ?>">
                    </div> 
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Contact</label>
                      <input type="text" name="contact" class="form-control" id="contact" placeholder="Contact" value="<?php echo (((isset($detail->contact)) && $detail->contact != '')? $detail->contact : '') ?>">
                    </div> 
                  </div> 
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" name="user_name" class="form-control" id="user_name" placeholder="Username" value="<?php echo (((isset($detail->user_name)) && $detail->user_name != '')? $detail->user_name : '') ?>" <?php echo (((isset($detail->id)) && $detail->id != '')? 'readonly' : '') ?>>
                    </div> 
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="<?php echo (((isset($detail->password)) && $detail->password != '')? $detail->password : '') ?>" <?php echo (((isset($detail->id)) && $detail->id != '')? 'readonly' : '') ?>>
                    </div> 
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo (((isset($detail->email)) && $detail->email != '')? $detail->email : '') ?>">
                    </div> 
                  </div> 
                </div>  
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Description</label> 
                      <textarea name="description" id="description" class="form-control" rows="5" cols="80" autocomplete="off"><?php echo (((isset($detail->description)) && $detail->description != '')? $detail->description : '') ?></textarea>
                    </div> 
                  </div> 
                </div>
                <div class="row"> 
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Select Role</label> 
                      <select name="role_id" class="form-control selct2" id="role_id">
                          <option value>Select Roles</option> 
                        <?php foreach($roles as $key=>$value){ ?>
                          <option value="1" <?php echo (((isset($detail->role_id)) && $detail->role_id == $value->id) ? 'selected' : '') ?>><?php echo $value->name; ?></option> 
                        <?php } ?> 
                      </select>
                    </div> 
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Profile Picture</label> 
                      <input type="text" name="profile_image" class="form-control" id="featured_image" placeholder="profile_image" value="<?php echo (((isset($detail->profile_image)) && $detail->profile_image != '')? $detail->profile_image : '') ?>" readonly="readonly"> 
                      <a  class="btn btn-default featured_image button_cls" type="button">Upload</a>
                      <?php if((isset($detail->profile_image)) && $detail->profile_image != ''){ ?>
                        <img src="<?php echo $detail->profile_image; ?>" class="img_cl" id="defff0">
                      <?php }else{ ?>
                        <img src="" class="img_cl" id="defff0" style="display:none">
                      <?php }?>  
                    </div> 
                  </div> 
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Status</label>
                      <select name="status" class="form-control selct2" id="status">
                        <option value="1" <?php echo (((isset($detail->status)) && $detail->status == '1') ? 'selected' : '') ?>>Active</option>
                        <option value="0" <?php echo (((isset($detail->status)) && $detail->status == '0') ? 'selected' : '') ?>>Inactive</option> 
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
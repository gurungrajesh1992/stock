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
                      <label>Site Name</label>
                      <input type="text" name="site_name" class="form-control" id="site_name" placeholder="Site Name" value="<?php echo (((isset($site_settings->site_name)) && $site_settings->site_name != '')? $site_settings->site_name : '') ?>">
                    </div> 
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <!-- /.form-group -->
                        <div class="form-group">
                        <label>Site Slogan</label>
                        <input type="text" name="site_slogan" class="form-control" id="site_slogan" placeholder="Site Slogan" value="<?php echo (((isset($site_settings->site_slogan)) && $site_settings->site_slogan != '')? $site_settings->site_slogan : '') ?>">
                        </div>
                        <!-- /.form-group -->
                    </div> 
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Website Url</label>
                      <input type="text" name="web_url" class="form-control" id="web_url" placeholder="Web Url" value="<?php echo (((isset($site_settings->web_url)) && $site_settings->web_url != '')? $site_settings->web_url : '') ?>">
                    </div> 
                  </div>
                  <!-- /.col -->
                </div> 
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Address</label>
                      <input type="text" name="address" class="form-control" id="address" placeholder="Address" value="<?php echo (((isset($site_settings->address)) && $site_settings->address != '')? $site_settings->address : '') ?>">
                    </div> 
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <!-- /.form-group -->
                        <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Mobile" value="<?php echo (((isset($site_settings->mobile)) && $site_settings->mobile != '')? $site_settings->mobile : '') ?>">
                        </div>
                        <!-- /.form-group -->
                    </div> 
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <!-- /.form-group -->
                        <div class="form-group">
                        <label>Telephone</label>
                        <input type="text" name="telephone" class="form-control" id="telephone" placeholder="Telephone" value="<?php echo (((isset($site_settings->telephone)) && $site_settings->telephone != '')? $site_settings->telephone : '') ?>">
                        </div>
                        <!-- /.form-group -->
                    </div> 
                  </div>
                  <!-- /.col -->
                </div> 
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Map Location</label> 
                      <textarea name="map_location" id="map_location" class="form-control" rows="5" cols="80" autocomplete="off"><?php echo (((isset($site_settings->map_location)) && $site_settings->map_location != '')? $site_settings->map_location : '') ?></textarea>
                    </div> 
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group"> 
                        <label>Contact Details</label>
                        <textarea name="contact_detail" class="form-control" rows="5" cols="80" autocomplete="off"><?php echo (((isset($site_settings->contact_detail)) && $site_settings->contact_detail != '')? $site_settings->contact_detail : '') ?></textarea>  
                    </div> 
                  </div>
                  <!-- /.col -->
                </div>
              </div> 
            </div> 
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Social</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo (((isset($site_settings->email)) && $site_settings->email != '')? $site_settings->email : '') ?>">
                    </div> 
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <!-- /.form-group -->
                        <div class="form-group">
                        <label>Facebook</label>
                        <input type="text" name="facebook" class="form-control" id="facebook" placeholder="Facebook" value="<?php echo (((isset($site_settings->facebook)) && $site_settings->facebook != '')? $site_settings->facebook : '') ?>">
                        </div>
                        <!-- /.form-group -->
                    </div> 
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>WhatsApp</label>
                      <input type="text" name="whatsapp" class="form-control" id="whatsapp" placeholder="Whatsapp" value="<?php echo (((isset($site_settings->whatsapp)) && $site_settings->whatsapp != '')? $site_settings->whatsapp : '') ?>">
                    </div> 
                  </div>
                  <!-- /.col -->
                </div> 
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Skype</label>
                      <input type="text" name="skype" class="form-control" id="skype" placeholder="Skype" value="<?php echo (((isset($site_settings->skype)) && $site_settings->skype != '')? $site_settings->skype : '') ?>">
                    </div> 
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <!-- /.form-group -->
                        <div class="form-group">
                        <label>Twitter</label>
                        <input type="text" name="twitter" class="form-control" id="twitter" placeholder="Twitter" value="<?php echo (((isset($site_settings->twitter)) && $site_settings->twitter != '')? $site_settings->twitter : '') ?>">
                        </div>
                        <!-- /.form-group -->
                    </div> 
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <!-- /.form-group -->
                        <div class="form-group">
                        <label>Instagram</label>
                        <input type="text" name="instagram" class="form-control" id="instagram" placeholder="Instagram" value="<?php echo (((isset($site_settings->instagram)) && $site_settings->instagram != '')? $site_settings->instagram : '') ?>">
                        </div>
                        <!-- /.form-group -->
                    </div> 
                  </div>
                  <!-- /.col -->
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Youtube</label>
                      <input type="text" name="youtube" class="form-control" id="youtube" placeholder="Youtube" value="<?php echo (((isset($site_settings->youtube)) && $site_settings->youtube != '')? $site_settings->youtube : '') ?>">
                    </div> 
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <div class="form-group"> 
                        <label>Google+</label>
                        <input type="text" name="googleplus" class="form-control" id="googlepluss" placeholder="Googleplus" value="<?php echo (((isset($site_settings->googleplus)) && $site_settings->googleplus != '')? $site_settings->googleplus : '') ?>"> 
                    </div> 
                  </div>
                  <div class="col-md-4">
                    <div class="form-group"> 
                        <label>Linked In</label>
                        <input type="text" name="linked_in" class="form-control" id="linked_in" placeholder="Linked In" value="<?php echo (((isset($site_settings->linked_in)) && $site_settings->linked_in != '')? $site_settings->linked_in : '') ?>"> 
                    </div> 
                  </div>
                  <!-- /.col -->
                </div>  
              </div> 
            </div>
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Images</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Logo</label>
                      <input type="text" name="logo" class="form-control" id="logo" placeholder="Logo" value="<?php echo (((isset($site_settings->logo)) && $site_settings->logo != '')? $site_settings->logo : '') ?>" readonly="readonly">
                      <a  class="btn btn-default generalized_img button_cls" type="button">Upload</a>
                      <?php if((isset($site_settings->logo)) && $site_settings->logo != ''){ ?>
                        <img src="<?php echo $site_settings->logo; ?>" class="img_cl" id="defff0" style="max-width: 100%;">
                      <?php }else{ ?>
                        <img src="" class="img_cl" id="defff0" style="display:none; max-width: 100%;">
                      <?php }?>
                      
                    </div> 
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group"> 
                        <label>Fav Icon</label>
                        <input type="text" name="fav" class="form-control" id="fav" placeholder="Fav" value="<?php echo (((isset($site_settings->fav)) && $site_settings->fav != '')? $site_settings->fav : '') ?>" readonly="readonly"> 
                        <a  class="btn btn-default generalized_img button_cls" type="button">Upload</a>
                        <?php if((isset($site_settings->fav)) && $site_settings->fav != ''){ ?>
                          <img src="<?php echo $site_settings->fav; ?>" class="img_cl" id="defff0" style="max-width: 100%;">
                        <?php }else{ ?>
                          <img src="" class="img_cl" id="defff0" style="display:none;max-width: 100%;">
                        <?php }?> 
                    </div> 
                  </div> 
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Default Image</label>
                      <input type="text" name="default_img" class="form-control" id="default_img" placeholder="Default Image" value="<?php echo (((isset($site_settings->default_img)) && $site_settings->default_img != '')? $site_settings->default_img : '') ?>" readonly="readonly">
                      <a  class="btn btn-default generalized_img button_cls" type="button">Upload</a>
                      <?php if((isset($site_settings->default_img)) && $site_settings->default_img != ''){ ?>
                        <img src="<?php echo $site_settings->default_img; ?>" class="img_cl" id="defff0" style="max-width: 100%;">
                      <?php }else{ ?>
                        <img src="" class="img_cl" id="defff0" style="display:none;max-width: 100%;" >
                      <?php }?>
                      
                    </div> 
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    
                  </div> 
                </div>
              </div> 
            </div>
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Meta Settings</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Meta Title</label>
                      <input type="text" name="meta_title" class="form-control" id="meta_title" placeholder="Meta Title" value="<?php echo (((isset($site_settings->meta_title)) && $site_settings->meta_title != '')? $site_settings->meta_title : '') ?>">
                    </div> 
                  </div>
                  <!-- /.col -->
                  <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="5" cols="80" autocomplete="off"><?php echo (((isset($site_settings->meta_description)) && $site_settings->meta_description != '')? $site_settings->meta_description : '') ?></textarea>
                    </div> 
                  </div> 
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Meta Keywords</label>
                      <input type="text" name="meta_key_words" class="form-control" id="meta_key_words" placeholder="Meta Keywords" value="<?php echo (((isset($site_settings->meta_key_words)) && $site_settings->meta_key_words != '')? $site_settings->meta_key_words : '') ?>">
                    </div> 
                  </div>
                  <div class="col-md-12">
                    <div class="form-group"> 
                      <input type="submit" name="submit" class="form-control btn btn-sm btn-primary" id="submit" value="Save">
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

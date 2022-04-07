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
                <label>Full Name</label>
                <input type="text" name="full_name" class="form-control" id="full_name" placeholder="Full Name" value="<?php echo (((isset($detail->full_name)) && $detail->full_name != '') ? $detail->full_name : '') ?>">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Permanent Address</label>
                <input type="text" name="permanent_addres" class="form-control" id="permanent_addres" placeholder="Permanent Addres" value="<?php echo (((isset($detail->permanent_addres)) && $detail->permanent_addres != '') ? $detail->permanent_addres : '') ?>">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Temp Address</label>
                <input type="text" name="temp_address" class="form-control" id="temp_address" placeholder="Temp Address" value="<?php echo (((isset($detail->temp_address)) && $detail->temp_address != '') ? $detail->temp_address : '') ?>">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Contact</label>
                <input type="text" name="contact" class="form-control" id="contact" placeholder="Contact" value="<?php echo (((isset($detail->contact)) && $detail->contact != '') ? $detail->contact : '') ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="user_name" class="form-control" id="user_name" placeholder="Username" value="<?php echo (((isset($detail->user_name)) && $detail->user_name != '') ? $detail->user_name : '') ?>" <?php echo (((isset($detail->id)) && $detail->id != '') ? 'readonly' : '') ?>>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="<?php echo (((isset($detail->password)) && $detail->password != '') ? $detail->password : '') ?>" <?php echo (((isset($detail->id)) && $detail->id != '') ? 'readonly' : '') ?>>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo (((isset($detail->email)) && $detail->email != '') ? $detail->email : '') ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Description</label>
                <textarea name="description" id="description" class="form-control" rows="5" cols="80" autocomplete="off"><?php echo (((isset($detail->description)) && $detail->description != '') ? $detail->description : '') ?></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Select Role</label>
                <select name="role_id" class="form-control selct2" id="role_id">
                  <option value>Select Roles</option>
                  <?php foreach ($roles as $key => $value) { ?>
                    <option value="<?php echo $value->id ?>" <?php echo (((isset($detail->role_id)) && $detail->role_id == $value->id) ? 'selected' : '') ?>><?php echo $value->name; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Select Nationality</label>
                <select name="country_code" class="form-control selct2" id="country_code">
                  <option value>Select Nationality</option>
                  <?php foreach ($countries as $key => $value) { ?>
                    <option value="<?php echo $value->country_code ?>" <?php echo (((isset($detail->country_code)) && $detail->country_code == $value->country_code) ? 'selected' : '') ?>><?php echo $value->nationality; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Profile Picture</label>
                <input type="text" name="profile_image" class="form-control" id="featured_image" placeholder="profile_image" value="<?php echo (((isset($detail->profile_image)) && $detail->profile_image != '') ? $detail->profile_image : '') ?>" readonly="readonly">
                <a class="btn btn-default featured_image button_cls" type="button">Upload</a>
                <?php if ((isset($detail->profile_image)) && $detail->profile_image != '') { ?>
                  <img src="<?php echo $detail->profile_image; ?>" class="img_cl" id="defff0">
                <?php } else { ?>
                  <img src="" class="img_cl" id="defff0" style="display:none">
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Select Designation</label>
                <select name="designation_code" class="form-control selct2" id="designation_code">
                  <option value>Select Designation</option>
                  <?php foreach ($designations as $key => $value) { ?>
                    <option value="<?php echo $value->designation_code ?>" <?php echo (((isset($detail->designation_code)) && $detail->designation_code == $value->designation_code) ? 'selected' : '') ?>><?php echo $value->designation_name; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Select Depart</label>
                <select name="depart_id" class="form-control selct2" id="depart_id">
                  <option value>Select Depart</option>
                  <?php foreach ($departs as $key => $value) { ?>
                    <option value="<?php echo $value->id ?>" <?php echo (((isset($detail->depart_id)) && $detail->depart_id == $value->id) ? 'selected' : '') ?>><?php echo $value->department_name; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Appointed Date</label>
                <input type="date" name="appointed_date" class="form-control" id="appointed_date" placeholder="Appointed date" value="<?php echo (((isset($detail->appointed_date)) && $detail->appointed_date != '') ? $detail->appointed_date : '') ?>">
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
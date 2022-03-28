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
                <label>Category Name <span style="color:red;"> *</span></label>
                <input type="text" name="category_name" class="form-control" id="category_name" placeholder="Enter Category Name" value="<?php echo set_value('category_name', (((isset($detail->category_name)) && $detail->category_name != '') ? $detail->category_name : '')); ?>">
                <?php echo form_error('category_name', '<div class="error_message">', '</div>'); ?>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>Select Parent</label>
                <select name="parent_id" class="form-control selct2" id="parent_id">
                  <?php echo $html; ?>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Description</label>
                <textarea name="description" id="description" class="form-control" rows="5" cols="80" autocomplete="off"><?php echo set_value('description', (((isset($detail->description)) && $detail->description != '') ? $detail->description : '')); ?></textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Order No.</label>
                <input type="number" name="order_no" min="0" class="form-control" id="order_no" placeholder="Enter order_no" value="<?php echo set_value('order_no', (((isset($detail->order_no)) && $detail->order_no != '') ? $detail->order_no : '')); ?>">
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
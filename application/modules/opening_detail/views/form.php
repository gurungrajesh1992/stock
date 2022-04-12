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
                  <label>Quantity</label>
                  <input type="text" name="qty" class="form-control" id="qty" placeholder="Quantity" value="<?php echo set_value('qty', (((isset($detail->qty)) && $detail->qty != '')? $detail->qty : '')); ?>">
                  <?php echo form_error('qty', '<div class="error_message">', '</div>'); ?>
                </div>
              </div>
          </div>

          <div class="row"> 
              <div class="col-md-4">
                <div class="form-group">
                  <label>Price per Unit</label>
                  <input type="text" name="unit_price" class="form-control" id="unit_price" placeholder="Unit Price" value="<?php echo set_value('unit_price', (((isset($detail->unit_price)) && $detail->unit_price != '')? $detail->unit_price : '')); ?>">
                  <?php echo form_error('unit_price', '<div class="error_message">', '</div>'); ?>
                </div>
              </div>
          </div>

          <div class="row"> 
              <div class="col-md-4">
                <div class="form-group">
                  <label>Total Price</label>
                  <input type="text" name="total_price" class="form-control" id="total_price" placeholder="Total Price" value="<?php echo set_value('total_price', (((isset($detail->total_price)) && $detail->total_price != '')? $detail->total_price : '')); ?>">
                  <?php echo form_error('total_price', '<div class="error_message">', '</div>'); ?>
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
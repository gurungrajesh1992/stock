<section class="content">
  <div class="container-fluid">
    <form class="all_form" method="post" action enctype="multipart/form-data">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title"><?php echo $title ?></h3>

          <div class="card-tools"> 
            <a class="btn btn-sm btn-info" id="approve_open">Approve</a>
            <a class="btn btn-sm btn-success" id="post_open">Post</a>
          </div>
        </div>

        <div class="card-body">
            <!-- <div class="row">
                <div class="col-md-12">
                    <div class="open_master">
                            <h4>Fiscal Year : </h4>
                            <p><?php //echo (((isset($detail->fiscal_year)) && $detail->fiscal_year != '') ? $detail->fiscal_year : '') ?></p>
                    </div>
                </div>
            </div> -->
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Fiscal Year</label>
                <?php echo set_value('opening_date', (((isset($detail->fiscal_year)) && $detail->fiscal_year != '') ? $detail->fiscal_year : '')); ?>
              
              </div>
            </div>
            <!-- <div class="col-md-4">
            </div> -->
            <div class="col-md-4">
              <div class="form-group">
                <label>Opening Date</label>
                <?php echo set_value('opening_date', (((isset($detail->opening_date)) && $detail->opening_date != '') ? $detail->opening_date : '')); ?>
                
              </div>
            </div>

          </div>


          <div class="row">
            <div class="col-md-8">
              <div class="form-group">
                <label>Remarks</label>
                <?php echo set_value('remarks', (((isset($detail->remarks)) && $detail->remarks != '') ? $detail->remarks : '')); ?>
                
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div style="border: 1px solid #ddd;">

              </div>
            </div>
          </div>

       
          <div class="row">
            <div class="col-md-12">
              <div class="req_item" id="items_opening">
                <div class="row">
                  <div class="col-md-2">
                    <label>Product</label>
                  </div>
                  <div class="col-md-2">
                    <label>Quantity</label>
                  </div>
                  <div class="col-md-2">
                    <label>Unit Price</label>
                  </div>
                  <div class="col-md-4">
                    <label>Location</label>
                  </div>
                  <div class="col-md-2">
                    <label>Remarks</label>
                  </div>
                </div>
                <?php
                if (isset($detail->id)) {
                  $childs = $this->crud_model->get_where('opening_detail', array('opening_master_id' => $detail->id));
                  if ($childs) {
                    foreach ($childs as $key => $value) {
                      $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                ?>
                      <div class="row" style="margin-bottom: 15px;">
                        <div class=" col-md-2">
                          <?php echo $item_detail->item_name; ?>
                        </div>
                        <div class="col-md-2">
                          <?php echo $value->qty; ?>
                        </div>
                        <div class="col-md-2">
                          <?php echo $value->unit_price; ?>
                        </div>
                        <div class="col-md-3">
                            <?php 
                            $location=$this->crud_model->get_where_single('location_para', array('id' => $value->location_id));
                            echo $location->store_name;
                            ?>
                           
                        
                          
                        </div>
                        <div class="col-md-3">
                          <?php echo $value->remarks; ?>
                        </div>
                       
                      </div>
                <?php }
                  }
                } ?>
              </div>
            </div>
          </div>


          
        </div>
      </div>
  </div>
  </form>



</section>
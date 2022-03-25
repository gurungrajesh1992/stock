<link rel="stylesheet" href="<?php echo base_url('theme/admin/') ?>rajesh/css/jquery-ui.css"> 
<section class="content">
      <div class="container-fluid">    
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
                    <div class="menu_sorting">
                        <ol class="sortable">
                            <?php echo $menu; ?>
                        </ol>    
                    </div> 
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="save_menu_order">
                        <button type="button" id="serialize_menu" class="btn btn-sm btn-primary" style="float: right;">Save</button> 
                    </div> 
                  </div>
                </div>   
              </div> 
            </div>   
      </div>
</section>  
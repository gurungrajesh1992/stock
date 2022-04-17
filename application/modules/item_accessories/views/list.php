<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <form class="all_form" method="post" action enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Select Item</label>
                    <select name="item_code" class="form-control selct2" id="item_code">
                      <option value>Select Item</option>
                      <?php foreach ($items as $key => $value) { ?>
                        <option value="<?php echo $value->item_code; ?>" <?php echo  set_select('item_code', $value->item_code);  ?>><?php echo $value->item_name; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <input type="submit" name="submit" class="form-control btn btn-sm btn-primary" id="submit" value="search">
                  </div>
                </div>
              </div>
            </form>
            <h3 class="card-title"><a href="<?php echo base_url($redirect . '/admin/form'); ?>" class="btn btn-sm btn-primary">Add New</a></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Item Code</th>
                  <th>Accessories Code</th>
                  <th>Accessories Name</th>
                  <th>Quantity</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                <?php
                if ($item_accessories) {
                  foreach ($item_accessories as $key => $value) {
                    if ($value->status == '1') {
                      $status = 'Active';
                    } else {
                      $status = 'Inactive';
                    }
                ?>
                    <tr>
                      <td><?php echo $key + 1; ?></td>
                      <td><?php echo $value->item_code; ?></td>
                      <td><?php echo $value->accessories_code; ?></td>
                      <td><?php echo $value->accessories_name; ?></td>
                      <td><?php echo $value->qty; ?></td>
                      <td><?php echo $status; ?></td>
                      <td><a href="<?php echo base_url($redirect . '/admin/form/' . $value->id); ?>" class="btn btn-sm btn-primary" style="margin: 5px;">Edit</a><a href="<?php echo base_url($redirect . '/admin/soft_delete/' . $value->id); ?>" class="btn btn-sm btn-danger" style="margin: 5px;">Delete</a></td>
                    </tr>
                  <?php }
                } else { ?>

                  <tr>
                    <td colspan="9" style="text-align:center;">No Records Found</td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <!-- /.card-body -->
            <?php if ($item_accessories) { ?>
              <div class="card-footer clearfix">
                <!-- <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul> -->
                <?php echo $pagination; ?>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
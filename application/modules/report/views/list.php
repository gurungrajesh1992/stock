<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <form method="post">
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <input type="date" name="date" class="form-control" placeholder="Report Date" value="<?php echo $date; ?>">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <input type="submit" name="submit" value="View" class="btn btn-sm btn-primary">
                  </div>
                </div>
              </div>
            </form>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Item</th>
                  <th>Item Type</th>
                  <th>Model No.</th>
                  <th>Item Image</th>
                  <th>Quantity</th>
                  <th>Unit Price</th>
                  <th>Total Price</th>
                </tr>
              </thead>
              <tbody>

                <?php
                if ($items) {
                  foreach ($items as $key => $value) {
                ?>
                    <tr>
                      <td><?php echo $key + 1; ?></td>
                      <td><?php echo $value->item_code . '( ' . $value->item_name . ' )'; ?></td>
                      <td><?php echo isset($value->item_type) ? $value->item_type : ''; ?></td>
                      <td><?php echo isset($value->model_no) ? $value->model_no : ''; ?></td>
                      <td><img src="<?php echo $value->item_image ?>" alt="Item Image" width="500" height="600"></td>
                      <td><?php echo $value->total_stock; ?></td>
                      <td><?php echo (isset($value->total_unit_price) ? $value->total_unit_price : 0) / $value->total_row_count; ?></td>
                      <td><?php echo ((isset($value->total_unit_price) ? $value->total_unit_price : 0) / $value->total_row_count) * $value->total_stock; ?></td>
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
            <?php if ($items) { ?>
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
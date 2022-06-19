<style>
  h3.year_end_generate {
    float: right;
    font-size: 1.1rem;
    font-weight: 400;
    margin: 0;
  }
</style>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <form class="all_form" method="post" action enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-1">
                  <label style="font-size: 15px;">Fiscal Year</label>
                </div>
                <div class=" col-md-2">
                  <div class="form-group">
                    <select name="fiscal_year" class="form-control selct2" id="fiscal_year">
                      <?php foreach ($fiscal_years as $key => $value) { ?>
                        <option value="<?php echo $value->fiscal_year; ?>" <?php echo (isset($fiscal_year_selected) && $fiscal_year_selected == $value->fiscal_year) ? 'selected' : ''; ?>><?php echo $value->fiscal_year; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <h3 class="card-title">
                    <button type="submit" class="btn btn-sm btn-primary">Search</button>
                  </h3>
                </div>
                <div class="col-md-6">
                  <?php
                  $check_year_end_generate_year_end = $this->crud_model->get_module_function_for_role('year_end', 'generate_year_end');
                  if ($check_year_end_generate_year_end == true) {
                  ?>
                    <div class="year_end_blk">
                      <h3 class="loader_year_end" id="loader_year_end" style="display:none;">
                        <img src="http://localhost:7777/stock/uploads/svg/barLoading.svg" class="img_cl" id="defff0" style="max-width: 100%; color: #28a545; width: 58px; background-color: #28a745; position: absolute; right: 15px; height: 31px;border-radius: 5px;">
                      </h3>
                      <h3 class="year_end_generate"><a class="btn btn-sm btn-success" id="generate_year_end">Generate</a></h3>
                    </div>
                  <?php } ?>
                </div>
            </form>
          </div>
        </div>
        <!-- /.card-header -->
        <div class=" card-body">
          <table class="table table-bordered table-responsive">
            <thead>
              <tr>
                <th>#</th>
                <th>Fiscal Year</th>
                <th>Item</th>
                <th>Dep Rate</th>
                <th>Purchase Date</th>
                <th>Purchase Amount</th>
                <th>Depreciated Amount</th>
                <th>Book Value</th>
                <th>Total Depreciated Amount</th>
                <th>Remarks</th>
                <th>Created On</th>
              </tr>
            </thead>
            <tbody>

              <?php
              if ($items) {
                foreach ($items as $key => $value) {
                  $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
              ?>
                  <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $value->fiscal_year; ?></td>
                    <td>
                      <p><?php echo $value->item_code; ?></p>( <?php echo $item_detail->item_name; ?> )
                    </td>
                    <td><?php echo $item_detail->depreciation_rate; ?> %</td>
                    <td><?php echo $value->purchase_date; ?></td>
                    <td><?php echo $value->purchase_amt; ?></td>
                    <td><?php echo $value->depreciated_amt; ?></td>
                    <td><?php echo $value->book_value; ?></td>
                    <td><?php echo $value->total_depreciated_amt; ?></td>
                    <td><?php echo $value->remarks; ?></td>
                    <td><?php echo $value->created_on; ?></td>
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
              <?php echo $pagination; ?>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>
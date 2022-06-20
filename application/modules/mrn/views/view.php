<section class="content">
  <div class="container-fluid">
    <form class="all_form" method="post" action enctype="multipart/form-data">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title"><?php echo $title ?></h3>
          <div class="card-tools">
            <?php
            $check_mrn_change_status = $this->crud_model->get_module_function_for_role('mrn', 'change_status');
            if ($check_mrn_change_status == true) {
            ?>
              <a class="btn btn-sm btn-info" id="approve_mrn" table_id="mrn_master-<?php echo $detail->id; ?>"><?php echo (isset($detail->approved_by) && $detail->approved_by != '') ? 'Approved' : 'Approve' ?></a>
            <?php } ?>
            <?php
            $check_mrn_cancel_row = $this->crud_model->get_module_function_for_role('mrn', 'cancel_row');
            if ($check_mrn_cancel_row == true) {
            ?>
              <a class="btn btn-sm btn-danger" id="cancel_mrn" table_id="mrn_master-<?php echo $detail->id; ?>"><?php echo (isset($detail->cancel_tag) && $detail->cancel_tag == '1') ? 'Cancelled' : 'Cancel' ?></a>
            <?php } ?>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>MRN Date : </label>
                <?php echo set_value('mrn_date', (((isset($detail->mrn_date)) && $detail->mrn_date != '') ? $detail->mrn_date : '')); ?>

              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>MRN No. : </label>
                <?php echo set_value('mrn_no', (((isset($mrn_no)) && $mrn_no != '') ? $mrn_no : '')); ?>


              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div style="border: 1px solid #ddd;margin-bottom: 10px;"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">

              <div class="row">
                <div class="col-md-12">
                  <div class="req_item" id="items">
                    <div class=" row">
                      <div class="col-md-1">
                        <label>
                          #
                        </label>
                      </div>
                      <div class="col-md-3">
                        <label>Product</label>
                      </div>
                      <div class="col-md-2">
                        <label>Ordered Quantity</label>
                      </div>
                      <div class="col-md-6">
                        <label>Remarks</label>
                      </div>
                    </div>
                    <?php
                    if (isset($detail->mrn_no)) {
                      $childs = $this->crud_model->get_where('mrn_details', array('mrn_no' => $detail->mrn_no));
                      if ($childs) {
                        foreach ($childs as $key => $value) {
                          $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                    ?>
                          <div class="row" style="margin-bottom: 15px;">
                            <div class="col-md-1">
                              <?php echo ($key + 1) . '.'; ?>
                            </div>
                            <div class="col-md-3">
                              <?php echo $item_detail->item_name; ?>
                            </div>
                            <div class="col-md-2">
                              <?php echo $value->ordered_qty; ?>
                            </div>
                            <div class="col-md-6">
                              <?php echo $value->remark; ?>
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

          <div class="row">
            <div class=" col-md-4">
              <div class="form-group">
                <label>Remarks : </label>
                <?php echo $detail->remarks; ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Prepared Date : </label>
                <?php echo set_value('prepared_date', (((isset($detail->prepared_date)) && $detail->prepared_date != '') ? $detail->prepared_date : '')); ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Prepared By : </label>
                <?php echo set_value('prepared_by', (((isset($detail->prepared_by)) && $detail->prepared_by != '') ? $detail->prepared_by : '')); ?>
              </div>
            </div>
          </div>


        </div>
      </div>
    </form>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <input type="button" class="form-control btn btn-sm btn-primary" onclick="printDiv('printableArea')" id="submit" value="Print">
        </div>
      </div>
    </div>
  </div>
</section>

<div class="container-fluid invoice-container" id="printableArea" hidden>
  <!-- Header -->
  <?php echo $this->load->view('layouts/admin/partials/bill_head'); ?>


  <!-- Main Content -->
  <main>
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label>MRN Date : </label>
            <?php echo set_value('mrn_date', (((isset($detail->mrn_date)) && $detail->mrn_date != '') ? $detail->mrn_date : '')); ?>

          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>MRN No. : </label>
            <?php echo set_value('mrn_no', (((isset($mrn_no)) && $mrn_no != '') ? $mrn_no : '')); ?>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Print Date : </label>
            <?php echo date("F j, Y"); ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class=" col-md-4">
          <div class="form-group">
            <label>Remarks : </label>
            <?php echo $detail->remarks; ?>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Prepared Date : </label>
            <?php echo set_value('prepared_date', (((isset($detail->prepared_date)) && $detail->prepared_date != '') ? $detail->prepared_date : '')); ?>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Prepared By : </label>
            <?php echo set_value('prepared_by', (((isset($detail->prepared_by)) && $detail->prepared_by != '') ? $detail->prepared_by : '')); ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div style="border: 1px solid #ddd;margin-bottom: 10px;"></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">

          <div class="row">
            <div class="col-md-12">
              <div class="req_item" id="items">
                <div class=" row">
                  <div class="col-md-1">
                    <label>
                      SN
                    </label>
                  </div>
                  <div class="col-md-3">
                    <label>Product</label>
                  </div>
                  <div class="col-md-2">
                    <label>Ordered Quantity</label>
                  </div>
                  <div class="col-md-6">
                    <label>Remarks</label>
                  </div>
                </div>
                <?php
                if (isset($detail->mrn_no)) {
                  $childs = $this->crud_model->get_where('mrn_details', array('mrn_no' => $detail->mrn_no));
                  if ($childs) {
                    foreach ($childs as $key => $value) {
                      $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                ?>
                      <div class="row" style="margin-bottom: 15px;">
                        <div class="col-md-1">
                          <?php echo ($key + 1) . '.'; ?>
                        </div>
                        <div class="col-md-3">
                          <?php echo $item_detail->item_name; ?>
                        </div>
                        <div class="col-md-2">
                          <?php echo $value->ordered_qty; ?>
                        </div>
                        <div class="col-md-6">
                          <?php echo $value->remark; ?>
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
  </main>

  <!-- Footer -->
  <footer>
    <div class="row">
      <div class="col-sm-9 text-sm-end">
        <br>
        <br>
        ...................................
        <br>
        <b> Receiver's Signature </b>
        <br>
      </div>
      <div class="col-sm-3">
        <br>
        <br>
        ...................................
        <br>
        <b> Authorized Signature </b>
        <br>
      </div>
    </div>

  </footer>

</div>


<script>
  function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
  }
</script>
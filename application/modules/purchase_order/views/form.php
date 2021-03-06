<style>
  .reqsn_cls {
    display: none;
  }
</style>
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
                <label>Select Purchase Order Type</label>
                <select name="po_request_type" class="form-control selct2" id="po_request_type" required>
                  <option value>Select</option>
                  <option value="DR">Direct</option>
                  <option value="REQ">Requisition</option>
                  <option value="MRN">MRN</option>
                  <option value="PR">Purchase Request</option>
                </select>
              </div>
            </div>
            <div class="col-md-3 reqsn_cls" id="reqsn">
              <div class="form-group">
                <label>Select Requisition no</label>
                <select name="requisition_no" class="form-control selct2" id="requisition_no">
                  <?php foreach ($requisitions as $key => $value) { ?>
                    <option value="<?php echo $value->requisition_no; ?>"><?php echo $value->requisition_no; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-3 reqsn_cls" id="mrn">
              <div class="form-group">
                <label>Select MRN no</label>
                <select name="mrn_no" class="form-control selct2" id="mrn_no">
                  <?php foreach ($mrns as $key => $value) { ?>
                    <option value="<?php echo $value->mrn_no; ?>"><?php echo $value->mrn_no; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-3 reqsn_cls" id="pr">
              <div class="form-group">
                <label>Select Purchase Request</label>
                <select name="purchase_request_no" class="form-control selct2" id="purchase_request_no">
                  <?php foreach ($purchases_req as $key => $value) { ?>
                    <option value="<?php echo $value->purchase_request_no; ?>"><?php echo $value->purchase_request_no; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <input type="submit" name="submit" class="form-control btn btn-sm btn-primary" id="submit" value="Continue">
                <input type="hidden" name="id" class="form-control btn btn-sm btn-primary" id="submit" value="<?php echo (((isset($detail->id)) && $detail->id != '') ? $detail->id : '') ?>">
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
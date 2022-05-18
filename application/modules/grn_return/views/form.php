<style>
  /* .reqsn_cls {
    display: none;
  } */
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
            <!-- <div class="col-md-3">
              <div class="form-group">
                <label>Select Issue Type</label>
                <select name="issue_type" class="form-control selct2" id="issue_type" required>
                  <option value>Select</option>
                  <option value="RQ">By Request</option>
                </select>
              </div>
            </div> -->
            <div class="col-md-3">
              <div class="form-group reqsn_cls" id="reqsn">
                <label>Select GRN no</label>
                <select name="grn_no" class="form-control selct2" id="grn_no">
                  <?php foreach ($grn_masters as $key => $value) { ?>
                    <option value="<?php echo $value->grn_no; ?>"><?php echo $value->grn_no; ?></option>
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
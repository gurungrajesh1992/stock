<section class="content">
    <div class="container-fluid">
        <form class="all_form" method="post" action enctype="multipart/form-data">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"><?php echo $title ?></h3>

                    <div class="card-tools">
                        <?php
                        $check_gate_pass_change_status = $this->crud_model->get_module_function_for_role('gate_pass', 'change_status');
                        if ($check_gate_pass_change_status == true) {
                        ?>
                            <a class="btn btn-sm btn-info" id="approve_gate_pass" table_id="gate_pass-<?php echo $master_detail->id; ?>"><?php echo (isset($master_detail->approved_by) && $master_detail->approved_by != '') ? 'Approved' : 'Approve' ?></a>
                        <?php } ?>
                        <?php
                        $check_gate_pass_cancel_row = $this->crud_model->get_module_function_for_role('gate_pass', 'cancel_row');
                        if ($check_gate_pass_cancel_row == true) {
                        ?>
                            <a class="btn btn-sm btn-danger" id="cancel_gate_pass" table_id="gate_pass-<?php echo $master_detail->id; ?>"><?php echo (isset($master_detail->cancel_tag) && $master_detail->cancel_tag == '1') ? 'Cancelled' : 'Cancel' ?></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="card-body" id="printableArea">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Gate Pass No. : </label>
                                <?php echo set_value('gate_pass_no', (((isset($master_detail->gate_pass_no)) && $master_detail->gate_pass_no != '') ? $master_detail->gate_pass_no : '')); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Sales No. : </label>
                                <?php echo set_value('sales_no', (((isset($master_detail->sales_no)) && $master_detail->sales_no != '') ? $master_detail->sales_no : '')); ?>
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
                                            <div class="col-md-2">
                                                <label>Product</label>
                                            </div>
                                            <div class="col-md-1">
                                                <label>
                                                    Quantity</label>
                                            </div>
                                            <div class="col-md-1">
                                                <label>Test</label>
                                            </div>
                                            <div class="col-md-5">
                                                <label>Test</label>
                                            </div>

                                        </div>
                                        <?php
                                        if (isset($master_detail->gate_pass_no)) {
                                            $childs = $this->crud_model->get_where('gate_pass_details', array('gate_pass_no' => $master_detail->gate_pass_no));
                                            if ($childs) {

                                                foreach ($childs as $key => $value) {
                                                    // var_dump($value);
                                                    // exit;

                                                    $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                                                    $sales_details = $this->crud_model->get_where_single('sales_details', array('item_code' => $value->item_code));

                                        ?>
                                                    <div class="row" style="margin-bottom: 15px;">
                                                        <div class="col-md-2">
                                                            <?php echo $item_detail->item_name; ?>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <?php echo $sales_details->qty; ?>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <?php echo "2nd col"; ?>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <?php echo "2nd col"; ?>
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
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
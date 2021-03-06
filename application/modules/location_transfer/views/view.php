<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title"><?php echo $title ?></h3>

                <div class="card-tools">
                    <?php
                    $check_location_transfer_change_status = $this->crud_model->get_module_function_for_role('location_transfer', 'change_status');
                    if ($check_location_transfer_change_status == true) {
                    ?>
                        <a class="btn btn-sm btn-info" id="approve_loc_transfer" table_id="location_transfer-<?php echo $detail->id; ?>"><?php echo (isset($detail->approved_by) && $detail->approved_by != '') ? 'Approved' : 'Approve' ?></a>
                    <?php } ?>
                    <?php
                    $check_location_transfer_location_transfer_post = $this->crud_model->get_module_function_for_role('location_transfer', 'location_transfer_post');
                    if ($check_location_transfer_location_transfer_post == true) {
                    ?>
                        <a class="btn btn-sm btn-success" id="post_loc_transfer" table_id="location_transfer-<?php echo $detail->id; ?>"><?php echo (isset($detail->posted_tag) && $detail->posted_tag == '1') ? 'Posted' : 'Post' ?></a>
                    <?php } ?>
                    <?php
                    $check_location_transfer_cancel_row = $this->crud_model->get_module_function_for_role('location_transfer', 'cancel_row');
                    if ($check_location_transfer_cancel_row == true) {
                    ?>
                        <a class="btn btn-sm btn-danger" id="cancel_loc_transfer" table_id="location_transfer-<?php echo $detail->id; ?>"><?php echo (isset($detail->cancel_tag) && $detail->cancel_tag == '1') ? 'Cancelled' : 'Cancel' ?></a>
                    <?php } ?>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php
                    $from_loc = $this->crud_model->get_where_single_order_by('location_para', array('id' => $detail->from_loc), 'id', 'DECS');
                    $to_loc = $this->crud_model->get_where_single_order_by('location_para', array('id' => $detail->to_loc), 'id', 'DECS');
                    ?>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Location Transfer Code : </label>
                            <?php echo (isset($detail->transfer_code) && $detail->transfer_code  != '') ? $detail->transfer_code  : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>From Location / From Store : </label>
                            <?php echo (isset($from_loc->store_name) && $from_loc->store_name  != '') ? $from_loc->store_name  : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>To Location / To Store : </label>
                            <?php echo (isset($to_loc->store_name) && $to_loc->store_name  != '') ? $to_loc->store_name  : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Location Transfer Date : </label>
                            <?php echo (isset($detail->transfered_on) && $detail->transfered_on  != '') ? $detail->transfered_on  : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Remarks : </label>
                            <?php echo ((isset($detail->remarks)) && $detail->remarks != '') ? $detail->remarks : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-4">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div style="border: 1px solid #ddd;margin-bottom: 10px;"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="req_item" id="items">
                            <div class=" row">
                                <div class="col-md-1">
                                    <label>
                                        #
                                    </label>
                                </div>
                                <div class="col-md-2">
                                    <label>Product</label>
                                </div>
                                <div class="col-md-2">
                                    <label>Quantity</label>
                                </div>
                                <div class="col-md-2">
                                    <label>Unit Price</label>
                                </div>
                                <div class="col-md-2">
                                    <label>Total Price</label>
                                </div>

                            </div>
                            <?php
                            if (isset($detail->transfer_code)) {
                                $childs = $this->crud_model->get_where('location_transfer_detail', array('transfer_code ' => $detail->transfer_code));
                                if ($childs) {
                                    foreach ($childs as $key => $value) {
                                        $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                            ?>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="col-md-1">
                                                <?php echo ($key + 1) . '.'; ?>
                                            </div>
                                            <div class="col-md-2">
                                                <?php echo (isset($item_detail->item_name) && $item_detail->item_name != '') ? $item_detail->item_name : ''; ?>
                                            </div>
                                            <div class="col-md-2">
                                                <?php echo (isset($value->qty) && $value->qty != '') ? $value->qty : ''; ?>
                                            </div>
                                            <div class="col-md-2">
                                                <?php echo (isset($value->unit_price) && $value->unit_price != '') ? $value->unit_price : ''; ?>
                                            </div>
                                            <div class="col-md-2">
                                                <?php echo (isset($value->total_price) && $value->total_price != '') ? $value->total_price : ''; ?>
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
                <?php
                $from_loc = $this->crud_model->get_where_single_order_by('location_para', array('id' => $detail->from_loc), 'id', 'DECS');
                $to_loc = $this->crud_model->get_where_single_order_by('location_para', array('id' => $detail->to_loc), 'id', 'DECS');
                ?>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Location Transfer Code : </label>
                        <?php echo (isset($detail->transfer_code) && $detail->transfer_code  != '') ? $detail->transfer_code  : ''; ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>From Location / From Store : </label>
                        <?php echo (isset($from_loc->store_name) && $from_loc->store_name  != '') ? $from_loc->store_name  : ''; ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>To Location / To Store : </label>
                        <?php echo (isset($to_loc->store_name) && $to_loc->store_name  != '') ? $to_loc->store_name  : ''; ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Location Transfer Date : </label>
                        <?php echo (isset($detail->transfered_on) && $detail->transfered_on  != '') ? $detail->transfered_on  : ''; ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Remarks : </label>
                        <?php echo ((isset($detail->remarks)) && $detail->remarks != '') ? $detail->remarks : ''; ?>
                    </div>
                </div>
                <div class="col-md-4">

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div style="border: 1px solid #ddd;margin-bottom: 10px;"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="req_item" id="items">
                        <div class=" row">
                            <div class="col-md-2">
                                <label>
                                    SN
                                </label>
                            </div>
                            <div class="col-md-3">
                                <label>Product</label>
                            </div>
                            <div class="col-md-2">
                                <label>Quantity</label>
                            </div>
                            <div class="col-md-2">
                                <label>Unit Price</label>
                            </div>
                            <div class="col-md-2">
                                <label>Total Price</label>
                            </div>

                        </div>
                        <?php
                        if (isset($detail->transfer_code)) {
                            $childs = $this->crud_model->get_where('location_transfer_detail', array('transfer_code ' => $detail->transfer_code));
                            if ($childs) {
                                foreach ($childs as $key => $value) {
                                    $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                        ?>
                                    <div class="row" style="margin-bottom: 15px;">
                                        <div class="col-md-2">
                                            <?php echo ($key + 1) . '.'; ?>
                                        </div>
                                        <div class="col-md-3">
                                            <?php echo (isset($item_detail->item_name) && $item_detail->item_name != '') ? $item_detail->item_name : ''; ?>
                                        </div>
                                        <div class="col-md-2">
                                            <?php echo (isset($value->qty) && $value->qty != '') ? $value->qty : ''; ?>
                                        </div>
                                        <div class="col-md-2">
                                            <?php echo (isset($value->unit_price) && $value->unit_price != '') ? $value->unit_price : ''; ?>
                                        </div>
                                        <div class="col-md-2">
                                            <?php echo (isset($value->total_price) && $value->total_price != '') ? $value->total_price : ''; ?>
                                        </div>

                                    </div>
                        <?php }
                            }
                        } ?>
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
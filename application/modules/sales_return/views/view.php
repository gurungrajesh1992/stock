<section class="content">
    <div class="container-fluid">
        <form class="all_form" method="post" action enctype="multipart/form-data">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"><?php echo $title ?></h3>

                    <div class="card-tools">
                        <?php
                        $check_sales_return_change_status = $this->crud_model->get_module_function_for_role('sales_return', 'change_status');
                        if ($check_sales_return_change_status == true) {
                        ?>
                            <a class="btn btn-sm btn-info" id="approve_sales_return" table_id="sales_return-<?php echo $master_detail->id; ?>"><?php echo (isset($master_detail->approved_by) && $master_detail->approved_by != '') ? 'Approved' : 'Approve' ?></a>
                        <?php } ?>
                        <?php
                        $check_sales_return_sales_return_post = $this->crud_model->get_module_function_for_role('sales_return', 'sales_return_post');
                        if ($check_sales_return_sales_return_post == true) {
                        ?>
                            <a class="btn btn-sm btn-success" id="post_sales_return" table_id="sales_return-<?php echo $master_detail->id; ?>"><?php echo (isset($master_detail->posted_by) && $master_detail->posted_by != '') ? 'Posted' : 'Post' ?></a>
                        <?php } ?>
                        <?php
                        $check_sales_return_cancel_row = $this->crud_model->get_module_function_for_role('sales_return', 'cancel_row');
                        if ($check_sales_return_cancel_row == true) {
                        ?>
                            <a class="btn btn-sm btn-danger" id="cancel_sales_return" table_id="sales_return-<?php echo $master_detail->id; ?>"><?php echo (isset($master_detail->cancel_tag) && $master_detail->cancel_tag == '1') ? 'Cancelled' : 'Cancel' ?></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Sales Return No. : </label>
                                <?php echo set_value('s_return_no', (((isset($master_detail->s_return_no)) && $master_detail->s_return_no != '') ? $master_detail->s_return_no : '')); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Sales No. : </label>
                                <?php echo set_value('sale_no', (((isset($master_detail->sale_no)) && $master_detail->sale_no != '') ? $master_detail->sale_no : '')); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Sales Return Date : </label>
                                <?php echo set_value('sales_rtn_date', (((isset($master_detail->sales_rtn_date)) && $master_detail->sales_rtn_date != '') ? $master_detail->sales_rtn_date : date('Y-m-d'))); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-4">
                            <div class="form-group">
                                <label>Remarks : </label>
                                <?php echo (((isset($master_detail->remarks)) && $master_detail->remarks != '') ? $master_detail->remarks : '') ?>
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
                                            <div class="col-md-2">
                                                <label>Product</label>
                                            </div>
                                            <div class="col-md-1">
                                                <label>Returned Quantity</label>
                                            </div>
                                            <div class="col-md-1">
                                                <label>Unit Price</label>
                                            </div>
                                            <div class="col-md-1">
                                                <label>Total Price</label>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Remarks</label>
                                            </div>

                                        </div>
                                        <?php
                                        if (isset($master_detail->s_return_no)) {
                                            $childs = $this->crud_model->get_where('sales_return_details', array('s_return_no' => $master_detail->s_return_no));
                                            if ($childs) {

                                                foreach ($childs as $key => $value) {
                                                    $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                                        ?>
                                                    <div class="row" style="margin-bottom: 15px;">
                                                        <div class="col-md-1">
                                                            <?php echo ($key + 1) . '.'; ?>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <?php echo $item_detail->item_name; ?>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <?php echo $value->qty_return; ?>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <?php echo $value->unit_price; ?>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <?php echo $value->total_price; ?>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <?php echo $value->return_remarks; ?>
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

<div class="container-fluid invoice-container" id="printableArea" hidden>
    <!-- Header -->
    <?php echo $this->load->view('layouts/admin/partials/bill_head'); ?>


    <!-- Main Content -->
    <main>
        <div class="card-body">
            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Sales Return No. : </label>
                        <?php echo set_value('s_return_no', (((isset($master_detail->s_return_no)) && $master_detail->s_return_no != '') ? $master_detail->s_return_no : '')); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Sales No. : </label>
                        <?php echo set_value('sale_no', (((isset($master_detail->sale_no)) && $master_detail->sale_no != '') ? $master_detail->sale_no : '')); ?>
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
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Sales Return Date : </label>
                        <?php echo set_value('sales_rtn_date', (((isset($master_detail->sales_rtn_date)) && $master_detail->sales_rtn_date != '') ? $master_detail->sales_rtn_date : date('Y-m-d'))); ?>
                    </div>
                </div>
                <div class=" col-md-4">
                    <div class="form-group">
                        <label>Remarks : </label>
                        <?php echo (((isset($master_detail->remarks)) && $master_detail->remarks != '') ? $master_detail->remarks : '') ?>
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
                                    <div class="col-md-2">
                                        <label>Product</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Returned Quantity</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Unit Price</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>Total Price</label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Remarks</label>
                                    </div>

                                </div>
                                <?php
                                if (isset($master_detail->s_return_no)) {
                                    $childs = $this->crud_model->get_where('sales_return_details', array('s_return_no' => $master_detail->s_return_no));
                                    if ($childs) {

                                        foreach ($childs as $key => $value) {
                                            $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                                ?>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="col-md-1">
                                                    <?php echo ($key + 1) . '.'; ?>
                                                </div>
                                                <div class="col-md-2">
                                                    <?php echo $item_detail->item_name; ?>
                                                </div>
                                                <div class="col-md-2">
                                                    <?php echo $value->qty_return; ?>
                                                </div>
                                                <div class="col-md-2">
                                                    <?php echo $value->unit_price; ?>
                                                </div>
                                                <div class="col-md-1">
                                                    <?php echo $value->total_price; ?>
                                                </div>
                                                <div class="col-md-4">
                                                    <?php echo $value->return_remarks; ?>
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
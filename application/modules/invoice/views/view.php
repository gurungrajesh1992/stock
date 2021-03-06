<section class="content">
    <div class="container-fluid">
        <form class="all_form" method="post" action enctype="multipart/form-data">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"><?php echo $title ?></h3>

                    <div class="card-tools">
                        <?php
                        $check_invoice_change_status = $this->crud_model->get_module_function_for_role('invoice', 'change_status');
                        if ($check_invoice_change_status == true) {
                        ?>
                            <a class="btn btn-sm btn-info" id="approve_invoice" table_id="invoice_master-<?php echo $master_detail->id; ?>"><?php echo (isset($master_detail->approved_by) && $master_detail->approved_by != '') ? 'Approved' : 'Approve' ?></a>
                        <?php } ?>
                        <?php
                        $check_invoice_cancel_row = $this->crud_model->get_module_function_for_role('invoice', 'cancel_row');
                        if ($check_invoice_cancel_row == true) {
                        ?>
                            <a class="btn btn-sm btn-danger" id="cancel_invoice" table_id="invoice_master-<?php echo $master_detail->id; ?>"><?php echo (isset($master_detail->cancel_tag) && $master_detail->cancel_tag == '1') ? 'Cancelled' : 'Cancel' ?></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Invoice No. : </label>
                                <?php echo set_value('invoice_no', (((isset($master_detail->invoice_no)) && $master_detail->invoice_no != '') ? $master_detail->invoice_no : '')); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Supplier Name : </label>
                                <?php $suppliers_detail = $this->crud_model->get_where_single_order_by('supplier_infos', array('id' => $master_detail->supplier_id), 'id', 'DESC');

                                echo set_value('supplier_name', (((isset($suppliers_detail->supplier_name)) && $suppliers_detail->supplier_name != '') ? $suppliers_detail->supplier_name : '')); ?>
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
                                            <div class="col-md-2">
                                                <label>Quantity</label>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Amount</label>
                                            </div>


                                        </div>
                                        <?php
                                        if (isset($master_detail->invoice_no)) {
                                            $childs = $this->crud_model->get_where('invoice_details', array('invoice_no' => $master_detail->invoice_no));
                                            if ($childs) {
                                                $issue_slip_date = ((isset($master_detail->issue_date)) && $master_detail->issue_date != '') ? $master_detail->issue_date : date('Y-m-d');

                                                foreach ($childs as $key => $value) {
                                                    $where_stock = array(
                                                        'item_code' => $value->item_code,
                                                        'transaction_date <=' => $issue_slip_date,
                                                    );
                                                    $total_item_stock_before_issue_slip_date = $this->crud_model->get_total_item_stock('stock_ledger', $where_stock);

                                                    $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                                                    // $requisition_detail_item = $this->crud_model->get_where_single('requisition_details', array('item_code' => $value->item_code, 'requisition_no' => $master_detail->requisition_no));

                                                    // $requested_qty = (isset($requisition_detail_item->quantity_requested) && $requisition_detail_item->quantity_requested != '') ? $requisition_detail_item->quantity_requested : 0;
                                                    // $received_qty = (isset($requisition_detail_item->received_qnty) && $requisition_detail_item->received_qnty != '') ? $requisition_detail_item->received_qnty : 0;
                                                    // $remaining_qty = (isset($requisition_detail_item->remaining_qnty) && $requisition_detail_item->remaining_qnty != '') ? $requisition_detail_item->remaining_qnty : 0;

                                                    // $issued_qty = (isset($value->issued_qnty) && $value->issued_qnty != '') ? $value->issued_qnty : 0;

                                        ?>
                                                    <div class="row" style="margin-bottom: 15px;">
                                                        <div class="col-md-2">
                                                            <?php echo $item_detail->item_name; ?>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <?php echo $value->qty; ?>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <?php echo $value->amount; ?>
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
        <div class="row">
            <div class="col-sm-9 text-sm-end"> <strong>Invoice No:</strong> <?php echo $master_detail->invoice_no; ?></div>
            <div class="col-sm-3"><strong>Date:</strong><?php echo date("F j, Y"); ?></div>
        </div>
        <!-- <div class="row">
            <div class="col-sm-6 text-sm-end order-sm-1"> <strong>Pay To:</strong>
                <address>
                    Koice Inc<br />
                    2705 N. Enterprise St<br />
                    Orange, CA 92865<br />
                    contact@koiceinc.com
                </address>
            </div>
            <div class="col-sm-6 order-sm-0"> <strong>Invoiced To:</strong>
                <address>
                    Smith Rhodes<br />
                    15 Hodges Mews, High Wycombe<br />
                    HP12 3JL<br />
                    United Kingdom
                </address>
            </div>
        </div> -->
        </br>
        <div class="card">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Supplier Name : </label>
                            <?php $suppliers_detail = $this->crud_model->get_where_single_order_by('supplier_infos', array('id' => $master_detail->supplier_id), 'id', 'DESC');

                            echo set_value('supplier_name', (((isset($suppliers_detail->supplier_name)) && $suppliers_detail->supplier_name != '') ? $suppliers_detail->supplier_name : '')); ?>
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
                                            <label>SN</label>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Product</label>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Quantity</label>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Amount</label>
                                        </div>


                                    </div>
                                    <?php
                                    if (isset($master_detail->invoice_no)) {
                                        $childs = $this->crud_model->get_where('invoice_details', array('invoice_no' => $master_detail->invoice_no));
                                        if ($childs) {
                                            $issue_slip_date = ((isset($master_detail->issue_date)) && $master_detail->issue_date != '') ? $master_detail->issue_date : date('Y-m-d');

                                            foreach ($childs as $key => $value) {
                                                $where_stock = array(
                                                    'item_code' => $value->item_code,
                                                    'transaction_date <=' => $issue_slip_date,
                                                );
                                                $total_item_stock_before_issue_slip_date = $this->crud_model->get_total_item_stock('stock_ledger', $where_stock);

                                                $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));


                                    ?>
                                                <div class="row" style="margin-bottom: 15px;">
                                                    <div class="col-md-2">
                                                        <?php echo ($key + 1) . '.'; ?>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <?php echo $item_detail->item_name; ?>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <?php echo $value->qty; ?>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <?php echo $value->amount; ?>
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
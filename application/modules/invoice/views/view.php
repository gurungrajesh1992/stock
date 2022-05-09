<section class="content">
    <div class="container-fluid">
        <form class="all_form" method="post" action enctype="multipart/form-data">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"><?php echo $title ?></h3>

                    <div class="card-tools">
                        <a class="btn btn-sm btn-info" id="approve" table_id="invoice_master-<?php echo $master_detail->id; ?>"><?php echo (isset($master_detail->approved_by) && $master_detail->approved_by != '') ? 'Approved' : 'Approve' ?></a>
                        <a class="btn btn-sm btn-danger" id="cancel" table_id="invoice_master-<?php echo $master_detail->id; ?>"><?php echo (isset($master_detail->cancel_tag) && $master_detail->cancel_tag == '1') ? 'Cancelled' : 'Cancel' ?></a>
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
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <form class="all_form" method="post" action enctype="multipart/form-data">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"><?php echo $title ?></h3>

                    <div class="card-tools">
                        <a class="btn btn-sm btn-info" id="approve_sales" table_id="sales_master-<?php echo $master_detail->id; ?>"><?php echo (isset($master_detail->approved_by) && $master_detail->approved_by != '') ? 'Approved' : 'Approve' ?></a>
                        <a class="btn btn-sm btn-success" id="post_sales" table_id="sales_master-<?php echo $master_detail->id; ?>"><?php echo (isset($master_detail->posted_tag) && $master_detail->posted_tag == '1') ? 'Posted' : 'Post' ?></a>
                        <a class="btn btn-sm btn-danger" id="cancel_sales" table_id="sales_master-<?php echo $master_detail->id; ?>"><?php echo (isset($master_detail->cancel_tag) && $master_detail->cancel_tag == '1') ? 'Cancelled' : 'Cancel' ?></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Sales No. : </label>
                                <?php echo set_value('sale_no', (((isset($master_detail->sale_no)) && $master_detail->sale_no != '') ? $master_detail->sale_no : '')); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Sales Code : </label>
                                <?php echo set_value('sales_code', (((isset($master_detail->sales_code)) && $master_detail->sales_code != '') ? $master_detail->sales_code : '')); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Sales Date : </label>
                                <?php echo set_value('sales_date', (((isset($master_detail->sales_date)) && $master_detail->sales_date != '') ? $master_detail->sales_date : date('Y-m-d'))); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Client Name : </label>
                                <?php echo set_value('client_name', (((isset($master_detail->client_name)) && $master_detail->client_name != '') ? $master_detail->client_name : '')); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Payment Type : </label>
                                <?php
                                if ($master_detail->payment_type == 'CH') {
                                    $payment_type = 'Cash';
                                } else if ($master_detail->payment_type == 'CQ') {
                                    $payment_type = 'Cheque';
                                } else {
                                    $payment_type = 'Credit';
                                }
                                ?>
                                <?php echo set_value('payment_type', (((isset($payment_type)) && $payment_type != '') ? $payment_type : '')); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Bank Name : </label>
                                <?php echo set_value('bank_name', (((isset($master_detail->bank_name)) && $master_detail->bank_name != '') ? $master_detail->bank_name : '')); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Remarks : </label>
                                <?php echo set_value('remarks', (((isset($master_detail->remarks)) && $master_detail->remarks != '') ? $master_detail->remarks : '')); ?>
                            </div>
                        </div>
                        <!-- <div class="col-md-4">
                            <div class="form-group">
                                <label>Posted Date : </label>
                                <?php // echo set_value('posted_on', (((isset($master_detail->posted_on)) && $master_detail->posted_on != '') ? $master_detail->posted_on : date('Y-m-d'))); 
                                ?>
                            </div>
                        </div> -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Received By : </label>
                                <?php echo set_value('received_by', (((isset($master_detail->received_by)) && $master_detail->received_by != '') ? $master_detail->received_by : '')); ?>
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
                                                <label>Stock</label>
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
                                        if (isset($master_detail->sale_no)) {
                                            $childs = $this->crud_model->get_where('sales_details', array('sale_no' => $master_detail->sale_no));
                                            if ($childs) {
                                                $issue_slip_date = ((isset($master_detail->issue_date)) && $master_detail->issue_date != '') ? $master_detail->issue_date : date('Y-m-d');

                                                foreach ($childs as $key => $value) {
                                                    $where_stock = array(
                                                        'item_code' => $value->item_code,
                                                        'transaction_date <=' => $issue_slip_date,
                                                    );
                                                    $total_item_stock_before_sales_date = $this->crud_model->get_total_item_stock('stock_ledger', $where_stock);

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
                                                        <div class="col-md-2 <?php echo ($value->qty > $total_item_stock_before_sales_date) ? 'out_of_stock' : 'in_stock'; ?>">
                                                            <?php echo $total_item_stock_before_sales_date; ?>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <?php echo $value->qty; ?>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <?php echo $value->unit_price; ?>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <?php echo $value->grand_total; ?>
                                                        </div>

                                                    </div>
                                        <?php }
                                            }
                                        } ?>
                                    </div>
                                </div>
                            </div>
                            <div class=" row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                    <label>Total =</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="number" name="total" class="form-control" id="total_price_sales" placeholder="Total Price" value="<?php echo $master_detail->total; ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div style="border: 1px solid #ddd;margin-bottom: 10px;"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-5"></div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label style="float: left;margin-right: 20px;">Advanced Paid :</label>
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <?php echo set_value('advance_amt', (((isset($master_detail->advance_amt)) && $master_detail->advance_amt != '') ? $master_detail->advance_amt : '')); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-5"></div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label style="float: left;margin-right: 20px;">Discount Percent :</label>
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <?php echo set_value('discount_per', (((isset($master_detail->discount_per)) && $master_detail->discount_per != '') ? $master_detail->discount_per : '')); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-5"></div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label style="float: left;margin-right: 20px;">Vat Percent :</label>
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <?php echo set_value('vat_percent', (((isset($master_detail->vat_percent)) && $master_detail->vat_percent != '') ? $master_detail->vat_percent : '')); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-5"></div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label style="float: left;margin-right: 20px;">Other Charges :</label>
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <?php echo set_value('other_charges', (((isset($master_detail->other_charges)) && $master_detail->other_charges != '') ? $master_detail->other_charges : '')); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
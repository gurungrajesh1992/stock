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
                                <label>Invoice No. <span class="req">*</span></label>
                                <input type="text" name="invoice_no" class="form-control" id="invoice_no" value="<?php echo set_value('invoice_no', (((isset($invoice_no)) && $invoice_no != '') ? $invoice_no : '')); ?>" readonly>
                                <?php echo form_error('invoice_no', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Select Supplier <span class="req">*</span></label>
                                <select name="supplier_id" class="form-control selct2" id="supplier_id" required>
                                    <option value>Select Supplier</option>
                                    <?php foreach ($suppliers as $key => $value) { ?>
                                        <option value="<?php echo $value->id; ?>" <?php echo  set_select('supplier_id', $value->id, (isset($detail->supplier_id) && $detail->supplier_id  == $value->id) ? TRUE : ''); ?>><?php echo $value->supplier_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="req_item" id="">
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
                                            <div class="col-md-2">
                                                <label>Requested Qty</label>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Received Qty</label>
                                            </div>
                                        </div>
                                        <?php
                                        if (isset($purchases_detail->purchase_order_no)) {
                                            $childs = $this->crud_model->get_where('purchase_order_details', array('purchase_order_no' => $purchases_detail->purchase_order_no));
                                            if ($childs) {
                                                $issue_slip_date = ((isset($detail->issue_date)) && $detail->issue_date != '') ? $detail->issue_date : date('Y-m-d');
                                                foreach ($childs as $key => $value) {
                                                    $where_stock = array(
                                                        'item_code' => $value->item_code,
                                                        'transaction_date <=' => $issue_slip_date,
                                                    );
                                                    $total_item_stock_before_issue_slip_date = $this->crud_model->get_total_item_stock('stock_ledger', $where_stock);
                                                    $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                                                    // var_dump($value);
                                                    // exit;

                                                    $requested_qty = (isset($value->quantity_requested) && $value->quantity_requested != '') ? $value->quantity_requested : 0;
                                                    $received_qty = (isset($value->received_qnty) && $value->received_qnty != '') ? $value->received_qnty : 0;
                                                    $remaining_qty = (isset($value->remaining_qnty) && $value->remaining_qnty != '') ? $value->remaining_qnty : 0;
                                        ?>
                                                    <div class="row" style="margin-bottom: 15px;">
                                                        <div class="col-md-2">
                                                            <input type="text" name="item_name[]" class="form-control" placeholder="Item Name" value="<?php echo $item_detail->item_name; ?>" readonly>
                                                            <input type="hidden" name="item_code[]" class="form-control" placeholder="Item Code" value="<?php echo $value->item_code; ?>">
                                                        </div>
                                                        <!-- <div class="col-md-2">
                                                            <input type="number" name="qty[]" id="qty_<?php echo $value->qty; ?>" class="form-control qty_iss" placeholder="Quantity" value="<?php echo $value->qty; ?>" required>
                                                        </div> -->
                                                        <div class="col-md-2">
                                                            <input type="number" name="qty[]" class="form-control qty_iss" placeholder="Quantity" required>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="number" name="amount[]" class="form-control amount" placeholder="Amount" required>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="number" name="requested_qty[]" id="requested_qty_<?php echo $value->requested_qty; ?>" class="form-control requested_qty requested_qty_<?php echo $value->requested_qty; ?>" placeholder="requested_qty" value="<?php echo $value->requested_qty; ?>" readonly required>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="number" name="received_qty[]" id="received_qty_<?php echo $value->received_qty; ?>" class="form-control received_qty received_qty_<?php echo $value->received_qty; ?>" placeholder="received_qty" value="<?php echo $value->received_qty; ?>" readonly required>
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="submit" name="submit" class="form-control btn btn-sm btn-primary" id="submit" value="Save">
                                <input type="hidden" name="id" class="form-control btn btn-sm btn-primary" id="submit" value="<?php echo (((isset($detail->id)) && $detail->id != '') ? $detail->id : '') ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
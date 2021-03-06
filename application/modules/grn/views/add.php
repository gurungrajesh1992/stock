<style>
    .reqsn_cls {
        display: none;
    }
</style>
<section class="content">
    <div class="container-fluid">
        <form class="all_form" method="post" action="<?php echo base_url('grn/admin/form'); ?>" enctype="multipart/form-data">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Select Type</h3>

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
                                <label>Select Goods Receive Type</label>
                                <select name="grn_request_type" class="form-control selct2" id="grn_request_type" required>
                                    <option value="DR" <?php echo (isset($type) && $type == 'DR') ? 'selected' : ''; ?>>Direct</option>
                                    <option value="INV" <?php echo (isset($type) && $type == 'INV') ? 'selected' : ''; ?>>Invoice</option>
                                    <option value="PO" <?php echo (isset($type) && $type == 'PO') ? 'selected' : ''; ?>>Purchase Order</option>
                                    <option value="PRQ" <?php echo (isset($type) && $type == 'PRQ') ? 'selected' : ''; ?>>Purchase Request</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 <?php echo ($type == 'INV' ? '' : 'reqsn_cls'); ?>" id="inv">
                            <div class="form-group">
                                <label>Select Invoice no</label>
                                <select name="invoice_no" class="form-control selct2" id="invoice_no">
                                    <?php foreach ($invs as $key => $value) { ?>
                                        <option value="<?php echo $value->invoice_no; ?>" <?php echo ($type_no == $value->invoice_no) ? 'selected' : ''; ?>><?php echo $value->invoice_no; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 <?php echo ($type == 'PO' ? '' : 'reqsn_cls'); ?>" id="po">
                            <div class="form-group">
                                <label>Select Purchase Order no</label>
                                <select name="purchase_order_no" class="form-control selct2" id="purchase_order_no">
                                    <?php foreach ($pos as $key => $value) { ?>
                                        <option value="<?php echo $value->purchase_order_no; ?>" <?php echo ($type_no == $value->purchase_order_no) ? 'selected' : ''; ?>><?php echo $value->purchase_order_no; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 <?php echo ($type == 'PRQ' ? '' : 'reqsn_cls'); ?>" id="prq">
                            <div class="form-group">
                                <label>Select Purchase Request no</label>
                                <select name="purchase_request_no" class="form-control selct2" id="purchase_request_no">
                                    <?php foreach ($prqs as $key => $value) { ?>
                                        <option value="<?php echo $value->purchase_request_no; ?>" <?php echo ($type_no == $value->purchase_request_no) ? 'selected' : ''; ?>><?php echo $value->purchase_request_no; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="submit" name="submit" class="form-control btn btn-sm btn-primary" id="submit" value="Continue">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>GRN No. <span class="req">*</span></label>
                                <input type="text" name="grn_no" class="form-control" id="grn_no" placeholder="GRN Number" value="<?php echo set_value('grn_no', (((isset($grn_no)) && $grn_no != '') ? $grn_no : '')); ?>" readonly>
                                <?php echo form_error('grn_no', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Date <span class="req">*</span></label>
                                <input type="date" name="grn_date" class="form-control" id="grn_date" placeholder="Date" value="<?php echo set_value('grn_date', (((isset($detail->grn_date)) && $detail->grn_date != '') ? $detail->grn_date : date('Y-m-d'))); ?>" required>
                                <?php echo form_error('grn_date', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Select Suppliers <span class="req">*</span></label>
                                <select name="supplier_id" class="form-control selct2" id="supplier_id" required>
                                    <?php foreach ($suppliers as $key => $value) { ?>
                                        <option value="<?php echo $value->id; ?>" <?php echo  set_select('supplier_id', $value->id, (isset($detail->supplier_id) && $detail->supplier_id   == $value->id) ? TRUE : ''); ?>><?php echo $value->supplier_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Select Payment Type <span class="req">*</span></label>
                                <select name="payment_type" class="form-control selct2" id="payment_type" required>
                                    <option value="CH" <?php echo  set_select('payment_type', 'CH', (isset($detail->payment_type) && $detail->payment_type  == 'CH') ? TRUE : ''); ?>>Cash</option>
                                    <option value="CQ" <?php echo  set_select('payment_type', 'CQ', (isset($detail->payment_type) && $detail->payment_type  == 'CQ') ? TRUE : ''); ?>>Cheque</option>
                                    <option value="CR" <?php echo  set_select('payment_type', 'CR', (isset($detail->payment_type) && $detail->payment_type  == 'CR') ? TRUE : ''); ?>>Credit</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Bank Name </label>
                                <input type="text" name="bank_name" class="form-control" id="bank_name" placeholder="Bank Name" value="<?php echo set_value('bank_name', (((isset($detail->bank_name)) && $detail->bank_name != '') ? $detail->bank_name : '')); ?>" required>
                                <?php echo form_error('bank_name', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><?php echo $transaction_level; ?><span class="req">*</span></label>
                                <input type="text" name="type_no" class="form-control" id="type_no" placeholder="Transaction Number" value="<?php echo set_value('type_no', (((isset($type_no)) && $type_no != '') ? $type_no : '')); ?>" readonly>
                                <?php echo form_error('type_no', '<div class="error_message">', '</div>'); ?>
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
                                                <label>Quantity</label>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Unit Price</label>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Batch No.</label>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Location</label>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Total Price</label>
                                            </div>
                                        </div>
                                        <?php
                                        if ($type == "INV") {
                                            if (isset($main_detail->invoice_no)) {
                                                $childs = $this->crud_model->get_where('invoice_details', array('invoice_no' => $type_no));
                                                if ($childs) {
                                                    $total = 0;
                                                    foreach ($childs as $key => $value) {

                                                        $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                                        ?>
                                                        <div class="row" style="margin-bottom: 15px;">
                                                            <div class="col-md-1">
                                                                <?php echo ($key + 1) . '.'; ?>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="text" name="item_name[]" class="form-control" placeholder="Item Name" value="<?php echo $item_detail->item_name; ?>" readonly>
                                                                <input type="hidden" name="item_code[]" class="form-control" placeholder="Item Code" value="<?php echo $value->item_code; ?>">
                                                            </div>
                                                            <div class="col-md-1">
                                                                <input type="number" name="qty[]" min="1" class="form-control qty_grn" id="qty_grn-<?php echo  $key + 1 ?>" placeholder="Quantity" value="<?php echo $value->qty; ?>" required>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="number" name="unit_price[]" min="1" class="form-control unit_price_grn" id="unit_price_grn-<?php echo $key + 1; ?>" placeholder="Unit Price" value="<?php echo $value->amount; ?>" required>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <textarea name="batch_no[]" class="form-control" rows="1" cols="80" autocomplete="off" placeholder="Batch No"><?php echo $value->batch_no; ?></textarea>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <select name="location_id[]" class="form-control" id="location_id" required>
                                                                    <option value>Select Location</option>
                                                                    <?php foreach ($locations as $key_l => $value_l) { ?>
                                                                        <option value="<?php echo $value_l->id; ?>" <?php echo (isset($value->location_id) && $value->location_id == $value_l->id) ? 'selected' : ''; ?>><?php echo $value_l->store_name; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="number" name="total_price[]" min="1" class="form-control" id="each_total_grn-<?php echo $key + 1; ?>" placeholder="Total Price" value="<?php echo ($value->qty * $value->amount); ?>" readonly>
                                                            </div>
                                                        </div>
                                                    <?php
                                                        $total = $total + $value->qty * $value->amount;
                                                    }
                                                    ?>
                                                    <div class="row" style="margin-bottom: 15px;">
                                                        <div class="col-md-1">
                                                        </div>
                                                        <div class="col-md-6">
                                                        </div>
                                                        <div class="col-md-1">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label>Total =</label>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="number" name="total" class="form-control" id="total_price_grn" placeholder="Total Price" value="<?php echo $total; ?>" readonly>
                                                        </div>
                                                    </div>
                                            <?php
                                                }
                                            } ?>

                                            <?php
                                        } else if ($type == 'PO') {
                                            if (isset($main_detail->purchase_order_no)) {
                                                $childs = $this->crud_model->get_where('purchase_order_details', array('purchase_order_no' => $type_no));
                                                // echo "<pre>";
                                                // var_dump($childs);
                                                if ($childs) {
                                                    foreach ($childs as $key => $value) {
                                                        $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                                            ?>
                                                        <div class="row" style="margin-bottom: 15px;">
                                                            <div class="col-md-1">
                                                                <?php echo ($key + 1) . '.'; ?>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="text" name="item_name[]" class="form-control" placeholder="Item Name" value="<?php echo $item_detail->item_name; ?>" readonly>
                                                                <input type="hidden" name="item_code[]" class="form-control" placeholder="Item Code" value="<?php echo $value->item_code; ?>">
                                                            </div>
                                                            <div class="col-md-1">
                                                                <input type="number" name="qty[]" min="1" class="form-control qty_grn" id="qty_grn-<?php echo  $key + 1 ?>" placeholder="Quantity" value="1" required>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="number" name="unit_price[]" min="1" class="form-control unit_price_grn" id="unit_price_grn-<?php echo $key + 1; ?>" placeholder="Unit Price" value="0" required>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <textarea name="batch_no[]" class="form-control" rows="1" cols="80" autocomplete="off" placeholder="Batch No"><?php echo $value->batch_no; ?></textarea>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <select name="location_id[]" class="form-control" id="location_id" required>
                                                                    <option value>Select Location</option>
                                                                    <?php foreach ($locations as $key_l => $value_l) { ?>
                                                                        <option value="<?php echo $value_l->id; ?>" <?php echo (isset($value->location_id) && $value->location_id == $value_l->id) ? 'selected' : ''; ?>><?php echo $value_l->store_name; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="number" name="total_price[]" min="1" class="form-control" id="each_total_grn-<?php echo $key + 1; ?>" placeholder="Total Price" value="0" readonly>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                    <div class="row" style="margin-bottom: 15px;">
                                                        <div class="col-md-1">
                                                        </div>
                                                        <div class="col-md-6">
                                                        </div>
                                                        <div class="col-md-1">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label>Total =</label>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="number" name="total" class="form-control" id="total_price_grn" placeholder="Total Price" value="0" readonly>
                                                        </div>
                                                    </div>
                                            <?php
                                                }
                                            } ?>
                                            <?php } else {
                                            if (isset($main_detail->purchase_request_no)) {
                                                $childs = $this->crud_model->get_where('purchase_request_details', array('purchase_request_no' => $type_no));
                                                if ($childs) {
                                                    foreach ($childs as $key => $value) {
                                                        $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                                            ?>
                                                        <div class="row" style="margin-bottom: 15px;">
                                                            <div class="col-md-1">
                                                                <?php echo ($key + 1) . '.'; ?>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="text" name="item_name[]" class="form-control" placeholder="Item Name" value="<?php echo $item_detail->item_name; ?>" readonly>
                                                                <input type="hidden" name="item_code[]" class="form-control" placeholder="Item Code" value="<?php echo $value->item_code; ?>">
                                                            </div>
                                                            <div class="col-md-1">
                                                                <input type="number" name="qty[]" min="1" class="form-control qty_grn" id="qty_grn-<?php echo  $key + 1 ?>" placeholder="Quantity" value="1" required>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="number" name="unit_price[]" min="1" class="form-control unit_price_grn" id="unit_price_grn-<?php echo $key + 1; ?>" placeholder="Unit Price" value="0" required>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <textarea name="batch_no[]" class="form-control" rows="1" cols="80" autocomplete="off" placeholder="Batch No"></textarea>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <select name="location_id[]" class="form-control" id="location_id" required>
                                                                    <option value>Select Location</option>
                                                                    <?php foreach ($locations as $key_l => $value_l) { ?>
                                                                        <option value="<?php echo $value_l->id; ?>" <?php echo (isset($value->location_id) && $value->location_id == $value_l->id) ? 'selected' : ''; ?>><?php echo $value_l->store_name; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="number" name="total_price[]" min="1" class="form-control" id="each_total_grn-<?php echo $key + 1; ?>" placeholder="Total Price" value="0" readonly>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                    <div class="row" style="margin-bottom: 15px;">
                                                        <div class="col-md-1">
                                                        </div>
                                                        <div class="col-md-6">
                                                        </div>
                                                        <div class="col-md-1">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label>Total =</label>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="number" name="total" class="form-control" id="total_price_grn" placeholder="Total Price" value="0" readonly>
                                                        </div>
                                                    </div>
                                        <?php
                                                }
                                            }
                                        } ?>
                                    </div>
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
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label style="float: left;margin-right: 20px;">Select Charges</label>
                                        <select name="charges" class="form-control selct2" id="charges_grn">
                                            <option value>Select Charges</option>
                                            <?php foreach ($charges as $key => $value) { ?>
                                                <option value="<?php echo $value->charge_code; ?>"><?php echo $value->charge_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="grn_item" id="grn_items">
                                <div class=" row">
                                    <div class="col-md-1">
                                        <label>
                                            #
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Charge Name</label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Remarks</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Amount</label>
                                    </div>
                                </div>
                                <div id="charges_append">
                                    <?php
                                    $total_charges = 0;
                                    if (isset($detail->grn_no)) {
                                        $charge_childs = $this->crud_model->get_where('grn_charges', array('grn_no' => $detail->grn_no));
                                        if ($charge_childs) {
                                            foreach ($charge_childs as $key => $value) {
                                                $charge_detail = $this->crud_model->get_where_single('charge_parameter', array('charge_code' => $value->charge_code));
                                    ?>
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <?php echo ($key + 1); ?>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <?php echo $charge_detail->charge_name; ?>
                                                            <input type="hidden" name="charge_code[]" class="form-control" placeholder="Charge Code" value="<?php echo $value->charge_code; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <textarea name="charge_remarks[]" class="form-control" rows="1" cols="80" autocomplete="off" placeholder="Remarks"><?php echo (isset($value->remarks) && $value->remarks != '') ? $value->remarks : '' ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <input type="number" name="charge_amount[]" class="form-control charge_amt" id="charge_amount" placeholder="Charge Amount" value="<?php echo (isset($value->amount) && $value->amount) ? $value->amount : '' ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                                $total_charges = $total_charges + $value->amount;
                                            }
                                            ?>
                                    <?php
                                        }
                                    }
                                    ?>

                                    <input type="hidden" name="next_sn" class="form-control btn btn-sm btn-primary" id="next_sn" value="<?php echo (((isset($charge_childs)) && $charge_childs != '') ? count($charge_childs) : 0) ?>">
                                </div>
                                <div class="row">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Total =</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="number" name="total_charges" class="form-control" id="total_charges_grn" placeholder="Total Charges" value="<?php echo $total_charges; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-5"></div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label style="float: left;margin-right: 20px;">Advanced Paid</label>
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <input type="number" name="advance_paid" class="form-control" id="advance_paid" placeholder="Advanced Paid" value="<?php echo set_value('advance_paid', (((isset($detail->advance_paid)) && $detail->advance_paid != '') ? $detail->advance_paid : '')); ?>">
                                <?php echo form_error('advance_paid', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-5"></div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label style="float: left;margin-right: 20px;">Discount Percent</label>
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <input type="number" name="discount_per" class="form-control" id="discount_per" placeholder="Discount in percent" value="<?php echo set_value('discount_per', (((isset($detail->discount_per)) && $detail->discount_per != '') ? $detail->discount_per : '')); ?>">
                                <?php echo form_error('discount_per', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-5"></div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label style="float: left;margin-right: 20px;">Vat Percent</label>
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <input type="number" name="vat_percent" class="form-control" id="vat_percent" placeholder="Vat in percent" value="<?php echo set_value('vat_percent', (((isset($detail->vat_percent)) && $detail->vat_percent != '') ? $detail->vat_percent : 13)); ?>" required>
                                <?php echo form_error('vat_percent', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-5"></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="submit" name="submit" class="form-control btn btn-sm btn-primary" id="submit" value="Save">
                                <input type="hidden" name="type" class="form-control btn btn-sm btn-primary" id="type" value="<?php echo (((isset($type)) && $type != '') ? $type : '') ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
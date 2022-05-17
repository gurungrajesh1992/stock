<?php
$total = 0;

?>
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
                                <label>Sales No. <span class="req">*</span></label>
                                <input type="text" name="sale_no" class="form-control" id="sale_no" placeholder="Sales Num" value="<?php echo set_value('sale_no', (((isset($master_detail->sale_no)) && $master_detail->sale_no != '') ? $master_detail->sale_no : '')); ?>" readonly>
                                <?php echo form_error('sale_no', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Sales Code <span class="req">*</span></label>
                                <input type="text" name="sales_code" class="form-control" id="sales_code" placeholder="Sales Code" value="<?php echo set_value('sales_code', (((isset($master_detail->sales_code)) && $master_detail->sales_code != '') ? $master_detail->sales_code : '')); ?>" required>
                                <?php echo form_error('sales_code', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Sales Date </label>
                                <input type="date" name="sales_date" class="form-control" id="sales_date" placeholder="Sales Date" value="<?php echo set_value('sales_date', (((isset($master_detail->sales_date)) && $master_detail->sales_date != '') ? $master_detail->sales_date : '')); ?>" required>
                                <?php echo form_error('sales_date', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Client Name<span class="req">*</span></label>
                                <select name="client_id" class="form-control selct2" id="client_id" required>
                                    <option value>Select Client</option>
                                    <?php foreach ($clients as $key => $value) { ?>
                                        <option value="<?php echo $value->id; ?>" <?php echo  set_select('client_id', $value->id, (isset($master_detail->client_id) && $master_detail->client_id  == $value->id) ? TRUE : ''); ?>><?php echo $value->client_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Select Payment Type</label>
                                <select name="payment_type" class="form-control selct2" id="payment_type" required>
                                    <option value>Select</option>
                                    <option value="CH" <?php echo (((isset($master_detail->payment_type)) && $master_detail->payment_type == 'CH') ? 'selected' : '') ?>>Cash</option>
                                    <option value="CQ" <?php echo (((isset($master_detail->payment_type)) && $master_detail->payment_type == 'CQ') ? 'selected' : '') ?>>Cheque</option>
                                    <option value="CR" <?php echo (((isset($master_detail->payment_type)) && $master_detail->payment_type == 'CR') ? 'selected' : '') ?>>Credit</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Bank Name <span class="req">*</span></label>
                                <input type="text" name="bank_name" class="form-control" id="bank_name" placeholder="Enter Bank Name" value="<?php echo set_value('bank_name', (((isset($master_detail->bank_name)) && $master_detail->bank_name != '') ? $master_detail->bank_name : '')); ?>" required>
                                <?php echo form_error('bank_name', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-4">
                            <div class="form-group">
                                <label>remarks</label>
                                <textarea name="remarks" id="remarks" class="form-control" rows="1" cols="8" autocomplete="off"><?php echo ((isset($master_detail->remarks)) && $master_detail->remarks != '') ? $master_detail->remarks : ''; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Received By <span class="req">*</span></label>
                                <input type="text" name="received_by" class="form-control" id="received_by" placeholder="Received By" value="<?php echo set_value('received_by', (((isset($master_detail->received_by)) && $master_detail->received_by != '') ? $master_detail->received_by : '')); ?>" required>
                                <?php echo form_error('received_by', '<div class="error_message">', '</div>'); ?>
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
                                        <label>Select To Add Items</label>
                                        <select name="item" class="form-control selct2" id="item_sales">
                                            <option value>Select item</option>
                                            <?php foreach ($items as $key => $value) { ?>
                                                <option value="<?php echo $value->item_code; ?>"><?php echo $value->item_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
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
                                            <div class="col-md-5">
                                                <label>Product</label>
                                            </div>
                                            <div class="col-md-1">
                                                <label>Quantity</label>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Unit Price</label>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Total Price</label>
                                            </div>
                                            <div class="col-md-1">

                                            </div>

                                        </div>
                                        <?php
                                        // var_dump($master_detail);
                                        // exit;
                                        if (isset($master_detail->sale_no)) {
                                            $childs = $this->crud_model->get_where('sales_details', array('sale_no' => $master_detail->sale_no));
                                            if ($childs) {
                                                // $issue_slip_date = ((isset($master_detail->issue_date)) && $master_detail->issue_date != '') ? $master_detail->issue_date : date('Y-m-d');

                                                foreach ($childs as $key => $value) {
                                                    $where_stock = array(
                                                        'item_code' => $value->item_code,
                                                    );

                                                    $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));

                                        ?>
                                                    <div class="row" style="margin-bottom: 15px;">
                                                        <div class="col-md-1">
                                                            <?php echo ($key + 1) . '.'; ?>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <input type="text" name="item_name[]" class="form-control" placeholder="Item Name" value="<?php echo $item_detail->item_name; ?>" readonly>
                                                            <input type="hidden" name="item_code[]" class="form-control" placeholder="Item Code" value="<?php echo $value->item_code; ?>">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <input type="number" name="qty[]" min="1" class="form-control qty_sales" id="qty_sales-<?php echo  $key + 1 ?>" placeholder="Quantity" value="<?php echo $value->qty; ?>" required>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="number" name="unit_price[]" min="1" class="form-control unit_price_sales" id="unit_price_sales-<?php echo $key + 1; ?>" placeholder="Unit Price" value="<?php echo $value->unit_price; ?>" required>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="number" name="grand_total[]" min="1" class="form-control" id="each_total_sales-<?php echo $key + 1; ?>" placeholder="Total Price" value="<?php echo $value->grand_total; ?>" readonly>
                                                        </div>

                                                        <div class="col-md-1">
                                                            <div class="rmv_sales" id="rm-<?php echo $key + 1; ?>">
                                                                <span class="rmv_itm">X</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                        <?php
                                                    $total = $total + $value->qty * $value->unit_price;
                                                }
                                            }
                                        } ?>
                                    </div>
                                    <input type="hidden" name="next_key" class="form-control btn btn-sm btn-primary" id="next_key" value="<?php echo (((isset($childs)) && $childs != '') ? count($childs) : 0) ?>">
                                </div>
                            </div>
                            <div class=" row">
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-5">
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-2">
                                    <label>Total =</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="number" name="total" class="form-control" id="total_price_sales" placeholder="Total Price" value="<?php echo $master_detail->total; ?>" readonly>
                                </div>
                                <div class="col-md-1">

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
                                <label style="float: left;margin-right: 20px;">Advanced Paid</label>
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <input type="number" name="advance_amt" class="form-control" id="advance_amt" placeholder="Advanced Paid" value="<?php echo set_value('advance_amt', (((isset($master_detail->advance_amt)) && $master_detail->advance_amt != '') ? $master_detail->advance_amt : '')); ?>">
                                <?php echo form_error('advance_amt', '<div class="error_message">', '</div>'); ?>
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
                                <input type="number" name="discount_per" class="form-control" id="discount_per" placeholder="Discount in percent" value="<?php echo set_value('discount_per', (((isset($master_detail->discount_per)) && $master_detail->discount_per != '') ? $master_detail->discount_per : '')); ?>">
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
                                <input type="number" name="vat_percent" class="form-control" id="vat_percent" placeholder="Vat in percent" value="<?php echo set_value('vat_percent', (((isset($master_detail->vat_percent)) && $master_detail->vat_percent != '') ? $master_detail->vat_percent : 13)); ?>" required>
                                <?php echo form_error('vat_percent', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-5"></div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label style="float: left;margin-right: 20px;">Other Charges</label>
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <input type="number" name="other_charges" class="form-control" id="other_charges" placeholder="Other Charges" value="<?php echo set_value('other_charges', (((isset($master_detail->other_charges)) && $master_detail->other_charges != '') ? $master_detail->other_charges : '')); ?>" required>
                                <?php echo form_error('other_charges', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class=" row">
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="submit" name="submit" class="form-control btn btn-sm btn-primary" id="submit" value="Save">
                                <input type="hidden" name="id" class="form-control btn btn-sm btn-primary" id="id" value="<?php echo (((isset($master_detail->id)) && $master_detail->id != '') ? $master_detail->id : '') ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
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
                                <label>Sales Return No. <span class="req">*</span></label>
                                <input type="text" name="s_return_no" class="form-control" id="s_return_no" value="<?php echo set_value('s_return_no', (((isset($master_detail->s_return_no)) && $master_detail->s_return_no != '') ? $master_detail->s_return_no : '')); ?>" readonly>
                                <?php echo form_error('s_return_no', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Sales No. <span class="req">*</span></label>
                                <input type="text" name="sale_no" class="form-control" id="sale_no" placeholder="sales no" value="<?php echo set_value('sale_no', (((isset($master_detail->sale_no)) && $master_detail->sale_no != '') ? $master_detail->sale_no : '')); ?>" readonly>
                                <?php echo form_error('sale_no', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Sales Return Date <span class="req">*</span></label>
                                <input type="date" name="sales_rtn_date" class="form-control" id="sales_rtn_date" value="<?php echo set_value('sales_rtn_date', (((isset($master_detail->sales_rtn_date)) && $master_detail->sales_rtn_date != '') ? $master_detail->sales_rtn_date : date('Y-m-d'))); ?>">
                                <?php echo form_error('sales_rtn_date', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-4">
                            <div class="form-group">
                                <label>remarks</label>
                                <textarea name="remarks" id="remarks" class="form-control" rows="1" cols="8" autocomplete="off"><?php echo (((isset($master_detail->remarks)) && $master_detail->remarks != '') ? $master_detail->remarks : '') ?></textarea>
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
                                        <select name="item" class="form-control selct2" id="item_sales_return">
                                            <option value>Select item</option>
                                            <?php
                                            foreach ($items as $key => $value) {
                                                $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                                            ?>
                                                <option value="<?php echo $item_detail->item_code; ?>"><?php echo $item_detail->item_name; ?></option>
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
                                            <div class="col-md-2">
                                                <label>Product</label>
                                            </div>
                                            <div class="col-md-1">
                                                <label>Sales Quantity</label>
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
                                            <div class="col-md-2">
                                                <label>Location</label>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Remarks</label>
                                            </div>

                                        </div>
                                        <?php
                                        if (isset($master_detail->s_return_no)) {
                                            $childs = $this->crud_model->get_where('sales_return_details', array('s_return_no' => $master_detail->s_return_no));
                                            if ($childs) {

                                                foreach ($childs as $key => $value) {
                                                    $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                                                    $sales_detail = $this->crud_model->get_where_single('sales_details', array('item_code' => $value->item_code));

                                                    $return_qty = $sales_detail->qty;

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
                                                            <input type="number" name="qty[]" min="1" class="form-control" placeholder="Quantity" value="<?php echo $return_qty; ?>" readonly>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <input type="number" name="qty_return[]" min="1" max="<?php echo $return_qty; ?>" class="form-control qty_sales" id="qty_sales-<?php echo  $key + 1 ?>" placeholder="R-Q" value="<?php echo $value->qty_return; ?>" required>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <input type="number" name="unit_price[]" min="1" class="form-control unit_price_sales" id="unit_price_sales-<?php echo $key + 1; ?>" placeholder="Unit Price" value="<?php echo $value->unit_price; ?>" readonly>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <input type="number" name="total_price[]" min="1" class="form-control" id="each_total_sales-<?php echo $key + 1; ?>" placeholder="Total Price" value="<?php echo ($return_qty * $value->unit_price); ?>" readonly>
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
                                                            <textarea name="return_remarks[]" class="form-control" rows="1" cols="80" autocomplete="off" placeholder="Remarks"><?php echo (isset($value->return_remarks) && $value->return_remarks != '') ? $value->return_remarks : ''; ?></textarea>
                                                        </div>

                                                        <div class="col-md-1">
                                                            <div class="rmv_sales_return" id="rm-<?php echo $key + 1; ?>">
                                                                <span class="rmv_itm">X</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                        <?php
                                                    $total = $total + $return_qty * $value->unit_price;
                                                }
                                            }
                                        } ?>
                                    </div>
                                    <input type="hidden" name="next_key" class="form-control btn btn-sm btn-primary" id="next_key" value="<?php echo (((isset($childs)) && $childs != '') ? count($childs) : 0) ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
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